<?php

require_once 'Lanche.php';

// Abstract Factory
interface AbstractFactory
{
    public function criarBurgerTudo(): Lanche;
    public function criarBurgerSalada(): Lanche;
}
