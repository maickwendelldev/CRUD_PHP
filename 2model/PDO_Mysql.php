<?php

/**
 * PHP PDO Mysql class.
 * PHP Version 7.0.
 * File Version 1.0.0.0
 *
 * @see       https://github.com/maickwendelldev/CRUD_PHP.git - The CRUD_PHP GitHub project
 *
 * @author    Maick Wendell (Merk/H4ck3r Sl4v3) - (original founder) <maickwendelldev@gmail.com>
 * @copyright 2021 - 2022 Maick Wendell
 * @license   https://github.com/maickwendelldev/CRUD_PHP/blame/main/LICENSE - MIT License
 * @note      This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

abstract class Model{
    protected $db;
    protected $table;
    
    public function __construct() {
        $this->db = Connect::getConnect();
    }
    
    //List everything from a table
    function all($conn, $tab =null){
        $tab = ($tab) ? $tab: $this->tab;
        try {
            $sql = "SELECT * FROM ". $tab;
            $stmt = $conn->query($sql);
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }

    //It serves to make several queries, without parameters
    function select($conn, $sql, $isList=true ){
        try {
			$stmt = $conn->query($sql);
            if($isList){
                return $stmt->fetchAll(\PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }
    
    //Return a query by a field
    function find($conn, $field, $value, $table=null, $isList=false ){
        $table = ($table) ? $table: $this->table;
        try {
            $sql = "SELECT * FROM ". $table . " WHERE " . $field . " =:field " ;
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":field", $value);
            $stmt->execute();
            if($isList){
                return $stmt->fetchAll(\PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }    
    
    //Return a query for all fields with logical operator 
    function findAll($conn, $field, $operator, $value, $table=null, $isList=false ){
        $table = ($table) ? $table: $this->table;
        try {
            $sql = "SELECT * FROM ". $table . " WHERE " . $field . $operator . " :field " ;
			$stmt = $conn->prepare($sql);
            $stmt->bindValue(":field", $value);
            $stmt->execute();
            if($isList){
                return $stmt->fetchAll(\PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    } 
 
    //Return a search between a range
    function findBetween($conn, $field, $value1, $value2, $table=null ){
        $table = ($table) ? $table: $this->table;
        try {
            $sql = "SELECT * FROM ". $table . " WHERE " . $field . " between  :value1 AND :value2 " ;
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":value1", $value1);
            $stmt->bindValue(":value2", $value2);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
            
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    } 

    //Checks all forms of aggregation (sum, max, min, count, average)
    function findAgrega($conn, $tip, $aggregationField, $table=null , $field = null, $value =null  ){
        $table = ($table) ? $table: $this->table;
        try {
            if($field!=null && $value!=null){
                $cond = " WHERE " . $field . " =:field ";
            }else{
                $cond = "";
            }
            
            if($tip=="soma"){
                $sql = "SELECT sum($aggregationField) as soma FROM ". $table .$cond;
            }else if($tip=="total"){
                $sql = "SELECT count($aggregationField) as total FROM ". $table .$cond;
            }else if($tip=="media"){
                $sql = "SELECT avg($aggregationField) as media FROM ". $table .$cond;
            }else if($tip=="max"){
                $sql = "SELECT max($aggregationField) as max FROM ". $table .$cond;
            }else if($tip=="min"){
                $sql = "SELECT min($aggregationField) as min FROM ". $table .$cond;
            }
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":field", $value);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ);            
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }
    
    //Return a contains in the table something with (% Like %)
    function findLike($conn, $field, $value, $table=null, $isList=false, $posicao=null ){
        $table = ($table) ? $table: $this->table;
        try {
            $sql = "SELECT * FROM ". $table . " WHERE " . $field .  " like :field " ;
            $stmt = $conn->prepare($sql);
            if(!$posicao){
                $stmt->bindValue(":field", "%". $value."%");
            }else{
                if($posicao==1){
                    $stmt->bindValue(":field", $value."%");
                }else{
                    $stmt->bindValue(":field", "%". $value);
                }
            }
            
            $stmt->execute();
            if($isList){
                return $stmt->fetchAll(\PDO::FETCH_OBJ);
            }else{
                return $stmt->fetch(\PDO::FETCH_OBJ);
            }
            
        }catch (\PDOException $e){
            throw new \Exception($e->getMessage());
        }
    }
    
    //Add data to table in database
    function insert($conn, $data, $table=null ){
        $table = ($table) ? $table: $this->table;
        if(!$data){
            throw new Exception("It is necessary to send the parameters to the add method.");
        }
        
        if(!is_array($data)){
            throw new Exception("To be able to insert the data of the values they must be in array format.");
        }
        try {
            $fields 	= implode(", " , array_keys($data));
            $values 	= ":" . implode(", :" , array_keys($data));
			$sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values}) ";
			$stmt = $conn->prepare($sql);
            foreach($data as $key=>$value){
				$stmt->bindValue(":$key", $value);
            }			
			if ($stmt->execute()){
               return $conn->lastInsertId();
            }
            return false;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    //Edit data to table in database
    function update($conn, $data, $field, $table =null){
        $table = ($table) ? $table: $this->table;
        $parametro = null;
        
        if(!$data){
            throw new Exception("It is necessary to send the parameters to the edit method.");
        }
        
        if(!is_array($data)){
            throw new Exception("To be able to edit the data the values need to be in array form.");
        }
        
        try {
            foreach($data as $chave=>$valor){
                $parametro .="$chave=:$chave, ";
            }
            $condicao = $field ." = '" . $data[$field]."'";
            $parametro = rtrim($parametro, ', ');
            
            $sql = "UPDATE {$table} SET {$parametro} WHERE {$condicao} ";
			$stmt = $conn->prepare($sql);
            foreach($data as $chave=>$valor){
                $stmt->bindValue(":$chave", $valor);
            }
			$stmt->execute();
            
			return $stmt->rowCount() ;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }        
    }
    
    //Delete data to table in database
    function delete($conn, $field, $valor,$table=null){
        $table = ($table) ? $table: $this->table;
        
        if(!$field || !$valor){
            throw new Exception("It is necessary to send the field and the value to make the deletion.");
        }
        try {
            $sql  = "DELETE FROM {$table} WHERE {$field} = :valor";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":valor", $valor);
            $stmt->execute();
            return $stmt->rowCount() ;
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
    }
}

?>
