<link rel="stylesheet" href="styling.css">
<form class="donation-form" action="process_donation.php" method="POST">
    <input type="hidden" name="campaign_id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
    <label for="amount">Donation Amount:</label>
    <input type="number" name="amount" id="amount" required>
    
    <label for="donor_name">Your Name:</label>
    <input type="text" name="donor_name" id="donor_name" required>
    
    <button type="submit">Donate</button>
</form>
