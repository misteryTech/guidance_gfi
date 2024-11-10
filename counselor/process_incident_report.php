<?php
// Include database connection
include("../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $incident_date = $_POST['incident_date'];
    $location = $_POST['location'];
    $reported_by = $_POST['reported_by'];
    $description = $_POST['description'];
    $witnesses = isset($_POST['witnesses']) ? $_POST['witnesses'] : NULL;
    $action_taken = isset($_POST['action_taken']) ? $_POST['action_taken'] : NULL;

    // Handle file upload
    $attachmentPaths = [];
    if (isset($_FILES['attachments']) && $_FILES['attachments']['error'][0] == UPLOAD_ERR_OK) {
        $uploadsDir = "uploads/"; // Directory where files will be stored
        foreach ($_FILES['attachments']['name'] as $index => $fileName) {
            $tmpName = $_FILES['attachments']['tmp_name'][$index];
            $filePath = $uploadsDir . basename($fileName);
            if (move_uploaded_file($tmpName, $filePath)) {
                $attachmentPaths[] = $filePath;
            }
        }
    }
    $attachments = implode(",", $attachmentPaths); // Store file paths as comma-separated values

    // Prepare the SQL query
    $sql = "INSERT INTO `incident_reports` (`incident_date`, `location`, `reported_by`, `description`, `witnesses`, `action_taken`, `attachments`) 
            VALUES ('$incident_date', '$location', '$reported_by', '$description', '$witnesses', '$action_taken', '$attachments')";

    // Execute the query
    if ($database->query($sql) === TRUE) {
        // Success: Show an alert and redirect
        echo "<script>
                alert('Incident report submitted successfully.');
                window.location.href = 'incident_report.php'; // Redirect back to the form page
              </script>";
    } else {
        // Failure: Show an alert and redirect
        echo "<script>
                alert('Error: " . $database->error . "');
                window.location.href = 'incident_report.php'; // Redirect back to the form page
              </script>";
    }
}
?>
