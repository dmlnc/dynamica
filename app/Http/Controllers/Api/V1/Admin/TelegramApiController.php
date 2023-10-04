<?php
 
namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
// use Telegram\Bot\Api;
use Log;

 
class TelegramApiController extends Controller
{
 
    public function sendMessage(Request $request)
    { 
        $text = $request->input('msg');
        
        // Replace <br> and <br/> with \n
        $text = str_replace(['<br>', '<br/>', '<br />'], "\n", $text);

        $settings = Settings::where('company_id', $request->input('company_id'))->first();
    
        if($text && $settings->telegram_id != null && trim($settings->telegram_id) != ''){
            try {
                $data = Telegram::sendMessage([
                    'chat_id' => $settings->telegram_id,
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
                Log::info($data);
            } catch (\Exception $e) {
                Log::info($e);
                // Handle the exception here (e.g. log the error)
            }
        }
 
        return response()->json(['mails' => $settings->emails]);
    }
}

// php artisan cache:clear
// php artisan config:clear
// php artisan route:clear
// php artisan config:cache
// php artisan route:cache
// php artisan optimize