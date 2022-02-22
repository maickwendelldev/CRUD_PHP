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
 
//Put the database server host, by default we put ("localhost");
define("HOST","localhost");
//Put the user who has access to the database server, by default we put ("root");
define("USER","root");
//Put the user password, by default we put empty (""); 
define("PASS","");
//Put the name of the database, which has the access, by default we put "Teste";
define("BASE","Teste");
//Put the charset, by default we put "utf8";
define("CHARSET","utf8");



//Now select the type of database, for that remove the #. (You can only leave one active);
//##################################################################//
//-------------------------- PDO Firebird --------------------------//
#include("1connect/PDO_Firebird.php"); //PDO Firebird;
//-------------------------- PDO Mysql -----------------------------//
include("1connect/PDO_Mysql.php"); //PDO Mysql;
//-------------------------- PDO PostgreSQL ------------------------//
#include("1connect/PDO_Postgresql.php"); //PDO PostgreSQL;
//-------------------------- PDO SQLite ----------------------------//
#include("1connect/PDO_Sqlite.php"); //PDO SQLite;
//-------------------------- PDO SQL Server ------------------------//
#include("1connect/PDO_Sqlserver.php"); //PDO SQL Server;
//##################################################################//



//Now select the type of connect you uses, for that remove the #. (You can only leave one active);
//##################################################################//
//-------------------------- Modal PDO -----------------------------//
include("2model/PDO.php"); //Modal in PDO;
//##################################################################//




//This is a DAO. (Default) 
include("3dao/DAO.php"); //DAO;

//Connect to database. (Default)
$DBconnect  = new Dao();

?>
