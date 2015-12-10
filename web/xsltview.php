<?php

require_once __DIR__.'/../conf/bootstrap.php';
require_once __DIR__.'/../conf/conf.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if (!isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
		$GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents("php://input");
	}
	if( array_key_exists("CONTENT_TYPE", $_SERVER) &&
		strpos($_SERVER["CONTENT_TYPE"], "/xml") !== FALSE ) {
		$xmlstr = $GLOBALS["HTTP_RAW_POST_DATA"];
		
		$params = [];
        parse_str($_SERVER['QUERY_STRING'],$params);
        if(isset($params["xsltDocument"])) {
            $doc = new \DOMDocument();
            $xslt = $doc->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="stylesheets/Archive/'.$params["xsltDocument"].'"');
            $doc->appendChild($xslt);
            
            $xml = new \DOMDocument();
            $xml->loadXML($xmlstr);
            $root = $xml->documentElement;
            
            $newRoot = $doc->importNode($root,true);
            $doc->appendChild($newRoot);
            
            \XML_Output::tryHTML($doc->saveXML(),true);
            exit(0);
        }
        throw new \Exception("Unsupported Media Type. */xml content type supported only.",415);
    }
    throw new \Exception("Query param `xsltDocument` not found", 400);
}
throw new \Exception("Method not allowed", 405);