<?php

namespace CodeZero\LocalizedRoutes\Middleware\Detectors;

use CodeZero\LocalizedRoutes\BrowserLocale\BrowserLocale;
use CodeZero\LocalizedRoutes\BrowserLocale\Filters\CombinedFilter;
use Illuminate\Support\Facades\App;

class BrowserDetector implements Detector
{
    /**
     * Detect the locale.
     *
     * @return string|array|null
     */
    public function detect()
    {
        return App::make(BrowserLocale::class)->filter(new CombinedFilter);
    }
}
