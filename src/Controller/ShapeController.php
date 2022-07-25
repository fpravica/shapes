<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\Shape;
use App\Model\Triangle;
use App\Model\Circle;

class ShapeController extends AbstractController
{
    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET"})
     */
    public function triangle(float $a, float $b, float $c): Response
    {
        $triangle = new Triangle($a, $b, $c);
        return $this->buildResponse($triangle);
    }

    /**
     * @Route("/circle/{radius}", methods={"GET"})
     */
    public function circle(float $radius): Response
    {
        $circle = new Circle($radius);
        return $this->buildResponse($circle);
    }

    private function buildResponse(Shape $shape): Response
    {
        $properties = array_merge(
            [
                'type' => $shape->getType()
            ], 
            $shape->getInput(), 
            [
                'area' => $shape->getArea(),
                'perimeter' => $shape->getPerimeter()
            ]
        );
        $response = new JsonResponse($properties);
        $response->setEncodingOptions( $response->getEncodingOptions() | JSON_PRETTY_PRINT );
        return $response;
    }
}