<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Occurrence extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'ocurrence';
    
    protected $fillable = [
        'userID','title', 'description','status', 'priority', 'category', 'response'
    ];

    public static function getUnresolvedoOccurrences() 
    {
        $unresolvedOccurrences = Occurrence::where('status', 2)
                                ->orderBy('priority', 'desc')
                                ->orderBy('created_at', 'desc')
                                ->get();

        return $unresolvedOccurrences;
    }

    public static function getResolvedoOccurrences() 
    {
        $resolvedOccurrences = Occurrence::where('status', '<>', 2)
                                ->orderBy('created_at', 'desc')
                                ->get();

        return $resolvedOccurrences;
    }
}



