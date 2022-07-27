# Shapes OOP playground

The initial task was the following
```
- you will use the MVC framework that we use: Symfony
- you will deliver solution in form of a Github repository.
- create 2 models/classes - Circle and Triangle

- implement 2 methods:
I.) calculate surface
II.) calculate diameter

- create routes:
[GET] /triangle/{a}/{b}/{c}
[GET] /circle/{radius}

- routes must return JSON with serialized objects and calculated surfaces and diameters. For example:

{

 "type": "circle",

 "radius": 2.0,

 "surface": 12.56,

 "circumference": 12.56,

}

or

{

 "type": "triangle",

 "a": 3.0,

 "b": 4.0,

 "c": 5.0,

 "surface": 6.0,

 "circumference": 12.0,

}

- create service/or similar structure for the given framework (for example app.geometry_calculator)

- implement method for sum of areas for two given objects

- implement method for sum of diameters for two given objects
```
## Documentation
The project is implemented with PHP Symfony framework.
Installed are only necessary bundles:
```
  * composer require annotations
  * composer require --dev phpunit/phpunit symfony/test-pack
```

### Interfaces
```
Shape
  - type [string]
  - input [array]
  - area [float]
  - perimeter [float]
```

### Abstract classes
```
AbstractShape
    - implements Shape
    - calculates perimeter and area on object creation
```

### Model classes
```
Triangle
    - extends AbstractShape
    - constructor takes 3 sides (a, b, c)

Circle
    - extends AbstractShape
    - constructor takes radius
```

### Adding New Shapes
Adding a new shape is easy. Just extend the ***AbstractShape*** class and implement:
```
    - calculateArea(): float;
    - calculatePerimeter(): float;
    - setInput(): array;
```
And make constructor to accept the input params.

Example snippet:
```
namespace App\Model;
use App\Model\AbstractShape;

class Square extends AbstractShape 
{
    private $a;
    
    public function __construct(float $a)
    {
        $this->a = $a;
        parent::__construct();
    }

    protected function setInput(): array
    {
        return array(
            "a" => $this->a
        );
    }

    protected function calculateArea(): float
    {
        return pow($this->a, 2);
    }

    protected function calculatePerimeter(): float
    {
        return 4 * $this->radius;
    }

}
```
_P.S.: Don't forget to add the endpoint method in the **ShapeController**!_
Only this is needed in the controller:
```
    /**
     * @Route("/square/{a}", methods={"GET"})
     */
    public function square(float $a): Response
    {
        $square = new Square($a);
        return $this->buildResponse($square);
    }
```

### Services
```
GeometryCalculator
    - sum of areas of two Shape objects 
    - sum of perimeters of two Shape objects
```

## Tests
To run rests, execute standard phpunit CLI command
```
php bin/phpunit
```

## Run local server
Symfony
```
symfony server:start
```

Docker compose 
```
docker-compose up
```

# API

## Triangle

**Request**
```
[GET] /triangle/{a}/{b}/{c}
```
**Response example**
```
{
    "type": "triangle",
    "a": 4.0,
    "b": 5.0,
    "c": 6.0,
    "area": 9.921567416492215,
    "perimeter": 15
}
```

## Circle

**Request**
```
[GET] /circle/{radius}
```
**Response example**
```
{
    "type": "circle",
    "radius": 2,
    "area": 12.566370614359172,
    "perimeter": 12.566370614359172
}
```
