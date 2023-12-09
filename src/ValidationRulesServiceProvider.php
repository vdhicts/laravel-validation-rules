<?php

namespace Vdhicts\ValidationRules;

use Illuminate\Support\ServiceProvider;

class ValidationRulesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'validationRules');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/validationRules'),
        ]);
    }
}
