<?php

namespace Src\models;

use Src\helpers\Helpers;

class DogModel {

	private $dogData;

	function __construct() {
		$this->helper = new Helpers();
		$string = file_get_contents(dirname(__DIR__) . '/../scripts/dogs.json');
		$this->dogData = json_decode($string, true);
	}

	public function getDogs() {
		return $this->dogData;
	}

    public function getDogsByClientId($clientId) {
        $dogs = $this->getDogs();
        $clientDogs = [];
        foreach($dogs as $dog) {
            if ($dog['clientid'] == $clientId) {
                $clientDogs[] = $dog;
            }
        }
        return $clientDogs;
    }

    public function getAverageAgeOfDogs($dogs) {
        $amountOfDogs = count($dogs);
        if (!$amountOfDogs) return false;

        $ageSum = 0;

        foreach($dogs as $dog) {
            $ageSum += $dog['age'];
        }

        return $ageSum / $amountOfDogs;
    }
}