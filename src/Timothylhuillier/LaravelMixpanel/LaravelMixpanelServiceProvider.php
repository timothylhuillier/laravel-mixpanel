<?php namespace Timothylhuillier\LaravelMixpanel;

use Illuminate\Support\ServiceProvider;

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

            /* recupère le token dans le fichier de config 'mixpanel.php'
             * s'il n'existe pas $token = null (parfait pour l'env. local)
             */
            $token = \Config::get('laravel-mixpanel::token');

            return \Mixpanel::getInstance($token);
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