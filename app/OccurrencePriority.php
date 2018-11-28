<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrencePriority extends Model
{
    const NORMAL = 1;
    const MEDIUM = 2;
    const URGENT = 3;
}
