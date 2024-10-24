<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['lastname'];
    $civilStatus = $_POST['CivilStatus'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $religion = $_POST['Religion'];
    $tribe = $_POST['Tribe'];
    $ip = $_POST['Ip'];
    $language = $_POST['Language'];
    $birthOrder = $_POST['BirthOrder'];
    $numberOfSiblings = $_POST['NumberOfSiblings'];
    $childNo = $_POST['child_no'];
    $placeOfBirth = $_POST['PlaceOfBirth'];
    $permAddress = $_POST['PermAddress'];

    // Ensure variables are defined properly
    $housingType = isset($_POST['HousingType']) ? $_POST['HousingType'] : '';
    $landlord = isset($_POST['landlord']) ? $_POST['landlord'] : '';
    $landlordNumber = isset($_POST['landlordNumber']) ? $_POST['landlordNumber'] : '';

    // Database connection
    $conn = new mysqli("localhost", "root", "", "edoc");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO student_registration (Firstname, lastname, CivilStatus, DateOfBirth, Religion, Tribe, Ip, Language, BirthOrder, NumberOfSiblings, child_no, PlaceOfBirth, PermAddress, HousingType, landlord, landlordNumber) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssssssss",   
        $firstname, $lastname, $civilStatus, $dateOfBirth, $religion, $tribe, $ip, $language, 
        $birthOrder, $numberOfSiblings, $childNo, $placeOfBirth, $permAddress, $housingType, 
        $landlord, $landlordNumber
    );

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
