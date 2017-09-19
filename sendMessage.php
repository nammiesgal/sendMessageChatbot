<?php 

	require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
	use Twilio\Rest\Client;
	use Twilio\Http\CurlClient;

	$accountSid = "AC08d095cb250390a8bb04bf5c36e749a6";
		$authToken = "53b7781098b8f71fb1dba914b5c9b5ad";
		$client = new Client($accountSid, $authToken);
	//	$curlOptions = [ CURLOPT_SSL_VERIFYHOST => false, CURLOPT_SSL_VERIFYPEER => false];
	//	$client->setHttpClient(new CurlClient($curlOptions));

		//build sms messages
		$fromNumber = "+61436414915";
		$toNumber = "+61400113044";
		$msg = "Here is your Dialog Codex search link: " . "https://codex.dialoggroup.biz/?mode=voice&search=Java" . "  Please log into Dialog Codex using this URL link.";
		
		try 
		{
			$message = $client->messages->create(
				$toNumber,
				array(
					'from' => $fromNumber,
					'body' => $msg
					//'mediaURL' => "https://apaia-chatbot-webhook.herokuapp.com/app-logo.png"
				)
			);
			print "Message sent via Twilio!";
		}
		catch(\Exception $ex) 
		{
			print "Twilio error: " . $ex->getMessage();
		}
		echo json_encode("sid: " . $message->sid);
?>	