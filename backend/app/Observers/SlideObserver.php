<?php

namespace App\Observers;

use App\Jobs\ConvertAnSlideToWebP;
use App\Models\Slide;
use Illuminate\Support\Facades\Cache;

class SlideObserver
{
    /**
     * Handle the Slide "created" event.
     */
    public function created(Slide $slide): void
    {
        ConvertAnSlideToWebP::dispatchIf(!$slide->isPhotoInWedpFormat(), $slide);
        Cache::forget('slide');
    }

    /**
     * Handle the Slide "updated" event.
     */
    public function updated(Slide $slide): void
    {
        ConvertAnSlideToWebP::dispatchIf(!$slide->isPhotoInWedpFormat(), $slide);
        Cache::forget('slide');
    }

    /**
     * Handle the Slide "deleted" event.
     */
    public function deleted(Slide $slide): void
    {
        Cache::forget('slide');
    }

    /**
     * Handle the Slide "restored" event.
     */
    public function restored(Slide $slide): void
    {
        Cache::forget('slide');
    }

    /**
     * Handle the Slide "force deleted" event.
     */
    public function forceDeleted(Slide $slide): void
    {
        Cache::forget('slide');
    }
}
