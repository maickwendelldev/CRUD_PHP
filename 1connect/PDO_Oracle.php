<?php

/**
 * PHP PDO Oracle class.
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

class Connect{
    private static $connect = null;
    
    public static function getConnect(){
      $mydb="
        (DESCRIPTION =
             (ADDRESS = (PROTOCOL = TCP)(HOST = ".HOST.")(PORT = 1521))
             (CONNECT_DATA =
             (SERVER = DEDICATED)
              (SERVICE_NAME = XE)
              )
        )";
        try{
            if(!self::$connect){
                self::$connect = new \PDO("oci:dbname=".$mydb,USER,PASS);
                self::$connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$connect->exec("SET NAMES " . CHARSET);
            }
            
            return self::$connect;
            
        }catch (PDOException $e){
            throw new Exception("Error trying to connect to the database.");
        }
    }
}

?>
