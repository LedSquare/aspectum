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

    protected $moduleName;
    public function handle()
    {
        $this->moduleName = $this->argument('moduleName');
        // $this->createModule();
        // $this->addServiceProvider();
        $this->addNamespaceToComposer();
    }

    protected function getAbsolutePath(): string
    {
        $path = preg_replace("/(.*?)\/app\/.*/", "$1", __DIR__);
        return $path;
    }

    protected function createModule()
    {
        echo 'Создание модуля...' . "\n";
        $module = $this->moduleName;

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
        $routeFileContent = "<?php\n\n" . "use Illuminate\\Support\\Facades\\Route;";
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

    protected function addServiceProvider()
    {
        $module = $this->moduleName;
        $path = $this->getAbsolutePath();

        $file = $path . '/config/app.php';

        if (!file_exists($file)) {
            echo 'File:' . $file . " don't exists";
            die;
        }

        $lines = explode("\n", file_get_contents($file));
        echo 'start' . "\t\tHello\n";
        $flag = false;
        foreach ($lines as $key => $line) {
            if (trim($line) === "'providers' => ServiceProvider::defaultProviders()->merge([") {
                $flag = true;
            }
            if ($flag === true && trim($line) === "])->toArray(),") {
                $keyEnd = $key;
                break;
            }
        }

        array_splice($lines, $keyEnd, 0, "\t\t\\$module\Providers\\$module" . 'ModuleServiceProvider::class,');
        file_put_contents($file, implode("\n", $lines));
    }

    protected function addNamespaceToComposer()
    {
        $module = $this->moduleName;
        $path = $this->getAbsolutePath();

        $file = $path . '/composer.json';

        if (!file_exists($file)) {
            echo 'File:' . $file . " don't exists";
            die;
        }
        $lines = explode("\n", file_get_contents($file));

        foreach ($lines as $key => $line) {
            if (trim($line) === "\"autoload\": {") {
                $needleKey = $key;
            }
        }

        $newLine = "\t\t\t\"$module\\\\\": \"app/Modules/$module/src\",";
        array_splice($lines, $needleKey + 2, 0, $newLine);
        file_put_contents($file, implode("\n", $lines));
    }
}
