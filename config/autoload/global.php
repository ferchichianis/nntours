<?php
return [
    'phpSettings' => [
        'display_startup_errors' => true,
        'display_errors' => true,
        'date.timezone' => 'Europe/Paris',
        'intl.default_locale' => 'fr_FR',
    ],

    'translator' => [
        'locale' => 'fr_FR',
        'translation_file_patterns' => [
            [
                'type' => 'phparray',
                'base_dir' => getcwd() . '/language',
                'pattern' => '%s.php',
            ],
        ],
    ],
];