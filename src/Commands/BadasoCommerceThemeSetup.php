<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\VarExporter\VarExporter;
use Illuminate\Support\Str;

class BadasoCommerceThemeSetup extends Command
{
    protected $file;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'badaso-commerce-theme:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Badaso Theme For Commerce';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->file = app('files');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->addingBadasoEnv();
        $this->updateWebpackMix();
        $this->publishBadasoProvider();
        $this->updatePackageJson();
        $this->linkStorage();
    }

    protected function updatePackageJson()
    {
        $package_json = file_get_contents(base_path('package.json'));
        $decoded_json = json_decode($package_json, true);
        $decoded_json['devDependencies']['postcss'] = '^8.1.14';
        $decoded_json['devDependencies']['tailwindcss-debug-screens'] = '^2.0.0';
        $decoded_json['devDependencies']['tailwindcss-important'] = '^1.0.0';

        $decoded_json['dependencies']['@tailwindcss/aspect-ratio'] = '^0.2.1';
        $decoded_json['dependencies']['@tailwindcss/forms'] = '^0.3.3';
        $decoded_json['dependencies']['@tailwindcss/line-clamp'] = '^0.2.1';
        $decoded_json['dependencies']['@inertiajs/inertia'] = '^0.10.1';
        $decoded_json['dependencies']['@inertiajs/inertia-vue'] = '^0.7.2';
        $decoded_json['dependencies']['currency.js'] = '^2.0.4';
        $decoded_json['dependencies']['tailwindcss'] = '^2.2.6';
        $decoded_json['dependencies']['tailwindcss-tooltip-arrow-after'] = '^1.0.0';
        $decoded_json['dependencies']['voca'] = '^1.4.0';
        $decoded_json['dependencies']['vue-resize'] = '^1.0.1';
        $decoded_json['dependencies']['vuelidate'] = '^0.7.6';

        $encoded_json = json_encode($decoded_json, JSON_PRETTY_PRINT);
        file_put_contents(base_path('package.json'), $encoded_json);

        $this->info('package.json updated');
    }

    protected function publishBadasoProvider()
    {
        Artisan::call('vendor:publish', ['--tag' => 'BadasoCommerceTheme']);

        $this->info('Badaso commerce provider published');
    }

    protected function linkStorage()
    {
        Artisan::call('storage:link');
    }

    protected function addingBadasoEnv()
    {
        try {
            $env_path = base_path('.env');

            $env_file = file_get_contents($env_path);
            $arr_env_file = explode("\n", $env_file);

            $env_will_adding = $this->envListUpload();

            $new_env_adding = [];
            foreach ($env_will_adding as $key_add_env => $val_add_env) {
                $status_adding = true;
                foreach ($arr_env_file as $key_env_file => $val_env_file) {
                    $val_env_file = trim($val_env_file);
                    if (substr($val_env_file, 0, 1) != '#' && $val_env_file != '' && strstr($val_env_file, $key_add_env)) {
                        $status_adding = false;
                        break;
                    }
                }
                if ($status_adding) {
                    $new_env_adding[] = "{$key_add_env}={$val_add_env}";
                }
            }

            foreach ($new_env_adding as $index_env_add => $val_env_add) {
                $arr_env_file[] = $val_env_add;
            }

            $env_file = join("\n", $arr_env_file);
            file_put_contents($env_path, $env_file);

            $this->info('Adding badaso env');
        } catch (\Exception $e) {
            $this->error('Failed adding badaso env '.$e->getMessage());
        }
    }
    
    protected function envListUpload()
    {
        return [
            'MIX_COMMERCE_WEB_ROUTE_PREFIX' => '',
            'NOTIFICATION_EMAIL' => '',
            'CRON_EXPIRED_ORDER' => '"*/5 * * * *"',
        ];
    }

    protected function updateWebpackMix()
    {
        $mix_file = base_path('webpack.mix.js');
        $search = 'BadasoCommerce';

        if ($this->checkExist($mix_file, $search)) {
            $data =
                <<<'EOT'

        // BadasoCommerce
        const path = require('path');
        mix.js("vendor/badaso/commerce-theme/src/resources/app/app.js", "public/js/commerce-theme.js")
            .sass('vendor/badaso/commerce-theme/src/resources/app/assets/scss/index.scss', 'public/css/commerce-theme.css')    
            .alias({
                '@': path.join(__dirname, 'vendor/badaso')
            })
            .vue()
        EOT;

            $this->file->append($mix_file, $data);
        }

        $this->info('webpack.mix.js updated');
    }

    protected function checkExist($file, $search)
    {
        return $this->file->exists($file) && ! Str::contains($this->file->get($file), $search);
    }
}
