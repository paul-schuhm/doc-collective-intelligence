<?php

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
    ),
    'Gene Seymour' => array(
        'Lady in the Water' => 3.,
        'Snakes on a Plane' => 3.5,
        'Just My Luck' => 1.5,
        'Superman Returns' => 5,
        'You, Me and Dupree' => 3,
        'The Night Listener' => 3.5,
    ),
    'Michael Phillips' => array(
        'Lady in the Water' => 2.5,
        'Superman Returns' => 3.5,
        'The Night Listener' => 4.0,
    ),
    'Mick LaSalle' => array(
        'Lady in the Water' => 3.,
        'Just My Luck' => 2.0,
        'Snakes on a Plane' => 4.0,
        'Superman Returns' => 3.,
        'You, Me and Dupree' => 3,
        'The Night Listener' => 2.0,
    ),
    'Claudia Puig' => array(
        'Lady in the Water' => 3.,
        'Just My Luck' => 3.0,
        'Snakes on a Plane' => 3.5,
        'Superman Returns' => 4.,
        'You, Me and Dupree' => 2.5,
        'The Night Listener' => 4.5,
    ),
    'Jack Matthews' => array(
        'Lady in the Water' => 3.,
        'Snakes on a Plane' => 4.0,
        'Superman Returns' => 5.,
        'You, Me and Dupree' => 2.,
        'The Night Listener' => 3.,
    ),
    'Toby' => array(
        'Snakes on a Plane' => 4.5,
        'Superman Returns' => 4.,
        'You, Me and Dupree' => 1.,
    ),

);


/**
 * Retourne le score de similarité entre deux personnes, calculé à partir de leur distance (euclidienne) dans l'espace des préférences
 * @param array $data Les données sur les préférences (notes de films)
 * @param string $person1 La personne 1
 * @param string $person2 La personne 2
 * @return float Le score de similarité compris entre 0 et 1
 */
function similarityDistance(array $data, string $person1, string $person2): ?float
{

    if (empty($data) || !isset($data[$person1]) || !isset($data[$person2]))
        return NULL;

    //Retrouver les items communs aux deux personnes
    $shared = array();

    foreach ($data[$person1] as $key => $item) {
        if (isset($key, $data[$person2]))
            $shared[] = $key;
    }

    var_dump($shared);
    return 0;
}

similarityDistance($critics, 'Lisa Rose', 'Toby');

/**
 * Retourne la valeur moyenne d'une série de données numériques. Si la série est vide, retourne NULL
 */
function mean(array $values): ?float
{
    if (empty($values))
        return NULL;
    return array_sum($values) / count($values);
}


/**
 * Retourne la variance d'une série de données numériques. Si la série est vide, retourne NULL
 */
function variance($values): float
{
    if (empty($values))
        return NULL;

    $sumOfSquares = array_map(fn ($x) => $x * $x, $values);
    $mean = mean($values);

    return mean($sumOfSquares) - $mean * $mean;
}

/**
 * Retourne la covariance de deux séries de données numériques. Retourne faux si les deux séries ne contiennent pas le même nombre d'éléments
 */
function covariance($seriesX, $seriesY): float
{

    //Les deux séries doivent être comparables
    if (count($seriesX) !== count($seriesY))
        return false;

    $product = array_map(fn ($x, $y) => $x * $y, $seriesX, $seriesY);

    return mean($product) - mean($seriesX) * mean($seriesY);
}
