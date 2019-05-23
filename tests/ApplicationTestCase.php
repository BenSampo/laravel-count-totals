<?php

namespace BenSampo\CountTotals\Tests;

use Orchestra\Testbench\TestCase;
use BenSampo\CountTotals\CountTotalsServiceProvider;

class ApplicationTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CountTotalsServiceProvider::class,
        ];
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->withFactories(__DIR__.'/database/factories');
    }
}
