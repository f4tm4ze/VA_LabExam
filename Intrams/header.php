<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'database.php';

echo "<!-- DEBUG: user_id = " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'NOT SET') . " -->";
echo "<!-- DEBUG: name = " . (isset($_SESSION['name']) ? $_SESSION['name'] : 'NOT SET') . " -->";
echo "<!-- DEBUG: username = " . (isset($_SESSION['username']) ? $_SESSION['username'] : 'NOT SET') . " -->";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>UM Intramurals 2025</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <nav>
    <div class="container nav-container">
        <div class="logo">
            <img src="UM.png" alt="University of Mindanao Logo" class="logo-img">
            <div class="logo-text">
                <h1>University of Mindanao</h1>
                <span class="logo-subtitle">UM Intramurals 2025</span>
            </div>
        </div>
            <div class="hamburger" id="hamburger">☰</div>
            <ul class="nav-links" id="navLinks">
                <li><a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
                    <li><a href="profile.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">My Profile</a></li>
                    <li class="user-menu">
                        <button class="user-toggle">
                            <div class="user-avatar">
                                <?php 
                                $initial = isset($_SESSION['username']) ? strtoupper(substr($_SESSION['username'], 0, 1)) : 'U';
                                echo $initial; 
                                ?>
                            </div>
                            <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?> ▼
                        </button>
                        <div class="user-dropdown">
                            <a href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li><a href="login.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>">Login</a></li>
                    <li><a href="register.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>">Register</a></li>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                <?php endif; ?>
            </ul>
        </div>
    </nav>
