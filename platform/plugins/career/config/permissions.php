<?php

return [
    [
        'name' => 'Careers',
        'flag' => 'careers.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'careers.create',
        'parent_flag' => 'careers.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'careers.edit',
        'parent_flag' => 'careers.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'careers.destroy',
        'parent_flag' => 'careers.index',
    ],
];
