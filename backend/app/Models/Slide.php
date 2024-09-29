<?php

namespace App\Models;

use App\Observers\SlideObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Platform\Concerns\Sortable;
use Orchid\Screen\AsSource;
use Illuminate\Support\Str;

#[ObservedBy([SlideObserver::class])]
class Slide extends Model
{
    use HasFactory, AsSource, Sortable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sub_title',
        'photo',
        'url'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
    ];


    protected function url(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => str_replace(env('APP_FRONT_URL'), "", $value),
        );
    }

    protected function fullUrl(): Attribute
    {
        return new Attribute(
            get: fn() => Str::isUrl($this->url) ? $this->url : env('APP_FRONT_URL') . $this->url
        );
    }

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'title',
        'order',
        'created_at',
        'updated_at'
    ];

    public function isPhotoInWedpFormat()
    {
        return str_ends_with($this->photo, '.webp');
    }
}
