<?php
include ("connect.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form data
    $fullname = $_POST['Full_name'];
    $fathername = $_POST['Father_name'];
    $cnic = $_POST['CNIC'];
    $dob = $_POST['Dob'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $education = $_POST['Education'];
    $timing = $_POST['Timing'];
    $know = $_POST['Know_about'];
    
    // Handle program checkboxes - they come as an array
    if (isset($_POST['Program']) && is_array($_POST['Program'])) {
        $program = implode(', ', $_POST['Program']);
    } else {
        $program = isset($_POST['Program']) ? $_POST['Program'] : '';
    }
    
    // Fixed SQL query - corrected column names
    $sql = "INSERT INTO admission (Full_name, Father_name, CNIC, Dob, Email, Phone, Address, Education, Program, Timing, Know_about) VALUES ('$fullname', '$fathername', '$cnic', '$dob', '$email', '$phone', '$address', '$education', '$program', '$timing', '$know')";
    
    if($conn->query($sql) === TRUE){
        echo "New Record Inserted Successfully";
        // Redirect back to form with success message
        header("Location: admission.html?success=1");
        exit();
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No data submitted";
}

$conn->close();
?>