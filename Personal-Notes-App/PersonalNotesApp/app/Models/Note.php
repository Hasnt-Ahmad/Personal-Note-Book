<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{
    use HasFactory;

    public function tags() :HasMany {
        return $this->hasMany(Tags::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
