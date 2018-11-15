<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MediaLibrary;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Exception;
use Illuminate\Support\Facades\Log;

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

    protected $mediaItems;
    protected $optimizerChain;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mediaItems = MediaLibrary::first()->getMedia();
        $this->optimizerChain = OptimizerChainFactory::create();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try
        {
            foreach ($this->mediaItems as $item) {
                $path = $item->getPath();

                $this->optimizerChain->optimize($path);

                $this->info('optimizing ' . $path);
            }
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            Log::debug($e->getTraceAsString());
            $this->error($e->getMessage());
        }
    }
}
