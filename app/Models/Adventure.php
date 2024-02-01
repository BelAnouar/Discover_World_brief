<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adventure extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'consiel', 'user_id', 'destination_id'];

    public function scopeDestination(Builder $query, string $destination): Builder
    {
        return $query->where('continent', 'LIKE', '%' . $destination . '%');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
