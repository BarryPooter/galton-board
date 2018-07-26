<?php

namespace App\Classes;

class GaltonBoard
{
    protected static $rows = 5;
    protected static $ballDropPosition = 5;
    protected static $board = [
        [0,0,0,0,0,1,0,0,0,0,0],
        [0,0,0,0,1,0,1,0,0,0,0],
        [0,0,0,1,0,1,0,1,0,0,0],
        [0,0,1,0,1,0,1,0,1,0,0],
        [0,1,0,1,0,1,0,1,0,1,0],
        [2,0,2,0,2,0,2,0,2,0,2]
    ];

    protected $balls = [];

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

    /**
     * @param int $amount
     * @internal param int $balls
     * @internal param int $ball
     */
    public function dropBalls (int $amount) : void
    {
        $balls = $this->getBalls();
        $board = $this->getBoard();
        $startPosition = self::$ballDropPosition;
    }

    /**
     * @return mixed
     */
    public function getBalls()
    {
        return $this->balls;
    }

    /**
     * @param int $amount
     * @param string $typeOf
     * @internal param mixed $balls
     */
    public function addBalls(int $amount, $typeOf = Ball::class)
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->balls[] = new $typeOf();
        }
    }

    /**
     * @return void
     */
    public function dropAllBalls () : void
    {
    }
}