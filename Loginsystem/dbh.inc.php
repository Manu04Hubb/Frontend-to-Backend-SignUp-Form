<?php
//Database connection parameters using PDO
$host = 'localhost';
$dbname = 'myfirstdatadase';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    //set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $e if connection fails
    die("Connection failed: " . $e->getMessage());
}

//new PDO() creates a new PDO instance representing a connection to a database
// it accepts a data source name (DSN), username and password as parameters
// dsn specifies the type of database, host and database name
//PDO::ATTR_ERRMODE sets the error reporting mode[Attribute name]
    //PDO::ERRMODE_EXCEPTION throws exceptions on database errors[Attribute value]
//set Atribute method sets an attribute on the database handle
//it acccepts two parameters: the attribute to set and the value to set it to
// Some of attributes that can be set to a db using setAttribute method are:
//PDO::ATTR_DEFAULT_FETCH_MODE - sets the default fetch mode for queries
     //its values can be PDO::FETCH_ASSOC, PDO::FETCH_OBJ, PDO::FETCH_BOTH etc.
//PDO::ATTR_EMULATE_PREPARES - enables or disables emulation of prepared statements
    //values include true or false
//PDO::ATTR_PERSISTENT - enables or disables persistent connections
  //values include true or false
//PDO::ATTR_TIMEOUT - sets the timeout duration for database operations
   //value is in seconds
//PDO::ATTR_AUTOCOMMIT - enables or disables autocommit mode
   //values include true or false
//PDO::ATTR_CASE - controls the case of column names in result sets
    //values include PDO::CASE_NATURAL, PDO::CASE_LOWER, PDO::CASE_UPPER
//PDO::ATTR_STRINGIFY_FETCHES - controls whether numeric values are fetched as strings
    //values include true or false
//PDO::ATTR_ORACLE_NULLS - controls how NULL values are handled
    //values include PDO::NULL_NATURAL, PDO::NULL_EMPTY_STRING, PDO::NULL_TO_STRING
//PDO::ATTR_ERRMODE - controls the error reporting mode
   //values include:
   //PDO::ERRMODE_EXCEPTION - sets error mode to exception
   //PDO::ERRMODE_WARNING - sets error mode to warning
   //PDO::ERRMODE_SILENT - sets error mode to silent

   //The getMessage() method of the PDOException class retrieves the error message associated with the exception

   //catch block params
   //PDOException - built-in class that represents an error raised by PDO
   //