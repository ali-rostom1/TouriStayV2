# TouriStay 2030

## Contexte du Projet

TouriStay 2030 est une plateforme qui facilite la location de maisons et d’appartements, en offrant une solution simple et rapide aux touristes venant assister aux événements du Mondial 2030 "Morocco-Spain-Portugal". L’objectif de ce projet est de poser les bases de la plateforme en se concentrant sur l’authentification, la gestion des annonces et la recherche d’hébergements.

---

## Liens Utiles
- [Lien de Presentation](https://www.canva.com/design/DAGgb749HI0/jR4rheCs3j65KzFc1NGvcA/edit?utm_content=DAGgb749HI0&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)
- [Lien de Planification](https://alirostom2201.atlassian.net/jira/software/projects/TS/boards/2?atlOrigin=eyJpIjoiMjdkYjIxM2ViYjU2NDRkMWJkNzQ0ZDU1YjRmMzFkMTAiLCJwIjoiaiJ9)

## User Stories

### 🔑 Authentification et Profil
- **En tant qu’utilisateur (propriétaire ou touriste)**, je veux pouvoir m’inscrire sur la plateforme et m’authentifier en toute sécurité pour accéder à mon espace personnel.
- **En tant qu’utilisateur**, je veux pouvoir consulter mon profil et modifier mes informations personnelles.

### 🏡 Gestion des Annonces
- **En tant que propriétaire**, je veux pouvoir publier une annonce en indiquant la localisation, le prix, les équipements et les disponibilités.
- **En tant que propriétaire**, je veux pouvoir modifier ou supprimer mes annonces pour garder mon offre à jour.

### 🔍 Recherche et Exploration
- **En tant que touriste**, je veux pouvoir explorer les différentes offres d’hébergement avec une pagination dynamique, me permettant de choisir d'afficher 4, 10, ou 25 annonces par page, afin d’adapter la navigation à mes préférences.
- **En tant que touriste**, je veux pouvoir rechercher des hébergements en fonction de la ville et de la date de disponibilité afin de trouver rapidement un logement adapté à mon séjour.

### ⭐ Favoris
- **En tant que touriste**, je veux pouvoir enregistrer des annonces en favoris pour les retrouver facilement plus tard.

### 🗑️ Administration
- **En tant qu’administrateur**, je veux pouvoir supprimer des annonces inappropriées ou frauduleuses pour garantir la sécurité de la plateforme.
- **En tant qu’administrateur**, je veux avoir une section de statistiques pour suivre le nombre d’inscriptions, de locations et d’annonces actives.

---

## Fonctionnalités Clés

### Authentification et Profil
- Inscription et connexion sécurisées.
- Gestion du profil utilisateur (modification des informations personnelles).

### Gestion des Annonces
- Publication, modification et suppression d’annonces par les propriétaires.
- Affichage des annonces avec pagination dynamique (4, 10, 25 annonces par page).

### Recherche et Exploration
- Recherche d’hébergements par ville et date de disponibilité.
- Affichage des résultats de recherche avec filtres.

### Favoris
- Ajout et suppression d’annonces aux favoris pour les touristes.
- Affichage des annonces favorites dans l’espace personnel.

### Administration
- Suppression d’annonces inappropriées par l’administrateur.
- Tableau de bord des statistiques (nombre d’inscriptions, de locations, et d’annonces actives).

---

## Technologies Utilisées

- **Backend** : Laravel (PHP)
- **Frontend** : Blade (HTML, CSS, Tailwind CSS)
- **Base de Données** : postgreSQL
- **Authentification** : Laravel Breeze 
- **Gestion des Rôles** : Spatie Laravel Permissions
- **Pagination** : Laravel Pagination
- **Recherche** : Laravel Query Builder

---
