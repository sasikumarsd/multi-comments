# 🧩 Multi-Level Commenting System with Recursive Depth Check (Laravel 12 + Livewire)

This is a Laravel 12 application that implements a multi-level commenting system with recursive replies (up to 3 levels deep), using **Livewire** for dynamic UI updates without page reloads.

🔗 **Live URL**: [https://multi-comments-production.up.railway.app](https://multi-comments-production.up.railway.app)

---

## ✅ Features

- Posts with title and content
- Nested comments and replies (up to 3 levels)
- Depth limit enforced — no reply form beyond level 3
- Livewire-powered:
  - Real-time comment submission
  - Recursive comment rendering
- Bootstrap 5 + Tailwind CSS used for styling
- Scheduled Artisan command to delete empty comments

---

## 🛠️ Tech Stack

- Laravel 12
- Livewire v3
- Vite (JS bundling)
- Bootstrap 5
- Tailwind CSS
- MySQL (via Railway)
- Deployment: [Railway](https://railway.app)

---

## 📦 Installation Steps

### 1. Clone the Repository
```bash
git clone https://github.com/sasikumarsd/multi-comments.git
cd multi-comments
````

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Update your `.env` file with **MySQL credentials** (local or from Railway).

### 5. Migrate and Seed

```bash
php artisan migrate --seed
```

### 6. Build Frontend Assets

```bash
npm run build
```

### 7. Start Local Development Server

```bash
php artisan serve
```

---

## 🚀 Deployment Notes (Railway)

* Connected to GitHub repository
* `.env` variables configured in Railway Dashboard
* Frontend assets compiled using `npm run build`
* App root points to `public/` directory
* Used following Release command on Railway:

  ```bash
  php artisan migrate --force && php artisan db:seed --force
  ```

---

## 🧹 Scheduled Command

### Delete Empty Comments

```bash
php artisan comments:clean
```

### Manual Trigger

```bash
php artisan schedule:run
```

Registered inside: `routes/console.php`

---

## 📝 Additional Notes

* Livewire scripts and styles are loaded inside `layouts/app.blade.php`
* Comment system uses recursive Livewire components
* Database is seeded with sample `posts` via `PostSeeder`

---

## 👤 Author

**Sasi Kumar**
[GitHub: @sasikumarsd](https://github.com/sasikumarsd)




