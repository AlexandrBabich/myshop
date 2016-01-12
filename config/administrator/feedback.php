<?php

return [
    'title' => 'Feedback',
    'single' => 'feedback',
    'model' => 'App\Feedback',
    'columns' =>[
        'id',
        'name',
        'email',
        'date',
    ],
    'edit_fields' => [
        'name' => [
            'type' => 'text',
        ],
        'email' => [
            'type' => 'text',
        ],
        'message' => [
            'type' => 'wysiwyg',
        ],
        'date' => array(
            'type' => 'datetime',
            'title' => 'date',
            'date_format' => 'yy-mm-dd', //optional, will default to this value
            'time_format' => 'HH:mm',    //optional, will default to this value
        )
    ],
    'form_width' => 500,
];