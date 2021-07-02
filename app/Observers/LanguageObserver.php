<?php
/**
 * Copyright. "NewGen" investment engine. All rights reserved.
 * Any questions? Please, visit https://newgen.company
 */

namespace App\Observers;

use App\Models\Language;

/**
 * Class LanguageObserver
 * @package App\Observers
 */
class LanguageObserver
{
    /**
     * @param Language $language
     */
    public function deleting(Language $language)
    {
        foreach ($language->tplDefault()->get() as $tpl) {
            $tpl->delete();
        }

        foreach ($language->tplTranslate()->get() as $translate) {
            $translate->delete();
        }

        foreach ($language->news()->get() as $news) {
            $news->delete();
        }

        foreach ($language->reviews()->get() as $review) {
            $review->delete();
        }
    }

    /**
     * Listen to the Language created event.
     *
     * @param Language $language
     * @return void
     * @throws
     */
    public function created(Language $language)
    {
        clearCacheByArray($this->getCacheKeys($language));
        clearCacheByTags($this->getCacheTags($language));
    }

    /**
     * @param Language $language
     * @return array
     */
    private function getCacheKeys(Language $language): array
    {
        return [
            'i.languagesArray'
        ];
    }

    /**
     * @param Language $language
     * @return array
     */
    private function getCacheTags(Language $language): array
    {
        return [
            'languages'
        ];
    }

    /**
     * Listen to the Language deleting event.
     *
     * @param Language $language
     * @return void
     * @throws
     */
    public function deleted(Language $language)
    {
        clearCacheByArray($this->getCacheKeys($language));
        clearCacheByTags($this->getCacheTags($language));
    }

    /**
     * Listen to the Language updating event.
     *
     * @param Language $language
     * @return void
     * @throws
     */
    public function updated(Language $language)
    {
        clearCacheByArray($this->getCacheKeys($language));
        clearCacheByTags($this->getCacheTags($language));
    }
}