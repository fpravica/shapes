<?php

namespace App\Model;

use App\Model\AbstractShape;


class Circle extends AbstractShape 
{
    private $radius;
    
    public function __construct(float $radius)
    {
        $this->radius = $radius;
        parent::__construct();
    }

    protected function setInput(): array
    {
        return array(
            "radius" => $this->radius
        );
    }

    protected function calculateArea(): float
    {
        return M_PI * pow($this->radius, 2);
    }

    protected function calculatePerimeter(): float
    {
        return 2 * M_PI * $this->radius;
    }

}