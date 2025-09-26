<?php
session_start(); 
include 'database.php';

$error = '';
$success = '';

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($name) || empty($email) || empty($username) || empty($password)){
        $error = "Please fill in all fields";
    } else if(strlen($password) < 6){
        $error = "Password must be at least 6 characters long";
    } else {
        // Check if username or email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        
        if($stmt->rowCount() > 0){
            $error = "Username or email already exists";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
            
            if($stmt->execute([$name, $email, $username, $hashed_password])){
                // AUTO-LOGIN AFTER REGISTRATION 
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                
                $success = "Registration successful! Redirecting to dashboard...";
                header("Refresh: 2; url=dashboard.php");
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>

<?php include 'header.php'; ?>

<section style="padding: 4rem 0;">
    <div class="container">
        <h2 class="section-title">Create Account</h2>
        <div class="form-container">
            <?php if($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <form id="registerForm" method="POST">
                <div class="form-group">
                    <label for="regName">Full Name</label>
                    <input type="text" id="regName" name="name" required>
                    <div class="error" id="regNameError">Full name is required</div>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email</label>
                    <input type="email" id="regEmail" name="email" required>
                    <div class="error" id="regEmailError">Valid email is required</div>
                </div>
                <div class="form-group">
                    <label for="regUsername">Username</label>
                    <input type="text" id="regUsername" name="username" required>
                    <div class="error" id="regUsernameError">Username is required</div>
                </div>
               <div class="form-group">
                    <label for="regPassword">Password</label>
                    <div class="password-wrapper">
                    <input type="password" id="regPassword" name="password" required>
                    <button type="button" class="password-toggle">
                    <i class="fas fa-eye-slash"></i>
                </button>
                </div>
                    <div class="error" id="regPasswordError">Password is required</div>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Register</button>
            </form>
            <p style="text-align: center; margin-top: 1rem;">Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>