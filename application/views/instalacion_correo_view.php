<div>
    <form name="usu" method="post" action=" <?php echo base_url('/instalacion/correo') ?>">        
        <span>Usuario:</span>
        <input ng-model="us" required name="usuario" type = "text" />
        <br>
        <span>Contraseña:</span>
        <input  ng-model="con"  required name="contrasena" type = "text" />
        <br>
        <span>Servidor smtp:</span>
        <input  ng-model="ser" required name="servidorSmtp" type = "text" />
        <br>
        <button ng-disabled="!usu.$valid" name="enviar" value="enviar">Enviar</button>
    </form>
</div>