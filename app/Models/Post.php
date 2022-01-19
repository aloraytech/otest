<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Filterable;


    protected $fillable = [
        'title',
        'desc',
    ];


    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'title',
        'created_at',
        'updated_at'
    ];

    protected $allowedFilters = [
        'title',
        'created_at',
        'updated_at'
    ];


    public function categories()
    {
        return $this->hasOne(Categories::class,'id','categories_id')->withDefault();
    }

}
