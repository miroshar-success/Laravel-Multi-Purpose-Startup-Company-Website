<?php

namespace ArchiElite\Career\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Career extends BaseModel
{
    protected $table = 'careers';

    protected $fillable = [
        'name',
        'location',
        'salary',
        'description',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
