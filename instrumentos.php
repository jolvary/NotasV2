<HTML>

    <?php
    
    include('funciones.php');
    
    //DBCreation();
    $conn = conectar();
    $asig = $_GET['asignatura'];

    $sql = ("SELECT name FROM ESTUDIOS.ASIGNATURAS where code='$asig'");
    $nombre = $conn->query($sql);
    $code = mysqli_fetch_row($nombre);
	$nasignatura = $code[0];
    ?>

<HEAD>

    <TITLE>UNIDADES</TITLE>

</HEAD>

<BODY>
    <center>
    <h2><a href="index.php"><div style="float: left">Volver</div></a>
    <div align="center"><?php echo 'Asignatura ', $asig, " : ", $nasignatura;?></div></h2>

    <h1 style="text-align:center;"><img src='iconos/tarta.png'> UNIDADES </h1>
    <FORM METHOD=POST ACTION="">
        <TABLE>
			<TR><TH>Unidad</TH><TH>Nombre del Instrumento</TH><TH>Peso (%)</TH><TH>Calificación</TH></TR>
		    <?php 
                //var_dump($_GET);
                //var_dump($_POST);
                procesarCambiosInstrumentos();
                displayInstrumentos();
                
            ?>
        </TABLE><br/>
		<INPUT TYPE="submit" name="procesar" value="Guardar Cambios">
		<INPUT TYPE="submit" name="procesar" value="Descartar Cambios">            
    </FORM>
    </center>
</BODY>

</HTML>