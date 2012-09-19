<?php

$quotes = array(

  "ibm" => 98.43

);

function getQuote($symbol) {

  global $quotes;

  return $quotes[$symbol];

}

ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache

$server = new SoapServer("stockquote.wsdl");

$server->addFunction("getQuote");

$server->handle();

?>
