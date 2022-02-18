<?php

function DBCreation(){

    $conn = mysqli_connect ( "localhost", "administrador", "iO5TvRslT18VYcV9");

    $sql = ("drop database if exists NOTAS");
    $conn->query($sql);

    $sql = ("create database if not exists NOTAS");
    $conn->query($sql);

    $sql = ("use NOTAS");
    $conn->query($sql);

    $sql = file_get_contents('pob2.sql');
    $conn->multi_query($sql);

}

function conectar() {

    $conn = mysqli_connect( "localhost", "administrador", "iO5TvRslT18VYcV9", "NOTAS");

    return $conn;

}

// ASIGNATURAS

function displayAsignaturas() {

    $conn = conectar();

    $sql = "SELECT * FROM NOTAS.ASIGNATURAS";
    $result = $conn->query($sql);

	if ($result) {

        $cont=0;

		while ($fila = mysqli_fetch_row($result)) {

            echo "<TR>";
	        echo "    <INPUT TYPE='hidden' name='codigo[$cont]' value='$fila[0]'>";
	        echo "    <TD><INPUT TYPE='text' name='newCodigo[$cont]' value='$fila[0]' size='10'></TD>";
	        echo "    <TD><INPUT TYPE='text' name='nombre[$cont]' value='$fila[1]' size='40'></TD>";
	        echo "    <TD><INPUT TYPE='text' name='horas_semana[$cont]' value='$fila[2]' size='9'></TD>";
	        echo "    <TD><INPUT TYPE='text' name='profesor[$cont]' value='$fila[3]' size='40'></TD>";
	        echo "    <TD><a href='index.php?operacion=eliminar&asignatura=$fila[0]'><img src='iconos/remove32.png'></a></TD>";
            echo "    <TD><a href='unidades.php?asignatura=$fila[0]'><img src='iconos/tarta.png'></a></TD>";
            echo "    <TD><a href='instrumentos.php?asignatura=$fila[0]'><img src='iconos/smile.png'></a></TD>";
            echo "    <TD><a href='expediente.php'><img src='iconos/birrete.png'></a></TD>";
            echo "</TR>";
            
            $cont++;

        }

        echo "<TR>";
	    echo "    <TD><INPUT TYPE='text' name='addCodigo' size='10'></TD>";
	    echo "    <TD><INPUT TYPE='text' name='addNombre' size='40'></TD>";
	    echo "    <TD><INPUT TYPE='text' name='addHoras' size='9'></TD>";
	    echo "    <TD><INPUT TYPE='text' name='addProfesor' size='40'></TD>";
        echo "</TR>";

		mysqli_free_result($result);

	}

}

function procesarCambiosAsignatura() {

    $conn = conectar();

    if(isset($_GET['operacion'])&&$_GET['operacion']=="eliminar") {

        $codigo = $_GET['asignatura'];
	    $sql = "DELETE FROM NOTAS.ASIGNATURAS WHERE codigo='$codigo'";
	    $conn->query( $sql );

    }

    if(isset($_POST['addCodigo'])&&$_POST['addCodigo']!="") {

     	$ncodigo = $_POST["addCodigo"];
        $nnombre = $_POST["addNombre"];
        $nhoras = $_POST["addHoras"];
        $nprofesor = $_POST["addProfesor"];
	    $sql = "INSERT INTO NOTAS.ASIGNATURAS VALUES ( '$ncodigo','$nnombre', '$nhoras', '$nprofesor' )";
	    $conn->query( $sql );   

    }

    if(isset($_POST['procesar'])&&$_POST['procesar']=="Guardar Cambios") {

        $ucodigo = $_POST["codigo"];
        $unewCodigo = $_POST["newCodigo"];
        $unombre = $_POST["nombre"];
        $uhoras = $_POST["horas_semana"];
        $uprofesor = $_POST["profesor"];

        for($i=0; $i<count($_POST["codigo"]); $i++) {

            updateAsignaturas ($ucodigo[$i], $unewCodigo[$i], $unombre[$i], $uhoras[$i], $uprofesor[$i] );

        }

    }

    $_POST = array();
    $_GET = array();

}

function updateAsignaturas ($ucodigo, $unewCodigo, $unombre, $uhoras, $uprofesor) {

    $conn = conectar();
	$sql = "UPDATE NOTAS.ASIGNATURAS SET codigo='$unewCodigo', nombre='$unombre', horas_semana='$uhoras', profesor='$uprofesor' WHERE codigo='$ucodigo'";
	$conn->query( $sql );

}

// UNIDADES

