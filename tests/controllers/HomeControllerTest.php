<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-03-08 at 20:05:14.
 */
class HomeControllerTest extends TestCase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        parent::setUp();


    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @covers FireflyIII\Http\Controllers\HomeController::dateRange
     */
    public function testDateRangeWarning()
    {
        $start = '2014-03-01';
        $end   = '2015-03-31';

        $this->be(new FireflyIII\User);
        $this->call('POST', '/daterange', ['end' => $end, 'start' => $start]);
        $this->assertResponseOk();

        $this->assertSessionHas('start');
        $this->assertSessionHas('end');
        $this->assertSessionHas('warning');

    }

    /**
     * @covers FireflyIII\Http\Controllers\HomeController::dateRange
     */
    public function testDateRange()
    {
        $start = '2015-03-01';
        $end   = '2015-03-31';

        $this->be(new FireflyIII\User);
        $this->call('POST', '/daterange', ['end' => $end, 'start' => $start]);
        $this->assertResponseOk();

        $this->assertSessionHas('start');
        $this->assertSessionHas('end');

    }

    /**
     * @covers FireflyIII\Http\Controllers\HomeController::index
     */
    public function testIndexLoggedIn()
    {
        $this->be(new FireflyIII\User);
        $response = $this->call('GET', '/');
        $this->assertResponseOk();

    }

    /**
     * @covers FireflyIII\Http\Controllers\HomeController::index
     */
    public function testIndexNoLogin()
    {
        $response = $this->call('GET', '/');
        $this->assertRedirectedTo('auth/login');

    }

}
