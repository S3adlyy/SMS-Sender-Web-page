<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Sender</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            var phoneNumber = document.getElementById("numbre").value;
            var message = document.getElementById("message").value;

            // Validate phone number and message
            if (phoneNumber.trim() === "" || message.trim() === "") {
                alert("Please enter both phone number and message.");
                return false;
            }

            // Ensure phone number starts with +216 (Tunisian code)
            if (!phoneNumber.startsWith("+216")) {
                alert("Please enter a valid Tunisian phone number starting with +216.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>SMS Sender</h1>
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="numbre">Phone number (+216)</label>
                <input type="text" id="numbre" name="numbre" placeholder="Enter Tunisian phone number starting with +216">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" id="message" name="message" maxlength="160" placeholder="Enter your message">
            </div>
            <div class="form-group">
                <input type="submit" value="Send" name="send" class="send">
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Required if your environment does not handle autoloading
            require 'twilio-php-main\src\Twilio\autoload.php';

            // Your Account SID and Auth Token from console.twilio.com
            $sid = "AC8f777546b8042fc30d961bad82e96dd2";
            $token = "4d88ea8ac8d1284ba61bbbd1e59573d9";
            $client = new Twilio\Rest\Client($sid, $token);

            // Retrieve form data
            $phoneNumber = isset($_POST['numbre']) ? $_POST['numbre'] : '';
            $message = isset($_POST['message']) ? $_POST['message'] : '';

            if (!empty($phoneNumber) && !empty($message)) {
                // Use the Client to make requests to the Twilio REST API
                $client->messages->create(
                    // The number you'd like to send the message to
                    $phoneNumber,
                    [
                        // A Twilio phone number you purchased at https://console.twilio.com
                        'from' => '+13145573838',
                        // The body of the text message you'd like to send
                        'body' => $message
                    ]
                );

                echo "<p>SMS sent to $phoneNumber with message: $message</p>";
            } else {
                echo "<p>Please enter both phone number and message.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
