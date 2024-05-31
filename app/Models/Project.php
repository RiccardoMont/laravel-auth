<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image', 'languages_and_frameworks', 'objectives', 'slug', 'type_id', 'user_id'];

    public function user() : BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function type() : BelongsTo {

        return $this->belongsTo(Type::class);

    }

    public function technologies() : BelongsToMany {

        return $this->belongsToMany(Technology::class);

    }
}
