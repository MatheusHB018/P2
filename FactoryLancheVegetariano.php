<?php

require_once 'AbstractFactory.php';
require_once 'BurgerTudoVegetariano.php';
require_once 'BurgerSaladaVegetariano.php';

// Fábrica Concreta para Lanches Vegetarianos
class FactoryLancheVegetariano implements AbstractFactory
{
    public function criarBurgerTudo(): Lanche
    {
        return new BurgerTudoVegetariano();
    }

    public function criarBurgerSalada(): Lanche
    {
        return new BurgerSaladaVegetariano();
    }
}
