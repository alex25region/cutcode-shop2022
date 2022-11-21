<?php


namespace Services\Telegram;


use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * Class TelegramBotApiTest
 * @package Services\Telegram
 */
class TelegramBotApiTest extends TestCase
{
    /**
     * @test
     * @return void
     */

    public function it_send_message_success() : void
    {
        // делаем фековый запрос http

        Http::fake([
            TelegramBotApi::HOST . '*' => Http::response(['ok' => true])
        ]);

        $result = TelegramBotApi::sendMessage('', 1, 'Testing');

        $this->assertTrue($result);

    }

}