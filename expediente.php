<HTML>

    <?php
    
    include('funciones.php');
    
    //DBCreation();
    $conn = conectar();
    
    ?>

<HEAD>

    <TITLE>UNIDADES</TITLE>

</HEAD>

<BODY>
    <center>

    <h1 style="text-align:center;"><img src='iconos/birrete.png'> EXPEDIENTE </h1>
    <FORM METHOD=POST ACTION="">
        <TABLE>
			<TR><TH>Código</TH><TH>Nombre</TH><TH>Nota Media</TH></TR>
		    <?php 
                //var_dump($_GET);
                //var_dump($_POST);
                displayExpediente();
                
            ?>
        </TABLE><br/>
             
    </FORM>
    </center>
</BODY>

</HTML>