<?php

namespace App\Providers;

use App\Http\Kernel;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register ()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot () : void
    {
//        Model::preventLazyLoading(!app()->isProduction());
//        Model::preventSilentlyDiscardingAttributes(!app()->isProduction());
        // или указать shouldBeStrict, метод который содержит вышеописанные методы.
         Model::shouldBeStrict(!app()->isProduction());

        if (app()->isProduction()) {
            // Делаем логирование при долгом выполнении запросе sql
            DB::listen(function ($query) {
//            $query->sql;
//            $query->bindings;
//            $query->time;

                // Добавляем логирование, покажет какой запрос выполняется очень долго
                if ($query->time>500) {
                    logger()
                        ->channel('telegram')
                        ->debug('Query longer than 1s: ' . $query->sql, $query->bindings);
                }
            });


            // Жизненный цикл запроса:

            app(Kernel::class)->whenRequestLifecycleIsLongerThan(
                CarbonInterval::second(4), function () {
                logger()
                    ->channel('telegram')
                    ->debug('whenRequestLifecycleIsLongerThan: ' . request()->url());
            }
            );
        }


    }
}
