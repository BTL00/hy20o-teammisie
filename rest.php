<?php

/**
 * Rest API controller
 */
class RestAPIController 
{
	
	function __construct()
	{
		# code...
	}

	function validateRecaptcha($response) {
		$url = 'http://www.google.com/recaptcha/api/siteverify';
		$data = array('secret' => 'value1', 'response' => $response);

		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) { 
				throw new Exception("Error Processing Request", 1);
		  }
		echo json_encode(array('valid' => $result["success"] ));
	}

	function saveForm() {
			$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
			$tekst = htmlspecialchars(trim($_POST['tekst']), ENT_QUOTES, 'utf-8');


		    $data = $email . '-' . $tekst . "\r\n";
		    $ret = file_put_contents('suggestions.txt', $data, FILE_APPEND | LOCK_EX);
		    if($ret === false) {
		        die(json_encode(array('saved' => false, 'cause' => 'error' )));
		    }
		    else {
		        echo json_encode(array('saved' => true, 'bytes' => sizeof($ret) ));
		    }
		
	}



	function run() {
		if(isset($_POST['submit'])) {
			saveForm();
		}else 
		if(isset($_POST['validate_token'])) {
			validateRecaptcha($_POST['validate_token']);
		}
 	}
}


$controller = new RestAPIController();
$controller.run();