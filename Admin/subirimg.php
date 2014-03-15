<?php 
@session_start();
 if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = '../imagenes/';      
            if(move_uploaded_file($temp_name, $location.'logoo.jpg')){


require('../conexion.php');
$usuario=$_SESSION['usuario'];
$fecha=date('Y-m-d');
$consulta="Insert into accion values ('$usuario','Edito Cabecera','Nueva imagen','$fecha')";
$consu=mysql_query($consulta);
               header('location: ../admin/camb_header.php?exito=1');
            }
        }       
    }  
}