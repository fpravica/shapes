<?php

namespace App\Model;

interface Shape {
    public function getPerimeter(): float;
    public function getArea(): float;
    public function getInput(): array;
    public function getType(): string;
}

