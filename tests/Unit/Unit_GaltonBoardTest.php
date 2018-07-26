<?php

namespace Tests\Unit;

use App\Classes\GaltonBoard;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Unit_GaltonBoardTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = new GaltonBoard;
    }

    public function testIfBoardIsArray ()
    {
        $this->assertTrue(is_array($this->sut->getBoard()));
    }

    public function testIfAmountOfEntitiesPerRowIsCorrect ()
    {
        // Follow formula : nth row has 1 more pin than the previous one.
        foreach ($this->sut->getBoard() as $index => $row) {
            // We start from 1.
            // Stick to the formula which signifies that -
            // the nth row as pins equal to n.
            $expectedPins = $index+1;
            $actualPins = 0;

            // Count the amount of pins.
            for ($i = 0; $i < count($row); $i++) {
                if (0 < $row[$i]) {
                    $actualPins++;
                }
            }

            $this->assertEquals($expectedPins, $actualPins);
        }
    }

    public function testIfBallsGetMade ()
    {
        $mockedBall = \Mockery::mock(Ball::class);
        $this->sut->addBalls(10, $mockedBall);
        $this->assertTrue(10 === count($this->sut->getBalls()));

        $this->sut->addBalls(10, $mockedBall);
        $this->assertTrue(20 === count($this->sut->getBalls()));
    }
}
