# doc-collective-intelligence

- [doc-collective-intelligence](#doc-collective-intelligence)
  - [Définitions](#définitions)
  - [Lancer une démo](#lancer-une-démo)
  - [Liste des démos](#liste-des-démos)
  - [Tests](#tests)
  - [Ressources](#ressources)


Ensemble d'algorithmes d'intelligence collective et de machine learning. Basé sur le livre *Programming Collective Intelligence (Toby Segaran, O'Reilly, 2007)*

## Définitions

- *Intelligence collective* : capacité d'un groupe ou d'une organisation d'utiliser au mieux ses capacités et données pour parvenir à un but commun. En sciences de l'information, combiner des comportements, préférences, idées d'un groupe d'utilisateurs pour créer de nouvelles perspectives. Famille d'algorithmes pour extraire et produire de l'information à partir de l'analyse des actions des agents et de leurs interactions. A partir de l'analyse du *tout* (différent de la somme des parties pour des systèmes non linéaires ou dits "complexes") mieux comprendre les *parties* et améliorer/modifier leurs interactions (efficacité, but commercial, etc. )
- *Machine learning* : sous-champ de l'intelligence artificielle qui concerne des algorithmes permettant aux programmes d'"apprendre". L'algorithme reçoit en entrée des données et *infère* (du particulier vers le général) des propriétés sur des données qu'il n'a pas encore vues afin de faire des prédictions. Le but de ces algorithmes est donc de pouvoir généraliser en trouvant des motifs dans les données fournies. Pour "apprendre", l'algorithme raffine un *modèle*. Ce modèle est la *généralisation* sur les données reçues. Par exemple, un système de *spam filtering*. Le modèle peut être "tous les emails qui contiennent les mots code promo" sont des spams.

## Lancer une démo

Le projet est divisé en démos. Chaque script d'entrée contient des commentaires supplémentaires pour décrire l'algorithme utilisé. Pour chaque démo, exécuter le script d'entrée `index.php`

~~~
#Démo Système de recommandations
php making-recommandations/index.php
~~~

## Liste des démos

- [Système de recommandations](./making-recommandantions/index.php)

## Tests

Installer [phpunit](https://phpunit.de/getting-started/phpunit-10.html) à la racine du projet via composer, avec `composer init`. 

Lancer les tests pour chaque démo :

~~~
#Executer les tests de la démo "Système de recommandations"
php making-recommandantions/vendor/bin/phpunit making-recommandantions/tests --testdox
~~~

## Ressources

- [Programming Collective Intelligence (Toby Segaran, O'Reilly, 2007)](https://learning.oreilly.com/library/view/programming-collective-intelligence/9780596529321/)
- [ProgrammingCollectiveIntelligenceExercises](https://github.com/AndrewLaing/ProgrammingCollectiveIntelligenceExercises), un dépôt des sources pour les exercices (Pyhon)
- [PHPUnit](https://docs.phpunit.de/en/10.2/index.html), le manuel de PHPUnit utilisé pour tester la bonne implémentation des algorithmes
- [Euclidean distance (and Squared Euclidian Distance)](https://en.wikipedia.org/wiki/Euclidean_distance), Wikipédia
- [Pearson correlation coefficient](https://en.wikipedia.org/wiki/Pearson_correlation_coefficient), Wikipédia