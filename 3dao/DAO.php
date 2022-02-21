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
 
class Dao extends Model{   
    //List everything from a table 
    // exemple: getlist("tbl");
    public function getList($table){
        return  $this->all($this->db, $table);
    }
	//make multiple queries, no parameters (manual)
    // exemple: getSQL("Select * from tbl where id = '1'", false);
	public function getSQL($sql, $is_list){
        return  $this->select($this->db,$sql, $is_list);
    }
    //Return a query by a specific field
    // exemple: getin("tbl", "id", "2", false);
	public function getIn($table, $field, $value, $is_list){
        return  $this->find($this->db,$field, $value, $table, $is_list);
    }    
    //Return a query for all fields with logical operator
    // exemple: getin("tbl", "id", "2", false);
	public function getInAll($table, $field, $operator, $value, $is_list){
        return  $this->findAll($this->db,$field,$operator, $value, $table, $is_list);
    }    
    //Return a search between a range
    // exemple: getbet("tbl", "id", "2", "10");
	public function getBet($table, $field, $value1, $value2){
        return  $this->findbetween($this->db,$field, $value1, $value2, $table);
    } 
    //get the maximum value 
    // exemple: getMax("tbl", "fieldMax", "FieldCond", "Cond");
	public function getMax($table, $aggregationField, $field, $value){
        return  $this->findAgrega($this->db, 'max', $aggregationField, $table,$field, $value);
    }
    //get the maximum value 
    // exemple: getMin("tbl", "fieldMin", "FieldCond", "Cond");
    public function getMin($table, $aggregationField, $field, $value){
        return  $this->findAgrega($this->db, 'min', $aggregationField, $table,$field, $value);
    }
    //get the count itens 
    // exemple: getCount("tbl", "fieldCount", "FieldCond", "Cond");
    public function getCount($table, $aggregationField, $field, $value){
        return  $this->findAgrega($this->db, 'total', $aggregationField, $table,$field, $value);
    }
    //get the Sum value 
    // exemple: getSum("tbl", "fieldCount", "FieldCond", "Cond");
    public function getSum($table, $aggregationField, $field, $value){
        return  $this->findAgrega($this->db, 'soma', $aggregationField, $table,$field, $value);
    }
    //get the average value 
    // exemple: getAvg("tbl", "fieldCount", "FieldCond", "Cond");
    public function getAvg($table, $aggregationField, $field, $value){
        return  $this->findAgrega($this->db, 'media', $aggregationField, $table,$field, $value);
    }
    //Return a contains in the table something with (% Like %)
    // exemple: getLike("tbl", "field", "valuecontain", "true", 1);        0 = %like%   /  1 = like%
    public function getLike($table, $field, $value, $is_list, $posicao){
        return  $this->findlike($this->db,$field, $value, $table, $is_list, $posicao);
    }
    //add data to table in database 
    // exemple: add("data[array or obj]", "tbl");
    public function add( $values, $table){
        return $this->insert($this->db,  $values, $table);
    }
    //edit data to table in database 
    // exemple: edit("data[array or obj]", "field", "tbl");
    public function edit( $values, $field, $table){
        return $this->update($this->db,  $values,  $field, $table);
    }
    //delete data to table in database 
    // exemple: del("tbl", "field", "value");
    public function del($table, $field, $value){
        return $this->delete($this->db, $field ,$value , $table);
    }
}

?>
