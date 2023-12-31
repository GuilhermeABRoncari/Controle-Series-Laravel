<?php

namespace App\Events;

use App\Models\Series;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SeriesDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Series $series;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Series $series)
    {
        $this->series = $series;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getSeries()
    {
        return $this->series;
    }
}
