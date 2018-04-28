<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCustomBladeDirective();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function registerCustomBladeDirective()
    {
        /**
         * @var Illuminate\View\Compilers\BladeCompiler $blade
         */
        $blade = app('blade.compiler');
        $blade->directive('hasErrorClass', function ($expression) {
            return '<?php echo ($errors->has('.$expression.')) ? "has-error" : null; ?>';
        });
        $blade->directive('errorBlock', function ($expression) {
            $name = str_replace(['(', ')'], null, $expression);
            return '<?php echo $errors->first('.$name.', \'<span class="help-block">:message</span>\') ?>';
        });
    }

}
