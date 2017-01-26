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
        <button ng-show="!estadoAgregandoFamilia" ng-click="mostrarAgregarFamilia()">Agregar</button>
        <form name="nuevaFamilia" ng-show="estadoAgregandoFamilia">
            <input type="text" required ng-model="familiaAng"><button ng-disabled="!nuevaFamilia.$valid" ng-click="agregarFamilia()">Enviar</button>
        </form>
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
                <form ng-show="!modoEditarCurso">
                    <span>{{curso.nombre}}</span><button ng-click="editarCurso()" >Editar</button> <button ng-click="borrar($event)" value="{{curso.id_curso}}">borrar</button>
                </form>
                <form name="editarCursoForm"ng-show="modoEditarCurso">
                	<span>Categoria</span>
                	<select ng-init="categoriaAng = curso.id_categoria"ng-model="categoriaAng" name="seleccionarCategoria">
		        		<option ng-repeat = "categoria in categorias" value="{{categoria.id_categoria}}">{{categoria.nombre}}</option>
		        	</select><br>
		        	<span>Familia</span>
                	<select ng-init="familiaCursoAng=curso.id_familia" ng-model="familiaCursoAng" name="seleccionarFamilia">
		        		<option ng-repeat = "familia in familias" value="{{familia.id_familia_laboral}}">{{familia.nombre}}</option>
		        	</select><br>
                    <input type="text" ng-init="nombreCursoAng=curso.nombre" required ng-model = "nombreCursoAng"> <button ng-disabled="!editarCursoForm.$valid" value="{{curso.id_curso}}" ng-click="enviar($event)">Enviar</button>
                </form>
            </div> 
            <button ng-show="!estadoAgregandoCurso" ng-click="mostrarAgregarCurso()">Agregar</button>
		        <form name="nuevoCurso" ng-show="estadoAgregandoCurso">
		        	<span>Categoria</span>
		        	<select required ng-model="categoriaCursoAng" name="seleccionarCategoria">
		        		<option ng-repeat = "categoria in categorias" value="{{categoria.id_categoria}}">{{categoria.nombre}}</option>
		        	</select><br>
		        	<span>Nombre</span>
		            <input type="text" required ng-model="cursoAng"><button ng-disabled="!nuevoCurso.$valid" ng-click="agregarCurso()">Enviar</button>
		        </form>
        </div>
       	<div ng-show="familiaSeleccionada" style="border:1px solid" id="etiquetas">
			<h3>Etiquetas</h3>       
            <div ng-controller="etiquetaCtrl" ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
            	<span ng-show="!modoEditarEtiqueta">
            		<span>{{etiqueta.nombre}}</span><button ng-click="editarEtiqueta()" >Editar</button> <button ng-click="borrarEtiqueta($event)" value="{{etiqueta.id_etiqueta}}">borrar</button>
            	</span>
            	<form name="editarEtiquetaForm" ng-show="modoEditarEtiqueta">
            		<input type="text" ng-init="nombreEtiquetaAng=etiqueta.nombre" ng-model = "nombreEtiquetaAng" required> <button value="{{etiqueta.id_etiqueta}}" ng-disabled="!editarEtiquetaForm.$valid" ng-click="enviarEtiqueta($event)">Enviar</button>
            	</form>
            </div>
            <form name="anadirEtiquetaForm" id="anadirEtiqueta">
                <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                <input type="text" ng-model="etiquetaAng" required /><button ng-disabled="!anadirEtiquetaForm.$valid" ng-click="anadirEtiqueta()">Añadir</button>
            </form>
       </div>
    </div>
</div>
