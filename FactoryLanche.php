<?php

require_once 'AbstractFactory.php';
require_once 'BurgerTudo.php';
require_once 'BurgerSalada.php';

// Fábrica Concreta para Lanches Não Vegetarianos
class FactoryLanche implements AbstractFactory
{
    public function criarBurgerTudo(): Lanche
    {
        return new BurgerTudo();
    }

    public function criarBurgerSalada(): Lanche
    {
        return new BurgerSalada();
    }
}