<?php

namespace Src\models;

class BookingModel {

	private $bookingData;

	function __construct() {
		$string = file_get_contents(dirname(__DIR__) . '/../scripts/bookings.json');
		$this->bookingData = json_decode($string, true);
	}

	public static function getBookings() {
		return $this->bookingData;
	}
}