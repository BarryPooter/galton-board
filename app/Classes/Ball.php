<?php

namespace App\Classes;

class Ball
{
    protected $y = 0;
    protected $x = 0;

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @param array $nextRow
     * @return void
     * @internal param int $tileType
     */
    public function dropBallOneStep(array $nextRow = null) : void
    {
        $this->_randomlyDecideAddition();
        $this->y++;
    }

    /**
     * @return void
     */
    private final function _randomlyDecideAddition () : void
    {
        $chance = rand(0,1);
        if (0 === $chance) {
            $this->x--;
        } else {
            $this->x++;
        }
    }

    /**
     * @param int $type
     * @return bool
     */
    private final function _isMovementAllowedOnTileType (int $type) : bool
    {
        $_disallowed = [2];
        return !in_array($type, $_disallowed);
    }
}