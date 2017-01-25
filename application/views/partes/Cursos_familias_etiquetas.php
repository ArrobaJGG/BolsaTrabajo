<div>
    <div><span>Seleccione una familia laboral</span></div>
    <div ng-click="seleccionar(familia.id_familia_laboral)" id="familias" ng-repeat="familia in familias track by familia.id_familia_laboral">
        {{familia.nombre}}
    </div>
    <div>
        <div id="cursos">
            <div  ng-repeat= "curso in cursos | filter: {id_familia : familiaSeleccionada}">
                <span>{{curso.nombre}}</span>
            </div> 
            
        </div>
       <div id="etiquetas">
           <div ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
               <span>{{etiqueta.nombre}}</span>
           </div>
           <div ng-show="familiaSeleccionada" id="anadirEtiqueta">
                <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                <input type="text" ng-model="etiquetaAng" /><button ng-click="anadirEtiqueta()">Añadir</button>
            </div>
       </div>
    </div>
</div>
