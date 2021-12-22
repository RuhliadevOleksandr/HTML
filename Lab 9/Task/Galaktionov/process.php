<?php
    function add_file(){
        $name = $_POST['name'];
        $content = $_POST['content'];
        $filename='data.xml';
        

        $xml = simplexml_load_file($filename);
        $file=$xml->addChild('file');
        $file->addChild('name', $name.'.txt');
        $file->addChild('content', $content);

        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        file_put_contents($filename, $dom->saveXML());
    }

    function edit_file(){
        $name = $_POST['name'].'.txt';
        $content = $_POST['content'];
        $filename='data.xml';
        

        $xml = simplexml_load_file('data.xml');
        foreach ($xml->file as $file)
        {
            if ($file->name == $name)
            {
                $file->content=$content;
            }
        }

        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        file_put_contents($filename, $dom->saveXML());
    }

    function delete_file(){
        $name = $_POST['name'].'.txt';
        $filename='data.xml';
        

        $xml = simplexml_load_file($filename);
        $count = 0;
        foreach ($xml->file as $file)
        {
            if ($file->name == $name) { 
                unset($xml->file[$count]); break; 
              } 
            $count++; 
        }

        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        file_put_contents($filename, $dom->saveXML());
    }

    $button = $_POST['button'];

    if($button==2){
        add_file();
    }
    else if($button==3){
        edit_file();
    }
    else{
        delete_file();
    }
    

    

    

?>

