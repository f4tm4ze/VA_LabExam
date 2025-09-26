<?php
session_start();
include 'database.php';

$error = '';
if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)){
        $error = "Please fill in all fields";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        if($user && password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>

<?php include 'header.php'; ?>

    <section style="padding: 4rem 0;">
        <div class="container">
            <h2 class="section-title">Login to Your Account</h2>
            <div class="form-container">
                <?php if($error): ?>
                    <div class="alert alert-error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form id="loginForm" method="POST">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="text" id="loginUsername" name="username" required>
                        <div class="error" id="loginUsernameError">Username is required</div>
                    </div>
                    <div class="form-group">
                         <label for="loginPassword">Password</label>
                         <div class="password-wrapper">
                         <input type="password" id="loginPassword" name="password" required>
                          <button type="button" class="password-toggle">
                        <i class="fas fa-eye-slash"></i>
                    </button>
                     </div>
                          <div class="error" id="loginPasswordError">Password is required</div>
                    </div>
                    <button type="submit" class="btn" style="width: 100%;">Login</button>
                </form>
                <p style="text-align: center; margin-top: 1rem;">Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>
