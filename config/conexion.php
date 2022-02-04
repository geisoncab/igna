<?php

    class Conexion extends PDO{
        public function __construct(){
            try{
                
                //parent::__construct("mysql:host=localhost;dbname=base", "root", "");
                parent::__construct("mysql:host=localhost;dbname=bdigna", "root", "");
                //parent::__construct("mysql:host=localhost;dbname=u860524316_finanssoreal", "u860524316_rootfns", "@dM1n_4pP_FnSsRl");
                parent::exec("set names utf8");
                // echo "conexion exitosa";
                
            }catch(PDOException $e){
                echo "Error al conectar " . $e->getMessage();
                exit;
            }
        }
        
    }
?>