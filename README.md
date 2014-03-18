laravel-mixpanel
================

In `config.php` add `Timothylhuillier\LaravelMixpanel\LaravelMixpanelServiceProvider` in the provider list and `'LaravelMixpanel' => 'Timothylhuillier\LaravelMixpanel\Facades\LaravelMixpanel'` in aliases.

Then in terminal : `php artisan config:publish timothylhuillier/laravel-mixpanel` and add your token in `app/config/package/timothylhuillier/laravel-mixpanel/config.php`

-----------

Now, to use this package, there is 2 solutions :
- You can use 'LaravelMixpanel::', ie. `LaravelMixpanel::track('Homepage View', ['connected' => false])`

But with this solution, mixpanel people is unavailable. Then, I created `getInstance()`.

- The second solution is to use `$mixpanel = LaravelMixpanel::getInstance();`

For example :

```php
<?php
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
```


