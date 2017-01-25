<div>
    <div ><span>Seleccione una familia laboral</span>
        <div ng-controller="familiaCtrl"  id="familias" ng-repeat="familia in familias track by familia.id_familia_laboral">
            <div ng-click="seleccionar(familia.id_familia_laboral)" ng-show="!modoEditarFamilia">
                <span>{{familia.nombre}}</span><button ng-click="editarFamilia($event)" >Editar</button> <button ng-click="borrarFamilia($event)" value="{{familia.id_familia_laboral}}">borrar</button>
                <span ng-show="error">{{mensaje}}</span>
            </div>
            <span ng-show="modoEditarFamilia">
                <input type="text" ng-init="nombreFamiliaAng=familia.nombre" ng-model = "nombreFamiliaAng"> <button value="{{familia.id_familia_laboral}}" ng-click="enviarFamilia($event)">Enviar</button>
            </span>
        </div>
    </div>
    <div ><span>Seleccione una categoria</span>
        <div ng-controller="categoriaCtrl" ng-repeat="categoria in categorias">
            <div ng-show="!modoEditarCategoria" ng-click="seleccionarCategoria(categoria.id_categoria)">{{categoria.nombre}}<button ng-click="editar($event)">Editar</button> <button value="{{categoria.id_categoria}}" ng-click="borrar($event)">Borrar</button>
                <span ng-show="error">{{mensaje}}</span>
            </div>
            <form ng-show="modoEditarCategoria"name="editarCategoria">
                <input type="text" ng-init="categoriaAng=categoria.nombre" required ng-model="categoriaAng"><button ng-disabled="!editarCategoria.$valid" value="{{categoria.id_categoria}}" ng-click="enviar($event)">Enviar</button>
                <span>{{mensaje}}</span>
            </form>
        </div>
        <button ng-show="!estadoAgregando" ng-click="mostrarAgregar()">Agregar</button>
        <form name="nuevaCategoria" ng-show="estadoAgregando">
            <input type="text" required ng-model="categoriaAng"><button ng-disabled="!nuevaCategoria.$valid" ng-click="agregar()">Enviar</button>
        </form>
    </div>
    <div>
        <div ng-show="familiaSeleccionada" style="border:1px solid" id="cursos">
    		<h3>Cursos</h3>
            <div ng-controller="cursoCtrl" ng-repeat= "curso in cursos | filter: {id_familia : familiaSeleccionada,id_categoria : categoriaSeleccionada}">
                <span>{{curso.nombre}}</span>
                <span ng-show="!modoEditarCurso">
                    <span>{{curso.nombre}}</span><button ng-click="editarEtiqueta()" >Editar</button> <button ng-click="borrarCurso($event)" value="{{curso.id_curso}}">borrar</button>
                </span>
                <span ng-show="modoEditarCurso">
                    <input type="text" ng-init="nombreCursoAng=curso.nombre" ng-model = "nombreCursoAng"> <button value="{{curso.id_curso}}" ng-click="enviarCurso($event)">Enviar</button>
                </span>
            </div> 
            
        </div>
       	<div ng-show="familiaSeleccionada" style="border:1px solid" id="etiquetas">
			<h3>Etiquetas</h3>       
            <div ng-controller="etiquetaCtrl" ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
            	<span ng-show="!modoEditarEtiqueta">
            		<span>{{etiqueta.nombre}}</span><button ng-click="editarEtiqueta()" >Editar</button> <button ng-click="borrarEtiqueta($event)" value="{{etiqueta.id_etiqueta}}">borrar</button>
            	</span>
            	<span ng-show="modoEditarEtiqueta">
            		<input type="text" ng-init="nombreEtiquetaAng=etiqueta.nombre" ng-model = "nombreEtiquetaAng"> <button value="{{etiqueta.id_etiqueta}}" ng-click="enviarEtiqueta($event)">Enviar</button>
            	</span>
            </div>
            <div id="anadirEtiqueta">
                <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                <input type="text" ng-model="etiquetaAng" /><button ng-click="anadirEtiqueta()">Añadir</button>
            </div>
       </div>
    </div>
</div>
