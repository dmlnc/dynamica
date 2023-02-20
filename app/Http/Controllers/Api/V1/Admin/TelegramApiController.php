<?php
 
namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
// use Telegram\Bot\Api;
 
class TelegramApiController extends Controller
{
 
    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'message' => 'required'
        // ]);
        // $key = env('TELEGRAM_TOKEN', 'мой токен');

        // $telegram = new Api($key);

 
        $text = "Просто сообщение \n тест";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
 
        return response()->noContent();
    }
}