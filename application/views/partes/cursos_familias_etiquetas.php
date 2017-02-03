<div class="divNgView">
	<div class ="dosPartes">
	    <div>
	    	<div class="titulo">
				<h4>Seleccione una familia laboral</h4>
			</div>
			<div class="elementoRepetible familias">
		        <div class="elementoInterno animate-repeat-horizontal" ng-controller="familiaCtrl"  id="familias" ng-repeat="familia in familias track by familia.id_familia_laboral">
		            <div class="ponerAbajo" ng-show="!modoEditarFamilia" ng-click="seleccionar(familia.id_familia_laboral)">
			            <div class="iconoInterno">
			            	<i class="fa fa-times" ng-click="borrarFamilia($event,familias,$index)"></i>
			            </div>
			            <div>
			                <span>{{familia.nombre}}</span>
			                <span ng-show="error">{{mensaje}}</span>
			            </div>
		            	<div class="iconoInternoCentro">
		            		<i class="fa fa-pencil-square-o"ng-click="editarFamilia($event)" ></i> 
			            </div>
		            </div>
		            <form class="ponerAbajo"  ng-show="modoEditarFamilia">
		               <div>
		                   <input type="text" ng-init="nombreFamiliaAng=familia.nombre" ng-model = "nombreFamiliaAng"> 
		               </div>
		               <div class="iconoInternoCentro">
                            <i class="fa fa-paper-plane" ng-click="enviarFamilia($event)"></i>
		               </div>
		            </form>
		        </div>
	        </div>
	        <div class="iconoInternoCentro">
	           <i class="fa fa-plus-circle fa-2x" ng-show="!estadoAgregandoFamilia" ng-click="mostrarAgregarFamilia()"></i>
           </div>
	        <form class="iconoInternoCentro" name="nuevaFamilia" ng-show="estadoAgregandoFamilia">
	            <input type="text" required ng-model="familiaAng">
	            <i class="fa fa-paper-plane" ng-show="nuevaFamilia.$valid" ng-click="agregarFamilia()"></i>
	            <i class="fa fa-times" ng-click="estadoAgregandoFamilia=false"></i>
	        </form>
	    </div>
	    <div>
	    	<div class="titulo">
				<h4>Seleccione una categoria</h4>
			</div>
			<div class="elementoRepetible familias">
		        <div class="elementoInterno animate-repeat-horizontal" ng-controller="categoriaCtrl" ng-repeat="categoria in categorias">
		            <div ng-click="seleccionarCategoria(categoria.id_categoria)" class="ponerAbajo" ng-show="!modoEditarCategoria">
			            <div class="iconoInterno">
			            	<i class="fa fa-times" ng-click="borrar($event,categorias,$index)"></i>
			            </div>
			            <div >{{categoria.nombre}} 
			                <span ng-show="error">{{mensaje}}</span>
			            </div>
			            <div class="iconoInternoCentro">
			            	<i class="fa fa-pencil-square-o" ng-click="editar($event)"></i>
			            </div>
		           </div>
		            <form class="ponerAbajo"  ng-show="modoEditarCategoria"name="editarCategoria">
		                <input type="text" ng-init="categoriaAng=categoria.nombre" required ng-model="categoriaAng">
		                <div class="iconoInternoCentro">
                            <i class="fa fa-paper-plane" ng-show="editarCategoria.$valid" ng-click="enviar($event)"></i>
		                </div>
		                <span>{{mensaje}}</span>
		            </form>
		        </div>
	       </div>
	       <div class="iconoInternoCentro">
	           <i class="fa fa-plus-circle fa-2x" ng-show="!estadoAgregando" ng-click="mostrarAgregar()"></i>
            </div>
            <form class="iconoInternoCentro" name="nuevaCategoria" ng-show="estadoAgregando">
                <input type="text" required ng-model="categoriaAng">
                <i class="fa fa-paper-plane" ng-show="nuevaCategoria.$valid" ng-click="agregar()"></i>
                <i class="fa fa-times" ng-click="estadoAgregando=false"></i>
            </form>
	    </div>
    </div>
    <div class="dosPartes">
        <div ng-show="familiaSeleccionada"  id="cursos">
    		<div class="titulo">
                <h4>Cursos</h4>
            </div>
            <div class="elementoRepetible familias">
                <div class="elementoInterno animate-repeat-horizontal" ng-controller="cursoCtrl" ng-repeat= "curso in cursos | filter: {id_familia : familiaSeleccionada,id_categoria : categoriaSeleccionada} track by curso.id_curso">
                    <div ng-show="!modoEditarCurso">
                        <div class="iconoInterno">
                            <button ng-click="borrar(cursos,curso.id_curso)">borrar</button>
                        </div>
                        <span>{{curso.nombre}}</span>
                        <div class="iconoInternoCentro">
                            <i class="fa fa-pencil-square-o"  ng-click="editarCurso()" ></i>       
                        </div>
                    </div>
                    <form name="editarCursoForm"ng-show="modoEditarCurso">
                    	<span>Categoria</span>
                    	<select ng-init="categoriaAng = curso.id_categoria"ng-model="categoriaAng" name="seleccionarCategoria">
    		        		<option ng-repeat = "categoria in categorias" value="{{categoria.id_categoria}}">{{categoria.nombre}}</option>
    		        	</select><br>
    		        	<span>Familia</span>
                    	<select ng-init="familiaCursoAng=curso.id_familia" ng-model="familiaCursoAng" name="seleccionarFamilia">
    		        		<option ng-repeat = "familia in familias" value="{{familia.id_familia_laboral}}">{{familia.nombre}}</option>
    		        	</select><br>
                        <input type="text" ng-init="nombreCursoAng=curso.nombre" required ng-model = "nombreCursoAng"> 
                        <i class="fa fa-paper-plane" ng-show="editarCursoForm.$valid" ng-click="enviar()">Enviar</i>
                    </form>
                </div> 
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
