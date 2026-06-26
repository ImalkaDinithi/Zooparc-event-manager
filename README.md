# 🦁 ZooParc Event Management System

A web-based event management system developed for **ZooParc Zoological Park** to simplify the administration and management of zoo events. The application allows administrators to create, update, delete, and manage event information while providing visitors with an easy way to browse upcoming events.

This project was developed as part of an academic software development assignment using PHP and MySQL.

---

## 📖 Overview

The ZooParc Event Management System is designed to improve the efficiency of organizing and managing events held at the zoological park. It provides an intuitive interface for administrators to maintain event records and enables visitors to stay informed about upcoming activities.

---

## ✨ Features

### Administrator
- Secure administrator login
- Add new events
- Update existing event details
- Delete events
- View all scheduled events
- Manage event information through a user-friendly dashboard

### Visitors
- Browse upcoming events
- View event details
- Responsive interface for easy access

---

## 🛠️ Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript
- Bootstrap

### Backend
- PHP

### Database
- MySQL

### Development Environment
- XAMPP

---

## 📂 Project Structure

```text
Zooparc-event-manager/
│
├── css/
├── js/
├── images/
├── includes/
├── database/
├── index.php
├── login.php
├── add_event.php
├── update_event.php
├── delete_event.php
├── displayevents.php
└── README.md
```

> **Note:** Folder names may vary slightly depending on your project structure.

---

## 🚀 Getting Started

### Prerequisites

Before running the project, make sure you have installed:

- XAMPP
- PHP 8.x or later
- MySQL
- A modern web browser

---

## 📥 Installation

### 1. Clone the repository

```bash
git clone https://github.com/ImalkaDinithi/Zooparc-event-manager.git
```

### 2. Move the project

Copy the project folder into the XAMPP `htdocs` directory.

Example:

```text
C:\xampp\htdocs\Zooparc-event-manager
```

---

### 3. Start XAMPP

Open the XAMPP Control Panel and start:

- Apache
- MySQL

---

### 4. Import the Database

1. Open **phpMyAdmin**
   ```
   http://localhost/phpmyadmin
   ```

2. Create a new database (for example):

```
zoo_db
```

3. Import the provided SQL file into the database.

---

### 5. Configure Database Connection

Update your database configuration file with your local database credentials.

Example:

```php
$host = "localhost";
$username = "root";
$password = "";
$database = "zoo_db";
```

---

### 6. Run the Application

Open your browser and visit:

```
http://localhost/Zooparc-event-manager/
```

---


## 🔮 Future Improvements

- Online event registration
- Event ticket booking
- Email notifications
- Search and filter events
- Event categories
- User account management
- Event image uploads
- Analytics dashboard

---

## 👩‍💻 Author

**Imalka Senaratne**

Software Engineering Undergraduate

GitHub:
https://github.com/ImalkaDinithi

---

## 📄 License

This project was developed for academic and educational purposes.
