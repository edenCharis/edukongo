
# 🎓 EduKongo – SaaS de Gestion Scolaire

EduKongo est une plateforme **SaaS de gestion scolaire** développée avec **Laravel**, conçue pour les établissements scolaires du Congo-Brazzaville et de l'Afrique Centrale.
Elle permet de gérer les élèves, classes, notes, paiements et communications entre écoles et parents, avec un système d'abonnements (Freemium, Basique, Avancé).

---

## 🚀 Fonctionnalités principales

* Gestion des élèves, classes et enseignants
* Saisie des notes et génération de bulletins PDF
* Gestion des paiements scolaires et reçus
* Suivi des absences et notifications aux parents (SMS/WhatsApp/Email)
* Tableau de bord pour directeurs et statistiques scolaires
* Application mobile (phase avancée)
* Support multi-établissements (multi-tenant)

---

## 🛠️ Installation

### Prérequis

* PHP >= 8.1
* Composer
* MySQL ou PostgreSQL

### Étapes d'installation

```bash
# 1. Cloner le projet
git clone https://github.com/TON-USER/edukongo.git
cd edukongo

# 2. Installer les dépendances PHP
composer install

# 3. Créer le fichier .env
cp .env.example .env

# 4. Générer la clé d'application
php artisan key:generate

# 5. Configurer la base de données dans .env puis exécuter les migrations
php artisan migrate

# 6. Lancer le serveur
php artisan serve
```

Le projet sera disponible sur `http://127.0.0.1:8000`

--- 

## 👥 Contribution

Merci de lire le fichier [CONTRIBUTING.md](CONTRIBUTING.md) pour connaître les règles de contribution (workflow Git, conventions de commits, etc.).

---

## 📦 Abonnements (Modèle économique)

* **Freemium** – Petites écoles (jusqu’à 50 élèves)
* **Basique** – Écoles primaires/collèges (50 à 300 élèves)
* **Avancé** – Lycées, grands établissements (+300 élèves, multi-sites)

---

## 🔒 Sécurité

* Ne pas commiter le fichier `.env`
* Les clés API et mots de passe doivent être stockés uniquement dans `.env`
* Respecter les bonnes pratiques Laravel et PSR-12

---

## 📜 Licence

Projet privé – EduKongo © 2025
Tous droits réservés.

