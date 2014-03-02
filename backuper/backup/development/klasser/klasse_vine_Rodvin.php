
<?php



class Rodvin extends Vin
{

	//Variabler

	var $type;

	//Konstruktør

	function Rodvin($navn, $type)
	{
		//Sætter Vin->Navn

		parent::Vin($navn);

		//Sætter vores lokale klasse-variabel
		$this-type = $type;

	}

	//Funktion

	function hent_type()
	{

		return $this->type;

	}

}


?>