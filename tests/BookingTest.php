<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Src\controllers\Booking;
use Src\controllers\Client;

class BookingTest extends TestCase {

	private Booking $booking;
	private Client $client;

	/**
	 * Setting default data
	 * @throws \Exception
	 */
	public function setUp(): void {
		parent::setUp();
		$this->booking = new Booking();
		$this->client = new Client();
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

    /** @test */
    public function createBooking() {
        $bookingData = [
            'client' => [
                'username' => 'ygoralves',
                'name' => 'ygor alves',
                'email' => time().'ygoralves.dev@gmail.com',
                'phone' => '27992612697',
                'points' => 0,
            ],
            'price' => 100,
            'checkindate' => '2023-10-06 15:00:00',
            'checkoutdate' => '2023-10-07 15:00:00',
        ];
        $oldClients = count($this->client->getClients());

        $oldBookings = count($this->booking->getBookings());

        $this->booking->createBooking($bookingData);

        $bookings = $this->booking->getBookings();
        $clients = $this->client->getClients();

        $newBooking = end($bookings);

        $this->assertIsArray($bookings);
        $this->assertIsNotObject($bookings);
        $this->assertEquals($oldBookings + 1, count($bookings));
        $this->assertEquals($oldClients + 1, count($clients));

        $this->assertEquals($bookingData['price'], $newBooking['price']);
        $this->assertEquals($bookingData['checkindate'], $newBooking['checkindate']);
        $this->assertEquals($bookingData['checkoutdate'], $newBooking['checkoutdate']);
    }
}