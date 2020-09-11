<?php

require_once(__DIR__ . '/../db/Db.php');
require_once(__DIR__ . '/../model/Pessoa.php');


class DaoPessoa {

    private $connection;

    public function __construct(Db $connection) {
        $this->connection = $connection;
    }

    public function porId(int $id): ?Pessoa {
        $sql = "SELECT nome, idade, endereco, cpf, telefone FROM Pessoa where id = ?";
        $stmt = $this->connection->prepare($sql);
        $pes = null;
        if ($stmt) {
          $stmt->bind_param('i',$id);
          if ($stmt->execute()) {
            $stmt->bind_result($nome, $idade, $endereco, $cpf, $telefone);
            $stmt->store_result();
            if ($stmt->num_rows == 1 && $stmt->fetch()) {
              $pes = new Pessoa($id, $nome, $idade, $endereco, $cpf, $telefone);
            }
          }
          $stmt->close();
        }
        return $pes;
      }

      public function inserir(Pessoa $pessoa): bool {
        $sql = "INSERT INTO pessoa (nome, idade, endereco, cpf, telefone) VALUES(?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $res = false;
        if ($stmt) {

          $nome     =   $pessoa->getNome();
          $idade    =   $pessoa->getIdade();
          $endereco =   $pessoa->getEndereco();
          $cpf      =   $pessoa->getCpf();
          $telefone =   $pessoa->getTelefone();

          $stmt->bind_param('sisss', $nome, $idade, $endereco, $cpf, $telefone);
          
          if ($stmt->execute()) {
              $id = $this->connection->getLastID();
              $pessoa->setId($id);
              $res = true;
          }
          $stmt->close();
        }
        return $res;
      }   

      public function remover(Pessoa $pessoa): bool {
        $sql = "DELETE FROM pessoa where id=?";
        $id = $pessoa->getId(); 
        $stmt = $this->connection->prepare($sql);
        $ret = false;
        if ($stmt) {
          $stmt->bind_param('i',$id);
          $ret = $stmt->execute();
          $stmt->close();
        }
        return $ret;
      }

      public function atualizar(Pessoa $pessoa): bool {
        $sql = "UPDATE pessoa SET nome = ?, idade = ?, endereco = ?, cpf = ?, telefone = ? 
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $ret = false;      
        if ($stmt) {

            $nome     =   $pessoa->getNome();
            $idade    =   $pessoa->getIdade();
            $endereco =   $pessoa->getEndereco();
            $cpf      =   $pessoa->getCpf();
            $telefone =   $pessoa->getTelefone();
            $id       =   $pessoa->getId();

          $stmt->bind_param('isisss',$id, $nome, $idade, $endereco, $cpf, $telefone);
          $ret = $stmt->execute();
          $stmt->close();
        }
        return $ret;
      }

      public function todos(): array {
        $sql = "SELECT id, nome, idade, endereco, cpf, telefone from pessoa";
        $stmt = $this->connection->prepare($sql);
        $pessoa = [];
        if ($stmt) {
          if ($stmt->execute()) {
            $id = 0; $nome = '';
            $stmt->bind_result($id, $nome, $idade, $endereco, $cpf, $telefone);
            $stmt->store_result();
            while($stmt->fetch()) {
              $pessoa[] = new Pessoa($id, $nome, $idade, $endereco, $cpf, $telefone);
            }
          }
          $stmt->close();
        }
        return $pessoa;
      }

}