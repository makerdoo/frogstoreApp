<?php 							//to display white-spaces in php use <pre> tags

//var_dump($_POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$message = trim($_POST["message"]);

	if ($name == "" OR $email == "" OR $message == "") {
		echo "You really need to enter some private information so we can spy on you.";
		exit;
	}

	foreach( $_POST as $value ) {
		if( stripos($value,'Content-Type: ') !== FALSE ) {		//loops through each element loaded as $value and checks for malicious code. check www.nyphp.org
			echo "Something is not what it seems.";
			exit;
		}
	}
	if ($_POST["address"] != "") {
		echo "You have made a fatal mistake.";
	}

	require_once("incl/phpmailer/PHPMailerAutoload.php");
	require_once("incl/phpmailer/class.smtp.php");
	require_once("incl/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();

	if (!$mail->ValidateAddress($email)) {				// '->' single arrow =  accesses an object and its properties and methods (double arrow'=>' accesses arrays and their keys)
		echo "Uuhhh, there seems to be an error in your email address.";
		exit;
	}

	$email_body = "";
	$email_body = $email_body . "Name: " . $name .  "<br>";
	$email_body = $email_body . "Email: " . $email . "<br>";		
	$email_body = $email_body . "Message : " . $message; 

	$mail->IsSMTP();
	$mail->SMTPAuth = false;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 26;
	$mail->Username = "####-%%%%-@@@";
	$mail->Password = "####-%%%%-####";

	$mail->SetFrom($email, $name);									//sets Object $mail to have only one name and address in the 'from' field when sent.
    $address = "makerdoo3000@gmail.com";							//recipients address
    $mail->AddAddress($address, "Make.Do.");
    $mail->Subject    = "Make.Contact. | " . $name;		            //email subject line 
    $mail->MsgHTML($email_body);

     if(!$mail->Send()) {
      echo "There was a problem sending the email: " . $mail->ErrorInfo;
      exit;
    }

header("Location: contact.php?status=thanks");				//redirects to the auto thank you
exit;												//immediately stops anymore php in the file from running
}

?>

<?php
$pageTitle = "Get Ahold of Mike";
$section = "contact";  						
include('incl/header.php'); ?>  				

	<div class="section page">
		<div class = "wrapper">

			<h1>Contact</h1>
 
			<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks")  { ?>  
				<p>You my Friend are a Sucker! All Your Info are Belong To Us!</p>
			<?php } else { ?>

						<p>I&rsquo;d really love to read your emails and <b>not</b> send them straight to junk mail.</p><p>Fill out the form so We can track you and your offspring.</p>
					
						<form method="post" action="contact.php">
							<table>
								<tr>
									<th>
										<img class="branding-title" src="img/branding-title.png">
									</th>
									<td>
										<h1>NSA CollectorBot3000</h1>
									</td>
								</tr>
								<tr>
								    <th>
										<label for="name"><b>Name</b></label>
									</th>
									<td>
										<input type="text" name="name" id="name">
									</td>						
								</tr>
								<tr>
									<th>
										<label for="email"><b>Email</b></label>
									</th>
									<td>
									<input type="text" name="email" id="email">
									</td>						
								</tr>
								<tr>
									<th>
										<label for="message"><b>Message</b></label>
									</th>
									<td>
										<textarea name="message" id="message"></textarea>  
									</td>						
								</tr>
								<tr style="display: none;">						<!-- this tablerow is a spam hoeypot, only a bot can see a 'display: none' text atea and fill it out -->					
									<th>
										<label for="address">Address</label> 
									</th>
									<td>
										<input type="text" name="address" id="address">
										<p>This is a bot trap, do not fill this out.</p>
									</td>						
								</tr>
							</table>
						<input type="submit" value="EeeWee Go!">
					</form>
				<?php } ?>

		</div>
	</div>

<?php include('incl/footer.php'); ?>