<?php
return [
    // Define languages
    'languages' => [
        'fr' => ['label' => 'Français'],
        'en' => ['label' => 'English']
    ],
    // Define main routes and their properties
    'mains' => [
        'home' => [
            'fr' => [
                'route' => '/',
                'label' => 'Accueil',
                'description' => "Présente les principales périodes de la musique savante sous forme d'infographie interactive",
            ],
            'en' => [
                'route' => '/',
                'label' => 'Home',
                'description' => "Presents the main periods of classical music in the form of interactive infographics",
            ],
        ],
        'period' => [
            'fr' => [
                'route' => '/periodes',
                'label' => 'Périodes',
                'description' => "Explique brièvement les principales périodes de la musique savante",
            ],
            'en' => [
                'route' => '/periods',
                'label' => 'Periods',
                'description' => "Briefly explains the main periods of classical music",
            ],
        ],
        'compositor' => [
            'fr' => [
                'route' => '/compositeurs', 
                'label' => 'Compositeurs',
                'description' => "Répertorie les principaux compositeurs pour chaque période de la musique savante",
            ],
            'en' => [
                'route' => '/compositors',
                'label' => 'Compositors',
                'description' => "Lists the main composers for each period of classical music",
            ],
        ],
    ],
    // Define second routes and their properties
    'seconds' => [
        'about' => [
            'fr' => [
                'route' => '/a-propos', 
                'label' => 'À propos',
                'description' => "Présente le projet et ses objectifs",
            ],
            'en' => [
                'route' => '/about',
                'label' => 'About',
                'description' => "Presents the project and its objectives",
            ],
        ],
        'design' => [
            'fr' => [
                'route' => '/conception',
                'label' => 'Conception',
                'description' => "Présente le concept employé pour le développement du projet",
            ],
            'en' => [
                'route' => '/design',
                'label' => 'Design',
                'description' => "Presents the concept used for the development of the project",
            ],
        ],
    ],
];
