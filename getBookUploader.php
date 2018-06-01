<?php
	include("htmlGen.php");

	$container = new htmlLabel();
	$row = new htmlLabel();

	$container->name = $row->name = "div";
	$container->atributes["class"] = "container upladoer_container";
	$row->atributes["class"] = "row upladoer_row";

	//$row->atributes["style"] = "height: 100%";
	//$container->atributes["style"] = "height: 100%";

	$form = new htmlLabel();
	$form->name = "form";
	$form->atributes["enctype"] = "multipart/form-data";
	$form->atributes["id"] = "upload_form";
	$form->atributes["method"] = "post";
	//$form->atributes["action"] = "temp.php";
	//$form->atributes["style"] = "height: 100%";

	$text_name = new htmlLabel();
	$text_name->name = "input";
	$text_name->atributes["type"]  = "text";
	$text_name->atributes["name"]  = "book_name";
	$text_name->atributes["id"]    = "book_name";
	$text_name->atributes["name"]  = "book_name";
	$text_name->atributes["placeholder"] = "Escriba el titulo del libro";


	$text_autor = new htmlLabel();
	$text_autor->name = "input";
	$text_autor->atributes["type"]  = "text";
	$text_autor->atributes["id"]    = "book_autor";
	$text_autor->atributes["name"]  = "book_autor";
	$text_autor->atributes["placeholder"] = "Escriba el autor del libro";

	$text_sinopsis = new htmlLabel();
	$text_sinopsis->name = "textarea";
	$text_sinopsis->atributes["placeholder"] = "Escriba una sinopsis del libro";
	$text_sinopsis->atributes["name"] = "book_sinopsis";
	$text_sinopsis->atributes["id"] = "book_sinopsis";


	$inputBook = new htmlLabel();
	$inputBook->name = "input";
	$inputBook->atributes["type"]  = "file";
	$inputBook->atributes["id"]    = "file_text";
	$inputBook->atributes["name"]  = "file_text";

	$inputCover = new htmlLabel();
	$inputCover->name = "input";
	$inputCover->atributes["type"]  = "file";
	$inputCover->atributes["id"]    = "file_cover";
	$inputCover->atributes["name"]  = "file_cover";

	$submitButon = new htmlLabel();
	$submitButon->name = "input";
	$submitButon->atributes["type"]  = "submit";
	
	$lSpaces = new htmlLabel();
	$lSpaces->name = "div";
	$lSpaces->atributes["class"] = "col-xs-4  loader_spaces";

	$saltos = "<br><br><br>";



	$divcon = new htmlLabel();
	$divcon->name = "div";
	$divcon->atributes["class"] = "col-xs-4  loader_controls";
	$divcon->text = "<br><br>" . $text_name->getHtml() . $saltos . $text_autor->getHtml() . $saltos . $text_sinopsis->getHtml() . $saltos . $inputBook->getHtml() . $inputCover->getHtml() . "<label id='error_label'></label><br><br>" . $submitButon->getHtml();


	$form->text = "<h3> Subir Libro </h3>" . $lSpaces->getHtml() . $divcon->getHtml() . $lSpaces->getHtml();
	
	$uploaderClose = new htmlLabel();
	$uploaderClose->name = "div";
	$uploaderClose->atributes["class"] = "col-xs-1 reader_bookClose glyphicon glyphicon-eye-close";
	$uploaderClose->atributes["onClick"] = "closeReader()";
	$uploaderClose->atributes["style"] = "position: absolute; right: 0; top: 0";

	echo $form->getHtml() . $uploaderClose->getHtml();
?>