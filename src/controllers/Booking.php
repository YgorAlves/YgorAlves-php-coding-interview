<?php

namespace Src\controllers;

use Src\models\BookingModel;
use Src\models\ClientModel;
use Src\models\DogModel;

class Booking {

	private function getBookingModel(): BookingModel {
		return new BookingModel();
	}

	private function getClientModel(): ClientModel {
		return new ClientModel();
	}

	private function getDogModel(): DogModel {
		return new DogModel();
	}

	public function getBookings() {
		return $this->getBookingModel()->getBookings();
	}

    public function createBooking($bookingData) {
        if (!$bookingData['client']['email']) {
            return false;
        }

        if ($bookingData['price'] <= 0) {
            return false;
        }

        $today = new \DateTime();

        if ($bookingData['checkindate'] < $today->format('Y-m-d H:i:s')) {
            return false;
        }

        $client = $this->getClientModel()->getClientByEmail($bookingData['client']['email']);
        if (!$client) {
            $client = $this->getClientModel()->createClient($bookingData['client']);
        }

        $clientDogs = $this->getDogModel()->getDogsByClientId($client['id']);
        $averageAgeOfDogs = $this->getDogModel()->getAverageAgeOfDogs(
            $clientDogs
        );
        if ($averageAgeOfDogs && $averageAgeOfDogs < 10) {
            $bookingData['price'] = $bookingData['price'] * 0.9;
        }

        return $this->getBookingModel()->createBooking($bookingData, $client);
    }
}