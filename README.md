# KnowledgeHub

KnowledgeHub is a personal practice project built with **Symfony**, featuring:

-   🛠️ [EasyAdmin](https://easyadminbundle.com/) for backend admin UI
-   🔌 [API Platform](https://api-platform.com/) for modern RESTful/GraphQL APIs
-   📝 A webapp for managing notes, categories, and tags
-   🎓 Created to learn and explore Symfony’s core features and best practices

---

## 📦 Prerequisites

Make sure you have the following installed before proceeding:

-   PHP 8.2 or higher
-   Composer (latest stable)
-   Symfony CLI ([Download](https://symfony.com/download))
-   Docker + Docker Compose
-   A supported database engine (e.g. PostgreSQL 16)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/amiano4/knowledgehub.git
cd knowledgehub
```

### 2. Install Dependencies

```bash
composer install
```

If you're using Docker, start the containers:

```bash
docker compose up -d
```

### 3. Configure Environment

Copy the `.env` file and update it as needed:

```bash
cp .env .env.local
```

Update `DB_*` variables in `.env.local` according to your configuration:

```
DB_DRIVER=postgresql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_NAME=knowledgehub
DB_USER=app
DB_PASSWORD=!ChangeMe!
DB_SERVER_VERSION=16
DATABASE_URL="${DB_DRIVER}://${DB_USER}:${DB_PASSWORD}@${DB_HOST}:${DB_PORT}/${DB_NAME}?serverVersion=${DB_SERVER_VERSION}&charset=utf8"
```

### 4. Create Database and Run Migrations

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. (Optional) Load Sample Data

If you have data fixtures:

```bash
php bin/console doctrine:fixtures:load
```

---

## 🧪 Running the Project

Start the local web server:

```bash
symfony serve
```

Then visit:

-   💽 Admin panel: [http://localhost:8000/admin](http://localhost:8000/admin)
-   🔐 Login: [http://localhost:8000/login](http://localhost:8000/login)
-   ⚙️ API: [http://localhost:8000/api](http://localhost:8000/api)

---

## 🧰 Tech Stack

-   Symfony (latest version)
-   EasyAdmin
-   API Platform
-   Doctrine ORM
-   Bootstrap (via templates)

---

## 🙇‍♂️ Why This Exists

KnowledgeHub is a sandbox project to:

-   Practice Symfony fundamentals
-   Experiment with real admin dashboards and API building
-   Manage notes, categories, and tags as a real-world example
-   Learn by doing!
