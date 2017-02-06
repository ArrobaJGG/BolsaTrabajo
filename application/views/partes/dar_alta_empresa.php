<div class="divNgView centrarElementos">
    <div class="titulo"><h4>Dar alta empresa</h4></div> 
    <form  name="crearUnUsuario" >
        <div class="dosPartes">
    	   <span  class="mitad">Nombre empresa</span>
    	   <input  class="mitad" type="text" name="nombre" ng-model="nombreEmpresa" required>
    	</div>
    	<div class="dosPartesdos">
        	<span class="mitad">correo(nombre usuario)</span><input  class="mitad" ng-model="userAng" type="email" name="usuario" required>
    	</div>
    	<span class="centrado" ng-show = "usuarioCreado">{{mensaje}}</span>
    	<button ng-disabled="!crearUnUsuario.$valid" ng-click="enviar()">Enviar</button>
    </form>
</div>