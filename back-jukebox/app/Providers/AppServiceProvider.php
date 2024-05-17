<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Login\LoginRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Login\LoginRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
