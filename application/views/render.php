<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<h1 align="center"><?php echo $titulo ?></h1>
	<?php $dato='817e379ebe520a132aa94e88531151b076ec64a2c5d16cc23628d5486e1cb9e0'; ?>
	<img src="<?php echo site_url('Render/QRcode/'.$dato); ?>" >
</body>
</html>