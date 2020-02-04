<?php
class ConnectHistory {
    
public function dbConnectSimple(){        
        $dbsystem='mysql';
        $host='localhost';
        $dbname='silar';
        $username='dev';
        $passwd='desarrollo'; 
        
       
        $dsn=$dbsystem.':host='.$host.';dbname='.$dbname;               
        try {          
            $connection = new PDO($dsn, $username, $passwd);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pdoExcetion) {
            $connection = null;
            echo 'Error al establecer la conexión: '.$pdoExcetion;
            exit();
        }
        //echo 'Conectado a la base de datos: '.$dbname;
        return $connection;        
        
    
    }
}