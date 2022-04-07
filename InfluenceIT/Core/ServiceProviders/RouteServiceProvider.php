<?php

declare(strict_types=1);

namespace InfluenceIT\Core\ServiceProviders;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        foreach ((array)glob(base_path('InfluenceIT/*')) as $path) {

            $routePath = $path . '/' . 'routes.php';

            if (file_exists($routePath)) {
                Route::prefix('api')->middleware('api')->group($routePath);
            }

            $migrationPath = $path . '/Database/Migrations';

            if (is_dir($migrationPath)) {
                $this->loadMigrationsFrom($migrationPath);
            }
        }
    }
}