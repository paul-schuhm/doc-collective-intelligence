<?php

/**
 * Contenu et objectifs: 
 * Un script contenant des fonctions permettant de fabriquer un système de recommandations pour des utilisateur·ices. L'idée générale est que l'on cherche à consulter/consommer les mêmes choses que des personnes ayant les mêmes préférences ou gôuts que nous.
 * 
 * Description du système : 
 * Chaque personne interragit avec des items (films, produits, posts, etc.) en leur attribuant une note ou simplement en les consultant, en les achetant, etc. On transforme chaque interaction en valeur numérique. Chaque personne est ainsi modélisée par une série de valeurs que l'on peut comparer avec celle d'une autre personne pour calculer un score de proximité. Enfin, on propose à la personne des items consultées par les personnes les plus "proches" en les pondérant par le score de proximité. On parvient à faire une liste de recommandations intéresante.
 */

/**
 * Un premier example avec une liste de recommandations de films basé sur des critiques (notes allant de 1 a 5) d'utilisateur·ices (cf le livre)
 */


/**
 * Jeu de données de notes de films laissées par des critiques
 */
$critics = array(
    'Lisa Rose' => array(
        'Lady in the Water' => 2.5,
        'Snakes on a Plane' => 3.5,
        'Just My Luck' => 3.,
        'Superman Returns' => 3.5,
        'You, Me and Dupree' => 2.5,
        'The Night Listener' => 2.5,
    )
);


function mean(array $values): float
{
    if (empty($values))
        return 0;
    return array_sum($values) / count($values);
}

function variance($values): float
{

    $sumOfSquares = array_map(fn ($x) => $x * $x, $values);
    $mean = mean($values);

    return mean($sumOfSquares) - $mean * $mean;
}

function covariance($seriesX, $seriesY): float
{

    if (count($seriesX) !== count($seriesY))
        return false;

    $product = array_map(fn ($x, $y) => $x * $y, $seriesX, $seriesY);

    return mean($product) - mean($seriesX) * mean($seriesY);
}
