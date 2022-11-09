<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Using one of Laravel's Eloquent Functions
    public function scopeFilter($query, array $filter)
    {
        if ($filter['tag'] ?? false) {    //If this does not return false, then..
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
    }
}
