<?php
	if ($_FILES['file_text']["error"] > 0 || $_FILES['file_text']["error"] > 0)
		echo $_FILES['file_text']["error"] . "  " .  $_FILES['file_text']["error"];

	
	if($_FILES['file_text']['type']  == 'text/plain'){
		if($_FILES['file_cover']['type'] == 'image/jpeg'){

			$date = getdate();

			$folderName = "books/" . md5($_POST["book_name"] . $date["seconds"] . $date["minutes"] . $date["hours"] . $date["mday"] . $date["month"] . $date["year"]);
	
			mkdir($folderName , 0777 );

			$configFile = fopen($folderName . "/info.php", "w");
			$configCode = "<?php";
			$configCode = $configCode."\n\$sinopsis = '" . $_POST["book_sinopsis"] . "'; \n\n";
			$configCode = $configCode."\n\$bookMeta = array('id'=> '".getNewId()."', 'name' =>'".$_POST["book_name"]."', 'autor' =>'".$_POST["book_autor"]."', 'sinopsis' => \$sinopsis); \n\n";


			$configCode = $configCode . "\n ?>" . PHP_EOL;;

			fwrite($configFile, $configCode);

			fclose($configFile);

			move_uploaded_file($_FILES['file_text']['tmp_name'], $folderName . "/content.txt");
			move_uploaded_file($_FILES['file_cover']['tmp_name'], $folderName . "/cover.jpg");

			//$image = new Imagick($folderName . "/cover.jpg");
			//$image->adaptiveResizeImage(256,414);

		}else{
			echo "Error: el formato de la imagen debe ser jpg";
		}
	}else{
		echo "Error: el formato del libro solo puede ser texto plano";
	}

	echo "";
	function getNewId(){
		$library = opendir('books'); $i = 0;
		while (false !== ($bookDir = readdir($library))){
			if ($bookDir!="." && $bookDir!=".."){
				$i++;	
			}
		}

		$i++;
		if($i < 10){
			$i = "000".$i; 
		}else if($i < 100){
			$i = "00".$i;
		}else if($i < 1000){
			$i = "0".$i;
		}
		return $i;
	}
?>