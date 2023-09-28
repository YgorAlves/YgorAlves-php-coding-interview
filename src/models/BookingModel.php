<?php

namespace Src\models;

use Src\helpers\Helpers;

class BookingModel {

	private $bookingData;
    private $helper;

	function __construct() {
        $this->helper = new Helpers();
        $string = file_get_contents(dirname(__DIR__) . '/../scripts/bookings.json');
		$this->bookingData = json_decode($string, true);
	}

	public function getBookings() {
		return $this->bookingData;
	}

    public function createBooking($bookingData, $client) {

        $bookings = $this->getBookings();

        $bookingData['id'] = end($bookings)['id'] + 1;
        $bookingData['clientid'] = $client['id'];
        unset($bookingData['client']);
        $bookings[] = $bookingData;

        $this->helper->putJson($bookings, 'bookings');

        return $bookings;
    }
}