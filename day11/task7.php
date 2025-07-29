<?php

abstract class Shape
{
    abstract public function draw();
}
class Circle extends Shape
{
    public function draw()
    {
        echo "Drawing a circle";
    }
}
class rectangle extends Shape
{
    public function draw()
    {
        echo "Drawing a Rectangrle";
    }
}
$shapes = [
    new Circle(),
    new Rectangle(),
    new Circle(),
    new Rectangle(),
];

foreach ($shapes as $shape){
    echo $shape->draw();
}


