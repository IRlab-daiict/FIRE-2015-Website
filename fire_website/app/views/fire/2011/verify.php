<html>
<?php
   require_once('recaptchalib.php');
   $privatekey = "6Ldp48kSAAAAANsRyKk6EPADIP-3LxzMoFnMTsCb";
   $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

   if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
    "(reCAPTCHA said: " . $resp->error . ")");
   } else {
    // Your code here to handle a successful verification
   }

$file="reg_info_2011.txt";
if ($fp=fopen($file, "a+")) {
	foreach ($_POST as $key => $value) {
                if ( $key == "submit" ) {
                   date_default_timezone_set("Asia/Calcutta");
                   fwrite($fp, "Time:" . date(DATE_RFC822) . "\n");
                   fwrite($fp, "#\n\n\n");
                }
                else if ( $key == "Address" ) {
                   // Glue the address lines by pipes.
                   $a = explode("\r\n", $value);
                   $s = implode("|", $a);
                   fwrite($fp, $key . ":" . $s . "\n");
                }
                else
		   fwrite($fp, $key . ":" . $value . "\n");
	}
	fclose($fp);
        echo "Done. Please remember to fill up, sign, and (snail/e)mail us the organisational data-access form too. <br/>";
	echo "<a href=\"/fire\">Back home.</a> <br/>";
}
else {
     echo "Failed somehow, please tell <a href=\"http://groups.google.com/group/fire-list\">fire-list</a>.\n";
}
?>
</html>
