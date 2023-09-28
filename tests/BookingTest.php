<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\controllers\Booking;

class BookingTest extends TestCase {

	private $booking;

	/**
	 * Setting default data
	 * @throws \Exception
	 */
	public function setUp(): void {
		parent::setUp();
		$this->booking = new Booking();
	}

	/** @test */
	public function getBookings() {
		$results = $this->booking->getBookings();

		$this->assertIsArray($results);
		$this->assertIsNotObject($results);

		$this->assertEquals($results[0]['id'], 1);
		$this->assertEquals($results[0]['clientid'], 1);
		$this->assertEquals($results[0]['price'], 200);
		$this->assertEquals($results[0]['checkindate'], '2021-08-04 15:00:00');
		$this->assertEquals($results[0]['checkoutdate'], '2021-08-11 15:00:00');
	}
}