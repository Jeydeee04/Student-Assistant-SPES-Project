# DAR Asset & Property Registry

A **Property and Equipment Inventory Management System** built for the **Department of Agrarian Reform (DAR)** — web-based CRUD application for tracking, filtering, and reporting on assets across two fund clusters (Regular and Split).

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-06B6D4?logo=tailwindcss&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)

---

## Features

- **Dashboard** — Real-time overview with asset counts and Chart.js pie charts broken down by fund cluster and condition
- **Asset Management** — Full CRUD (Create, Read, Update, Delete) for property records
- **Two Fund Clusters** — Separate views for Regular and Split cluster assets
- **Search & Filter** — Client-side search across multiple fields, filter by status (serviceable / unserviceable / disposed)
- **CSV Export** — Export asset lists per fund cluster
- **Authentication** — Secure session-based login with password hashing
- **Password Recovery** — OTP-based forgot password flow via email (PHPMailer / SMTP)
- **Responsive UI** — Tailwind CSS sidebar layout, works on desktop and tablet
- **Docker Support** — Ready-to-deploy with Docker Compose (PHP-Apache + MySQL)

---

## Tech Stack

| Layer           | Technology                                    |
|-----------------|-----------------------------------------------|
| Backend         | PHP 8.2                                       |
| Frontend        | HTML5, Vanilla JavaScript, Tailwind CSS 3 (CDN) |
| Database        | MySQL 8 (PDO)                                 |
| Charts          | Chart.js (CDN)                                |
| Email           | PHPMailer 7.x (Gmail SMTP)                    |
| Config          | vlucas/phpdotenv 5.x                          |
| Container       | Docker + Docker Compose                       |
| Dependency Mgmt | Composer                                      |

---

## Getting Started

### Prerequisites

- PHP 8.2+, Composer, MySQL 8 (local setup), **or**
- Docker + Docker Compose (containerized setup)
- A Gmail account with an [App Password](https://support.google.com/accounts/answer/185833) (for password recovery)

### 1. Local Setup

```bash
# Clone the repository
git clone https://github.com/Jeydeee04/Student-Assistant-SPES-Project.git
cd "Student Assistant (SPES) Project"

# Install PHP dependencies
composer install

# Create environment file
cp .env.example .env
```

Edit `.env` with your database and email credentials:

```env
DB_HOST=localhost
DB_USER=root
DB_PASS=your_mysql_password
DB_NAME=dar
EMAIL=your-email@gmail.com
APP_PASS=your-gmail-app-password
```

Start the PHP built-in server:

```bash
php -S localhost:8000
```

Access the app at `http://localhost:8000/dar/`

### 2. Docker Setup

```bash
docker-compose up --build
```

- Application: `http://localhost:80/dar/`
- MySQL: `localhost:3306`, database `dar`, user `root`, password `rootpassword`

## License

This project is developed for the Department of Agrarian Reform (DAR).
