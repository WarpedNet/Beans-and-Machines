<?php
	class User{
		private $email;
		private $password;
		private $phoneNum;

		public function setEmail($email) {
			$this->email = email;
		}
		public function getEmail() {
			return $this->email;
		}
		public function setPassword($password) {
			$this->password = password;
		}
		public function getPassword() {
			$this->password = password;
		}
		public function setPhoneNum($phoneNum) {
			$this->phoneNum = phoneNum;
		}
		public function getPhoneNum() {
			return $this->phoneNum;
		}
	}
?>