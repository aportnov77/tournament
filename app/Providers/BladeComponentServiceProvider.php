<?php

declare(strict_types=1);

namespace App\Providers;


use App\View\Components\Layout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::component('layout', Layout::class);
    }
}
