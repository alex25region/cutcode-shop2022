<?php


namespace Support\Flash;

use Illuminate\Contracts\Session\Session;

final class Flash
{
    public const MESSAGE_KEY = 'shop_flash_message';
    public const MESSAGE_CLASS_KEY = 'shop_flash_class';

    // будет работать с сессиями (protected Session $session)
    public function __construct (protected Session $session)
    {


    }

    public function get (): ?FlashMessage   // знак ? - говорит о том, что может возвращаться null? помимо класса
    {
        $message = $this->session->get(self::MESSAGE_KEY);
        if(!$message) {
            return null;
        }

        return new FlashMessage($message, $this->session->get(self::MESSAGE_CLASS_KEY, ''));
    }

    public function info (string $message)
    {
        $this->flash($message, 'info');
    }

    public function alert (string $message)
    {
        $this->flash($message, 'alert');
    }

    private function flash (string $message, string $name)
    {
        $this->session->flash(self::MESSAGE_KEY, $message);
        $this->session->flash(self::MESSAGE_CLASS_KEY, config("flash.$name", ''));
    }


}