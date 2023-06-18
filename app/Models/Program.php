<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $guarded = ['id'];

    // json
    protected $casts = [
        'tags' => 'array'
    ];

    public function getContentAttribute($value)
    {
        return json_decode($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
