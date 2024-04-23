<?php

return [
    [
        'name' => 'Business Services',
        'flag' => 'plugins.business-services',
    ],
    [
        'name' => 'Service Categories',
        'flag' => 'business-services.service-categories.index',
        'parent_id' => 'plugins.business-services',
    ],
    [
        'name' => 'Create',
        'flag' => 'business-services.service-categories.create',
        'parent_flag' => 'business-services.service-categories.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'business-services.service-categories.edit',
        'parent_flag' => 'business-services.service-categories.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'business-services.service-categories.destroy',
        'parent_flag' => 'business-services.service-categories.index',
    ],

    [
        'name' => 'Services',
        'flag' => 'business-services.services.index',
        'parent_id' => 'plugins.business-services',
    ],
    [
        'name' => 'Create',
        'flag' => 'business-services.services.create',
        'parent_flag' => 'business-services.services.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'business-services.services.edit',
        'parent_flag' => 'business-services.services.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'business-services.services.destroy',
        'parent_flag' => 'business-services.services.index',
    ],

    [
        'name' => 'Packages',
        'flag' => 'business-services.packages.index',
        'parent_id' => 'plugins.business-services',
    ],
    [
        'name' => 'Create',
        'flag' => 'business-services.packages.create',
        'parent_flag' => 'business-services.packages.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'business-services.packages.edit',
        'parent_flag' => 'business-services.packages.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'business-services.packages.destroy',
        'parent_flag' => 'business-services.packages.index',
    ],
];
