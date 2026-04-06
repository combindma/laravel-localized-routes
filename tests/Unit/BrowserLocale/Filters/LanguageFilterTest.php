<?php

namespace CodeZero\LocalizedRoutes\Tests\Unit\BrowserLocale\Filters;

use CodeZero\LocalizedRoutes\BrowserLocale\Filters\LanguageFilter;
use CodeZero\LocalizedRoutes\BrowserLocale\Locale;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class LanguageFilterTest extends TestCase
{
    #[Test]
    public function it_returns_a_simple_array_of_language_codes(): void
    {
        $locales = (new LanguageFilter)->filter([
            new Locale('en-US', 'en', 'US', 1.0),
            new Locale('en', 'en', '', 0.8),
            new Locale('nl-NL', 'nl', 'NL', 0.6),
        ]);

        $this->assertEquals(['en', 'nl'], $locales);
    }

    #[Test]
    public function it_returns_an_empty_array_if_no_locales_exist(): void
    {
        $locales = (new LanguageFilter)->filter([]);

        $this->assertEquals([], $locales);
    }
}
