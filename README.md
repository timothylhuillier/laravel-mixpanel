laravel-mixpanel
================

In `config.php`

add `'Timothylhuillier\LaravelMixpanel\LaravelMixpanelServiceProvider',` in Providers and
`'LaravelMixpanel' => 'Timothylhuillier\LaravelMixpanel\Facades\LaravelMixpanel'` in aliases

Then in terminal : `php artisan config:publish timothylhuillier/laravel-mixpanel` and add your token in `app/config/package/timothylhuillier/laravel-mixpanel/config.php`

-----------

Now, for used this package, there is 2 solutions :
- The first, to use 'LaravelMixpanel::', ex. `LaravelMixpanel::track('Homepage View', ['connected' => false])`

But with this solutions, mixpanel people is unavailable. So, i create `getInstance()`
- The seconde solution is used  `$mixpanel = LaravelMixpanel::getInstance();`

for example :

        $mixpanel = LaravelMixpanel::getInstance();
        // identifie l'user
        $mixpanel->identify($user->mixpanel_id);
        // track l'event
        $mixpanel->track("Upgraded account");

        // MAJ de l'user dans la BDD de mixpanel
        $mixpanel->people->set($user->mixpanel_id, array(
            '$name'       => $user->name,
            '$phone'      => $user->tel,
            '$address'    => $user->address,
            '$lat'        => $user->lat,
            '$lng'        => $user->lng,
        ));


