# 🚀 Laravel CRUD Project Management System

A modern and professional **Project Management System** built with **Laravel 12**, featuring full CRUD functionality, advanced filtering, Excel/PDF export, file uploads, responsive UI, and enterprise-style project management features.

![Laravel](https://img.shields.io/badge/Laravel-12.x-red)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange)
![License](https://img.shields.io/badge/License-MIT-green)

---

## ✨ Features

### 📌 Core Features

* ✅ Full CRUD Operations (Create, Read, Update, Delete)
* ✅ Responsive Bootstrap 5 UI
* ✅ SweetAlert2 Notifications
* ✅ Project Image Upload & Preview
* ✅ Form Validation & Error Handling
* ✅ Soft Delete Support

---

### 🔍 Search, Filter & Sorting

* 🔎 Real-time search functionality
* 📂 Filter by status and priority
* 🔄 Column sorting (ascending/descending)
* 📄 Dynamic pagination controls

---

### 📊 Dashboard & Statistics

* 📈 Project statistics cards
* 📌 Status-wise project counts
* 📊 Clean dashboard layout

---

### 📥 Import & Export

* 📤 Import projects from Excel/CSV
* 📥 Export data to:

  * Excel (.xlsx)
  * CSV (.csv)
  * PDF (.pdf)

---

### 🎨 User Experience

* 📱 Fully responsive design
* ⚡ Smooth UI interactions
* ⌨️ Keyboard shortcut support
* 🔔 Auto dismiss alerts

---

# 🛠️ Tech Stack

| Technology    | Version | Purpose                |
| ------------- | ------- | ---------------------- |
| Laravel       | 12.x    | Backend Framework      |
| PHP           | 8.2+    | Server-side Language   |
| MySQL         | 8.0+    | Database               |
| Bootstrap     | 5.3     | Frontend UI            |
| SweetAlert2   | 11.x    | Alerts & Notifications |
| Font Awesome  | 6.x     | Icons                  |
| Laravel Excel | 3.1     | Excel Import/Export    |
| DomPDF        | 2.x     | PDF Generation         |

---

# 📸 Screenshots


<img width="1917" height="1022" alt="Screenshot 2026-05-05 220549" src="https://github.com/user-attachments/assets/4d2a811f-d684-4dde-b97f-fcf23236c70a" />

Example:

```md
![Dashboard](screenshots/dashboard.png)
![Projects](screenshots/projects.png)
```

---

# 🚀 Installation Guide

## 1️⃣ Clone Repository

```bash
git clone https://github.com/akhilmeleppura/laravel-crud-project-management.git

cd laravel-crud-project-management
```

---

## 2️⃣ Install Dependencies

### PHP Dependencies

```bash
composer install
```

### JavaScript Dependencies

```bash
npm install
```

---

## 3️⃣ Environment Setup

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## 4️⃣ Configure Database

Update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_demo
DB_USERNAME=root
DB_PASSWORD=
```

---

## 5️⃣ Run Database Migration

```bash
php artisan migrate
```

Seed demo data:

```bash
php artisan db:seed --class=ProjectSeeder
```

---

## 6️⃣ Create Storage Link

```bash
php artisan storage:link
```

---

## 7️⃣ Run Development Server

```bash
php artisan serve
```

Open in browser:

```text
http://127.0.0.1:8000
```

---

# 📁 Project Structure

```text
crud-demo/
├── app/
│   ├── Exports/
│   ├── Imports/
│   ├── Http/Controllers/
│   │   └── ProjectController.php
│   └── Models/
│       └── Project.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/views/
│   ├── layouts/
│   └── projects/
│
├── routes/
│   └── web.php
│
└── storage/
```

---

# 🌐 Application Features

## 📋 Project Management

* Create new projects
* Edit project details
* Delete projects safely
* View detailed project information

---

## 🔎 Advanced Filtering

* Search by project name
* Filter by:

  * Status
  * Priority
* Sort by columns

---

## 📥 Export Options

* Export Excel
* Export CSV
* Export PDF

---

## 📤 Import Projects

Bulk import projects using:

* Excel files
* CSV files

---

# 🌐 Routes Overview

| Method | Endpoint               | Description     |
| ------ | ---------------------- | --------------- |
| GET    | /projects              | List projects   |
| GET    | /projects/create       | Create form     |
| POST   | /projects              | Store project   |
| GET    | /projects/{id}         | Show project    |
| GET    | /projects/{id}/edit    | Edit form       |
| PUT    | /projects/{id}         | Update project  |
| DELETE | /projects/{id}         | Delete project  |
| GET    | /projects/export/excel | Export Excel    |
| GET    | /projects/export/csv   | Export CSV      |
| GET    | /projects/export/pdf   | Export PDF      |
| POST   | /projects/import       | Import projects |

---

# 🤝 Contributing

Contributions are welcome.

## Steps:

1. Fork the repository
2. Create your feature branch

```bash
git checkout -b feature/your-feature
```

3. Commit your changes

```bash
git commit -m "Add new feature"
```

4. Push to GitHub

```bash
git push origin feature/your-feature
```

5. Create Pull Request

---

# 📄 License

This project is licensed under the **MIT License**.

---

# 👨‍💻 Author

## Akhil Meleppura

* GitHub: https://github.com/akhilmeleppura
* Email: [akhilmeleppura@gmail.com](mailto:akhilmeleppura@gmail.com)

---

# 🙏 Acknowledgements

* Laravel Team
* Bootstrap
* SweetAlert2
* Font Awesome
* Laravel Excel Package

---
