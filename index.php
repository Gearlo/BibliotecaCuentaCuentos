<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<meta lang="es">

		<link rel="stylesheet" href="3rd_party/css/bootstrap.min.css">
		<style type="text/css">
			@font-face {
    			font-family: "Angelina";
    			src: url("fonts/angelina.TTF");
			}

			@font-face {
    			font-family: "Aquiline";
    			src: url("fonts/Aquiline.ttf");
			}

			@font-face {
    			font-family: "BlackJack";
    			src: url("fonts/BlackJack.TTF");
			}

			@font-face {
    			font-family: "Zrnic";
    			src: url("fonts/Zrnic.ttf");
			}

			body{
				background-color: #c2c2c2;
				background-image: url("images/argyle.png");
				background-attachment: fixed;
			}

			.borderLin{
				border: solid 1px red;
				/*height: 100%;*/

			}

			.library_bookShelf{
				/*border: solid 1px blue;*/
				padding: 2vh;
			}

			.library_book_cover{
				/*box-shadow: 15px 15px 20px 20 red;*/
				width: 100%;

				height: auto;
				border-radius: 15px 15px 15px 15px;
				transition: all 500ms ease-in-out;
				display: block;
				transform: translate(0px, 0px);
				transition: all 500ms ease-in-out;
				transition-delay: 0.6s;
				z-index: 2;

			}

			.library_bookWrap:hover .library_book_cover {
  				transform: translate(0px, -95%);
			}

			.library_bookWrap:hover .sinopsis {
  				opacity: 1;


			}

			.library_bookWrap.h {
  				overflow: hidden;
			}

			.sinopsis{
				opacity: 0;
				display: block;
				position: absolute;
				z-index: 1;
				
				transition: all 1000ms ease-in-out;
				transition-delay: 0.6s;

				top: 10%;
				width: 80%;
				left: 10%;
				height: 60%;
				text-align: justify; 

				font-family: "BlackJack";
				font-size: large;

			}

			.library_bookWrap > h4{
				font-family: Angelina;
				font-weight: bold;
				font-size: x-large;
				text-shadow: 0 0 5px #9b9b9b;
				text-align: right
			}

			.library_bookWrap > h6{
				font-family: Angelina;
				font-size: large;
				color: #9b9b9b;
				text-align: right;
				
			}

			.library_bookWrap{
				padding: 2vh;
				background-color: white;
				box-shadow: 0 0 2px 2px gray;
				border-radius: 15px 15px 15px 15px;
				display: block;
				z-index: -100;
			}

			.modalBack{
				width: 100px;
				height: 100px;
				
				display: none;
				position: fixed;
				z-index: 1000;
				left: 0; top: 0;
				height: 100vh; width: 100%;
				background-image: url("images/modal-background.png");
				background-repeat: no-repeat;
				background-size: 100% 100%;
				overflow: auto;


			}

			.modalFrame{
				position: relative;
				width: 86%;
				height: 86vh;
				left: 7%;
				top: 7vh;
				background-color: white;
				box-shadow: 0 0 3px 3px black;
				border-radius: 30px 30px 30px 30px;

			}

			.modalContent{
				height: 100%;
				width: 100%;
			}

			.reader_container{
				position: relative;
				top: 0%;
				height: 90%;
				width: 100%;
				margin: 0;
			}

			.reader_row{
				position: relative;
				height: 100%;
				width: 100%;
				margin: 0;
			}
			.reader_blackboard{
				/*background-color: #170f00;
				box-shadow: inset 0 0 15px 5px black;
				border-radius: 10px 10px 10px 10px;*/
				position: relative;
				height: 100%;
				text-align: center;
			}

			.reader_bookTitle{
				height: 5%;
				text-align: center;
				font-family: Angelina;
				
				font-weight: bold;
				text-shadow: 0 0 5px #9b9b9b;

			}

			.reader_progressBar{
				height: 2%;
				
			}

			.reader_progress{

				position: relative;
				height: 60%;
				top: 20%;
				width: 0%;
				
			}

			.reader_bookClose{
				text-align: right;
				height: 5%;
			}


			.reader_spaces{
				height: 100%;
			}

			.reader_config{
				position: absolute;
				left: 40%;
				top: 10%;
				background-color: rgba(0,0,0,0.5);
				border-radius: 10px 10px 10px 10px;
				height: 100px;
				width: 200px;
				padding-left: 20px;
				margin: 0;
				color: white;
				
				display: none;
			}

			.reader_config > select{
				color: black;
			}



			.theme_sepia_blackboard{
				background-color: #836145;
				box-shadow: inset 0 0 15px 5px #9d7c5b;
				border-radius: 20px 20px 0 0;
				color: white;
				font-family: Aquiline;
				font-size: 4em;
				color: white;
				text-shadow: 0 0 10px #2e1c0e;
				padding-top: 25vh;
			}
			.theme_sepia_progressBar{
				background-color: #2e1c0e;
				border-radius: 0 0 20px 20px;
			}
			.theme_sepia_progress{
				background-color: #fef0c3;
				box-shadow: 0 0 2px 2px #856445;
			}

			.theme_claro_blackboard{
				background-color: #d4d4d4;
				box-shadow: inset 0 0 15px 5px #8c8c8c;
				border-radius: 5px 5px 0px 0px;
				color: white;
				font-family: Aquiline;
				font-size: 4em;
				color: #727272;
				text-shadow: 0 0 10px #9d9d9d;
				padding-top: 25vh;
			}
			.theme_claro_progressBar{
				background-color: #d4d4d4;
				border-radius: 0px 0px 5px 5px;
			}
			.theme_claro_progress{
				background-color: #727272;
				box-shadow: 0 0 1px 1px gray;
			}

			.theme_obscuro_blackboard{
				background-color: #161616;
				box-shadow: inset 0 0 15px 5px black;
				border-radius: 5px 5px 0px 0px;
				color: white;
				font-family: BlackJack;
				font-size: 4em;
				color: white;
				text-shadow: 0 0 10px #6f6f6f;
				padding-top: 25vh;
			}
			.theme_obscuro_progressBar{
				background-color: #161616;
				border-radius: 0px 0px 5px 5px;
			}
			.theme_obscuro_progress{
				background-color: white;
				box-shadow: 0 0 1px 1px gray;
			}

			.theme_altoContraste_blackboard{
				background-color: black;
				box-shadow: inset 0 0 15px 5px #050f00;
				border-radius: 10px 10px 0px 0px;
				color: white;
				font-family: Zrnic;
				font-size: 5em;
				color: #70ff31;
				text-shadow: 0 0 10px #1d5f00;
				padding-top: 25vh;
			}
			.theme_altoContraste_progressBar{
				background-color: black;
				border-radius: 0px 0px 5px 5px;
			}
			.theme_altoContraste_progress{
				background-color: #70ff31;
				
			}

			nav{
				height: 5vh;
				width: 100%;
				background-color: rgba(0, 0, 0, 0.9);

			}

			.page_title{
				color: white;
				text-align: center;
				font-family: Angelina;
				font-size: x-large;
				font-weight: bold;
				text-shadow: 0 0 5px #9b9b9b;
			}

			.glyphicon{
				font-size: x-large;
			}

			.glyphicon-circle-arrow-up{
				color: white;
			}

			h3{
				text-align: center;

			}

			.loader_spaces{
				height: 100%;
			}

			.loader_controls{
				height: 100%;
			}

			input{
				border-radius: 10px 10px 10px 10px;
			}

			textarea{
				border-radius: 10px 10px 10px 10px;
			}

			#error_label{
				color: red;
			}

			#splashBack{
				height: 100vh;
				width: 100%;

				background-color: #161616;
				box-shadow: inset 0 0 30px 10px black;
				color: white;
				animation-duration: 2s;
  				animation-name: fundido_a_claro;
  				animation-delay: 4s;

			}

			#splashTitle{
				color: white;
				text-align: center;
				font-family: Angelina;
				font-size: 3em;
				font-weight: bold;
				text-shadow: 0 0 5px #9b9b9b;
				position: absolute;
				width: 100%;
				top: 20%;
				text-align: center;
				animation-duration: 4s;
  				animation-name: sombra_parpadeante;
			}

			@keyframes fundido_a_claro{
				0%{opacity: 1;}
				100%{opacity: 0;}
			}

			@keyframes sombra_parpadeante{
				0%{text-shadow: 0 0 25px #9b9b9b;}
				20%{text-shadow: 0 0 15px black;}
				40%{text-shadow: 0 0 25px #9b9b9b;}
				60%{text-shadow: 0 0 15px black;}
				80%{text-shadow: 0 0 25px #9b9b9b;}
				100%{text-shadow: 0 0 15px black;}
			}



			.c{
				position: absolute;
				color: white;
				font-size: 2em;
				animation-name: circles_an;
				animation-iteration-count: infinite;
				text-shadow: 0 0 5px #9b9b9b;
			}

			#c1{animation-duration: 2s;}
			#c2{animation-duration: 3s;}
			#c3{animation-duration: 1s;}
			#c4{animation-duration: 1.5s;}
			#c5{animation-duration: 4s;}
			#c6{animation-duration: 3.5s;}
			#c7{animation-duration: 6.5s;}
			#c8{animation-duration: 5.5s;}
			#c9{animation-duration: 4.5s;}
			#c0{animation-duration: 2.5s;}

			@keyframes circles_an{
				0%{left: 50%; top:40vh;}
				25%{left: 60%; top:50vh;}
				50%{left: 50%; top:60vh;}
				75%{left: 40%; top:50vh;}
				100%{left: 50%; top:40vh;}
			}
		</style>


		<title>La Biblioteca del Cuenta Cuentos</title>
	</head>

	<body>
		<div id="splashBack"> 
		<div id="splashTitle">La Biblioteca del Cuenta Cuentas</div>
		<div id="c0" class="c">°</div> 
		<div id="c1" class="c">°</div> 
		<div id="c2" class="c">°</div> 
		<div id="c3" class="c">°</div>
		<div id="c4" class="c">°</div> 
		<div id="c5" class="c">°</div> 
		<div id="c6" class="c">°</div> 
		<div id="c7" class="c">°</div> 
		<div id="c8" class="c">°</div> 
		<div id="c9" class="c">°</div> 
		</div>
		

		<script src="3rd_party/js/jquery-2.js"></script>
		<script src="3rd_party/js/bootstrap.min.js"></script>
		<script src="3rd_party/js/Concurrent.Thread.js"></script>
		<script>
			var BOOK; var currentWord = 0; var playing = false; var wordsNumber; var wordsSpeed = 350;
			var config_visible = false;
			
			$.post("getConfig.php", {'query':'get_config'}, function(result){
					conf = JSON.parse(result);
					wordsSpeed = conf["speed"];
					Concurrent.Thread.create(play_thread);
			});

			function pause_play(){
				if(playing){
					playing = false;
				}else{
					playing = true;
				}
			}

			function play_thread(){
				setTimeout(play_update, (60.0/wordsSpeed)*1000);
			}

			function play_update(){
				if(playing && currentWord < wordsNumber){
					currentWord++;
					$(".reader_blackboard").text(BOOK[currentWord]);
					$(".reader_progress").css("width", (currentWord/wordsNumber)*100 + "%");
					//console.log((60.0/wordsSpeed)*1000);
					//console.log((60.0/wordsSpeed)*1000);
				}
				setTimeout(play_update, (60.0/wordsSpeed)*1000);

			}

			$(function(){
				setTimeout(function(){
					$.post("loadLibrary.php",{},function($result){
						$("body").html($result);
					});

				}, 5000);
					
			});


			function readBook(bookId){
				$.post("getBookReader.php",{},function($result){ $(".modalContent").html($result);});
				$.post("getConfig.php", {'query':'get_config'}, function(result){
					conf = JSON.parse(result);
					themeApply(conf["theme"]);
					wordsSpeed = conf["speed"];
				});

				$(".modalBack").show();
				$.post("library.php",{"query":"book_info", "id":bookId},function(result){
					BOOK = JSON.parse(result); 
					$(".reader_bookTitle").text(BOOK["autor"] + " - " +  BOOK["name"] + " ; " + BOOK["wordsNumber"] + " palabras");
					wordsNumber = BOOK["wordsNumber"]; 
				});
				$.post("library.php",{"query":"book_words",  "id": bookId}, loadBook);
				
			}

			function changeConf(){
				clearTheme();
				theme = $("#themesList").val();
				speed = $("#speedsList").val();
				themeApply(theme);
				wordsSpeed = speed;
				$.post("getConfig.php",{"query":"set_config", "theme":theme, "speed":speed},function(r){});

				//console.log($("#themesList").val());

			}

			function clearTheme(){
				$(".reader_blackboard").removeClass("theme_sepia_blackboard");
				$(".reader_progressBar").removeClass("theme_sepia_progressBar");
				$(".reader_progress").removeClass("theme_sepia_progress");

				$(".reader_blackboard").removeClass("theme_claro_blackboard");
				$(".reader_progressBar").removeClass("theme_claro_progressBar");
				$(".reader_progress").removeClass("theme_claro_progress");

				$(".reader_blackboard").removeClass("theme_obscuro_blackboard");
				$(".reader_progressBar").removeClass("theme_obscuro_progressBar");
				$(".reader_progress").removeClass("theme_obscuro_progress");

				$(".reader_blackboard").removeClass("theme_altoContraste_blackboard");
				$(".reader_progressBar").removeClass("theme_altoContraste_progressBar");
				$(".reader_progress").removeClass("theme_altoContraste_progress");

			}

			function themeApply(theme){

				switch(theme){
					case 'sepia':
						$(".reader_blackboard").addClass("theme_sepia_blackboard");
						$(".reader_progressBar").addClass("theme_sepia_progressBar");
						$(".reader_progress").addClass("theme_sepia_progress");
						break;
					case 'claro':
						$(".reader_blackboard").addClass("theme_claro_blackboard");
						$(".reader_progressBar").addClass("theme_claro_progressBar");
						$(".reader_progress").addClass("theme_claro_progress");
						break;
					case 'obscuro':
						$(".reader_blackboard").addClass("theme_obscuro_blackboard");
						$(".reader_progressBar").addClass("theme_obscuro_progressBar");
						$(".reader_progress").addClass("theme_obscuro_progress");
						break;
					case 'alto contraste':
						$(".reader_blackboard").addClass("theme_altoContraste_blackboard");
						$(".reader_progressBar").addClass("theme_altoContraste_progressBar");
						$(".reader_progress").addClass("theme_altoContraste_progress");
						break;
					default:	
						themeApply('sepia');	
						console.log("tema no encontrado...");					
						break;
				}
				
			}

			function progressBarClick(ev,el){
				console.log("progress...");
				var l = $(".reader_progressBar").position();
				var x = ev.pageX;
    			var y = ev.pageY;
    			
    		    console.log(x + " " + $(".reader_progressBar").position().left + " " +el.offsetLeft);

			}

			function loadBook(result){
				BOOK = JSON.parse(result);
				$(".reader_blackboard").text(BOOK[0]);

				//bookPlayer();
				//playing = true;
				
			}

			function closeReader(){
				playing = false;
				currentWord = 0;
				wordsNumber = null;
				BOOK = null;

				//console.log("cerrado");
				$(".modalBack").hide();
				$(".modalContent").html("");
			}

			function config_show(){
				if(config_visible == true){
					$(".reader_config").hide();
					config_visible = false;
				}else{

					$(".reader_config").show();
					config_visible = true;
					$.post("getConfig.php", {'query':'get_config'}, function(result){
						conf = JSON.parse(result);
						$("#themesList").val(conf["theme"]);
						$("#speedsList").val(conf["speed"]);
					});

				}
			}

			function get_uploader(){
				$.post("getBookUploader.php",{},function($result){ 
					$(".modalContent").html($result); 
					$("#upload_form").submit( upload_Book );
				});
				$(".modalBack").show();
				

			}
			
			function upload_Book(e){
				
				if( $("#book_name").val() != "" && $("#book_autor").val() != "" && $("#book_sinopsis").val() != ""	){
					console.log($("#book_name").val());
					console.log($("#book_autor").val());
					console.log($("#book_sinopsis").val());

					var formData = new FormData(document.getElementById("upload_form"));
        			$.ajax({
                		url: "uploadBook.php",
                		type: "post",
                		dataType: "html",
                		data: formData,
                		cache: false,
                		contentType: false,
                		processData: false
        			}).done(function(res){
                    	if(res != ""){
                    		e.preventDefault();
                    		$("#error_label").text(res);
                    	}else{
                    		$(".modalContent").html("");
                    	}
        			});
        			

				}else{

					$("#error_label").text("ERROR: todos los datos deben ser llenados");
					setTimeout(function(){ $("#error_label").text("");} , 2000);
					e.preventDefault();

				}
			}

			
		</script> 
	</body>
</html>
