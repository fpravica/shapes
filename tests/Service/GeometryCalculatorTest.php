<?php

namespace Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\GeometryCalculator;
use App\Model\Triangle;
use App\Model\Circle;

final class GeometryCalculatorTest extends TestCase
{
    private $geometryCalculator;

    protected function setUp(): void
    {
        $this->geometryCalculator = new GeometryCalculator();
    }
    
    public function testSumPerimeterForTwoTriangles(){
        // given
        $s1 = new Triangle(9,11,10);
        $s2 = new Triangle(20, 30, 40);

        //when
        $result = $this->geometryCalculator->sumPerimeter($s1, $s2);

        // then
        $expected = '120.00';
        $this->assertEquals($expected, $result);
    }

    public function testSumPerimeterForTwoCircles(){
        // given
        $s1 = new Circle(10);
        $s2 = new Circle(20);

        //when
        $result = $this->geometryCalculator->sumPerimeter($s1, $s2);

        // then
        $expected = '188.50';
        $this->assertEquals($expected, $result);
    }

    public function testSumPerimeterForCircleAndTriangle(){
        // given
        $s1 = new Circle(10);
        $s2 = new Triangle(20,15,10);

        //when
        $result = $this->geometryCalculator->sumPerimeter($s1, $s2);

        // then
        $expected = '107.83';
        $this->assertEquals($expected, $result);
    }

    public function testSumAreaForTwoTriangles(){
        // given
        $s1 = new Triangle(9,11,10);
        $s2 = new Triangle(20, 30, 40);

        //when
        $result = $this->geometryCalculator->sumArea($s1, $s2);

        // then
        $expected = '332.90';
        $this->assertEquals($expected,$result);
    }

    public function testSumAreaForTwoCircles(){
        // given
        $s1 = new Circle(10);
        $s2 = new Circle(20);

        //when
        $result = $this->geometryCalculator->sumArea($s1, $s2);

        // then
        $expected = '1,570.80';
        $this->assertEquals($expected, $result);
    }

    public function testSumAreaForCircleAndTriangle(){
        // given
        $s1 = new Circle(10);
        $s2 = new Triangle(20,15,10);

        //when
        $result = $this->geometryCalculator->sumArea($s1, $s2);

        // then
        $expected = '386.78';
        $this->assertEquals($expected,$result);
    }
}
