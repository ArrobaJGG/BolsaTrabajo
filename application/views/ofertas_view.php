<div class="divNgView">
    <div class="titulo">
        <h4>Alumnos Apuntados</h4>
    </div>
    <div class="elementoRepetible">
    <?php foreach ($alumnos as $alumno) { ?>
    	<div class="elementoInterno">
    	    Nombre: <?php echo $alumno['nombre']; ?>
    	    <br>
    	    Apellidos: <?php echo $alumno['apellidos']; ?>
    	    <br>
    	    e-mail: <?php echo $alumno['correo']; ?>
    	    <br>
    	    curso: <?php echo $alumno['curso'];?>
    	</div>
    	
    <?php } ?>
    </div>
</div>