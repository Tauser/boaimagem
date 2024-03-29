<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'thumbnail',
        'images',
        'customer_id',
        'project_category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'project_category_id' => 'integer',
        'images' => 'array',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function project_category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }
        return '/storage/' . $this->thumbnail;
    }

    public function getCover()
    {
        if (str_starts_with($this->cover, 'http')) {
            return $this->cover;
        }
        return '/storage/' . $this->cover;
    }
}
