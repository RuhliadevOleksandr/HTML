<?php 
    date_default_timezone_set("Europe/Helsinki");
    $date = date('d.m.o, H:i:s');
    
    if(!empty($_POST['tema']) and !empty($_POST['text'])){
        $tema = $_POST['tema'];
        $text = $_POST['text'];
        add_to_xml($tema, $text, $date);
        add_to_file($tema, $text, $date);
    }

    function add_to_xml($tema, $text, $date){
        $xmlFile = simplexml_load_file("data.xml");
        $xml = new SimpleXMLElement($xmlFile->asXML());
        $note = $xml->addChild('note');
        $note->addChild('tema', $tema);
        $note->addChild('text', $text);
        $note->addChild('date', $date);
        format_xml($xml->asXML());
    }
    
    function format_xml($xml){
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);        
        $dom->save("data.xml");
    }

    function add_to_file($tema, $text, $date){
        $file = fopen("data.txt", "a");
        $mytext = "\r\n\r\nNote:";
        $mytext .= "\r\nTema: " . $tema;
        $mytext .= "\r\nText: " . $text;
        $mytext .= "\r\nDate: " . $date;
        fwrite($file, $mytext);
        fclose($file);
    }

    if(!empty($_POST['index'])){
        delete_node($_POST['index']);
        delete_from_file($_POST['index']);
    }

    function delete_node($index){
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->load('data.xml');
        $notes = $dom->getElementsByTagName('note');
        $note = $notes->item($index);
        $note->parentNode->removeChild($note);
        $dom->save("data.xml");
    }

    function delete_from_file($index){
        $newText = '';
        $currentIndex = -1;
        $file = fopen("data.txt", 'r+');
        while(!feof($file))
        {
            $str = fgets($file);
            if($str == "Note:\r\n")
                $currentIndex++;
            if($currentIndex != $index)
                $newText .= $str;
        }
        $newText .= "end";
        fclose($file);
        $file = fopen("data.txt", 'w');
        fwrite($file, str_replace("\r\n\r\nend", "", $newText));
        fclose($file);
    }
?>