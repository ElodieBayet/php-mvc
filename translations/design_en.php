<?php
return [
    'oop' => [
        'h2' => "Object-oriented Programming",
        'p' => "<span class=\"light\">En bref :</span> (en cours de rédaction)",
        'blocks' => [
            0 => [
                'h3' => "Principle",
                'p' => [
                    "(en cours de rédaction)",
                ],
            ],
            1 => [
                'h3' => "SOLID properties",
                'p' => [
                    "<strong class=\"lighten\">S :</strong> Single Responsibility.<br><em>Une classe n'a qu'une seule responsabilité.</em><br><em>Éviter impérativement les “God Objects.”</em>",
                    "<strong class=\"lighten\">O :</strong> Open/Closed<br><em>Une classe doit pouvoir être étendue.</em><br><em>Eviter de modifier le code source préexistant.</em>",
                    "<strong class=\"lighten\">L :</strong> Liskov Substitution<br><em>Une instance d'un type de base doit pouvoir être substitué par un sous-type de celui-ci sans altérer le comportement du programme.</em><br><em>Eviter aux méthodes de devoir déterminer si un de ses paramètres est d'un sous-type précis et de changer le comportement du programme en fonction du sous-type.</em>",
                    "<strong class=\"lighten\">I :</strong> Interface segregation<br><em>Définir plusieurs interfaces précises pour faciliter leur implémentation par les classes.</em><br><em>Eviter les interfaces généralisées.</em>",
                    "<strong class=\"lighten\">D :</strong> Dependency inversion<br><em>Une classe doit toujours dépendre des abstractions en cassant les références entres différentes classes (découplage).</em><br><em>Eviter auc classes de dépendre des implémentations.</em>",
                ],
            ],
        ],
    ],
    'mvc' => [
        'h2' => "Model View Controller",
        'p' => "<span class=\"light\">En bref :</span> Selon les principes de l'architecture MVC, un contrôleur capte une “demande” utilisateur, opère un traitement sur le modèle – si lieu – puis notifie la vue qui est alors “mise à jour”",
        'blocks' => [
            0 => [
                'h3' => "Architecture",
                'p' => [
                    "Un motif d'architecture logicielle destiné aux interfaces graphiques lancé en 1978 et très populaire pour les applications web. Le motif est composé de trois types de modules ayant trois responsabilités différentes :",
                ],
                'li' => [
                    "<strong>The models</strong>",
                    "<strong>The view</strong>",
                    "<strong>The contrôllers</strong>",
                ]
            ],
            1 => [
                'h3' => "Combinaison",
                'p' => [
                    "Ce <strong>patron d'architecture</strong> est une combinaison des patrons que l'on retrouve dans les Design Patterns. À savoir :",
                ],
                'li' => [
                    "observateur <span class=\"light\">– catégorie <em>Patrons de comportement</em></span>",
                    "stratégie <span class=\"light\">– catégorie <em>Patrons de comportement</em></span>",
                    "composite <span class=\"light\">– catégorie <em>Patrons de structure</em></span>",
                ],
            ],
            2 => [
                'h3' => "Description",
                'li' => [
                    "<strong>Modèle :</strong> Élément qui contient les données ainsi que de la logique en rapport avec les données <span class=\"light\">– validation, lecture et enregistrement</span>. Il peut, dans sa forme la plus simple, contenir uniquement une simple valeur, ou une structure de données plus complexe.",
                    "<strong>Vue :</strong> Partie visible d'une interface graphique et qui se sert du modèle. Une vue contient des éléments visuels ainsi que la logique nécessaire pour afficher les données provenant du modèle",
                    "<strong>Contrôlleur :</strong> Module qui traite les actions effectuées par l'utilisateur, détient un rôle logique pure et modifie les données du modèle et de la vue.",
                ],
            ],
        ],
    ],
];