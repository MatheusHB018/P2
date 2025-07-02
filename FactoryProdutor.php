<?php

require_once 'FactoryLanche.php';
require_once 'FactoryLancheVegetariano.php';

// Produtor de Fábricas
class FactoryProdutor
{
    public static function getFactory(bool $isVegetariano): AbstractFactory
    {
        if ($isVegetariano) {
            return new FactoryLancheVegetariano();
        } else {
            return new FactoryLanche();
        }
    }
}
