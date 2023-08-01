<?php

declare(strict_types=1);





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
