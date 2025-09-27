<?php  
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $to = "hariprofessional2024@gmail.com"; // Your email
        $from = $_POST['email'];                // Sender's email
        $name = $_POST['name'];                 // Sender's name
        $subject = $_POST['subject'];           // Subject
        $message = "From: $name\nEmail: $from\n\nMessage:\n" . $_POST['message'];

        $headers = "From: $from";  

        if (mail($to, $subject, $message, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Sorry, your message could not be sent.";
        }
    } else {
        echo "Invalid request.";
    }
?>



