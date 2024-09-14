<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "crowdfunding"; 


$conn = new mysqli($servername, $username, $password, $dbname);
 ?>
<?php include 'header.php'; ?>

<?php
// Database connection
// include('db_connection.php');

// Fetch all campaigns from the database
$sql = "SELECT id, title, description, goal, collected_amount FROM campaigns";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
<section class="projects-section">
    <h2>Our Projects</h2>
    <div class="projects">
        <?php while ($campaign = $result->fetch_assoc()) { ?>
            <div class="project">
                <h3><?php echo htmlspecialchars($campaign['title']); ?></h3>
                <p><?php echo htmlspecialchars($campaign['description']); ?></p>
                <p>Target Amount: PKR <?php echo number_format($campaign['goal'], 2); ?></p>
                <p>Collected Amount: PKR <?php echo number_format($campaign['collected_amount'], 2); ?></p>

                <div class="progress-bar">
                    <?php
                    $percentage = ($campaign['goal'] > 0) ? ($campaign['collected_amount'] / $campaign['goal']) * 100 : 0;
                    ?>
                    <div class="progress-bar-fill" style="width: <?php echo $percentage; ?>%;"></div>
                    <span><?php echo round($percentage, 2); ?>%</span>
                </div>

                <a href="project_donation.php?id=<?php echo $campaign['id']; ?>" class="donate-button">Donate</a>

            </div>
        <?php } ?>
    </div>
</section>

<?php $conn->close(); ?>
<section class="our-goals">
    <div class="container">
        <h2>Our Goals</h2>
        <p>At CrowdSpark, our goal is to empower creators and innovators by providing a platform where ideas can flourish. We aim to foster collaboration, fuel innovation, and make impactful projects a reality through collective support.</p> 
        <button>Read more</button>
    </div>
</section>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-info">
            <h3>Contact Us</h3>
            <p>Email: info@example.com</p>
            <p>Phone: +123 456 7890</p>
            <p>Address: 123 Example Street, City, Country</p>
        </div>
        <div class="footer-social">
            <h3>Follow Us</h3>
            <a href="https://facebook.com" target="_blank" class="social-icon facebook">Facebook</a>
            <a href="https://twitter.com" target="_blank" class="social-icon twitter">Twitter</a>
            <a href="https://linkedin.com" target="_blank" class="social-icon linkedin">LinkedIn</a>
            <a href="https://instagram.com" target="_blank" class="social-icon instagram">Instagram</a>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>

