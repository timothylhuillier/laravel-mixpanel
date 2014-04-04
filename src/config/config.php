<?php

return [

    // Token of mixpanel
    'token' => 'your-token-of-mixpanel',

    /**********************************************/
    /** Many Rules for ignored peoples and bots **/
    /********************************************/

    // userAgent ignored (here with example it ignore all bot ;))
    'userAgent' => '^Mozilla((?!bot).)*$',

    /* list of users who were ignored for track
     * (ex. list of emails)
     */
    'ignoredList' => array(),


    /* ex. return email of user authentificated
     * (Auth::check()) ? Auth::user()->email : mustNotToBeEmpty
     */
    'ignoredValue' => 'mustNotToBeEmpty'
];
