<?php

namespace BenSampo\CountTotals\Queries;

use Illuminate\Support\Str;
use Illuminate\Database\Query\Builder;

class CountTotals
{
    protected $builder;
    protected $columns;

    public function __construct(Builder $builder, array $columns)
    {
        $this->builder = $builder;
        $this->columns = $columns;
    }

    public function __invoke(): object
    {
        $this->builder->selectRaw("count(*) as total");

        collect($this->columns)->each(function($column) {
            $columnName = key($column);
            $columnValue = $column[$columnName];
            $alias = Str::camel($columnValue);

            $this->builder->selectRaw("count(case when $columnName = '$columnValue' then 1 end) as $alias");
        });

        return $this->builder->first();
    }
}
