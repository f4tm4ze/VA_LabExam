<?php 
include 'database.php';
include 'header.php'; 

// Check if database connection is successful
if (!isset($pdo)) {
    die("Database connection failed");
}
?>
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h2>Welcome to UM Intramurals 2025</h2>
        <p>Join the biggest sports event of the year! Compete, connect, and celebrate with fellow UM students.</p>
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href="register.php" class="btn">Register Now</a>
        <?php else: ?>
            <a href="profile.php" class="btn">Go to My Profile</a>
        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <div class="container">
        <h2 class="section-title">About UM Intramurals</h2>
        <div class="about-content">
            <div class="about-text">
                <p>The University of Mindanao Intramurals is an annual event that brings together students from all colleges and departments to compete in various sports and recreational activities.</p>
                <p>This year's theme is "Unity in Diversity: One UM, One Victory!" which emphasizes the importance of sportsmanship, camaraderie, and healthy competition among students.</p>
                <p>The intramurals feature a wide range of events including basketball, volleyball, football, track and field, swimming, and many more. There are also special events for non-athletic competitions like cheerleading and cultural presentations.</p>
            </div>
            <div class="about-image">
                <img src="UM.png" alt="UM Intramurals">
            </div>
        </div>
    </div>
</section>

<!-- Events Section with Local Images -->
<section id="events" style="background-color: #f9f9f9;">
    <div class="container">
        <h2 class="section-title">Featured Events</h2>
        <div class="events-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM events ORDER BY date ASC LIMIT 3");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                $image_file = "";
                switch($row['sport_type']) {
                    case 'Basketball':
                        $image_file = "bb.jpg";
                        break;
                    case 'Volleyball':
                        $image_file = "vb.jpg";
                        break;
                    case 'Athletics':
                        $image_file = "tf.jpg";
                        break;
                    default:
                        $image_file = "sports-default.jpg";
                }
            ?>
            <div class="event-card">
                <div class="event-image">
                    <img src="<?php echo $image_file; ?>" alt="<?php echo $row['sport_type']; ?>">
                </div>
                <div class="event-info">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p><strong>Date:</strong> <?php echo date('F j, Y', strtotime($row['date'])); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Teams Section -->
<section id="teams">
    <div class="container">
        <h2 class="section-title">Participating Colleges</h2>
        <div class="teams-container">
            <div class="team-card">
                <div class="team-icon">
                    <img src="CCE.png" alt="College of Computing Education">
                </div>
                <h3>College of Computing Education</h3>
                <p>Innovating victory through technology</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CEE.png" alt="College of Engineering Education">
                </div>
                <h3>College of Engineering Education</h3>
                <p>Building champions on and off the field</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CAE.png" alt="College of Accounting Education">
                </div>
                <h3>College of Accounting Education</h3>
                <p>Managing success in every game</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CHSE.png" alt="College of Health Sciences Education">
                </div>
                <h3>College of Health Sciences Education</h3>
                <p>Caring for victory with every play</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CAFAE.png" alt="College of Architecture and Fine Arts Education">
                </div>
                <h3>College of Architecture and Fine Arts Education</h3>
                <p>Designing victory with creativity</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CASE.png" alt="College of Arts and Sciences Education">
                </div>
                <h3>College of Arts and Sciences Education</h3>
                <p>Mastering the art of competition</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CBAE.png" alt="College of Business Administration Education">
                </div>
                <h3>College of Business Administration Education</h3>
                <p>Strategizing for business victory</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CCJE.png" alt="College of Criminal Justice Education">
                </div>
                <h3>College of Criminal Justice Education</h3>
                <p>Upholding justice in sports</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CHE.png" alt="College of Hospitality Education">
                </div>
                <h3>College of Hospitality Education</h3>
                <p>Hosting champions with excellence</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="CTE.png" alt="College of Teacher Education">
                </div>
                <h3>College of Teacher Education</h3>
                <p>Educating future champions</p>
            </div>
            <div class="team-card">
                <div class="team-icon">
                    <img src="UM.png" alt="Basic Education Department">
                </div>
                <h3>Basic Education Department</h3>
                <p>Building foundations for champions</p>
            </div>
                        <div class="team-card">
                <div class="team-icon">
                    <img src="PS.png" alt="Professional Schools">
                </div>
                <h3>Professional Schools</h3>
                <p>Excellence in professional competition</p>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>