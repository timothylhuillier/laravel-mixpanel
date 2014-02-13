<?php namespace Timothylhuillier\LaravelMixpanel;

use \Mixpanel;

class LaravelMixpanel extends Mixpanel {

    protected $token;

    public function __construct($token, $options = array())
    {
        $this->setToken($token);

        return parent::__construct($this->token, $options = array());
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


