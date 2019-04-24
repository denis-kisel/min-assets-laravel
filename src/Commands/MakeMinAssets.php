<?php


namespace DenisKisel\MinAssets\Commands;


use Illuminate\Console\Command;
use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;

class MakeMinAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'min';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make min assets';

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
        $cssMinify = new CSS();
        foreach (config('min_assets.css') as $css) {
            $cssMinify->add(public_path($css));
        }
        $cssMinify->minify(public_path(config('min_assets.min_css')));

        $jsMinify = new JS();
        foreach (config('min_assets.js') as $js) {
            $jsMinify->add(public_path($js));
        }
        $jsMinify->minify(public_path(config('min_assets.min_js')));
    }
}
