<?php

class MasterDAO implements interfaceDAO{

    public function createObject ($result){
        // ATTENTION CETTE CLASSE N'IMPLEMENTE PAS LA METHODE
        echo 'NOT IMPLEMENTED';
    }

    public function fetch ($search ,$id) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE ? = ?");
            $statement->execute([$search, $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if (empty($result)){
                return false;
            }

            $fetch = $this->createObject($result);
            return $fetch;

        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetchAll () {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            
            $result = array();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)){
                return false;
            }

            $fetchAll = array();
            foreach($result as $value){
                $fetchAll[] = $this->createObject($value);
            }

            return $fetchAll;

        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function delete ($id){
        if(!$id){
            return false;
        }

        try{
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $statement->execute([$id]);
        }catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function insert($data){
        // ATTENTION CETTE CLASSE N'IMPLEMENTE PAS LA METHODE
        echo 'NOT IMPLEMENTED';
    }
    public function update($id, $data){
        // ATTENTION CETTE CLASSE N'IMPLEMENTE PAS LA METHODE
        echo 'NOT IMPLEMENTED';
    }
}