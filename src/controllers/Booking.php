<?php

namespace Src\controllers;

use Src\models\BookingModel;

class Booking {

	private function getBookingModel(): BookingModel {
		return new BookingModel();
	}

	public function getBookings() {
		return $this->getBookingModel()->getBookings();
	}
}