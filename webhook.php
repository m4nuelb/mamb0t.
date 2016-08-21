<?php
require_once 'config.php';
require_once 'FacebookBot.php';
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();

$response1 = "comandi attivi: bau \r\n cibo";
                             
$bool = 0;

foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text)
	{
      
		$bot->sendTextMessage($recipientId, $response1);
       
     
              $response = processRequest($message->text);
              $bot->sendTextMessage($recipientId, $response);
    
        
        
	}
	
}
function processRequest($text)
{
	$text = trim($text);
	$text = strtolower($text);
	$response = "";
	if($text=="bau")
	{
		$response = "BAU BAU BAU BAUuuuuu";
	}
	elseif ($text=="cibo")
	{
		$response = "http://www.arcaplanet.it/cane/cibo-per-cani/cibo-secco.html";
	}
	else
	{
		$response = "analfabeta non sai leggere, i comandi attivi sono due!";
	}
	return $response;
}