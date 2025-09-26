<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include 'database.php';
?>
<?php include 'header.php'; ?>

<section style="padding: 4rem 0;">
    <div class="container">
        <h2 class="section-title">My Profile</h2>
        <div class="form-container">
            <div style="text-align: center; margin-bottom: 2rem;">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, var(--maroon), var(--light-maroon)); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white; font-size: 2rem; font-weight: bold;">
                    <?php echo strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                </div>
                <h3><?php echo $_SESSION['name']; ?></h3>
                <p>Username: <?php echo $_SESSION['username']; ?></p>
            </div>
            
            <div class="btn-grid">
                 <a href="index.php" class="bordered-btn btn-home">Back to Home</a>
                 <a href="logout.php" class="bordered-btn btn-logout">Logout</a>
             </div>  
            </div>
    </div>
</section>

<?php include 'footer.php'; ?>