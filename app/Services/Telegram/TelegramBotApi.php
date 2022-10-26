<?php


namespace App\Services\Telegram;


use App\Services\Telegram\Exceptions\TelegramBotApiException;
use Illuminate\Support\Facades\Http;

class TelegramBotApi
{

    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, int $chatId, string $text) {

//        dd($text);

        try {
            Http::get(self::HOST . $token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $text,
            ]);
        }
        // можно вместо Exception указать Throwable, тогда будут указываться ошибки и пользовательские и ошибки на уровне языка
        catch (\Throwable $e)
        {
//            throw new TelegramBotApiException('Не удалось отправить сообщение в телеграмм!' . PHP_EOL . $e);

            report(new TelegramBotApiException($e->getMessage()));
        }


    }
}