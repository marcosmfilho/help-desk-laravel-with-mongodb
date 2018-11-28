<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceStatus extends Model
{
    const RESOLVED = 1;
    const UNRESOLVED = 2;
}
