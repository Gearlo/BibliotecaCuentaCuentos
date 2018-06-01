<?php

 if(isset($_POST["query"])){
    
    switch ($_POST["query"]) {
        case 'book_info':
            $bookInfo = get_Book_Info($_POST["id"]);
            $bookInfo["wordsNumber"] = get_Book_WordsNumber($_POST["id"]);
            $bookInfo["url"] = get_Book_URL($_POST["id"]);
            unset($bookInfo["sinopsis"]);
            echo json_encode($bookInfo);
            break;
        case 'book_words':
            echo json_encode(get_Book_Words(   $_POST["id"]  ));
            break;
        default:
            echo "";
            break;
    }

 }

function get_Books_Info(){
	$jsondata = array();
	$library = opendir('books'); $i = 0;
	while (false !== ($bookDir = readdir($library))){
		if ($bookDir!="." && $bookDir!=".."){
			$book = array();
			$info = "books/" .$bookDir. "/info.php";			
            include($info);
            $book = $bookMeta;
            $book['cover'] =  "books/" .$bookDir . "/cover.jpg";
			$jsondata[$i] = $book;
			$i++;	
		}
	}
	return $jsondata;
};

function get_Book_Info($bookId){
    //$jsondata = array();
    $library = opendir('books'); $i = 0;
    while (false !== ($bookDir = readdir($library))){
        if ($bookDir!="." && $bookDir!=".."){
            $book = array();
            $info = "books/" .$bookDir. "/info.php";            
            include($info);
            if($bookMeta["id"] == $bookId){
                $bookMeta['cover'] =  "books/" .$bookDir . "/cover.jpg";
                return $bookMeta;
            }
            $i++;   
        }
    }
    return "";
};


function get_Book_URL($bookId){
	$library = opendir('books');
	while (false !== ($bookDir = readdir($library))){
		if ($bookDir!="." && $bookDir!=".."){

			$info = "books/" .$bookDir. "/info.php";
			include($info);
            if(trim($bookMeta['id']) == $bookId){
                return "books/" . $bookDir . "/";
            }
		}
	}
}

function get_Book_WordsNumber($bookId){
	$bookUrl = get_Book_URL($bookId);
	$number = 0;
	$bookPath = $bookUrl. "/content.txt";
    $bookFile = fopen($bookPath, "r");
    while(false !== ($bookLine = fgets($bookFile) )){
    	$actualWord = ""; 	
    	for($i = 0; $i < strlen($bookLine); $i++){
    		$character = substr($bookLine, $i,1);	
    		if(preg_match("/[^\n\t\s]/", trim($character) )){
    			$actualWord = $actualWord . trim($character);
    			
    		}else{
    			if(strlen(trim($actualWord)) > 0){
    				$actualWord = "";
    				$number++;
    			}		
    		}		
    	}  
    }
    return $number;
}


function get_Book_Words($bookId, $start = 0, $end = -1){
	//echo $start . " " . $end . "\n<br>";
	$bookUrl = get_Book_URL($bookId);
	if($end == -1 || $end < $start)
		$end = get_Book_WordsNumber($bookId);
	$words = array();
	$number = 0;
	$bookPath = $bookUrl. "/content.txt";
    $bookFile = fopen($bookPath, "r");
    while(false !== ($bookLine = fgets($bookFile) )){
    	$actualWord = "";
    	for($i = 0; $i < strlen($bookLine); $i++){
    		$character = substr($bookLine, $i,1);
    		if(preg_match("/[^\n\t\s]/", trim($character) )){
    			$actualWord = $actualWord . trim($character);
    		}else{
    			if(strlen(trim($actualWord)) > 0){
    				//echo $number."\n<br>";
    				if ($number >= $start &&  $number <= ($end - 1)){
    					array_push($words, $actualWord);	
    				}else if($number > $end){
    					return $words;
    				}
    				$actualWord = "";
    				$number++;
    			}
    		}
    	}
    }
    return $words;
}


?>