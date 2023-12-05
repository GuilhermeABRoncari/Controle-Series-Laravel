<?php

namespace App\Listeners;

use App\Events\SeriesDeletedEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteSeriesCover
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SeriesDeletedEvent  $event
     * @return void
     */
    public function handle(SeriesDeletedEvent $event)
    {
        if ($event->getSeries()->cover_path && $event->getSeries()->cover_path !== 'series_cover/base.jpg') {
            $coverPath = $event->getSeries()->cover_path;
    
            if (Storage::disk('public')->exists($coverPath)) {
                Storage::disk('public')->delete($coverPath);
            }
        }
    }
}
