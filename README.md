# Buandier

Et si au lieu de conserver nos étiquettes et que ça gratte ou au lieu de les couper et perdre des informations, on reportait les recommendations d'entretien dans une application ?

Buandier est un projet qui est né en live devant un petit public dans le cadre du premier épisode de l'émission [Sunday Morning](https://www.youtube.com/playlist?list=PLJi-xjg3DqYbyXWzJnzNOmpZpnPjNwjl3) sur la chaine YouTube [⌜.+⌟PointPlus](https://www.youtube.com/PointPlus).

Merci à tous les participants, merci pour les encouragements !

## MCD

```
IS PART OF, 1N USER, 1N GROUP
GROUP: id, name
VISIBLE TO GROUPS, 1N CLOTHE, 1N GROUP
RECOMMENDATION: id, icon, description

USER: id, email, roles, password
OWNS, 1N USER, 11 CLOTHE
CLOTHE: id, name, boughtAT, color, type
FOR, 1N RECOMMENDATION, 1N CLOTHE

:
PICTURE: id, image
VISIBLE IN, 11 PICTURE, 1N CLOTHE
```

## Stack
- Symfony 5.1.8
- Doctrine 2.7
- MySQL 5.7 (mais c'est Doctrine donc vous pouvez écraser les migrations et utiliser la BDD qui vous plait)
- EasyAdmin 3.1

## Installation

Après avoir cloné ce dépôt
- `composer install`
- Créer un fichier .env.local et configurer la base de données
- `bin/console d:m:m`
- `bin/console d:f:l`

Pour vous connecter, trouvez un nom d'utilisateur en BDD. Tous les mots de passe sont «buandier».

⚠️ Les fixtures sont incomplètes, pour une raison non trouvée dans le live, il est possible de relier les Group aux Cloth 🤷‍♂

## Résumé de l'épisode 1

🎬 https://youtu.be/h2QIono0Cm0

- Installation de Symfony 5.1
- Installation d'EasyAdmin
- Création des entités, des migrations puis des fixtures
- Configuration basique d'EasyAdmin
- Ajout de la connexion et sécurisation de l'admin

## Résumé de l'épisode 2

🎬 https://youtu.be/Qt4NvpWQgqk

- Création d'un field puis d'un type puis supression d'un CustomField pour EasyAdmin qui permette de relier les pictures dès la création d'un vêtement en BDD

## La suite !

À cette date (6 décembre 2020), rien n'est décidé sur la suite. Le sujet de l'émission suivante n'est pas déterminé, peut-être qu'on terminera ce projet… ou pas !

En attendant vous pouvez créer des issues et de pull requests pour intervenir sur le code.
