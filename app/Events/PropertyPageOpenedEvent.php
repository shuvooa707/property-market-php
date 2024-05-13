<?php

namespace App\Events;

use App\Models\Property;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyPageOpenedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Property $property;

    /**
     * Create a new event instance.
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function broadcastWith(): array {
        $viewing_right_now = 2190;

        return [
            "viewing_right_now" => $viewing_right_now
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        $property = $this->property;

        return [
            new Channel( 'PROPERTY_PAGE_OPENED_CHANNEL_' . $property->id ),
        ];
    }
}
