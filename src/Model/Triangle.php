<?php

namespace App\Model;

use App\Model\AbstractShape;


class Triangle extends AbstractShape 
{
    private $a;
    private $b;
    private $c;

    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;

        parent::__construct();
    }

    protected function setInput(): array
    {
        return array(
            "a" => $this->a,
            "b" => $this->b,
            "c" => $this->c
        );
    }

    protected function calculateArea(): float
    {
        $a = $this->a;
        $b = $this->b;
        $c = $this->c;
        $s = ($a + $b + $c)/2;
        return sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
    }

    protected function calculatePerimeter(): float
    {
        return $this->a + $this->b + $this->c;
    }
}