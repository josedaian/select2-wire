<?php

namespace JoseDaian\Select2;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class Select2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'select2wire');

        Blade::directive('select2wireScript', function () {
            return "<?php echo view('select2wire::components.script')->render(); ?>";
        });
    }
}