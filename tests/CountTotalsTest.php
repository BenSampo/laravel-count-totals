<?php

namespace BenSampo\CountTotals\Tests;

use Illuminate\Support\Facades\DB;
use BenSampo\CountTotals\Tests\Models\Subscriber;

class CountTotalsTest extends ApplicationTestCase
{
    private function seedSubscribers() {
        factory(Subscriber::class, 10)->create([
            'status' => 'confirmed',
            'name' => 'Ben Sampson',
        ]);

        factory(Subscriber::class, 5)->create([
            'status' => 'cancelled'
        ]);
    }

    public function test_can_get_totals_using_db_facade()
    {
        $this->seedSubscribers();

        $totals = DB::table('subscribers')->countTotals([
            ['status' => 'confirmed'],
            ['status' => 'cancelled'],
            ['name' => 'Ben Sampson'],
        ]);

        $this->assertEquals(15, $totals->total);
        $this->assertEquals(10, $totals->confirmed);
        $this->assertEquals(5, $totals->cancelled);
        $this->assertEquals(10, $totals->benSampson);
    }

    public function test_can_get_totals_using_eloquent()
    {
        $this->seedSubscribers();

        $totals = Subscriber::countTotals([
            ['status' => 'confirmed'],
            ['status' => 'cancelled'],
            ['name' => 'Ben Sampson'],
        ]);

        $this->assertEquals(15, $totals->total);
        $this->assertEquals(10, $totals->confirmed);
        $this->assertEquals(5, $totals->cancelled);
        $this->assertEquals(10, $totals->benSampson);
    }
}
