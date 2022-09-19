<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return response([
                'success' => true,
                'message' => 'Success',
                'data' => $data
            ], 200);
        });

        Response::macro('error', function () {
            return response([
                'success' => false,
                'message' => 'Failed',
            ], 400);
        });
    }
}
