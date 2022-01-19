<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Categories extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'slug',
        'desc',
    ];





    /**
     * @return BelongsTo
     */
    public function posts()
    {
        return $this->belongsTo(Post::class,'id','categories_id')->withDefault();
    }

}
