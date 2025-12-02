<?php

require_once("modelo/ClientePF.php");
require_once("modelo/ClientePJ.php");
require_once("dao/ClienteDao.php");

//Teste da conexão com o banco
/*
require_once("util/Conexao.php");
$pdo = Conexao::getConexao();
print_r($pdo);
exit;
*/

//MENU
do {
    echo "\n\n----CADASTRO DE CLIENTES----\n";
    echo "1- Cadastrar Cliente PF\n";
    echo "2- Cadastrar Cliente PJ\n";
    echo "3- Listar Clientes\n";
    echo "4- Buscar Cliente\n";
    echo "5- Excluir Cliente\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch ($opcao) {
        case 1:
            $cliente = new ClientePF();
            $cliente->setNome(readline("Informe seu nome: "));
            $cliente->setCpf(readline("Informe seu CPF:"));
            $cliente->setNomeSocial(readline("Informe seu nome social: "));
            $cliente->setEmail(readline("Informe seu e-mail: "));
            

            $dao = new ClienteDao();
            $dao->Inserir($cliente);
            echo "Cliente PF cadastrado com sucesso!\n";
            break;

        case 2:
            $cliente = new ClientePJ();
            $cliente->setRazaoSocial(readline("Informe o seu nome: "));
            $cliente->setCnpj(readline("Informe o seu CPF:"));
            $cliente->setNomeSocial(readline("Informe o seu nome social: "));
            $cliente->setEmail(readline("Informe o seu e-mail: "));


            $dao = new ClienteDao();
            $dao->Inserir($cliente);
            echo "Cliente PJ cadastrado com sucesso!\n";
            break;

        case 3:
            $dao = new ClienteDao();
            $clientes = $dao->Listar();

            foreach ($clientes as $c) {
                echo $c;
            }
            break;

        case 4:
            //1- ler o ID do cliente a ser buscado
            $id = readline("Informe o ID do cliente: ");
            $dao = new ClienteDao();
            $cliente = $dao->BuscarPorId($id);

            //2- Obter o cliente do banco de dados e imprimi-lo na tela
            if ($cliente) {
                echo $cliente;
            } else {
                echo "Cliente nao encontrado! \n";
            }
            break;

        case 5:
           //1- Listar os clientes
              $dao = new ClienteDao();
              $clientes = $dao->Listar();
              foreach ($clientes as $c) {
                  echo $c . "\n";
              }

           //2- ler o ID do cliente que sera excluido
           $id = readline("Informe o ID do cliente a ser excluído: ");

           //2.1- Validar se o ID corresponde a um cliente 
              $cliente = $dao->BuscarPorId($id);

           //3- excluir do banco de dados
           if ($cliente) {
               $dao->excluirPorId($id);
               echo "Cliente excluído com sucesso!\n";
           } else {
               echo "Cliente não encontrado!\n";
           }

            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!";
    }
} while($opcao != 0);
