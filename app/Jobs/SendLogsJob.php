<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class SendLogsJob
 * @package App\Jobs
 */
class SendLogsJob implements ShouldQueue
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string $e */
    protected $e;

    /**
     * SendLogsJob constructor.
     * @param string $e
     */
    public function __construct(string $e)
    {
        $this->e = $e;
    }

    /**
     * @throws \Throwable
     */
    public function handle()
    {
        User::notifyAdminsViaNotificationBot('notification_bot.error_log', [
            'errorMessage' => $this->e,
        ]);
    }
}
