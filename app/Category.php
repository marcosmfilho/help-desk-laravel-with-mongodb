<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const NEW_FUNCTIONALITY = 1;
    const UPDATE_FUNCTIONALITY = 2;
    const BUG = 3;
}
