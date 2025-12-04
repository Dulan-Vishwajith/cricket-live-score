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

---
##Database
create database called "cricket"->paste this sql part in sql tab
```SQL

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40467903_cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `team1` varchar(50) DEFAULT NULL,
  `team2` varchar(50) DEFAULT NULL,
  `score1` int(11) DEFAULT 0,
  `score2` int(11) DEFAULT 0,
  `wickets1` int(11) DEFAULT 0,
  `wickets2` int(11) DEFAULT 0,
  `balls1` int(11) DEFAULT 0,
  `balls2` int(11) DEFAULT 0,
  `status` varchar(20) DEFAULT 'not started',
  `current_innings` tinyint(4) DEFAULT 1,
  `current_batting_team` tinyint(4) DEFAULT 1,
  `target` int(11) DEFAULT 0,
  `winner` varchar(50) DEFAULT 'not yet',
  `team1_logo` varchar(255) DEFAULT NULL,
  `team2_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team1`, `team2`, `score1`, `score2`, `wickets1`, `wickets2`, `balls1`, `balls2`, `status`, `current_innings`, `current_batting_team`, `target`, `winner`, `team1_logo`, `team2_logo`) VALUES
(1, 'team 9', 'team7', 18, 16, 0, 0, 3, 3, 'ended', 2, 2, 19, 'team 9', NULL, NULL),
(2, 'asd', 'fgh', 6, 7, 0, 0, 1, 2, 'ended', 2, 2, 7, 'fgh', NULL, NULL),
(3, 'kl', 'ty', 2, 0, 0, 0, 2, 0, 'started', 1, 1, 0, 'not yet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `match_id` int(11) DEFAULT NULL,
  `winner_team` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `match_id`, `winner_team`) VALUES
(1, 10, 'Draw'),
(2, 1, 'Draw'),
(3, 2, 'Matale'),
(4, 1, 'Kegalla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

---
## 👨‍💻 Author

Dulan Vishwajith
