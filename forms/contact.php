<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'henil2705@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_email = $_POST['email']; // Sender's email should be the user's email
$contact->from_name = $_POST['name'];
$contact->subject = $_POST['subject'];

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
$password = 'wbud ancu jlsx rrse'; // Use a secure method to store your password

$contact->smtp = array(
    'host' => 'smtp.gmail.com', // Gmail SMTP server
    'username' => 'henil2705@gmail.com',  // Replace with your Gmail username
    'password' => $password,  // Use the password variable defined above
    'port' => '587',          // Gmail SMTP port (TLS)
    'encryption' => 'tls'     // Encryption method (tls or ssl)
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
