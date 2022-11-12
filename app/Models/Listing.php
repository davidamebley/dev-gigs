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
        'logo',
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
            $query->where('title', 'ilike', '%' . request('search') . '%')
                ->orWhere('description', 'ilike', '%' . request('search') . '%')
                ->orWhere('company', 'ilike', '%' . request('search') . '%')
                ->orWhere('location', 'ilike', '%' . request('search') . '%')
                ->orWhere('tags', 'ilike', '%' . request('search') . '%');
        }
    }

    // Create an Eloquent Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
