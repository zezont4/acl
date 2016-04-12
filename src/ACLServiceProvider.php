<?php

namespace Zezont4\ACL;

use Illuminate\Support\ServiceProvider;

class ACLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function loadZezont4BladeDirectives()
    {
        \Blade::directive('hasRole', function ($role_slug) {
            return "<?php if (auth()->check()) :
				if (auth()->user()->hasRole{$role_slug}) : ?>";
        });

        \Blade::directive('endhasRole', function () {
            return "<?php endif; endif; ?>";
        });
    }
}
