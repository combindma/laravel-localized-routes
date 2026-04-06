<?php

namespace CodeZero\LocalizedRoutes\Tests\Unit\BrowserLocale\Filters;

use CodeZero\LocalizedRoutes\BrowserLocale\Filters\CombinedFilter;
use CodeZero\LocalizedRoutes\BrowserLocale\Locale;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CombinedFilterTest extends TestCase
{
    #[Test]
    public function it_returns_a_combined_array_of_locales_and_languages(): void
    {
        $locales = (new CombinedFilter)->filter([
            new Locale('en-US', 'en', 'US', 1.0),
            new Locale('nl', 'nl', '', 0.8),
        ]);

        $this->assertEquals(['en-US', 'en', 'nl'], $locales);
    }

    #[Test]
    public function it_returns_an_empty_array_if_no_locales_exist(): void
    {
        $locales = (new CombinedFilter)->filter([]);

        $this->assertEquals([], $locales);
    }
}
