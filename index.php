<?php
$method = $_SERVER['REQUEST_METHOD'];

switch($text){
	case 'hi':
	$speech = "Hi,Nice to meet you";
	break;

	case 'bye':
	$speech = "Bye,good night";
	break;

	case 'anything'
	$speech = "Yes,you can type anything here.";
	break;

	default:
	$speech = "Sorry,I didnt get that.Please ask me something else";
	break;
}

//Process only when method is POST
if($method=="POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$text = $json->result->parameters->text;
	$response = new \stdClass();
	$response->speech="";
	$response->displayText = "";
	$response->source="webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>