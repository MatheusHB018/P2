<?php

/**
 * A classe abstrata Prototype. Em PHP, a clonagem pode ser feita nativamente,
 * mas podemos definir um método `clone` ou usar o método mágico `__clone`
 * para controlar o processo, especialmente para cópias profundas (deep copy).
 */
abstract class ServidorVirtual
{
    public string $nome;
    public int $cpuCores;
    public int $ramGB;
    public int $storageGB;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function setCpuCores(int $cores): void
    {
        $this->cpuCores = $cores;
    }

    public function setRamGB(int $ram): void
    {
        $this->ramGB = $ram;
    }

    public function setStorageGB(int $storage): void
    {
        $this->storageGB = $storage;
    }

    public function exibirInfo(): void
    {
        echo "Servidor '{$this->nome}': {$this->cpuCores} Cores, {$this->ramGB}GB RAM, {$this->storageGB}GB Armazenamento\n";
    }

    // Método de clonagem
    abstract public function __clone();
}

/**
 * Protótipo Concreto 1
 */
class ServidorWebApp extends ServidorVirtual
{
    public string $versaoPHP;

    public function setVersaoPHP(string $versao): void
    {
        $this->versaoPHP = $versao;
    }

    public function exibirInfo(): void
    {
        parent::exibirInfo();
        echo "  -> Tipo: Web App (PHP {$this->versaoPHP})\n";
    }

    public function __clone()
    {
        // Para tipos primitivos, a clonagem padrão (shallow copy) é suficiente.
        // Se tivéssemos objetos como propriedades, precisaríamos cloná-los também
        // para uma cópia profunda (deep copy). Ex: $this->propriedadeObjeto = clone $this->propriedadeObjeto;
    }
}

/**
 * Protótipo Concreto 2
 */
class ServidorBancoDeDados extends ServidorVirtual
{
    public string $tipoBanco;

    public function setTipoBanco(string $tipo): void
    {
        $this->tipoBanco = $tipo;
    }
    
    public function exibirInfo(): void
    {
        parent::exibirInfo();
        echo "  -> Tipo: Banco de Dados ({$this->tipoBanco})\n";
    }
    
    public function __clone()
    {
        // Shallow copy é suficiente aqui também.
    }
}


// Cliente - utilizando o padrão
echo "--- Criando templates de servidores ---\n";

// Criando um protótipo para um servidor web padrão
$templateWebApp = new ServidorWebApp("template-webapp");
$templateWebApp->setCpuCores(4);
$templateWebApp->setRamGB(8);
$templateWebApp->setStorageGB(100);
$templateWebApp->setVersaoPHP("8.2");
$templateWebApp->exibirInfo();

// Criando um protótipo para um servidor de banco de dados
$templateDB = new ServidorBancoDeDados("template-db");
$templateDB->setCpuCores(8);
$templateDB->setRamGB(32);
$templateDB->setStorageGB(500);
$templateDB->setTipoBanco("PostgreSQL");
$templateDB->exibirInfo();


echo "\n--- Usando os templates para criar novos servidores (clones) ---\n";

// Cliente precisa de um novo servidor web para um projeto
$servidorProjetoAlpha = clone $templateWebApp;
$servidorProjetoAlpha->nome = "servidor-web-alpha"; // Personaliza a cópia
$servidorProjetoAlpha->setStorageGB(150); // Personaliza a cópia
$servidorProjetoAlpha->exibirInfo();

// Cliente precisa de um segundo servidor web com PHP mais antigo
$servidorLegado = clone $templateWebApp;
$servidorLegado->nome = "servidor-web-legado";
$servidorLegado->setVersaoPHP("7.4"); // Personaliza a cópia
$servidorLegado->exibirInfo();

// Cliente precisa de um servidor de banco de dados para o projeto Alpha
$servidorDBAlpha = clone $templateDB;
$servidorDBAlpha->nome = "servidor-db-alpha";
$servidorDBAlpha->exibirInfo();

echo "\n--- Verificando se o template original não foi alterado ---\n";
$templateWebApp->exibirInfo(); // O protótipo permanece intacto