<?php
    //conexcao com o banco de dados
class Conexao {
    private static $conn = null;
    private static $host = 'localhost';
    private static $dbnome = 'bdalunos';
    private static $user = 'root';
    private static $password = '';

    public static function Conectar(){
        
        if(null == self::$conn)
        {
            try
            {
                self::$conn =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$dbnome, self::$user, self::$password); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$conn;
    }
}
