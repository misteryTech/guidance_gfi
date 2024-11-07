<?php
include 'connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $student_id = $_POST['student_id'];
    $counselor_id = $_POST['counselor'];
    $appointment_date = $_POST['appointment_date'];
    $session_time = $_POST['session_time'];
    $reason = $_POST['reason'];
    $treatment = $_POST['treatment'];


    // Validate inputs (you can add more validation as needed)
    if (empty($student_id) || empty($counselor_id) || empty($appointment_date) || empty($session_time) || empty($reason) || empty($treatment)) {
        die("Please fill in all fields.");
    }

    // Prepare and execute the SQL statement
    $stmt = $database->prepare("INSERT INTO appointments (student_id, counselor_id, appointment_date, session_time, reason, treatment) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $student_id, $counselor_id, $appointment_date, $session_time, $reason, $treatment);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
        // Redirect to a confirmation page or display a success message

        
        echo "<script>alert('Appointment booked successfully!');</script>";
            header("Location: index.php");
            exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $database->close();
} else {
    echo "Invalid request method.";
}
?>
