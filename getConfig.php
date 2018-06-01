<?php 
if(isset($_POST['query'])){
	$config_url = "config/" . $_SERVER['REMOTE_ADDR'] . "/config.php";
	
	switch ($_POST["query"]) {
		case 'get_config':
			if (file_exists ( $config_url )){
				include("config/" . $_SERVER['REMOTE_ADDR'] . "/config.php");
				echo json_encode($config);

			}else{
				include('config/opts.php');
				mkdir("config/" . $_SERVER['REMOTE_ADDR'], 0777);
				$fileConf = fopen($config_url, "w");
				fwrite($fileConf, "<?php  \$config = array( 'theme'=>'" . $themes[0] . "', 'speed'=>'" . $speed[0] . "' );  ?>" . PHP_EOL);
				fclose($fileConf);
				$config = array( 'theme'=> $themes[0] , 'speed'=> $speed[0] );
				echo json_encode($config);
			}
			break;
		case 'set_config':
			$config_url = "config/" . $_SERVER['REMOTE_ADDR'] . "/config.php";
			$fileConf = fopen($config_url, "w");
				fwrite($fileConf, "<?php  \$config = array( 'theme'=>'" . $_POST["theme"] . "', 'speed'=>'" . $_POST["speed"] . "' );  ?>" . PHP_EOL);
				fclose($fileConf);
			break;
		default:
            echo "";
            break;

	}
	
}


?>