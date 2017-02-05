<div class="divNgView centrarElementos">
    <div class="titulo"><h4>Dar alta profesor</h4></div> 
    <form name="crearProfesor" >
        <div class="dosPartes">
        	<span class="mitad">Nombre: </span>
        	<input class="mitad" type="text" name="nombre" ng-model="nombreAng" required>
        	<span  ng-show="!crearProfesor.nombre.$valid&&crearProfesor.nombre.$touched">Campo obligatorio</span><br>
		</div>
		<div class="dosPartesdos">
        	<span class="mitad">Apellidos: </span>
        	<input class="mitad" type="text" name="apellidos" ng-model="apellidosAng" required />
    		<span ng-show="!crearProfesor.apellidos.$valid&&crearProfesor.apellidos.$touched">Campo obligatorio</span><br>
		</div>
		<div class="dosPartesdos">
        	<span class="mitad">Usuario(correo)</span>
        	<input class="mitad" type="email" name="usuario" ng-model="usuarioAng" required/>
    		<span ng-show="!crearProfesor.usuario.$valid&&crearProfesor.usuario.$touched">Campo no valido</span>
		</div>
		<div class="dosPartesdos">
    	   <span class="mitad">Familia laboral</span>
    	   <select class="mitad" name="idFamiliaLaboral" ng-model="idAng" required>
    		  <option ng-repeat="familia in familias" value="{{familia.id_familia_laboral}}">{{familia.nombre}}</option>
    	   </select>
    	   <span ng-show="!crearProfesor.idFamiliaLaboral.$valid&&crearProfesor.idFamiliaLaboral.$touched">Campo obligatorio</span>
		</div>
		<div class="dosPartesdos">
        	<span class="mitad">Esta activo:</span>
        	<div  class="mitad">
                <input type="radio" name="activo" ng-model="activoAng"  value="1">si   
                <input type="radio" name="activo" ng-model="activoAng" value="0">no  
        	</div>
    	</div>
    	<button ng-disabled="!crearProfesor.$valid" ng-click="enviar()">Enviar</button>
    	<span ng-show="usuarioCreado">{{mensaje}}</span>
    </form>
</div>