<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Weather App</h1>
		<hr>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="get.php" method="POST">
					  <div class="form-group">
					    <label for="distric-name">Enter District Name</label>
					    <input type="text" name="cityname" class="form-control" id="distric-name" >
					  </div>
					  <div class="form-group">
					    <input type="submit" class="form-control btn-primary" name="submit">
					  </div>
					  <?php 
					    if(isset($_GET['true'])){
					    	echo "<h2 style='color:red;'>Please Enter City</h2>";
					    }
					   ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>