function displayUnidades() {

    $conn = conectar();
    
    $asignatura = $_GET['asignatura'];    

    $sql = "SELECT * FROM NOTAS.UNIDADES where asignatura=$asignatura";
    $result = $conn->query($sql);

	if ($result) {

        $cont=0;

		while ($fila = mysqli_fetch_row($result)) {

            echo "<TR>";
	        echo "    <INPUT TYPE='hidden' name='clave[$cont]' value='$fila[0]'>";
	        echo "    <TD><INPUT TYPE='text' name='numero[$cont]' value='$fila[2]' size='3'></TD>";
	        echo "    <TD><INPUT TYPE='text' name='nombre[$cont]' value='$fila[3]' size='40'></TD>";
	        echo "    <TD><INPUT TYPE='text' name='porcentaje[$cont]' value='$fila[4]' size='5'></TD>";
	        echo "    <TD><a href='unidades.php?asignatura=$asignatura&operacion=eliminar&unidad=$fila[2]'><img src='iconos/remove32.png'></a></TD>";
            echo "</TR>";
            
            $cont++;

        }

        echo "<TR>";
	    echo "    <TD><INPUT TYPE='text' name='addNumero' size='3'></TD>";
	    echo "    <TD><INPUT TYPE='text' name='addNombre' size='40'></TD>";
	    echo "    <TD><INPUT TYPE='text' name='addPorcentaje' size='5'></TD>";
        echo "</TR>";

		mysqli_free_result($result);

	}

}

function procesarCambiosUnidades() {

    $conn = conectar();
    $asignatura = $_GET['asignatura'];

    if(isset($_GET['operacion'])&&$_GET['operacion']=="eliminar") {

        $unidad = $_GET['unidad'];
	    $sql = "DELETE FROM NOTAS.UNIDADES WHERE numero='$unidad'";
	    $conn->query( $sql );

    }

    if(isset($_POST['addNumero'])&&$_POST['addNumero']!=""&&$_POST['procesar']=="Guardar Cambios") {

     	$nnumero = $_POST["addNumero"];
        $nnombre = $_POST["addNombre"];
        $nporcentaje = $_POST["addPorcentaje"];
	    $sql = "INSERT INTO NOTAS.UNIDADES ( asignatura, numero, nombre, porcentaje ) VALUES ( '$asignatura', '$nnumero','$nnombre', '$nporcentaje' )";
	    $conn->query( $sql );   

    }

    if(isset($_POST['procesar'])&&$_POST['procesar']=="Guardar Cambios") {

        $uclave = $_POST["clave"];
        $unumero = $_POST["numero"];
        $unombre = $_POST["nombre"];
        $uporcentaje = $_POST["porcentaje"];

        for($i=0; $i<count($_POST["clave"]); $i++) {

            updateUnidades ($uclave[$i], $unumero[$i], $unombre[$i], $uporcentaje[$i]);

        }

    }
    
}

function updateUnidades ($uclave, $unumero, $unombre, $uporcentaje) {

    $conn = conectar();
	$sql = "UPDATE NOTAS.UNIDADES SET clave='$uclave', nombre='$unombre', numero='$unumero', porcentaje='$uporcentaje' WHERE clave='$uclave'";
	$conn->query( $sql );

}

// INSTRUMENTOS

function displayInstrumentos() {

    $conn = conectar();
    
    $asignatura = $_GET['asignatura'];    

    $sql = "SELECT instrumentos.*, unidades.numero FROM NOTAS.INSTRUMENTOS 
	inner join NOTAS.UNIDADES on unidades.clave= unidad where unidad in
	(SELECT numero FROM NOTAS.UNIDADES where asignatura='$asignatura')";
    $result = $conn->query($sql);

	if ($result) {

        $cont=0;

		while ($fila = mysqli_fetch_row($result)) {

            echo "<TR>";
            echo "    <INPUT TYPE='hidden' name='clave[$cont]' value='$fila[0]'>";
            crearDropdownDeUnidad($asignatura, $cont, $fila[1]);
            echo "    <TD><INPUT TYPE='text' name='nombre[$cont]' value='$fila[2]' size='40'></TD>";
            echo "    <TD><INPUT TYPE='number' name='peso[$cont]' value='$fila[3]' size='10'></TD>";
            echo "    <TD><INPUT TYPE='text' name='calificacion[$cont]' value='$fila[4]' size='10'></TD>";
	        echo "    <TD><a href='instrumentos.php?asignatura=$asignatura&operacion=eliminar&instrumento=$fila[0]'><img src='iconos/remove32.png' title='eliminar'></a></TD>";
            echo "</TR>";
            $cont++;
            
        }

        echo "<TR>";
            echo "    <INPUT TYPE='hidden' name='clave[$cont]'>";
            crearDropdownDeUnidad($asignatura, $cont, 0);
            echo "    <TD><INPUT TYPE='text' name='addNombre[$cont]' size='40'></TD>";
            echo "    <TD><INPUT TYPE='number' name='addPeso[$cont]' size='10'></TD>";
            echo "    <TD><INPUT TYPE='text' name='addCalificacion[$cont]' size='10'></TD>";
	        echo "    <TD></TD>";
            echo "</TR>";

		mysqli_free_result($result);

	}

}

