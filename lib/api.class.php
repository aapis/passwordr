<?php

	class API extends Passwordr {

		private $_key = null;
		private $_result = null;
		private $_type = null;
		private $_length = 0;
		private $_salt = null;
		private $_return_salt = null;

		public function __construct($key, $length, $salt, $type = 'json'){
			//set the authentication key
			$this->_setKey($key);

			//set the data type
			$this->_setDataType($type);

			//set the salt
			$this->_setSalt($salt);

			//set the length of the StringResult
			$this->_setLength($length);

			//generate the JSON result
			$this->_generate();
		}

		private function _generate(){
			$obj = new stdClass();

			if($this->_auth()){
				$obj->StringResult = substr($this->confusitizer(), 0, $this->_length);
				$obj->Length = $this->_length;
				$obj->NewSalt = md5(time());

				switch($this->_type){
					case 'xml':
						//todo: implement XML formatting
					break;

					case 'raw':
						//todo: implement raw formatting
					break;

					default:
					case 'json':
						$this->_result = json_encode($obj);
					break;
				}
			}else {
				$obj->StringResult = 'Invalid authentication key.';
				$obj->Length = strlen($obj->StringResult);
				$obj->Key = $this->_key;
				$obj->ErrorCode = 403;

				$this->_result = json_encode($obj);
			}
		}

		private function _auth(){
			if(is_null($this->_type) || is_null($this->_key)) return false;

			return true;
		}

		private function _setKey($key = null){
			$this->_key = $key;
		}

		private function _setDataType($type = null){
			$this->_type = $type;
		}

		private function _setLength($length){
			if($length === 0){
				$length = 11;
			}

			$this->_length = $length;
		}

		private function _setSalt($salt){
			$this->_salt = $salt;
		}

		public function result(){
			return $this->_result;
		}

	}

?>