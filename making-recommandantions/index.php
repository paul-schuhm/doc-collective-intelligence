<?php

declare(strict_types=1);
require './data.php';
require './helpers.php';
/**
 * Contenu et objectifs: 
 * Un script contenant des fonctions permettant de fabriquer un système de recommandations pour des utilisateur·ices. L'idée générale est que l'on cherche à consulter/consommer les mêmes choses que des personnes ayant les mêmes préférences ou gôuts que nous.
 * 
 * Description du système : 
 * Chaque personne interagit avec des items (films, produits, posts, etc.) en leur attribuant une note ou simplement en les consultant, en les achetant, etc. On transforme chaque interaction en valeur numérique. Chaque personne est ainsi modélisée par une série de valeurs que l'on peut comparer avec celle d'une autre personne pour calculer un score de proximité. Enfin, on propose à la personne des items consultées par les personnes les plus "proches" en les pondérant par le score de proximité. On parvient à faire une liste de recommandations intéressantes.
 */

/**
 * Un premier example avec une liste de recommandations de films basé sur des critiques (notes allant de 1 a 5) d'utilisateur·ices (cf le livre)
 */

echo "Demo : Making Recommandations" . PHP_EOL;