function procesarCambiosInstrumentos() {

    $conn = @conectar();
    $valuenombre = end($_POST["unidad"]);

    if(isset($_GET['operacion'])&&$_GET['operacion']=="eliminar") {

        $instrumento = $_GET['instrumento'];
	    $sql = "DELETE FROM NOTAS.INSTRUMENTOS WHERE clave='$instrumento'";
	    $conn->query( $sql );

    }

    if(isset($_POST['addNombre'])&&$valuenombre!=""&&$_POST['procesar']=="Guardar Cambios") {



     	$nunidad = end($_POST["unidad"]);
        $nnombre = end($_POST["addNombre"]);
        $nporcentaje = end($_POST["addPeso"]);
        $ncalificaciones = end($_POST["addCalificacion"]);
	    $sql = "INSERT INTO NOTAS.INSTRUMENTOS ( unidad, nombre, peso, calificacion )
         VALUES ( '$nunidad', '$nnombre', '$nporcentaje', '$ncalificaciones' )";
	    $conn->query( $sql );   

    }

    if(isset($_POST['procesar'])&&$_POST['procesar']=="Guardar Cambios") {

        $uclave = $_POST["clave"];
        $uunidad = $_POST["unidad"];
        $unombre = $_POST["nombre"];
        $upeso = $_POST["peso"];
        $ucalificaciones = $_POST["calificacion"];

        for($i=0; $i<count($_POST["clave"])-1; $i++) {

            updateInstrumentos ($uclave[$i], $uunidad[$i], $unombre[$i], $upeso[$i], $ucalificaciones[$i]);

        }

    }
    
}

function updateInstrumentos ($uclave, $uunidad, $unombre, $upeso, $ucalificaciones) {

    $conn = conectar();
	$sql = "UPDATE NOTAS.INSTRUMENTOS SET unidad='$uunidad', nombre='$unombre', peso='$upeso', calificacion='$ucalificaciones' WHERE clave='$uclave'";
	$conn->query( $sql );

}

function crearDropdownDeUnidad($asignatura, $cont, $activo) {
    $conexion = conectar();
    // Para cargar todas las opciones, se hace una consulta a la tabla unidades con el codigo asignatura
    $consulta = "SELECT clave, nombre FROM unidades WHERE asignatura = '$asignatura'";

    // Se abre la columna con un select que es el campo y el count que es la fila donde se guarda
    echo "<TD><select name='unidad[$cont]'>";
    // Opcion vacia por si quieres borrarlo
    echo "<option value=''></option>";
    if ($result = mysqli_query($conexion, $consulta)) {
        foreach ($result as $fila) {
            // Por cada unidad se crea una opcion del select
            echo "<option value='".$fila['clave']."'";
            if ($fila['clave'] == $activo) {
                // Si la clave es la que tenía el instrumento se pone selected que es la que se muestra elegida por defecto cuando lapaigina cargue.
                echo "selected='selected'";
            }
            echo ">".$fila['nombre']."</option>";
        }
    }
    echo "</select></td>";
}

// EXPEDIENTE

function displayExpediente () {
    $conexion = conectar();
    $consulta="select codigo, nombre,
    (select sum((u.porcentaje/100)*
                (select sum((peso/100)*calificacion)
                from instrumentos as i
                where i.unidad=u.clave))
    from unidades as u
    where u.asignatura=a.codigo) as notamedia
from asignaturas as a";
    if ($result=mysqli_query($conexion, $consulta)) {
        $cont=0;
        while($fila=mysqli_fetch_row($result)){
            echo "<TR>";
            echo "  <TD><INPUT type='text' disabled='disabled' name='codigo[$cont]' value='$fila[0]' size='10'></TD>";
            echo "  <TD><INPUT type='text' disabled='disabled' name='nombre[$cont]' value='$fila[1]' size='40'></TD>";
            echo "  <TD><INPUT type='text' disabled='disabled' name='nota media[$cont]' value='$fila[2]' size='9'></TD>";
            echo "<TR>";
            echo "</TR>";
            $cont++;
        }   
        mysqli_free_result($result);
     }
}

?>