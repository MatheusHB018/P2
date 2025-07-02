<?php

require_once 'Lanche.php';

// Produto Concreto
class BurgerTudoVegetariano implements Lanche
{
    public function montar(): void
    {
        echo "Montando Burger Tudo Vegetariano (Pão Integral, Hambúrguer de Soja, Ovo, Queijo, Salada)\n";
    }
}
