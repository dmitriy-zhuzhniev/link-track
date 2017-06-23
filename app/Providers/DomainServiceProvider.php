<?php

namespace App\Providers;

use App\Domain\Click\ClickRepository;
use App\Infrastructure\Doctrine\DoctrineClickRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ClickRepository::class, DoctrineClickRepository::class);
    }
}
