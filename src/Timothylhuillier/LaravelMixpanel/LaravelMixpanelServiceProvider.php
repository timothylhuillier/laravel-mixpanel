<?php namespace Timothylhuillier\LaravelMixpanel;

use Illuminate\Support\ServiceProvider;
use Config;
use Request;

class LaravelMixpanelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('timothylhuillier/laravel-mixpanel');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('mixpanel', function() {

            // inactive mixpanel de base pour ne pas tracker les bot
            $token = null;

            // si ce n'est pas un bot et si ce n'est pas une personne à ignorer,on initialise mixpanel
            if(preg_match('/('.Config::get('laravel-mixpanel::userAgent').')/', Request::header('User-Agent'))
                AND
                !in_array(Config::get('laravel-mixpanel::ignoredValue'), Config::get('laravel-mixpanel::ignoredList'))
            ){

                /* recupère le token dans le fichier de config 'mixpanel.php'
                 * s'il n'existe pas $token = null (parfait pour l'env. local)
                 */
                $token = Config::get('laravel-mixpanel::token');

            }

            return new LaravelMixpanel($token);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('mixpanel');
	}

}
