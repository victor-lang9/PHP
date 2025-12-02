<?php

    require_once("modelo/Cliente.php");
    require_once("modelo/ClientePF.php");
    require_once("modelo/ClientePJ.php");
    require_once("util/Conexao.php");

class ClienteDao {


    public function Inserir(Cliente $cliente) {
        //Inserir um cliente no banco de dados
        $sql = "INSERT INTO clientes
                (tipo, nome_social, email, nome, cpf, razao_social, cnpj) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

            
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        if($cliente instanceof ClientePF) {
        $stmt->execute(array($cliente->getTipo(),
                             $cliente->getNomeSocial(),
                             $cliente->getEmail(),
                             $cliente->getNome(),
                             $cliente->getCpf(),
                             NULL,
                             NULL
                            ));
        } else if($cliente instanceof ClientePJ) {
             $stmt->execute(array($cliente->getTipo(),
                             $cliente->getNomeSocial(),
                             $cliente->getEmail(),
                             NULL,
                             NULL,
                             $cliente->getRazaoSocial(),
                             $cliente->getCnpj()
                            ));
        }
    }
    public function Listar() {
        //Listar todos os clientes do banco de dados
        $sql = "SELECT * FROM clientes";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(); //fethc retorna apenas um registro
                                    //fetchAll retorna todos os registros
        //TODO - converter os objetos 

        $clientes = array();
        foreach($dados as $d){
            $cliente = null;

            if ($d['tipo'] == 'F') {
                $cliente = new ClientePF();
                $cliente->setNome($d['nome']);
                $cliente->setCpf($d['cpf']);

            } else {
                $cliente = new ClientePJ();
                $cliente->setRazaoSocial($d['razao_social']);
                $cliente->setCnpj($d['cnpj']);
            }
            $cliente->setId($d['id']);
            $cliente->setNomeSocial($d['nome_social']);
            $cliente->setEmail($d['email']);
            
            array_push($clientes, $cliente);
        }
        
     return $clientes;
    }

    public function BuscarPorId($id) {
        //Buscar um cliente pelo ID
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id));
        $d = $stmt->fetch(); //Receita de bolo, ctrl c + ctrl v.



        if ($d) {
            if ($d['tipo'] == 'F') {

                $cliente = new ClientePF();             //se for pessoa "F", ele vai mostrar os dados nome e cpf
                $cliente->setNome($d['nome']);
                $cliente->setCpf($d['cpf']);



            } else {

                $cliente = new ClientePJ();                     // se não ele vai mostrar razao social e cnpj
                $cliente->setRazaoSocial($d['razao_social']);
                $cliente->setCnpj($d['cnpj']);

            }

            $cliente->setId($d['id']);
            $cliente->setNomeSocial($d['nome_social']);         //isso vai mostra independente do resultados pois são dados que ambos tem
            $cliente->setEmail($d['email']);
            return $cliente;

        } else {
            return null;

        }
    }
    public function excluirPorId($idCliente) {
        //Excluir um cliente pelo ID
        $sql = "DELETE FROM clientes WHERE id = ?";
        $conn = Conexao::getConexao();
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($idCliente)); 
    }
        
    }
