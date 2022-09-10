 <?php
    // Checking if form has been posted
    if ($_POST) {
      // Email Address destination
      $to = "chopinek93@gmail.com";
      // Email subject
      $subject = "I am a ".$_POST["mail-Subject"];
      // Email body
      $body = "test";
      // Mailing
      if (mail($to, $subject, $body)) {
        // Successfully sent
        echo('<div class="msg success">Email successfully sent!</div>');
      } else {
        // Failed
        echo('<h1 class="msg error">Email delivery failed…</h1>');
      }
    }
  ?>