<?php

return [

    // Token of mixpanel
    'token' => 'your-token-of-mixpanel',

    /**********************************************/
    /** Many Rules for ignored peoples and bots **/
    /********************************************/

    // userAgent ignored (ex. bot) whit regex (preg_match)
    'userAgent' => 'bot|spider|yahoo|facebook|crawler',

    /* list of users who were ignored for track
     * (ex. list of emails)
     */
    'ignoredList' => array(),

    'ignoredValue' => Auth::user()->email
];
