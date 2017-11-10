<?php

return [
    'mod_blog_category' => [
        'name' => 'Blog Category',
        'type' => 'module',
        'providers' => [
            Mods\Blog\Category\CategoryServiceProvider::class
        ],
        'aliases' => [
        ],
        'depends' => [
        ],
        'autoload' => [
            'psr-4' => [
                'Mods\\Blog\\Category\\' => realpath(__DIR__.'/src/')
            ]
        ]
    ]
];
