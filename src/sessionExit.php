<?php
	class sessionExit {
		// function for killing the session
		public function killSession() {
			// replacing current session with an empty session
			$_SESSION = [];

			// replacing the sessions cookies with empty cookies
			if (ini_get('session.use_cookies')) {
				$params = session_get_cookie_params();
				setcookie(session_name(),
				'', time() - 42000,
				$params['path'], $params['domain'],
				$params['secure'], $params['httponly']
				);
			}

			// destroying the session
			session_destroy();
		}

		//function for forgetting the session
		public function forgetSession() {
			// using the above function
			$this->killSession();

			// sending the user back to the login page
			header("location:login.php");

			exit;
		}
	}
?>