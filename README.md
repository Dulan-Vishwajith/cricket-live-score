# 🏏 Cricket Scoring Web Application

This project is a **Cricket Scoring Web Application** developed using **PHP and MySQL**.
You can run, test, and develop this project locally using **XAMPP** and manage versions using **Git & GitHub**.

---

## ✅ Requirements

Install these before starting:

- Git – https://git-scm.com/
- XAMPP – https://www.apachefriends.org/
- Web Browser – Chrome / Edge / Firefox

---

## 📌 STEP 1 — Clone the Repository

Open **Git Bash / Terminal / Command Prompt** and run:

```bash
git clone https://github.com/YOUR-USERNAME/YOUR-REPOSITORY-NAME.git
```

After cloning, move the project folder to your XAMPP htdocs directory:

```text
C:\xampp\htdocs\
```

Final path:

```text
C:\xampp\htdocs\YOUR-REPOSITORY-NAME
```

---

## 📌 STEP 2 — Start XAMPP

1. Open **XAMPP Control Panel**
2. Click **Start** on:
   - Apache
   - MySQL
3. Make sure both show **Running (green)**

---

## 📌 STEP 3 — Create the Database

Open your browser and go to:

```text
http://localhost/phpmyadmin
```

Then:

1. Click **New**
2. Enter database name: `cricket`
3. Click **Create**

(Optional) If your project has a `.sql` file:

1. Select the `cricket` database
2. Click **Import**
3. Choose the `.sql` file
4. Click **Go**

---

## 📌 STEP 4 — Configure Database Connection (XAMPP)

Open your `db.php` file and add:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "cricket";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
```

Save the file.

---

## 📌 STEP 5 — Run the Website

Open your browser and go to:

```text
http://localhost/YOUR-REPOSITORY-NAME/
```

Your website should now be running locally. 🎉

---

## 📌 STEP 6 — Save Changes to GitHub

Whenever you update your project, run:

```bash
git add .
git commit -m "Your update message"
git push
```

---

## 👨‍💻 Author

Dulan Vishwajith
