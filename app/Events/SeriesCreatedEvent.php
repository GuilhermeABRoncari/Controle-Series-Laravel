<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $seriesName; 
    private int $seriesId; 
    private int $seriesSeasonsQty; 
    private int $seriesEpisodesPerSeason;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $seriesName, int $seriesId, int $seriesSeasonsQty, int $seriesEpisodesPerSeason)
    {
        $this->seriesName = $seriesName;
        $this->seriesId = $seriesId;
        $this->seriesSeasonsQty = $seriesSeasonsQty;
        $this->seriesEpisodesPerSeason = $seriesEpisodesPerSeason;
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

    public function getSeriesName() {
        return $this->seriesName;
    }

    public function getSeriesId() {
        return $this->seriesId;
    }

    public function getSeriesSeasonsQty() {
        return $this->seriesSeasonsQty;
    }

    public function getSeriesEpisodesPerSeason() {
        return $this->seriesEpisodesPerSeason;
    }
}
