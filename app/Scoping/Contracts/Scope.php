<?php

namespace App\Scoping\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Scope
{
    public function apply(Builder $builder, $value);
}