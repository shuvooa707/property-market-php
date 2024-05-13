<?php

namespace App\Console\Commands;

use App\Events\PropertyPageOpenedEvent;
use App\Models\Property;
use Illuminate\Console\Command;

class TriggerPropertyPageOpenedEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trigger:ppo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $randomProperty = Property::find(1);
        event(new PropertyPageOpenedEvent($randomProperty));
    }
}
