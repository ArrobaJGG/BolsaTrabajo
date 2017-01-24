<div>
    <div><span>Seleccione una familia laboral</span></div>
    <div ng-click="seleccionar(familia.id_familia_laboral)" id="familias" ng-repeat="familia in familias track by familia.id_familia_laboral">
        {{familia.nombre}}
    </div>
    <div>
        <div style="border:1px solid" id="cursos">
    		<h3>Cursos</h3>
            <div  ng-repeat= "curso in cursos | filter: {id_familia : familiaSeleccionada}">
                <span>{{curso.nombre}}</span>
            </div> 
            
        </div>
       	<div style="border:1px solid" id="etiquetas">
			<h3>Etiquetas</h3>       
            <div ng-controller="etiquetaCtrl" ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
            	<span ng-show="!modoEditarEtiqueta">
            		<span>{{etiqueta.nombre}}</span><button ng-click="editarEtiqueta()" >Editar</button> <button ng-click="borrarEtiqueta($event)" value="{{etiqueta.id_etiqueta}}">borrar</button>
            	</span>
            	<span ng-show="modoEditarEtiqueta">
            		<input type="text" ng-init="nombreEtiquetaAng=etiqueta.nombre" ng-model = "nombreEtiquetaAng"> <button value="{{etiqueta.id_etiqueta}}" ng-click="enviarEtiqueta($event)">Enviar</button>
            	</span>
            </div>
            <div ng-show="familiaSeleccionada" id="anadirEtiqueta">
                <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                <input type="text" ng-model="etiquetaAng" /><button ng-click="anadirEtiqueta()">Añadir</button>
            </div>
       </div>
    </div>
</div>
