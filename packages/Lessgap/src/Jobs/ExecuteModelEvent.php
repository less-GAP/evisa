<?php

namespace Lessgap\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Lessgap\Handlers\NotificationEventHandler;
use Lessgap\Plugins\Events\LessgapEventHandler;

class ExecuteModelEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $event, public $model)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            LessgapEventHandler::handle($this->event, $this->model);
        } catch (\Throwable $e) {
            \Log::error($e);
        }

    }
}
