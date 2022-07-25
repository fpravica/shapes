<?php

namespace App\Service;

use App\Model\Shape;

class GeometryCalculator
{
    const NUMBER_DECIMALS = 2;

    /**
     * Sum of areas for two given objects
     */
    public function sumArea(Shape $s1, Shape $s2)
    {
        return number_format($s1->getArea() + $s2->getArea(), self::NUMBER_DECIMALS);
    }

    /**
     * Sum of perimeters for two given objects
     */
    public function sumPerimeter(Shape $s1, Shape $s2) 
    {
        return number_format($s1->getPerimeter() + $s2->getPerimeter(), self::NUMBER_DECIMALS);
    }
}
