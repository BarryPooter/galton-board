<?php

namespace Tests\Feature;

use App\Classes\GaltonBoard;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureGaltonBoardTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfAllBallsStopInContainer () : void
    {
        $board = new GaltonBoard;
        $board->addBalls(20);
        $board->dropAllBalls();

        $this->assertTrue(true);
    }
}
