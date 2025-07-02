<?php

require_once 'Lanche.php';

// Produto Concreto
class BurgerTudo implements Lanche
{
    public function montar(): void
    {
        echo "Montando Burger Tudo (Pão, Hambúrguer, Ovo, Bacon, Queijo, Presunto, Salada)\n";
    }
}
