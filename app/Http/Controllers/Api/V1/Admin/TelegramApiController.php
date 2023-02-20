<?php
 
namespace App\Http\Controllers\Api\V1\Admin;
 
use Illuminate\Http\Request;
// use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram;
 
class TelegramApiController extends Controller
{
 
    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'message' => 'required'
        // ]);
 
        $text = "Просто сообщение \n тест"
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
 
        return response()->noContent();
    }
}