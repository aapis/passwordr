<?php

	class Passwordr {
	
		//POST vars
		
		public $password;
		public $level;
		public $length;
		
		//private vars
		
		private $items;
		private $output;
		
		//methods
		
		public function __construct(){
		
			$this->level = 2;
			//$this->length = $this->cleanup($_POST['len']);
	
			if($this->cleanup($_POST['base'])){
			
				$this->password = $this->cleanup($_POST['base']);
			
			}else {
				
				$this->length = 0;
				$this->password = md5(time());
			
			}
			
		}
		
		/* randomizer() gets the ball rolling by taking a randomly generated string and running it through a hash generator (sha1 in this case) */
		/* returns string */
		
		private function randomizer(){
		
			$this->items = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_?+-.<?;:&#@");
			$password = substr(sha1($this->password.$this->items), $this->startmajigger(), $this->cleanup($_POST['len']) - 1);

			$this->length = strlen($password);

			return $password;
		
		}
		
		/* rediscombobulator() takes confusitizer()'s array and adds some new random characters to it, depending on the length of the array */
		/* returns array */
		
		private function rediscombobulator($arr){
		
			$unique_arr = array_unique($arr);
			
			if(count($unique_arr) <= $this->length){
				
				$diff = $this->length - count($unique_arr);
				
				if(!is_null($diff)){
				
					$added_character = substr($this->items, 0, $diff);
					
					for($i = 0; $i <= $diff; $i++){
						unset($arr[$i]);
					}
					
					$arr[] = $added_character;
					
					return $arr;
				
				}

			}else {
				return $unique_arr;
			}
		
		}
		
		/* startmajigger() chooses a random starting point for randomizer()'s string */
		/* returns int */
		
		private function startmajigger(){
			
			$base_int = str_shuffle("1234567890");
			$int = substr($base_int, 0, 1);
			
			return $int;
		
		}
		
		/* virgin() tests to see if someone has already submitted a password */
		/* returns bool */
		
		public function virgin(){
		
			if($this->length){
				
				return TRUE;
				
			}else {
			
				return FALSE;
			
			}
		
		}
		
		/* confusitizer() turns output from randomizer() and rediscombobulator() into a string */
		/* returns string */
		
		public function confusitizer(){
		
			$this->output = $this->randomizer();
			$rediscombobulated = array();
			
			if(strlen($this->output) <= $this->length){
								
				$special = str_shuffle("_?+-.<?;:&#@");
				$arrayitized = preg_split('//', $this->output, -1);
				$specialchar = substr($special, 0, 1);
				
				if(!in_array($specialchar, $arrayitized)){
					
					$rediscombobulated = $this->rediscombobulator($arrayitized);
					$rediscombobulated[] = $specialchar;
					shuffle($rediscombobulated);
					//$return = array();
					return implode($rediscombobulated);
					//$return['pass'] = implode($rediscombobulated);
					
					//return $return;
					
				}
			
			}
			
		}
		
		/* cleanup() does some basic input validation.  Not really a necessary step, but it's good practice */
		/* returns string */
		
		private function cleanup($gvar){
		
			if(in_array($gvar, $_POST, TRUE)){
				
				strip_tags($gvar);
				
				switch($gvar){
				
					case is_int($gvar):
						return intval($gvar);
					break;
					
					case is_string($gvar):
						return (string) $gvar;
					break;
					
					default:
						return FALSE;
				
				}
			
			}else {
			
				return FALSE;
			
			}
		
		}		
	
	}

?>