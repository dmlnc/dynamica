<?php

namespace App\Services;  // Убедитесь, что пространство имен указано правильно

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class CarService
{
    private $client;
    private $token;
    private $dealerId;

    public function __construct($dealerId = null)
    {
        $this->client = new Client();
        $this->dealerId = $dealerId;
    }

    public function authenticate()
    {
        try {
            $this->token = Cache::remember('api_token', 55, function () {
                $response = $this->client->post('https://lk.cm.expert/oauth/token', [
                    'form_params' => [
                        'client_id' => env('CLIENT_ID', 'default_client_id'),
                        'client_secret' => env('CLIENT_SECRET', 'default_client_secret'),
                        'grant_type' => 'client_credentials',
                    ],
                ]);

                $data = json_decode((string) $response->getBody(), true);
                return $data['access_token'];
            });
        } catch (RequestException $e) {
            return ['error' => 'Authentication failed: ' . $e->getMessage()];
        }
    }

    public function getAppraisals($brand, $model, $vin)
    {
        $this->authenticate();

        $currentPage = 1;
        $lastPage = 1;

        do {
            $response = $this->client->get("https://lk.cm.expert/api/v1/cars/appraisals?withDrafts=false&filter[inspectionId][isNotNull]&filter[dealerId]={$this->dealerId}&page={$currentPage}&perPage=50", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                ],
            ]);

            $lastPage = $response->getHeader('X-Pagination-Page-Count')[0] ?? $lastPage;
            $currentPage = $response->getHeader('X-Pagination-Current-Page')[0] ?? $currentPage;

            $data = json_decode((string) $response->getBody(), true);

            if (empty($data)) {
                return 'В базе CM Expert ничего не найдено';
            }

            foreach ($data as $item) {
                if ($vin === $item['vin']) {
                    $inspectionId = $item['inspectionId'];
                    return $this->getInspectionDetails($inspectionId);
                }
                if (str_contains($item['vin'], $vin)) {
                    if ($item['brand'] === $brand && $item['model'] === $model) {
                        $inspectionId = $item['inspectionId'];
                        return $this->getInspectionDetails($inspectionId);
                    }
                }
            }

            $currentPage++;

        } while ($currentPage <= $lastPage);

        return ['error' => 'В базе CM Expert ничего не найдено'];
    }


    public function getInspectionDetails($inspectionId)
    {
        try {
            $response = $this->client->get("https://lk.cm.expert/api/inspections/inspections/{$inspectionId}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                ],
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => 'Ошибка при просмотре инспекции: ' . $e->getMessage()];
        }
    }
}
