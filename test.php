<?php

abstract class Figure
{
    protected $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getSquare() {
        return 5;
    }

    abstract public function getPerimeter();

    final public function getColor()
    {
        return $this->color;
    }
}

interface IFigureSquare
{
    public function getSquare();
}

interface IFigurePerimeter
{
    public function getPerimeter();
}

class Square extends Figure implements IFigureSquare, IFigurePerimeter
{
    private $side;

    public function __construct(float $side, string $color)
    {
        $this->side = $side;
        parent::__construct($color);
    }

    public function getSquare(): float {
        return (float)($this->side ** 2);
    }

    public function getPerimeter(): float
    {
        return $this->side * 4;
    }
}

class Triangle extends Figure implements IFigureSquare
{
    private $side1;
    private $side2;
    private $side3;

    public function __construct(float $side1, float $side2, float $side3, string $color)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        parent::__construct($color);
    }

    public function getSquare(): float
    {
        $p = $this->getPerimeter() / 2;
        $res = $p * ($p - $this->side1) * ($p - $this->side2) * ($p - $this->side3);
        return sqrt($res);
    }

    public function getPerimeter(): float
    {
        return $this->side1 + $this->side2 + $this->side3;
    }
}

class GeometryCalculator
{
    public function calcSquare(Figure $figure)
    {
        return $figure->getSquare();
    }

    public function calcPerimeter(Figure $figure)
    {
        return $figure->getPerimeter();
    }
}

$square = new Square(5, 'red');
$triangle = new Triangle(3,3,2, 'green');

$calculator = new GeometryCalculator();
$s = $calculator->calcSquare($square);
var_dump($s);

$s = $calculator->calcSquare($triangle);
var_dump($s);
