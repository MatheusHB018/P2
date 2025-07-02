<?php

require_once 'Lanche.php';

// Produto Concreto
class BurgerSalada implements Lanche
{
    public function montar(): void
    {
        echo "Montando Burger Salada (Pão, Hambúrguer, Queijo, Salada)\n";
    }
}