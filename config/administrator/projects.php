<?php

return [
    'title' => 'Projects',
    'single' => 'project',
    'model' => 'App\Project',
    'columns' =>[
        'id',
        'active',
        'title',
    ],
    'edit_fields' => [
        'active' => [
            'type' => 'bool',
        ],
        'title' => [
            'type' => 'text',
        ],
        'slug' => [
            'type' => 'text',
        ],
        'content' => [
            'type' => 'wysiwyg',
        ],
        "image" => [
            'type' => 'image',
            'location' => public_path() . '/uploads/project/original/',
            'sizes' => [
                [500, 500, 'auto', public_path()  . '/uploads/project/medium/', 100],
                [1000, 800, 'auto', public_path() . '/uploads/project/large/', 100],
            ],
        ],
    ],
    'form_width' => 800,
 ];