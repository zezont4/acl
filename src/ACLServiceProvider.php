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
        $this->app->router->group(['namespace' => 'Zezont4\ACL\Http\Controllers'], function ($router) {
            require __DIR__ . '/Http/routes.php';
        });

        $this->loadViewsFrom(realpath(__DIR__ . '/views'), 'acl');

        $this->publishes([
            __DIR__ . '/publish/config/acl.php' => config_path('acl.php'),
            __DIR__ . '/publish/config/acl_lang.php' => config_path('acl_lang.php'),
        ], 'config');

		$this->publishes([
			__DIR__ . '/publish/assets' => public_path('zezont4/acl'),
		], 'assets');

        $this->loadZezont4Components();

        $this->loadZezont4BladeDirectives();
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

    public function loadZezont4Components()
    {
        \Form::component('mtText', 'zezont4.components.form.text', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('mtTel', 'zezont4.components.form.tel', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('mtPassword', 'zezont4.components.form.password', ['name', 'label', 'attributes' => []]);

        \Form::component('mtDate', 'zezont4.components.form.date', ['name', 'label', 'value' => null, 'attributes' => []]);

        \Form::component('mtRadio', 'zezont4.components.form.radio', ['name', 'label', 'selected_value' => null, 'values', 'attributes' => []]);
        \Form::component('mtCheck', 'zezont4.components.form.check', ['name', 'label', 'selected_value' => null, 'values', 'attributes' => []]);
        \Form::component('mtSelect', 'zezont4.components.form.select', ['name', 'label', 'selected_value' => null, 'values', 'attributes' => []]);

        \Form::component('mtButton', 'zezont4.components.form.button', ['label', 'class' => 'waves-light btn']);

        \Form::component('mtStatic', 'zezont4.components.form.static', ['label', 'value']);
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
