<?php

return [

    // Token of mixpanel
    'token' => 'your-token-of-mixpanel',

    /* list of users who were ignored for track
     * (ex. list of emails)
     */
    'ignoredList' => array(),

    'ignoredValue' => Auth::user()->email
];
