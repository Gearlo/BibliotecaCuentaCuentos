<?php
	class htmlLabel{
		public $twin = True;
		public $name = "";
		public $text = "";
		public $atributes = array();
		public $content = array();


		public function getHtml(){
			$html = "";
			if( $this->name != "" ){
				$html = "<" . $this->name . $this->getAtributes() .">" . $this->text . $this->getTwin();
			}
			return $html;
		}


		private function getAtributes(){
			$html="";
			foreach($this->atributes as $key => $value){
				$html = $html . " " . $key ."='" . $value . "'";
			}
			return $html;
		}  

		private function getTwin(){
			if ($this->twin == True){
				return "</". $this->name .">";
			}else{
				return "";
			}
			
		}
	}

?>