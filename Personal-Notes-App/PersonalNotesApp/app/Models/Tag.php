<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mockery\Matcher\Not;

class Tag extends Model
{
    use HasFactory;


    protected $primaryKey = 'tag_name';
    public $incrementing = false;
    protected $keyType = 'string';


    public function note() :BelongsTo {
        return $this->belongsTo(Note::class);
    }
}
