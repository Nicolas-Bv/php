<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

//pregunto si existe el archivo!

if(file_exists("archivo.txt")){    
$jsonTareas= file_get_contents("archivo.txt");    //leo y almaceno
$aTareas= json_decode($jsonTareas, true);  //convierto a json en un array

}else{
$aTareas= array();    //si no existe sale ese array vacio
 
};

//seleccionar:

if(isset($_GET["id"])&& $_GET["id"]>=0){
    $id=$_GET["id"];
} else {
    $id="";
};

//$id=isset($_GET["id"])&&$_GET["id"]>=0 ? $_GET["id"] : "" ;



if($_POST){

    $prioridad=$_POST["lstPrioridad"];
    $usuario=$_POST["lstUsuario"];
    $estado=$_POST["lstEstado"];
    $titulo=$_POST["txtTitulo"];
    $descripcion=$_POST["txtDescripcion"];


if($id>=0){
    $aTareas[$id]= array(
    "fecha"=>$aTareas[$id]["fecha"],  //editar la tarea
    "prioridad"=>$prioridad,
    "usuario"=>$usuario,
    "estado"=>$estado,
    "titulo"=>$titulo,
    "descripcion"=>$descripcion
    );
} else {

    $aTareas[]=array(
        "fecha"=>date("d,m,Y"),  //nueva tarea
        "prioridad"=>$prioridad,
        "usuario"=>$usuario,
        "estado"=>$estado,
        "titulo"=>$titulo,
        "descripcion"=>$descripcion
    );
};

$json_tareas= json_encode($aTareas);                          //array $aTareas convertido a json
file_put_contents("archivo.txt", $json_tareas);   //lo guardo al archivo en json_tareas

};
//borrar

if(isset($_GET["do"])&&$_GET["do"]=="eliminar"){
    unset($aTareas[$id]);


$json_tareas= json_encode($aTareas);             //convierto el array a json
file_put_contents("archivo.txt", $json_tareas);  //guardo el json en el archivo.txt
header("location: gestordetareas.php");                   //redirijo

}








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de Tareas</h1>
            </div>
        </div>

    <div class="row pb-2">
        <div>

        <form action="" method="POST" class="form-control">
            <div class="row">
                <div class="col-4">
                    <label for="">Prioridad
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                            <option value="" disable selected>Seleccionar</option>
                            <option value="alta" <?php echo isset($aTareas["id"]) && $aTareas["id"]["prioridad"]== "alta" ? "selected" : "";?> >Alta</option>
                            <option value="media" <?php echo isset($aTareas["id"]) && $aTareas["id"]["prioridad"]== "media" ? "selected" : "";?>>Media</option>
                            <option value="baja" <?php echo isset($aTareas["id"]) && $aTareas["id"]["prioridad"]== "baja" ? "selected" : "";?>>Baja</option>
                        </select>
                    </label>
                </div>

                <div class="col-4">
                    <label for="">Usuario
                        <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                            <option value="" disable selected>Seleccionar</option>
                            <option value="ana"  <?php echo isset($aTareas["id"]) && $aTareas["id"]["usuario"]== "ana" ? "selected" : "";?>>Ana</option>
                            <option value="bernabe" <?php echo isset($aTareas["id"]) && $aTareas["id"]["usuario"]== "bernabe" ? "selected" : "";?>>Bernabe</option>
                            <option value="daniela" <?php echo isset($aTareas["id"]) && $aTareas["id"]["usuario"]== "daniela" ? "selected" : "";?>>Daniela</option>
                        </select>
                    </label>
                </div>
                <div class="col-4">
                    <label for="">Estado
                        <select name="lstEstado" id="lstEstado" class="form-control" required>
                            <option value="" disable selected>Seleccionar</option>
                            <option value="Sin Asignar" <?php echo isset($aTareas["id"]) && $aTareas["id"]["estado"] == "Sin Asignar" ? "selected" : "" ;?>>Sin asignar</option>
                            <option value="Asignado" <?php echo isset($aTareas["id"]) && $aTareas["id"]["estado"]== "Asignado" ? "selected" : "" ; ?>>Asignado</option>
                            <option value="En Proceso" <?php echo isset($aTareas["id"]) && $aTareas["id"]["estado"]== "En Proceso" ? "selected" : "" ; ?>>En proceso</option>
                            <option value="Terminado" <?php echo isset($aTareas["id"]) && $aTareas["id"]["estado"]== "Terminado" ? "selected" : "" ; ?>>Terminado</option>
                        </select>
                    </label> <br>
                </div>
            <div class="row">
                    <label for="">Título
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$id])?$aTareas[$id]["titulo"]:"";?>">
                    </label> <br>
            </div>

            <div class="row">
                    <label for="">Descripción
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" required ><?php echo isset($aTareas[$id])?$aTareas[$id]["descripcion"]:""; ?></textarea>
                    </label><br>
            </div>
           

            <div class="row text-center">
                <div class="col-12">    
                <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary mx-2 my-2">ENVIAR</button>
                <a href="gestordetareas.php" class="btn btn-danger">CANCELAR</a>
            </div>
            </div> 
         </form>
</div>
</div>

        <?php if(count($aTareas)): ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover shadow border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($aTareas as $pos => $tarea): ?>
                        <tr>
                            <td> <?php echo $pos ;?> </td>
                            <td> <?php echo $tarea["fecha"]?> </td>
                            <td> <?php echo $tarea["titulo"]?> </td>
                            <td> <?php echo $tarea["prioridad"]?> </td>
                            <td> <?php echo $tarea["usuario"]?> </td>
                            <td> <?php echo $tarea["estado"]?> </td>
                            <td>
                                <a href="?id=<?php echo $pos?>&do=editar" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                <a href="?id=<?php echo $pos?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>

        <?php endif ; ?>
    </div>


    </div>

</body>

</html>