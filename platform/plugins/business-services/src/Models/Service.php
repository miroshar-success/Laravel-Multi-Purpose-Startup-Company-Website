<?php

namespace Botble\BusinessService\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends BaseModel
{
    protected $table = 'bs_services';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'content',
        'image',
        'images',
        'is_featured',
        'views',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'views' => 'integer',
        'images' => 'array',
        'status' => BaseStatusEnum::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
