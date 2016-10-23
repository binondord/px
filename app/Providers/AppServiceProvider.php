<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\AliasLoader;
use App\Http\ViewComposers\CommonComposer;

class AppServiceProvider extends ServiceProvider
{
    protected $contractpath = 'App\\Contracts\\';

    protected $hasDirInPath = [
        'Service'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('style', 'home');
        View::composer(
            '*', CommonComposer::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setCustomBindings();
        $this->addAliases();
    }

    public function setCustomBindings()
    {
        $customBindings = [
            'Helper' =>
                [
                    'Sanitize',
                    'Custom'
                ]
        ];

        foreach($customBindings as $group => $customBinding)
        {
            foreach($customBinding as $unit)
            {
                $contract = $this->contractpath.str_plural($group)."\\{$unit}{$group}Interface";

                $class = "App\\".str_plural($group);
                $class .= in_array($group, $this->hasDirInPath) ? "\\{$unit}" : "";
                $class .= "\\{$unit}{$group}";

                $this->app->bind($contract,$class);

                if($group == "Helper")
                {
                    $offset = strtolower($unit);
                    $this->app[$offset] = app($contract);
                }
            }
        }
    }

    protected function addAliases()
    {
        $app = $this->app;
        $facadePath = 'App\\Facades\\';
        $additionalAliases = [
            'Sanitize',
            'Custom',
        ];

        $app->booting(function() use($additionalAliases, $facadePath){
            $loader = AliasLoader::getInstance();
            $aliases = $loader->getAliases();

            foreach($additionalAliases as $additionalAlias){
                if(!array_key_exists($additionalAlias, $aliases)){
                    $aliases[$additionalAlias] =  $facadePath.$additionalAlias;
                }else{
                    if(env('APP_ENV') != 'testing') {
                        throw new \Exception('Alias already existed. Please select another one to use.');
                    }
                }
            }
            $loader->setAliases($aliases);
        });
    }
}
