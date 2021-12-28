<?php
   $text=$_POST['text'];
   $xml = simplexml_load_file('Result.xml');
   $xml->addChild('Attempt', $text); 
   $xml->asXML('Result.xml');
?>