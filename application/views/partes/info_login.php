<div class="infoLogin" ng-controller="infoLoginCtrl">
    <div class="pestana">
        <i class="fa fa-user fa-2x"></i>
    </div>
    <div class="contenidoInfoLogin">
        <div class="imagenSalir"
        <div>
            <?php if($existeImagen) {?>
            <div class="iconito">
                <img  src=" <?php echo $rutaImagen; ?>"/>
            </div>
        <?php }  ?>
       
            <div>
               <i ng-click="clicar()" class="fa fa-sign-out fa-2x"></i> 
            </div>
        </div>
        <div>
        	 <?php if($existeEditar) { ?>
        		<a href="/BolsaTrabajo/<?php echo $rutaEditar; ?>">Editar perfil</a><br>
    		<?php  }  ?>
            cuenta: <?php echo $cuenta; ?><br>
            
        </div>
    </div>
</div>