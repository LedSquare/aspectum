<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {moduleName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->createModule();
    }

    protected function createModule()
    {
        echo 'Создание модуля...' . "\n";
        $module = $this->argument('moduleName');
        $directories = [
            "app/Modules/{$module}",
            "app/Modules/{$module}/database",
            "app/Modules/{$module}/src",
            "app/Modules/{$module}/routes",
            "app/Modules/{$module}/src/Http",
            "app/Modules/{$module}/src/Models",
            "app/Modules/{$module}/src/Providers",
            "app/Modules/{$module}/database/migrations"
        ];

        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
        }
        $lowerModuleName = strtolower($module);

        //----router----
        $routeFileContent = "<?php\n
use Illuminate\\Support\\Facades\\Route;\n\n" .
            "Route::middleware('api')->prefix('api/{$lowerModuleName}')\n" .
            "    ->group(__DIR__ . '/../../routes/{$module}.php');\n";
        file_put_contents("app/Modules/{$module}/routes/{$lowerModuleName}.php", $routeFileContent);

        //----Serice Provider----
        $providerFileContent =
            "<?php

namespace {$module}\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class {$module}ModuleServiceProvider extends ServiceProvider
{

    public function boot(): void
    { \n" .
            '        $this->routes(function () {' . "\n" .
            "             Route::middleware('api')" . "\n" .
            "                ->prefix('api/{$lowerModuleName}')" . "\n" .
            "                ->group(__DIR__ . '/../../routes/{$lowerModuleName}.php');" . "\n" .
            '        });' . "\n" .
            '       $this->loadMigrationsFrom(__DIR__ . ' . "'/../../database/migrations');" . "\n" .
            "   }\n" .
            '}'
        ;

        file_put_contents("app/Modules/{$module}/src/Providers/{$module}ModuleServiceProvider.php", $providerFileContent);

        echo "\n" . 'Модуль "' . $module . '" создан успешно.' . "\n";
    }
}
