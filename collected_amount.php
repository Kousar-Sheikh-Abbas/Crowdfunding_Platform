<?php
// collected_amount.php

// Database connection
include('index.php');

// Check if donation amount and campaign ID are set
if (isset($_POST['amount']) && isset($_POST['campaign_id'])) {
    $campaign_id = $_POST['campaign_id'];
    $donation_amount = $_POST['amount'];

    // Update the collected amount in the database
    $sql = "UPDATE campaigns SET collected_amount = collected_amount + ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('di', $donation_amount, $campaign_id);

    if ($stmt->execute()) {
        echo "Donation successful! Collected amount updated.";
    } else {
        echo "Error updating collected amount: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
