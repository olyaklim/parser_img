
<!DOCTYPE HTML>
<html lang="ru">
<html>
<head>
	<meta charset="utf-8">
	<title>parser</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheet/my.css" rel="stylesheet">
	
</head>
<html>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<div class="calculator">

					<h1>Парсер картинок</h1>

					<form id="form" method="post" class="form-inline">
					
						<div class="form-group">	
							<label class="control-label" for="site_domain">Ссылка на сайт:</label>						
							<input id="site_domain" class="form-control" type="text" name="site_domain" required  placeholder="сайт" value="http://bulat.ua/">
						</div>								

						<button type="submit" value="send" class="btn btn-success">Спарсить</button>		
						<br>
						
					</form>
				
					<h4 id="result"></h4>				
					<h5 id="result_link"></h5>
				</div>
			</div>	
		</div>
	</div>	

	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>

<script src="script.js"></script>



