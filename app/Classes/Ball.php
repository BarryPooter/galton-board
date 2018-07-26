<?php

namespace App\Classes;

class Ball
{
    protected $y;
    protected $x;

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
     * @return void
     */
    public function dropBallOneStep() : void
    {
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
}