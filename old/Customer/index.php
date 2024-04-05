<?php
// Ensure redirect happens before any output:
ob_start();  // Start output buffering

// Determine dashboard URL (adapt if it's a different file or path):
$dashboardUrl = 'Dashboard.php';

// Check if user is already logged in (optional, add your logic):
if (true) {
    http://localhost/online-book-store/Admin/Dashbord.php
    $dashboardUrl = 'Dashboard.php'; // Assuming case-sensitive URL
} else {
    // Redirect to login page if not logged in (optional):
    $dashboardUrl = 'login.php';
}

// Send redirect header with appropriate status code:
header("Location: $dashboardUrl", true, 302); // 302 for temporary redirect

// Clear any potential output before redirect to avoid errors:
ob_end_clean();  // End output buffering and clear

// No need for empty body content as redirect happens before HTML
exit;  // Exit script to prevent further execution
?>