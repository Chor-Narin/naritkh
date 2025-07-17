<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    // app/Providers/AuthServiceProvider.php

    protected $policies = [
        \App\Models\Terrain::class => \App\Policies\TerrainPolicy::class,
        \App\Models\TerrainImage::class => \App\Policies\TerrainImagePolicy::class,
        \App\Models\Booking::class => \App\Policies\BookingPolicy::class,
        \App\Models\Payment::class => \App\Policies\PaymentPolicy::class,
        \App\Models\Review::class => \App\Policies\ReviewPolicy::class,
        \App\Models\Favorite::class => \App\Policies\FavoritePolicy::class,
    ];

}
