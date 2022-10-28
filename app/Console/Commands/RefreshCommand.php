<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:refresh';

    protected $description = 'Команда для очистки БД и очистки папки app/public/images/products';

    public function handle ()
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        Storage::deleteDirectory('images/products'); // полный путь app/public/images/products

        $this->call('migrate:fresh', [
            '--seed' => true,
        ]);



        return Command::SUCCESS;
    }
}
