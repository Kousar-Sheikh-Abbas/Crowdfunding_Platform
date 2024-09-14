<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_yourTestSecretKey'); // Test secret key
if (isset($_POST['stripeToken'])) {
    $token = $_POST['stripeToken'];
    
    // Process the payment
    $charge = \Stripe\Charge::create([
        'amount' => 1000, // Amount in cents
        'currency' => 'usd',
        'source' => $token,
        'description' => 'Donation for a campaign',
    ]);

    echo 'Payment successful!';
} else {
    die('Payment successful!');
}
?>
<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the donation details from the form
    $campaign_id = $_POST['campaign_id'];
    $donor_name = $_POST['donor_name'];
    $amount = $_POST['amount'];

    // Insert the donation into the donations table (optional, if tracking donations)
    $insert_donation_sql = "INSERT INTO donations (campaign_id, donor_name, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_donation_sql);
    $stmt->bind_param("isd", $campaign_id, $donor_name, $amount);
    $stmt->execute();

    // Update the collected amount for the campaign
    $update_campaign_sql = "UPDATE campaigns SET collected_amount = collected_amount + ? WHERE id = ?";
    $stmt = $conn->prepare($update_campaign_sql);
    $stmt->bind_param("di", $amount, $campaign_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Success message after updating
        echo "<p>Thank you for your donation! The collected amount has been updated.</p>";
        echo "<a href='project_details.php?id=" . $campaign_id . "'>Go back to the project</a>";
    } else {
        echo "<p>Error updating the campaign's collected amount. Please try again.</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>
