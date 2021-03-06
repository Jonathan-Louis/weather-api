<?php

	$weather = "";
	$error = "";

	if($_GET['city']){
		
		$urlContents = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=d1452a512a097343bd1d03f7e68d71d0");
		
		$weatherArray = json_decode($urlContents, true);
		
		if($weatherArray['cod'] == 200){
			
			$weather = "The weather in ".$weatherArray['name']." is currently ".$weatherArray['weather'][0]['description'].". ";
			
			$tempInCelcius = $weatherArray['main']['temp'] - 273;
			
			$weather .= " The temperature is ".$tempInCelcius."&deg;C";
		
			
		} else{
			
			$error = "Could not find ".$_GET['city'].".";
		}
	
	} 





?>

<!doctype html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<title>Weather API</title>
		
		<style type="text/css">
		
			html { 
				background: url(background.jpeg) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			
			body{
				background:none;
			}
			
			.container{
				text-align:center;
				margin-top: 150px;
				color:white;
				width: 500px;
			}
			
			input{
				margin-top:5px;
			}
			
			label{
				margin-top:25px;
			}
			
			#weather{
				margin-top:20px;
			}
			
		</style>
		
	</head>
	
	<body>
	
	
		<div class="container">
		
			<h1>What's the Weather?</h1>
			
			<form>
				<div class="form-group">
				
					<label for="city">Enter the name of a city.</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Eg. London, Tokyo" value="<?php echo $_GET['city']; ?>">
				
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
				
			</form>
			
			<div id="weather">
			
				<?php
					
					if($weather){
						echo '<div class="alert alert-primary" role="alert">'.$weather.'</div>';
					} else if($error){
						echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
					}
				
				?>
			</div>
			
		</div>
	
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
		<script type="text/javascript">
			
		</script>
	
	</body>
	
</html>