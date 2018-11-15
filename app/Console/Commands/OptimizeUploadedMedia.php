<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MediaLibrary;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class OptimizeUploadedMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize all uploaded media on default media collection';

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
        $mediaItems = MediaLibrary::first()->getMedia();
        $optimizerChain = OptimizerChainFactory::create();
        foreach ($mediaItems as $item) {
            $path = $item->getPath();

            $optimizerChain->optimize($path);
        }
    }
}
