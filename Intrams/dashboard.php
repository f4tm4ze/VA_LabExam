<?php

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include 'database.php';
?>

<?php include 'includes/header.php'; ?>

<section class="dashboard">
    <div class="container">
        <div class="dashboard-welcome">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
            <p>Here's your UM Intramurals dashboard</p>
        </div>
        
        <div class="user-events">
            <h3 class="section-title">Upcoming Events</h3>
            <div class="events-grid">
                <?php
                $stmt = $pdo->query("SELECT * FROM events ORDER BY date ASC");
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                ?>
                <div class="event-card">
                    <div class="event-image">
                        <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="<?php echo $row['sport_type']; ?>">
                    </div>
                    <div class="event-info">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <p><strong>Date:</strong> <?php echo date('F j, Y', strtotime($row['date'])); ?></p>
                        <p><strong>Sport:</strong> <?php echo $row['sport_type']; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>