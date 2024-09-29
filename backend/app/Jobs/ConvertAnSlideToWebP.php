<?php

namespace App\Jobs;

use App\Models\Slide;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Middleware\Skip;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ConvertAnSlideToWebP implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Slide $slide) {}

    public function middleware(): array
    {
        return [
            Skip::when($this->slide->isPhotoInWedpFormat())
        ];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(public_path($this->slide->photo));
        $encoded = $image->toWebp();
        $newPath = mb_strstr(public_path($this->slide->photo), ".", true) . '111.webp';
        $encoded->save($newPath);
        $this->slide->photo = mb_strstr($this->slide->photo, ".", true) . '111.webp';
        $this->slide->save();
    }
}
