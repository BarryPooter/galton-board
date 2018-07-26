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
     * @param int $tileType
     * @return void
     */
    public function dropBallOneStep(int $tileType = 1) : void
    {
        if (!$this->_isMovementAllowedOnTileType($tileType)) return;

        $chance = rand(0,1);
        $addition = (1 > $chance)
            ? -1
            : 1;

        $this->setX(
            $this->getX() + $addition
        );
        $this->setY(
            $this->getY()+1
        );
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