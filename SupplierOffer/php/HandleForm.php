<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $carType = $_POST['carType'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    // Process file upload
    $uploadedFiles = [];
    if (isset($_FILES['pictures'])) {
        $uploadDirectory = "uploads/"; // Change to your desired directory
        foreach ($_FILES['pictures']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['pictures']['name'][$key];
            $file_path = $uploadDirectory . $file_name;
            move_uploaded_file($tmp_name, $file_path);
            $uploadedFiles[] = $file_path;
        }
    }

    // Compose email message
    $to = "recipient@example.com"; // Change to your recipient email address
    $subject = "New Supplier Offer";

    $message = "Name: $name\n";
    $message .= "Company: $company\n";
    $message .= "Phone: $phone\n";
    $message .= "Email: $email\n";
    $message .= "Car Type: $carType\n";
    $message .= "Year: $year\n";
    $message .= "Price: $price\n";

    // Include uploaded files in email if any
    if (!empty($uploadedFiles)) {
        $message .= "Uploaded Pictures:\n";
        foreach ($uploadedFiles as $file) {
            $message .= "$file\n";
        }
    }

    // Set additional headers
    $headers = "From: webmaster@example.com"; // Change to your sender email address

    // Send email
    mail($to, $subject, $message, $headers);

    // Optionally, redirect the user to a thank you page
    header("Location: thank_you.html");
    exit;
}
?>
