<?php
    class PHP_Email_Form{  
        public $from_name = $_POST['name'];
        public $from_email;
        public $to;
        public $subject;
        public $message;
        public $ajax;
        public $smtp;
        public $headers;
        public function add_message($value, $label = '', $maxlength = null) {
            $value = trim($value);
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            if ($maxlength !== null && is_numeric($maxlength)) {
                $value = substr($value, 0, $maxlength);
            }
            if ($label) {
                return $messages[] = "$label: $value";
            } else {
                return $messages[] = $value;
            }
        }
        public function set_smtp($host, $username, $password, $spot){
            $this->smtp=array(
                'host' => $host,
                'usernname' => $username,
                'password' => $password,
                'spot' => $spot,
            );
        }
        public function send_smtp() {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $to = "hariprofessional2024@gmail.com";
                $subject = $_POST['subject']; 
                $from_email= $_POST['email'];                // Sender's email
                $from_name = $_POST['name'];             // Subject
                $headers = "From: $from_name";  
                $message = "From: $from_name\nEmail: $from_email\n\nMessage:\n" . $_POST['message'];
            }else {
                echo "Invalid request.";
            }
            if (mail($to, $subject, $message, $headers)) {
                echo "Message sent successfully!";
            } else {
                echo "Sorry, your message could not be sent.";
            }
        }
        
        public function send() {
            return mail($this->to, $this->subject, $this->message, $this->headers) 
                ? "Message sent successfully!" 
                : "Sorry, your message could not be sent.";
        }
    }
?>



