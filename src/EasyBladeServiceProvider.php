<?php


namespace EasyBlade;


use EasyBlade\Directives\{
    AssetDirective, CountDirective, EndCountDirective, isActiveDirective,
    RouteDirective, SessionDirective, EndSessionDirective, SessionExistsDirective,
    UrlDirective, UserDirective
};

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EasyBladeServiceProvider extends ServiceProvider
{

    const directives = [
        'route' => RouteDirective::class,
        'url' => UrlDirective::class,
        'asset' => AssetDirective::class,
        'isActive' => isActiveDirective::class,
        'count' => CountDirective::class,
        'endcount' => EndCountDirective::class,
        'user' => UserDirective::class,
        'sessionExists' => SessionExistsDirective::class,
        'endsessionExists' => EndSessionDirective::class,
        'session' => SessionDirective::class
    ];

    public function boot()
    {
        $this->registerDirectives();
    }

    public function registerDirectives()
    {
        foreach (static::directives as $directive => $class) {
            Blade::directive($directive, [$class, 'handle']);
        }
    }

}
