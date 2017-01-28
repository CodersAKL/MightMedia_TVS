<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");

        while (list(,$module) = each($modules)) {

            // Load the routes for each of the modules
            if(file_exists(base_path('app/Modules/'.$module.'/routes.php'))) {
                include base_path('app/Modules/'.$module.'/routes.php');
            }

            // Load the views
            if(is_dir(base_path('app/Modules/'.$module.'/Views'))) {
                $this->loadViewsFrom(base_path('app/Modules/'.$module.'/Views'), $module);
            }
        }
    }

    public function register() {}
}