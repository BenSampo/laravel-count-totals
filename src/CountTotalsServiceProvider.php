<?php

namespace BenSampo\CountTotals;

use Illuminate\Support\ServiceProvider;
use BenSampo\CountTotals\Queries\CountTotals;
use Illuminate\Database\Query\Builder as DatabaseBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class CountTotalsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        DatabaseBuilder::macro('countTotals', function(array $columns) {
            return (new CountTotals($this, $columns))();
        });

        EloquentBuilder::macro('countTotals', function(array $columns) {
            return (new CountTotals($this->query, $columns))();
        });
    }
}
