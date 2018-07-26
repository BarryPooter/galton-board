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
        if (is_null($nextRow)) return;

        $nextPositionX = $this->_decideNextPosition();
        if (!$this->_isMovementAllowedOnTileType($nextPositionX)) return;

        $this->setX($nextPositionX);
        $this->setY($this->getY() + 1);
    }

    /**
     * @return int
     */
    private final function _decideNextPosition () : int
    {
        $chance = rand(0,1);
        $addition = (1 > $chance)
            ? -1
            : 1;

        return $this->getX() + $addition;
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