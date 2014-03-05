<?php namespace Timothylhuillier\LaravelMixpanel;

use \Mixpanel;
use Config;

class LaravelMixpanel extends Mixpanel {

    protected $token;

    private static $_instance;

    public function __construct($token, $options = array())
    {
        $this->setToken($token);

        self::$_instance = parent::__construct($this->token, $options = array());

        return self::$_instance;
    }

    public static function getInstance($token = false, $options = array())
    {
        if (!$token)
        {
            $token = Config::get('laravel-mixpanel::token');
        }

        if (!isset(self::$_instance))
        {
            self::$_instance = new LaravelMixpanel($token, $options);
        }

        return self::$_instance;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }
}


