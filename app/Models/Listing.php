<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'website',
        'email',
        'description',
        'tags'
    ];

    // Using one of Laravel's Eloquent Functions
    public function scopeFilter($query, array $filter)
    {
        if ($filter['tag'] ?? false) {    //If this does not return false, then..
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filter['search'] ?? false) {    //If this does not return false, then..
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('company', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orwhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
