<?php

namespace Tests\Unit;

use App\Classes\Ball;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Unit_BallTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = new Ball();
    }

    public function testChangingXPosition ()
    {
        $this->sut->setX(1);
        $this->assertTrue(1 === $this->sut->getX());

        $this->sut->setX(5);
        $this->assertTrue(5 === $this->sut->getX());
    }

    public function testChangingYPosition ()
    {
        $this->sut->setY(1);
        $this->assertTrue(1 === $this->sut->getY());

        $this->sut->setY(5);
        $this->assertTrue(5 === $this->sut->getY());
    }

    public function testIfDroppingTheBallOneLevelChangesItsPositions () : void
    {
        $this->sut->setX(5);
        $this->sut->setY(0);
        $this->sut->dropBallOneStep();

        $this->assertNotEquals(5, $this->sut->getX());
        $this->assertNotEquals(0, $this->sut->getY());
    }

    public function testBallNotMovingOnceOnAContainer ()
    {
        $containerTypeId = 2;
        $originalX = $this->sut->getX();
        $originalY = $this->sut->getY();

        $this->sut->dropBallOneStep($containerTypeId);
        $this->assertEquals($originalX, $this->sut->getX());
        $this->assertEquals($originalY, $this->sut->getY());
    }
}
