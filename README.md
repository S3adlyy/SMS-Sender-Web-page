# SMS-Sender-Web-page
This project is a web application designed to send SMS messages to Tunisian phone numbers. The application is built using HTML, CSS, PHP, MySQL, and the Twilio API
# Installation
Clone the Repository
git clone https://github.com/yourusername/sms-sender-web.git
Navigate to the Project Directory
cd sms-sender-web
# Twilio Integration :
# 1:Sign Up for Twilio
Go to the Twilio website and sign up for an account.
Verify your account and get your Twilio API credentials
# 2:Install the Twilio PHP SDK
Use Composer to install the Twilio PHP SDK:
composer require twilio/sdk
# 3 Configure Twilio:
  <?php
$twilio_sid = 'your_account_sid';
$twilio_token = 'your_auth_token';
$twilio_phone_number = 'your_twilio_phone_number';
?>
# 4 Send SMS Using Twilio:
require 'vendor/autoload.php';
use Twilio\Rest\Client;

$client = new Client($twilio_sid, $twilio_token);

$message = $client->messages->create(
    $recipient_number,
    [
        'from' => $twilio_phone_number,
        'body' => 'Your message here'
    ]
);




