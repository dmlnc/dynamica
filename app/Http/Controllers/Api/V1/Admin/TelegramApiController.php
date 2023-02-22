<?php
 
namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
// use Telegram\Bot\Api;

 
class TelegramApiController extends Controller
{
 
    public function sendMessage(Request $request)
    { 
        $text = $request->input('msg');

        $settings = Settings::find(1);
    
        if($text){
            try {
                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001888296830'),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
            } catch (\Exception $e) {
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