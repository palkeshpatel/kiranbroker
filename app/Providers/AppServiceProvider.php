<?php

namespace App\Providers;

use App\FormFields\KeyValueJsonFormField;
use App\FormFields\MultipleImagesWithAttrsFormField;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use App\FormFields\NumberFormField;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //
        Voyager::addFormField(NumberFormField::class);
        Voyager::addFormField(KeyValueJsonFormField::class);
        Voyager::addFormField(MultipleImagesWithAttrsFormField::class);

        $this->app->bind(
            'TCG\Voyager\Http\Controllers\VoyagerBaseController',
            'App\Http\Controllers\ExtendedBreadFormFieldsController'
        );

        $this->app->bind(
            'TCG\Voyager\Http\Controllers\VoyagerMediaController',
            'App\Http\Controllers\ExtendedBreadFormFieldsMediaController'
        );
		
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
