--
-- MySQL
-- Data : `period, `fr_period` et `en_period`
-- Exécution : 2
--

USE php_mvc;

INSERT INTO `period` (`id`, `begin`, `end`) VALUES (1, 600, 1400);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (2, 1400, 1600);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (3, 1600, 1750);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (4, 1750, 1800);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (5, 1800, 1900);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (6, 1900, 1950);
INSERT INTO `period` (`id`, `begin`, `end`) VALUES (7, 1950, NULL);

-- Français

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "moyen-age",
    "Moyen-Âge",
    "La musique du Moyen Âge est représentée principalement par des compositions vocales, religieuses ou profanes, marquées dans les premiers siècles par la monodie, notamment représentée par le plain-chant religieux et dans le domaine profane par la lyrique courtoise des troubadours et les trouvères.",
    1
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "renaissance",
    "Renaissance",
    "Par rapport au Moyen Âge, les compositeurs passent du tempérament pythagoricien au tempérament mésotonique dans l'accord des instruments à sons fixes. L'usage des tierces et des sixtes se généralise. Le modèle esthétique vocal persiste, malgré la naissance d'une musique spécifiquement instrumentale. Les genres de la musique de la Renaissance sont essentiellement vocaux : la chanson polyphonique, la chanson pour luth, le motet, la messe, le madrigal ou la canzone instrumentale." ,
    2
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "baroque",
    "Baroque",
    "Le style baroque se caractérise notamment par l’importance du contrepoint puis par une harmonie qui s’enrichit progressivement, par une expressivité accrue, par l’importance donnée aux ornements, par la division fréquente de l’orchestre avec basse continue, qui est nommé ripieno, par un groupe de solistes qui est le concertino et par la technique de la basse continue chiffrée comme accompagnement de sonates. C’est un style savant et sophistiqué." ,
    3
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "classique",
    "Classique",
    "Le langage classique se définit par des règles très strictes, une grande rigueur formelle, une grande simplicité harmonique, et un sens développé de la mélodie. Le principe de contraste, très dramatique, au sein d'une même pièce est l'élément moteur. En outre, disparition de la basse continue. On passe de l'utilisation de “figures” (prédominantes en Baroque) à la structuration à partir de “phrases musicales ponctuées”, et des procédés “analogiques” vers des ceux de “logique discursive”.",
    4
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "romantique",
    "Romantique",
    "L'expression musique romantique désigne un type de musique qui domine en Europe tout au long du xixe siècle. Ce courant musical aux formes variées qui met au premier plan l'expression de l'émotion1 s'inscrit dans le mouvement esthétique européen du romantisme qui touche les arts et la littérature sous l'influence de l'Angleterre et de l'Allemagne où s'approfondit une nouvelle sensibilité à partir de la fin du xviiie siècle.",
    5
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "moderne",
    "Moderne",
    "Seule la chronologie est significative, cette période n'a pas d'unité de style : c'est la floraison d'expériences et d'esthétiques diverses, souvent opposées à ce qui se développe à cette époque comme la trialité “musique tonale / musique modale / musique atonale”. Avec Debussy, il y a une rupture dans l'écriture du discours musical, qui non seulement s'affranchit des contraintes tonales, mais pose aussi les premières pierres de la musique séquentielle.",
    6
);

INSERT INTO `fr_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "contemporaine",
    "Contemporaine",
    "La musique contemporaine représente les différents courants de musique savante apparus après la Seconde Guerre mondiale, dont certains ont emprunté des voies nouvelles en dehors du système tonal. L’émergence de mutations dans les formes d'écriture laisse entrevoir une nouvelle tendance de la composition. Surtout : recherches de nouvelles formes d’expression pour aboutir à de nouveaux concepts (notions fondamentales d’acoustique, et d’objets sonores et musicaux).",
    7
);

-- English

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "medieval",
    "Medieval",
    "The Medieval Music is represented mainly by vocal compositions, religious or secular, marked in the first centuries by monody, notably represented by religious plainsong and in the secular domain by the courtly lyric of the troubadours and the trouvères.",
    1
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "renaissance",
    "Renaissance",
    "Compared to Medieval, composers moved from Pythagorean temperament to meantone temperament in the tuning of fixed-tone instruments. The use of thirds and sixths became widespread. The vocal aesthetic model persisted, despite the emergence of specifically instrumental music. The genres of Renaissance music were essentially vocal: polyphonic song, lute song, motet, mass, madrigal, and instrumental canzone.",
    2
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`)
VALUES (
    NULL,
    "baroque",
    "Baroque",
    "The Baroque style is characterized in particular by the importance of counterpoint and then by a harmony that gradually becomes richer, by increased expressiveness, by the importance given to ornaments, by the frequent division of the orchestra with basso continuo, which is called ripieno, by a group of soloists which is the concertino and by the technique of the figured basso continuo as accompaniment of sonatas. It is a learned and sophisticated style.",
    3
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "classical",
    "Classical",
    "Classical language is defined by very strict rules, great formal rigor, great harmonic simplicity, and a developed sense of melody. The principle of contrast, very dramatic, within the same piece is the driving element. In addition, the continuo bass disappears. We move from the use of “figures” (predominant in Baroque) to structuring based on “punctuated musical phrases”, and from “analogical” processes to those of “discursive logic.”",
    4
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "romantic",
    "Romantic",
    "The term Romantic music refers to a type of music that dominated Europe throughout the 19th century. This musical movement, with its varied forms and its emphasis on the expression of emotion, is part of the European aesthetic movement of Romanticism, which affected the arts and literature under the influence of England and Germany, where a new sensibility developed from the end of the 18th century.",
    5
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "modernism",
    "Modernism",
    "Only the chronology is significant, this period has no unity of style: it is the flowering of diverse experiences and aesthetics, often opposed to what was developing at that time as the triality “tonal music / modal music / atonal music”. With Debussy, there is a break in the writing of musical discourse, which not only frees itself from tonal constraints, but also lays the first stones of sequential music.",
    6
);

INSERT INTO `en_period` (`id`, `tag`, `name`, `description`, `period_id`) 
VALUES (
    NULL,
    "contemporary",
    "Contemporary",
    "Contemporary music represents the various currents of classical music that emerged after the Second World War, some of which took new paths outside the tonal system. The emergence of mutations in the forms of writing suggests a new trend in composition. Above all: research into new forms of expression to arrive at new concepts (fundamental notions of acoustics, and sound and musical objects).",
    7
);