<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h2>Kayıt Ol</h2>	<br>
	<form method="POST">
		Kullanıcı Adı: <input type="text" name="gName">
		<br>
		Şifre: <input type="text" name="gPass">
		<br>
		<input type="submit">
	</form>
	<h2>Giriş Yap</h2> <br>
	<form method="POST">
		Kullanıcı Adı: <input type="text" name="rName">
		<br>
		Şifre: <input type="text" name="rPass">
		<br>
		<input type="submit">
	</form>
	<?php
		if(isset($_POST["gName"]) and isset($_POST["gPass"])){
			$gName = $_POST["gName"];
			$gPass = $_POST["gPass"];
			$gNametxt = fopen($gName.".txt","w");
			$gPasstxt = fopen($gPass.".txt","w");
			fwrite($gNametxt,$gName);
			fwrite($gPasstxt,$gPass);
		}
		if(isset($_POST["rName"]) and isset($_POST["rPass"])){
			$rPass = $_POST["rPass"];
			$rName = $_POST["rName"];
			if(file_exists($rName.".txt") and file_exists($rPass.".txt")){
				$aName = fopen($rName.".txt","r");
				$aPass = fopen($rPass.".txt","r");
				if($rName == fread($aName,filesize($rName.".txt")) and $rPass == fread($aPass,filesize($rPass.".txt"))){
					echo "Giriş Başarılı!";
				}
			}
			else{
				echo "Giriş Başarısız";
				die();
			}
		}
	?>
</body>
</html>