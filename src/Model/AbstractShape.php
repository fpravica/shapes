<?php

namespace App\Model;

use App\Model\Shape;

abstract class AbstractShape implements Shape
{
    private $input;
    private $area;
    private $perimeter;


    public function __construct()
    {
        $this->input = $this->setInput();
        $this->area = $this->calculateArea();
        $this->perimeter = $this->calculatePerimeter();
    }

    abstract protected function calculateArea(): float;
    abstract protected function calculatePerimeter(): float;
    abstract protected function setInput(): array;


    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    public function getArea(): float 
    {
        return $this->area;
    }

    public function getInput(): array
    {
        return $this->input;
    }

    public function getType(): string
    {
        //return substr(strrchr('\\' . get_class($this), '\\'), 1);
        return lcfirst(preg_replace('#^.+\\\\#', '', get_class($this)));
    }
}