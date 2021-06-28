<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Jobs\TaskCheck\Youtube;

use App\Jobs\TaskCheck\TaskCheckTrait;
use App\Modules\SocialNetworks\YoutubeModule;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class YoutubeChannelSubscriptionJob
 * @package App\Jobs\TaskCheck\Youtube
 */
class YoutubeChannelSubscriptionJob implements ShouldQueue
{
    use TaskCheckTrait;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $this->prepare();

        try {
            $result = YoutubeModule::checkChannelSubscription($this->user, $this->taskAction->source_address);
        } catch (\Exception $e) {
            $this->fail((new \Exception($e->getMessage())));
            return;
        }

        $this->checkResult($result);
    }
}