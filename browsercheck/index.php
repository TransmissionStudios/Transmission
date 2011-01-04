<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Transmission - what browser am I using?</title>

	<style type="text/css" media="screen">
	body {
		font: 12px Helvetica, sans-serif;
		background:#191919;
		color:#999;
		margin:0 auto;
		width:400px;
		line-height:1.4;
	}
	
	a {
		color:#999;
	}
	
	h1, h2 {
		font-size:16px;
		color:#e8e8e8;
		margin:30px 0 7px 0;
	}
	
	h2 {
		font-size:14px;
	}
	
	label {
		display:block;
		clear:left;
		float:left;
		width:70px;
		margin:5px;
	}
	
	input, textarea {
		margin: 5px;
		float:left;
		width:200px;
		background:#333;
		border:1px solid #999;
		color:#e8e8e8;
		padding:2px 4px;
	}
	
	textarea {
		font: 12px Helvetica, sans-serif;
		height:80px;
	}
	
	.submit {
		display:block;
		clear:left;	
		width:70px;
		background:#999;
		border:1px solid #afafaf;
		color:#e8e8e8;
		margin-left:85px;
	}	
	
	.error {
		color:#ff0000;
	}
	
	#form {
		height:200px;
	}
	
	#footer {
		clear:left;
	}
	
	#footer p {
		color:#e8e8e8;
		font-weight: bold;
		margin-bottom:3px;
	}	
	</style>

</head>

<body>
	<div id="details">
		<h1>What browser am I using?</h1>
		<p>If you are experiencing an issue with a website, this information may help us to diagnose the problem.</p>
		<h2>Your browser details are:</h2>
		<script type="text/javascript">
		document.write("Browser CodeName: " + navigator.appCodeName);
		document.write("<br />");
		document.write("Browser Name: " + navigator.appName);
		document.write("<br />");
		document.write("Browser Version: " + navigator.appVersion);
		document.write("<br />");
		document.write("Cookies Enabled: " + navigator.cookieEnabled);
		document.write("<br />");
		document.write("Platform: " + navigator.platform);
		document.write("<br />");
		document.write("User-agent header: " + navigator.userAgent);
		</script>
	</div>
	
	<div id="send">
	<?php
		$message = "Please fill in all fields marked <span class='error'>*</span> below";
	
		if($_POST['submit'])
		{
			if($_POST['email'] && $_POST['name'])
			{
				$layout = "User name: $_POST[name]<br />User email: $_POST[email]<br />Comment: $_POST[comment]<br />User agent string: $_SERVER[HTTP_USER_AGENT]";
							
				$to = "richard@transmissionstudios.com";
				$subject = "Browser details";
				$body = $layout;
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-2' . "\r\n";
				$headers .= "From: noreply@transmissionstudios.com \r\n";
				$headers .= "Reply-to: noreply@transmissionstudios.com  \r\n";
				$headers .= "Date: ".date("r")."\r\n";
				mail($to, $subject, $body, $headers);
				
				$success = true;
				$message = 'Your browser details have been sent. Thank you.';
			}
			else
			{
				$message = "<span class='error'>Please fill in all fields marked * below</span>";
			}
			
		}
		?>
		
		<h2>Fill in the form below to send us these details</h2>
		<?php echo $message ?>
		
		<?php if(!$success) {?>	
			<div id="form">
			<form action="<? $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
				<label for="name">Your Name <span class="error">*</span></label><input type="text" name="name" value="<?php echo $_POST['name'] ?>" id="name" /><br />
				<label for="email">Your Email <span class="error">*</span></label><input type="text" name="email" value="<?php echo $_POST['email'] ?>" id="email" /><br />
				<label for="comment">Comments</label><textarea name="comment" rows="8" cols="40"><?php echo $_POST['comment'] ?></textarea>		
				<input type="submit" name="submit" value="Submit" class="submit">
			</form>
			</div>
		<?php } ?>	
		
		<div id="footer">
			<p>Transmission</p>
			t: +44 (0) 20 7622 4421<br />
			e: <a href="mailto:richard@transmissionstudios.com">richard@transmissionstudios.com</a><br />
			18-20 Bromells Road	London SW4 0BJ
		</div>
			
	</div>
</body>
</html>