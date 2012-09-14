<?php

	class Passwordr {
	
		//POST vars
		
		public $password;
		public $level;
		public $salt;
		public $length;
		
		//private vars
		
		private $items; 
		private $special;
		private $generatedpw;
		private $result;
		
		//methods
		
		private function randomizer(){
		
			$this->items = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
			
			if(!empty($this->password)){
			
				if($this->level == 2){
		
					$this->result = substr($this->pw = sha1($this->salt.$this->password), 3, $this->length - 1);
					
				}else {
				
					$this->result = substr($this->pw = sha1($this->salt.$this->password), 3, $this->length);
				
				}
				
			}else {
			
				if($this->level == 2){
				
					$this->result = substr($this->pw = sha1($this->salt.$this->items), 3, $this->length - 1);
					
				}else {
				
					$this->result = substr($this->pw = sha1($this->salt.$this->items), 3, $this->length);
				
				}

			}
			
			return $this->result;
		
		}
		
		public function virgin(){
		
			if($this->length){
				
				return TRUE;
				
			}else {
			
				return FALSE;
			
			}
		
		}
		
		public function confusitizer(){
		
		$this->generatedpw = $this->randomizer();
		
			if(strlen($this->generatedpw) < $this->length && ($this->level == 2)){
								
				$this->special = str_shuffle("_?+-.<?;:&#@");
				$maxlen = strlen($this->generatedpw);
				$arrayitized = preg_split('//', $this->generatedpw, -1);
				$specialchar = substr($this->special, 0, 1);
				
				if(!in_array($specialchar, $arrayitized)){
					
					$arrayitized[] = $specialchar;
					shuffle($arrayitized);
				
					return implode($arrayitized);
					
				}else {
				
					return $this->generatedpw;
				
				}
			
			}else {
			
				return $this->generatedpw;
			
			}
		
		}
	
	}

?>