<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION["loggedin"]) && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TNTS Library</title>
    <style>
        :root {
            --primary-blue: #003366;
            --accent-gold: #FFD700;
            --light-gray: #f4f4f9;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: var(--light-gray);
        }

        header {
            background-color: var(--primary-blue);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 4px;
        }

        .btn-home {
            background-color: var(--accent-gold);
            color: var(--primary-blue) !important;
        }


        .container,
        .content {
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: var(--primary-blue);
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 10px;
        }


        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .book-item {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .status-available {
            color: green;
            font-weight: bold;
        }

        .status-borrowed {
            color: orange;
            font-weight: bold;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
        }

        .active {
            background: #d4edda;
            color: #155724;
        }

        .blocked {
            background: #f8d7da;
            color: #721c24;
        }


        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
        }

        th {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 0.95rem;
        }

        /* This adds space between rows */
        tbody tr:hover {
            background-color: #f9f9f9;
        }

        :root {
            --primary-blue: #003366;
            --accent-gold: #FFD700;
            --light-gray: #f4f4f9;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: var(--light-gray);
        }

        /* Header & Nav */
        header {
            background-color: var(--primary-blue);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 4px;
        }

        .btn-home {
            background-color: var(--accent-gold);
            color: var(--primary-blue) !important;
        }

        /* Search Container - Centered & Visible */
        .search-container {
            background: white;
            padding: 40px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border-radius: 8px;
        }

        .search-container h2 {
            border: none;
            margin-bottom: 20px;
            color: var(--primary-blue);
        }

        .search-box {
            width: 60%;
            padding: 15px;
            font-size: 1.1rem;
            border: 2px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-search {
            padding: 15px 30px;
            font-size: 1.1rem;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-search:hover {
            background-color: #0055a4;
        }

        /* Cards & Layout */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>
    <header>
        <div>
            <h1>TNTS Library</h1>
        </div>
        <nav class="nav-links">
            <a href="index.php" class="btn-home">Home</a>
            <a href="books.php">Books</a>
            <a href="borrowers.php">Borrowers</a>
            <a href="reports.php">Reports</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>