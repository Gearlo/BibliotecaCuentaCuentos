<?php
include("htmlGen.php");

$container = new htmlLabel();
$row = new htmlLabel();

$container->name = $row->name = "div";
$container->atributes["class"] = "container reader_container";
$row->atributes["class"] = "row reader_row";

$bookConf = new htmlLabel();
$bookConf->name = "div";
$bookConf->atributes["class"] = "col-xs-1 reader_bookConf glyphicon glyphicon-dashboard";
$bookConf->atributes["onClick"] = "config_show()";


$bookTitle = new htmlLabel();
$bookTitle->name = "div";
$bookTitle->atributes["class"] = "col-xs-10 reader_bookTitle";

$bookClose = new htmlLabel();
$bookClose->name = "div";
$bookClose->atributes["class"] = "col-xs-1 reader_bookClose glyphicon glyphicon-eye-close";
$bookClose->atributes["onClick"] = "closeReader()";



$lSpaces = new htmlLabel();
$lSpaces->name = "div";
$lSpaces->atributes["class"] = "hidden-xs col-sm-1 col-lg-2 reader_spaces";

include("getConfig.php");

$blackboard = new htmlLabel();
$blackboard->name = "div";
$blackboard->atributes["class"] = "col-xs-12 col-sm-10 col-lg-8 reader_blackboard";
$blackboard->atributes["onClick"] = "pause_play()";

$progressBar = new htmlLabel();
$progress = new htmlLabel();
$progress->name = $progressBar->name = "div";
$progress->atributes["class"] = "reader_progress"; 
//$progress->atributes["id"] = "reader_progress"; 
$progressBar->atributes["class"] = "col-xs-12 col-sm-10 col-lg-8 reader_progressBar";
$progressBar->atributes["onClick"] = "progressBarClick(event, this)";

$progressBar->text = $progress->getHtml();

$config_dialog = new htmlLabel();
$config_dialog->name = "div";
$config_dialog->atributes["class"] = "reader_config";

include("config/opts.php");
$config_themesList = new htmlLabel(); 
$config_SpeedsList = new htmlLabel();


$config_themesList->name = $config_SpeedsList->name = "select";
$config_themesList->atributes["id"] = "themesList";
$config_SpeedsList->atributes["id"] = "speedsList";
$config_themesList->atributes["onchange"] = $config_SpeedsList->atributes["onchange"] = "changeConf()"; 

for($i = 0; $i < count($themes); $i++){
 $config_themesList->text = $config_themesList->text . "<option value='" . $themes[$i] ."'>". $themes[$i] . "</option>";
}

for($j = 0; $j < count($speed); $j++){
 $config_SpeedsList->text = $config_SpeedsList->text . "<option value='" . $speed[$j] ."'>". $speed[$j] . "</option>";
}

$config_buttom = new htmlLabel();
$config_buttom->name = "button";
//$config_buttom->atributes["type"] = "button";
//$config_buttom->atributes["onClick"] = "config_hide()";
$config_buttom->text = "cerrar";

$config_dialog->text = "<br>tema: ". $config_themesList->getHtml() ."<br><br> velocidad:". $config_SpeedsList->getHtml();
//$config_dialog->text = "<select> <option value='sepia'>Sepia</option> </select>";
//$config_dialog->text = $config_dialog->text . "<select> <option value='100'> 100 palabras/minuto </option> </select>";


$row->text = $bookConf->getHtml() . $bookTitle->getHtml() . $bookClose->getHtml() . $lSpaces->getHtml() . $blackboard->getHtml() . $lSpaces->getHtml() . $lSpaces->getHtml() . $progressBar->getHtml() . $lSpaces->getHtml();
$container->text = $row->getHtml();


echo $container->getHtml() . $config_dialog->getHtml();

?>