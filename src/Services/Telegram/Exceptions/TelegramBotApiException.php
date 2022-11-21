<?php


namespace Services\Telegram\Exceptions;


use Illuminate\Http\Request;

class TelegramBotApiException extends \Exception
{

    public function report() {
        logger()
            ->channel('telegram')
            ->notice('Привет');
    }
    public function render(Request $request) {

        return response('asdad');
    }

}