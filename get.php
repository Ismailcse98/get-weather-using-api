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
	<div class="container bg-primary">
<?php 
if(isset($_POST['submit'])){
	$name = $_POST['cityname'];
	if(empty($name)){
		header('Location:index.php?true');
	}else{

	$api = "https://api.openweathermap.org/data/2.5/weather?q=".$name."&appid=ea87a05f01cb135be0fa59ab7a874427";
	@$data = json_decode(file_get_contents($api),true);
	if(isset($data)){
	$get = json_decode(file_get_contents('http://ip-api.com/json'),true);
	date_default_timezone_set($get['timezone']);


	$temp = $data['main']['temp'];
	$icon = $data['weather'][0]['icon'];
	$visibility = $data['visibility'];
	$visibilityKm = $visibility/1000;

	$logo = 'https://openweathermap.org/img/w/'.$icon.'.png';
	$description = $data['weather'][0]['description'];
	$temperature = $temp.'°C';
	$clouds = $data['clouds']['all'].'%';
	$humidity = $data['main']['humidity'].'%';
	$windSpeed = $data['wind']['speed'].'m/s';
	$pressure = $data['main']['pressure'].'hpa';
	$visibility = $visibilityKm.'km';
	$sunrise = date('h:i A',$data['sys']['sunrise']);
	$sunset = date('h:i A',$data['sys']['sunset']);


?>
		<h1>Weather App</h1>
		<h3>Weather Details of <?php echo $data['name'];?></h3>
		<table class="table table-bordered text-center" style="font-size: 18px;">
			<tr>
				<td>Logo</td>
				<td><img src="<?php echo $logo; ?>" alt="Image not found"></td>
			</tr>
			<tr>
				<td>Temperature</td>
				<td><?php echo $temperature;?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php echo $description;?></td>
			</tr>
			<tr>
				<td>Clouds</td>
				<td><?php echo $clouds;?></td>
			</tr>
			<tr>
				<td>Humidity</td>
				<td><?php echo $humidity;?></td>
			</tr>
			<tr>
				<td>Wind Speed</td>
				<td><?php echo $windSpeed;?></td>
			</tr>
			<tr>
				<td>Pressure</td>
				<td><?php echo $pressure;?></td>
			</tr>
			<tr>
				<td>Visibility</td>
				<td><?php echo $visibility;?></td>
			</tr>
			<tr>
				<td>Sunrise</td>
				<td><?php echo $sunrise;?></td>
			</tr>
			<tr>
				<td>Sunset</td>
				<td><?php echo $sunset;?></td>
			</tr>
		</table>
		<p class="text-center">&copy; Md.ismail 2021</p>
	<?php }else{
		echo "No data found";
	} } } else{
		header('Location:index.php');
	} ?>
	</div>
</body>
</html>