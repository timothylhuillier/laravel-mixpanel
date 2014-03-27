<?php

namespace Timothylhuillier\LaravelMixpanel;

use Mixpanel;
use Config;

class LaravelMixpanel extends Mixpanel {

    /**
     * @var bool
     */
    protected $token;

    /**
     * @var LaravelMixpanel
     */
    private static $_instance;

    /**
     * @param bool  $token
     * @param array $options
     */
    public function __construct($token, array $options = array())
    {
        $this->setToken($token);

        self::$_instance = parent::__construct($this->token, $options = array());
    }

    /**
     * @param bool  $token
     * @param array $options
     * @return LaravelMixpanel
     */
    public static function getInstance($token = false, array $options = array())
    {
        if (!$token) {
            $token = Config::get('laravel-mixpanel::token');
        }

        if (!isset(self::$_instance)) {
            self::$_instance = new LaravelMixpanel($token, $options);
        }

        return self::$_instance;
    }

    /**
     * @param bool token
     * @return LaravelMixpanel
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return bool
     */
    public function getToken()
    {
        return $this->token;
    }
}


