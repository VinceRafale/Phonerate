<?php

class Vin
{

// Variabler
var $navn;


//Konstruktør
function Vin($navn)
{

	$this->navn = $navn;

}


//Funktioner


function hent_navn()
{

	return $this->navn;
}


}


?>