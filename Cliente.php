<?php

require_once 'FactoryProdutor.php';

// Classe Cliente
class Cliente
{
    public static function main(): void
    {
        echo "--- Pedido Padrão (Não Vegetariano) ---\n";
        // Obtém a fábrica para lanches não vegetarianos
        $factoryNaoVeg = FactoryProdutor::getFactory(false);

        // Cria e monta os lanches
        $burgerTudo = $factoryNaoVeg->criarBurgerTudo();
        $burgerTudo->montar();

        $burgerSalada = $factoryNaoVeg->criarBurgerSalada();
        $burgerSalada->montar();

        echo "\n--- Pedido Vegetariano ---\n";
        // Obtém a fábrica para lanches vegetarianos
        $factoryVeg = FactoryProdutor::getFactory(true);

        // Cria e monta os lanches
        $burgerTudoVeg = $factoryVeg->criarBurgerTudo();
        $burgerTudoVeg->montar();

        $burgerSaladaVeg = $factoryVeg->criarBurgerSalada();
        $burgerSaladaVeg->montar();
    }
}

// Execução do teste
Cliente::main();