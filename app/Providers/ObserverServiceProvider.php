<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use App\Observers\MediaObserver;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        User::observe(UserObserver::class);
        Media::observe(MediaObserver::class);
    }
}
