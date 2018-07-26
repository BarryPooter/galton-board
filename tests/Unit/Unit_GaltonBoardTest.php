<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GaltonBoard
{
    protected static $rows = 5;
    protected static $board = [
        [0,0,0,0,0,1,0,0,0,0,0],
        [0,0,0,0,1,0,1,0,0,0,0],
        [0,0,0,1,0,1,0,1,0,0,0],
        [0,0,1,0,1,0,1,0,1,0,0],
        [0,1,0,1,0,1,0,1,0,1,0],
        [2,0,2,0,2,0,2,0,2,0,2]
    ];

    /**
     * @return array
     */
    public function getBoard () : array
    {
        return self::$board;
    }

    /**
     * @return int
     */
    public function getRows () : int
    {
        return self::$rows;
    }
}

class Unit_GaltonBoardTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = new GaltonBoard();
    }

    public function testIfBoardIsArray ()
    {
        $this->assertTrue(is_array($this->sut->getBoard()));
    }

    public function testIfAmountOfEntitiesPerRowIsCorrect ()
    {
        $amountOfRows = $this->sut->getRows();

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
}
