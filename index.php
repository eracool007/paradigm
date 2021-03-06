<?php

if (isset($_POST['send'])) {
	
	$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

	$errorMsg ="Error ";
	
	$name = $POST['name'];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $errorMsg = $errorMsg . ", only letters and white space allowed";
    }
	// validate email
	if (!filter_var($POST['email'], FILTER_VALIDATE_EMAIL)) {
		$emailErr = $errorMsg . ", invalid email format";
	  }
  
	if($errorMsg == "Error "){
		$isError = false;
		echo ("dans le else");
		//$name = $POST['name'];
		$to = "point7test@gmail.com";
		$email = strip_tags($POST['email']);
		$subject = "Web form";
		$comment = '<p>Message received from: ' . $name . '</p> 
				<p>Email: ' . $email . '</p>
				<p>Comment: ' . strip_tags($POST['comment']) . '</p>';
		
		$headers = [
			'MIME-Version' => 'MIME-Version: 1.0',
			'Content-type' => 'text/html; charset=UTF-8',
			'From' => $name,
			'Reply-to' => $email,
		];
		
		try {
			mail($to, $subject, $comment, $headers);
			echo "<script> alert('email sent') </script>";
		} catch (Exception $e){
			echo "<script> alert('Message could not be sent')";
		} 

		header("location: index.php");
		exit;	
	} else {
		$isError = true;
	}
} else {
	$isError=false;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Paradigm</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans_old:400,500,700|Google+Sans+Text:400">
		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans+Text:400&amp;text=%E2%86%90%E2%86%92%E2%86%91%E2%86%93">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="./assets/css/main.css" />
	</head>
	<body>

<div class="w3-top">
	<ul class="w3-navbar" id="myNavbar">
	  <li class="w3-hide-small w3-right">
		<a href="#contact" class="w3-padding-large">Contact</a>
	  </li>
	  <li class="w3-hide-small w3-right">
		<a href="#portfolio" class="w3-padding-large">Portfolio</a>
	  </li>
	  <li class="w3-hide-small w3-right">
		<a href="#about" class="w3-padding-large">About</a>
	  </li>
	</ul>
  </div>

  <!-- First Parallax Image with Logo Text -->
  <div class="bgimg-1 w3-opacity w3-display-container">
	<div class="w3-display-middle" style="white-space:nowrap;">
	  <h1 class="w3-center w3-padding-xlarge w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">MCLAUGHLIN</span></h1>
	</div>
  </div>
  
  <!-- Container (About Section) -->
  <div class="w3-content w3-container w3-padding-64" id="about">
	<h2 class="w3-center">ABOUT ME</h2>
	<p class="w3-center"><em>Bacon ipsum dolor amet</em></p>
	<p>Bacon ipsum dolor amet ground round shankle frankfurter, pork chop spare ribs landjaeger drumstick pig tri-tip tenderloin. Biltong strip steak turducken ham hock swine frankfurter pig doner short loin pork buffalo meatloaf fatback turkey tongue. Corned beef flank strip steak t-bone jowl sirloin pork loin brisket. Sausage leberkas spare ribs picanha pork belly, porchetta hamburger shankle shank. Turducken drumstick bresaola shankle, ball tip landjaeger tongue flank. Bacon turducken turkey boudin, ham hock swine drumstick alcatra chicken porchetta.</p>
	<!--  Profile Picture and Description  -->
	<div class="w3-row">
	  <div class="w3-col m6 w3-center w3-section">
		<img src="https://avatars.dicebear.com/api/adventurer/your-custom-seed.svg" id="profile" class="w3-circle" alt="Photo of Me">
	  </div>
  
	  <!-- Hide this text on small devices -->
	  <div class="w3-col m6 w3-hide-small w3-section">
		<p>Bacon ipsum dolor amet ground round shankle frankfurter, pork chop spare ribs landjaeger drumstick pig tri-tip tenderloin</p>
	  </div>
	</div>
  </div>
  
  <!-- Second Parallax Image with Portfolio Text -->
  <div class="bgimg-2 w3-display-container" id="portfolio">
	<div class="w3-display-middle">
	  <span class="w3-xxlarge w3-text-light-grey w3-wide">PORTFOLIO</span>
	</div>
  </div>
  
  <!-- Container (Portfolio Section) -->
  <div class="w3-content w3-container w3-padding-64">
	<h2 class="w3-center">PORTFOLIO</h2>
	<p class="w3-center"><em>Warm up laptop with butt lick butt fart rainbows until owner yells pee in<br> litter box hiss at cats flex claws on the human's belly and purr like a lawnmower</em></p><br>
  
	<!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
	<div class="w3-row-padding w3-center">
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/300?random" style="width:100%" class="w3-hover-opacity" data-url="https://unsplash.it/400/300?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/301?random" style="width:100%"  class="w3-hover-opacity" data-url="https://unsplash.it/400/301?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/302?random" style="width:100%"  class="w3-hover-opacity" data-url="https://unsplash.it/400/302?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/303?random" style="width:100%"  class="w3-hover-opacity" data-url="https://unsplash.it/400/303?random">
	  </div>
	</div>
  
	<div class="w3-row-padding w3-center w3-section">
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/304?random" style="width:100%"  class="w3-hover-opacity" data-url="https://unsplash.it/400/304?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/305?random" style="width:100%" class="w3-hover-opacity" data-url="https://unsplash.it/400/305?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/306?random" style="width:100%" class="w3-hover-opacity" data-url="https://unsplash.it/400/306?random">
	  </div>
  
	  <div class="w3-col m3">
		<img src="https://unsplash.it/400/307?random" style="width:100%" class="w3-hover-opacity" data-url="https://unsplash.it/400/307?random">
	  </div>
	</div>
  </div>
  
  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
	<span class="w3-closebtn w3-hover-red w3-text-white w3-xxxlarge w3-container w3-display-topright">??</span>
	<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
	  <img id="img01" style="max-width:100%">
	</div>
  </div>
  
  <!-- Third Parallax Image with Portfolio Text -->
  <div class="bgimg-3 w3-display-container" id="contact">
	<div class="w3-display-middle">
	  <h2 class="w3-xxlarge w3-text-light-grey w3-wide">CONTACT</h2>
	</div>
  </div>
  
  <!-- Container (Contact Section) -->
  <div class="w3-content w3-container w3-padding-64">
	<h3 class="w3-center">LOREM IPSUM</h3>
	<p class="w3-center"><em>lorem ipsum</em></p>
  
	<address class="w3-row w3-padding-32 w3-section">
	  <div class="w3-col m4 w3-container">
		  <!-- ADD MAP TODO -->
	  </div>
	  <div class="w3-col m8 w3-container w3-section">
		<div class="w3-large w3-margin-bottom">
		  <i class="fa fa-map-marker w3-hover-text-black" style="width:30px"></i> Quebec, Canada<br>
		  <i class="fa fa-phone w3-hover-text-black" style="width:30px"></i> Phone: 000-000-0000<br>
		  <i class="fa fa-envelope w3-hover-text-black" style="width:30px"> </i> Email: email@gmail.com<br>
		</div>
		<p>Bacon ipsum dolor amet ground round shankle frankfurter:</p>
		<!-- Check if error -->
		<?php 
			if($isError == true){ 
				echo "<script>alert('" . $errorMsg . "');</script>";
			
			} else { 
				echo "<script>alert('Your message has been sent'); </script>";
			}
		?>
		<form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
			<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
		  	<div class="w3-half">
				<input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="Name" name="name" required>
		 	 </div>
		  	<div class="w3-half">
				<input class="w3-input w3-border w3-hover-light-grey" type="email" required placeholder="Email" name="email">
		  	</div>
			</div>
            <input class="w3-input w3-border w3-hover-light-grey" type="text" placeholder="Comment" name="comment" required>
            <input type="submit" name="send" value="Send" class="w3-btn w3-right w3-section">
		</form>
	   </div>	
	</address>
  </div>
  
  <!-- Footer -->
  <footer class="w3-center w3-dark-grey w3-padding-48 w3-hover-black cf">
	<div class="w3-half">
	  <a target="_blank" href="#">
		<i class="fa fa-fire fa-2x"></i>
	  </a>
	  <a target="_blank" href="#">
		<i class="fa fa-facebook fa-2x"></i>
	  </a>
	  <a target="_blank" href="#">
		<i class="fa fa-codepen fa-2x"></i>
	  </a>
	</div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js"></script>
		<script src="./assets/js/main.js"></script>

	</body>
</html>
