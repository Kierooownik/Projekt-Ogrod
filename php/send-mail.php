<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "chopinek93@gmail.com";
$email_subject = .$_POST['name']" - pisze w sprawie: ".$_POST["mail-Subject"];

    function problem($error)
    {
        echo "Przepraszamy, wykryto błędy w formularzu. ";
        echo $error . "<br><br>";
        echo "Proszę uzupełnić formularz poprawnie.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST["Name"]) ||
        !isset($_POST["Email"]) ||
		!isset($_POST["mail-Subject"]) ||
        !isset($_POST["Message"])
    ) {
        problem('Przepraszamy ale wygląda na to, że nie uzupełniono wszystkich potrzebnych danych.');
    }

    $name = $_POST["Name"]; // required
    $email = $_POST["Email"]; // required
	$subject = $_POST["mail-Subject"]; // required
    $message = $_POST["Message"]; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'Niepoprawne imię.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'Wiadomość nie wygląda na poprawną.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Zapytanie z formularza poniżej:\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Dziękuję za wiadomość. Niedługo się z Tobą skontaktuje.

<?php
}
?>