<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Observers;

use App\Models\Wallet;

/**
 * Class WalletObserver
 * @package App\Observers
 */
class WalletObserver
{
    /**
     * @param Wallet $wallet
     */
    public function deleting(Wallet $wallet)
    {
        foreach ($wallet->transactions()->get() as $transaction) {
            $transaction->delete();
        }

        foreach ($wallet->deposits()->get() as $deposit) {
            $deposit->delete();
        }
    }

    /**
     * @param Wallet $wallet
     * @return array
     */
    private function getCacheKeys(Wallet $wallet): array
    {
        if (null == $wallet->user_id) {
            return [];
        }

        return [
            'i.' . $wallet->user_id . '.userWallets',
            'i.' . $wallet->user_id . '.userWallets.currency-'.$wallet->currency_id,
            'i.' . $wallet->user_id . '.userWallets.currency-'.null,
        ];
    }

    /**
     * @param Wallet $wallet
     * @return array
     */
    private function getCacheTags(Wallet $wallet): array
    {
        return [];
    }

    /**
     * Listen to the Wallet created event.
     *
     * @param Wallet $wallet
     * @return void
     * @throws
     */
    public function created(Wallet $wallet)
    {
        clearCacheByArray($this->getCacheKeys($wallet));
        clearCacheByTags($this->getCacheTags($wallet));
    }

    /**
     * Listen to the Wallet deleting event.
     *
     * @param Wallet $wallet
     * @return void
     * @throws
     */
    public function deleted(Wallet $wallet)
    {
        clearCacheByArray($this->getCacheKeys($wallet));
        clearCacheByTags($this->getCacheTags($wallet));
    }

    /**
     * Listen to the Wallet updating event.
     *
     * @param Wallet $wallet
     * @return void
     * @throws
     */
    public function updated(Wallet $wallet)
    {
        clearCacheByArray($this->getCacheKeys($wallet));
        clearCacheByTags($this->getCacheTags($wallet));
    }
}