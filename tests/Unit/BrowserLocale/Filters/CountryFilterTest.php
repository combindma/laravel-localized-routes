<?php

namespace CodeZero\LocalizedRoutes\Tests\Unit\BrowserLocale\Filters;

use CodeZero\LocalizedRoutes\BrowserLocale\Filters\CountryFilter;
use CodeZero\LocalizedRoutes\BrowserLocale\Locale;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CountryFilterTest extends TestCase
{
    #[Test]
    public function it_returns_a_simple_array_of_country_codes(): void
    {
        $locales = (new CountryFilter)->filter([
            new Locale('en-US', 'en', 'US', 1.0),
            new Locale('en', 'en', '', 0.8),
            new Locale('nl-NL', 'nl', 'NL', 0.6),
            new Locale('nl', 'nl', '', 0.4),
        ]);

        $this->assertEquals(['US', 'NL'], $locales);
    }

    #[Test]
    public function it_returns_an_empty_array_if_no_locales_exist(): void
    {
        $locales = (new CountryFilter)->filter([]);

        $this->assertEquals([], $locales);
    }
}
