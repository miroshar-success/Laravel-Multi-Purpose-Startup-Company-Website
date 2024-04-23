<?php

namespace Botble\BusinessService\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCategory extends BaseModel
{
    protected $table = 'bs_service_categories';

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'image',
        'order',
        'status',
    ];

    protected $casts = [
        'order' => 'integer',
        'status' => BaseStatusEnum::class,
    ];

    protected static function booted(): void
    {
        static::deleting(function (ServiceCategory $category) {
            $category->children()->delete();
            $category->services()->update(['category_id' => 0]);
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
