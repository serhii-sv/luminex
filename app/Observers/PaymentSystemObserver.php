<?php
/**
 * Copyright. "Hyipium" engine. All rights reserved.
 * Any questions? Please, visit https://hyipium.com
 */

namespace App\Observers;

use App\Models\PaymentSystem;

/**
 * Class PaymentSystemObserver
 * @package App\Observers
 */
class PaymentSystemObserver
{
    /**
     * @param PaymentSystem $paymentSystem
     */
    public function deleting(PaymentSystem $paymentSystem)
    {
        foreach ($paymentSystem->wallets()->get() as $wallet) {
            $wallet->delete();
        }

        foreach ($paymentSystem->transactions()->get() as $transaction) {
            $transaction->delete();
        }

        foreach ($paymentSystem->tasks()->get() as $task) {
            $task->delete();
        }
    }

    /**
     * @param PaymentSystem $paymentSystem
     * @return array
     */
    private function getCacheKeys(PaymentSystem $paymentSystem): array
    {
        return [
            'i.paymentSystems'
        ];
    }

    /**
     * @param PaymentSystem $paymentSystem
     * @return array
     */
    private function getCacheTags(PaymentSystem $paymentSystem): array
    {
        return [];
    }

    /**
     * Listen to the PaymentSystem created event.
     *
     * @param PaymentSystem $paymentSystem
     * @return void
     * @throws
     */
    public function created(PaymentSystem $paymentSystem)
    {
        clearCacheByArray($this->getCacheKeys($paymentSystem));
        clearCacheByTags($this->getCacheTags($paymentSystem));
    }

    /**
     * Listen to the PaymentSystem deleting event.
     *
     * @param PaymentSystem $paymentSystem
     * @return void
     * @throws
     */
    public function deleted(PaymentSystem $paymentSystem)
    {
        clearCacheByArray($this->getCacheKeys($paymentSystem));
        clearCacheByTags($this->getCacheTags($paymentSystem));
    }

    /**
     * Listen to the PaymentSystem updating event.
     *
     * @param PaymentSystem $paymentSystem
     * @return void
     * @throws
     */
    public function updated(PaymentSystem $paymentSystem)
    {
        clearCacheByArray($this->getCacheKeys($paymentSystem));
        clearCacheByTags($this->getCacheTags($paymentSystem));
    }
}