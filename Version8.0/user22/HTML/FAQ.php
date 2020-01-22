<?php
$apiKey = "3725c1837a14e1a1eb47fda5c863b067"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'metric'){//Changes the $temp varaible to match 
    $temp = "C";
}
else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<!doctype html>
<html>
<head>
	<div id="Script and stlye">
	<link href="../CSS/day.css" rel="stylesheet" type="text/css">
	<script src="../JS/jquery-3.4.1.js"></script>
    <title>FAQ</title>
	</div>
<style>
.report-container {
    border: #E0E0E0 1px solid;
    padding: 20px 40px 40px 40px;
    border-radius: 2px;
    width: 550px;
    margin: 0 auto;
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #212121;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    margin-left: 15px;
    color: #929292;
}

.time {
    line-height: 25px;
}
	
	</style>
	
</head>
<body>
<div class="topnav">
	<a href="../index.html">Home</a>
	<a href="webDevUser22_music.html">Food</a>
	<a href="WebDevUser22_Games.html">Bad Games</a>
	<a href="WebDevUser22_lists.html">IDK</a>
	<a class="active" href="FAQ.php">FAQ</a>
	<a href="../kanji.php">Kanji Ranking</a>
	<div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Settings
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
	<div id="stylebutton" display="block">
		<button data-file="day" class="button" id="light">Light Mode</button>
		<button data-file="night" class="button">Objectivly Better Mode</button>
	</div>
  </div>	
  </div> 
</div>
<h1>Weather</h1>
<div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("F jS, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
		<div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?><span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>
	<h1>FAQ</h1>
<div  class="FAQdown"><dl>
<dt>What is this website?</dt>
<dd>Good Question</dd>
<dt>Whats with the Pokemon in your image functions?</dt>
<dd>It's the first thing i thought of when i needed an image</dd>
<dt>I like the night mode</dt>
<dd>Thats because you're not an animal</dd>
	
</dl></div>
<div id="trubbish">
	<img src="https://cdn.bulbagarden.net/upload/e/e2/568Trubbish.png">
</div>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
<script>
	var link = $('link');
	$('#stylebutton .button').on('click', function() {	
			var $this = $(this);
			var stylesheet = $(this).data('file');
			link.attr('href', '../' + 'CSS/' + stylesheet + '.css');
			$this
			.siblings('button')
				.removeAttr('disabled')
				.end()
				.attr('disabled', 'disabled')
	});

	$('#fontchange #initial').on('click', function() {
		var button1 = document.getElementById("positive");
		var button2 = document.getElementById("negative");
		(button1).style.visibility = 'visible';
		(button2).style.visibility = 'visible';
	});
	$('#fontchange #positive').on('click', function() {
		var fontSize = parseInt($("body").css("font-size"));
		fontSize = fontSize + 3 + "px";
		$("body").css({'font-size':fontSize});
	});
	$('#fontchange #negative').on('click', function() {
		var fontSize = parseInt($("body").css("font-size"));
		fontSize = fontSize - 3 + "px";
		$("body").css({'font-size':fontSize});
	});
	$('#challengebutton #revealer').on('click', function() {
		var revealer = document.getElementById("revealer");
		revealer.innerHTML="Are you really?"
		var button1 = document.getElementById("revealed1");
		(button1).style.visibility = 'visible';
		var button2 = document.getElementById("revealed2");
		(button2).style.visibility = 'visible';
});
	$('#challengebutton #revealed1').on('click', function() {
		var x = document.getElementById("textbubble");
		x.style.visibility = 'visible';
	});
	$('#challengebutton #revealed2').on('click', function() {
		var revealer = document.getElementById("revealer");
		revealer.innerHTML="You up for a challenge?"
		var button1 = document.getElementById("revealed1");
		(button1).style.visibility = 'hidden';
		var button2 = document.getElementById("revealed2");
		(button2).style.visibility = 'hidden';
		var x = document.getElementById("textbubble");
		x.style.visibility = 'hidden';
	});
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
<script>

	
(function() {	
	$('dd').filter(':nth-child(n)').addClass('hide');
	$('dl').on('mouseout', 'dt', function() {
		$(this).next().slideUp(200)
	});
	$('dl').on('mouseover', 'dt', function() {
		$(this)
			.next()
				.slideDown(200)

	});

})();
$(document).ready(function() {
	var $this = document.getElementById("light");
	$($this).attr('disabled', 'disabled')
});
</script>
</body>
</html>