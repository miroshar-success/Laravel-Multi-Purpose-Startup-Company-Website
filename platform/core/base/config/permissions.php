<?php

return [
    [
        'name' => 'System',
        'flag' => 'core.system',
    ],
    [
        'name' => 'Manage license',
        'flag' => 'core.manage.license',
        'parent_flag' => 'core.system',
    ],
    [
        'name' => 'View extensions page',
        'flag' => 'extensions.index',
        'parent_flag' => 'core.system',
    ],
    [
        'name' => 'Cronjob',
        'flag' => 'systems.cronjob',
        'parent_flag' => 'core.system',
    ],
    [
        'name' => 'Tools',
        'flag' => 'core.tools',
    ],
];
