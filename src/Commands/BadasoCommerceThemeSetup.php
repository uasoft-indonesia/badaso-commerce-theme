<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\VarExporter\VarExporter;
use Uasoft\Badaso\Module\Commerce\Facades\BadasoCommerceModule;

class BadasoCommerceThemeSetup extends Command
{
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
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->updateWebpackMix();
        $this->publishBadasoProvider();
        $this->updatePackageJson();
        $this->linkStorage();
    }

    protected function updatePackageJson()
    {
        $package_json = file_get_contents(base_path('package.json'));
        $decoded_json = json_decode($package_json, true);

        $decoded_json['dependencies']['vue-resize'] = '^1.0.1';

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

    protected function updateWebpackMix()
    {
        $mix_file = base_path('webpack.mix.js');
        $search = 'BadasoCommerce';

        if ($this->checkExist($mix_file, $search)) {
            $data =
                <<<'EOT'

        // BadasoCommerce
        mix.js("vendor/badaso/commerce-theme/src/resources/js/app.js","public/js/commerce.js").vue()
        EOT;

            $this->file->append($mix_file, $data);
        }

        $this->info('webpack.mix.js updated');
    }
}
