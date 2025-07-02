<?php

require_once 'Lanche.php';

// Produto Concreto
class BurgerSaladaVegetariano implements Lanche
{
    public function montar(): void
    {
        echo "Montando Burger Salada Vegetariano (Pão Integral, Hambúrguer de Soja, Queijo, Salada)\n";
    }
}
