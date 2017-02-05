<div class="divNgView">
	<div class ="dosPartes">
	    <div>
	    	<div class="titulo">
				<h4>Seleccione una familia laboral</h4>
			</div>
			<div class="elementoRepetible familias">
		        <div class="elementoInterno   animate-repeat-horizontal" ng-controller="familiaCtrl"  id="familias" ng-repeat="familia in familias track by familia.id_familia_laboral">
		            <div class="ponerAbajo" ng-show="!modoEditarFamilia" ng-click="seleccionar(familia.id_familia_laboral)">
			            <div class="iconoInterno">
			            	<i class="fa fa-times" ng-click="borrarFamilia($event,familias,$index)"></i>
			            </div>
			            
		                <span class="centrado">{{familia.nombre}}</span>
		                <span ng-show="error">{{mensaje}}</span>
		       
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
			            <div class="centrado">{{categoria.nombre}} 
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
		                <span class="centrado">{{mensaje}}</span>
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
        <div ng-show="familiaSeleccionada">
    		<div class="titulo">
                <h4>Cursos</h4>
            </div>
            <div class="elementoRepetible familias">
                <div class="elementoInterno  animate-repeat-horizontal" ng-controller="cursoCtrl" ng-repeat= "curso in cursos | filter: {id_familia : familiaSeleccionada,id_categoria : categoriaSeleccionada} track by curso.id_curso">
                    <div class="ponerAbajo"  ng-show="!modoEditarCurso">
                        <div class="iconoInterno">
                            <i class="fa fa-times"  ng-click="borrar(cursos,curso.id_curso)"></i>
                        </div>
                        <span class="centrado">{{curso.nombre}}</span>
                        <div class="iconoInternoCentro">
                            <i class="fa fa-pencil-square-o"  ng-click="editarCurso()" ></i>       
                        </div>
                    </div>
                    <form class="ponerAbajo"  name="editarCursoForm"ng-show="modoEditarCurso">
                    	<span>Categoria</span>
                    	<select ng-init="categoriaAng = curso.id_categoria"ng-model="categoriaAng" name="seleccionarCategoria">
    		        		<option ng-repeat = "categoria in categorias" value="{{categoria.id_categoria}}">{{categoria.nombre}}</option>
    		        	</select><br>
    		        	<span>Familia</span>
                    	<select ng-init="familiaCursoAng=curso.id_familia" ng-model="familiaCursoAng" name="seleccionarFamilia">
    		        		<option ng-repeat = "familia in familias" value="{{familia.id_familia_laboral}}">{{familia.nombre}}</option>
    		        	</select><br>
                        <textarea ng-init="nombreCursoAng=curso.nombre" required ng-model = "nombreCursoAng"> </textarea>
                        <div class="iconoInternoCentro">
                            <i class="fa fa-paper-plane" ng-show="editarCursoForm.$valid" ng-click="enviar()"></i>
                        </div>
                    </form>
                </div> 
            </div>
            <div class="iconoInternoCentro">
                <i class="fa fa-plus-circle fa-2x"ng-show="!estadoAgregandoCurso" ng-click="mostrarAgregarCurso()"></i>
            </div>
            <div class="agregarEntidad" ng-show="estadoAgregandoCurso">
		        <form class="ponerAbajo" name="nuevoCurso" >
		            <span>Nuevo curso en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
		            <div>
		                <span>Categoria:</span>
                        <select required ng-model="categoriaCursoAng" name="seleccionarCategoria">
                            <option ng-repeat = "categoria in categorias" value="{{categoria.id_categoria}}">{{categoria.nombre}}</option>
                        </select><br>
		            </div>
		        	<span >Nombre</span>
		            <textarea required ng-model="cursoAng"></textarea>
		            <div class="iconoInternoEspaciado">
		              <i class="fa fa-paper-plane" ng-show="nuevoCurso.$valid" ng-click="agregarCurso()"></i>
		              <i class="fa fa-times" ng-click="estadoAgregandoCurso=false"></i>
		            </div>
		        </form>
	        </div>
        </div>
       	<div ng-show="familiaSeleccionada">
			<div class="titulo">
                <h4>Etiquetas</h4>
            </div>
            <div class="elementoRepetible familias">   
                <div class="elementoInterno animate-repeat-horizontal" ng-controller="etiquetaCtrl" ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
                	<div class="ponerAbajo" ng-show="!modoEditarEtiqueta">
                	    <div class="iconoInterno">
                	        <i class="fa fa-times" ng-click="borrarEtiqueta(etiquetas)" value="{{etiqueta.id_etiqueta}}"></i>
            	        </div>
                		<span class="centrado">{{etiqueta.nombre}}</span>
                		<div class="iconoInternoCentro">
                		    <i class="fa fa-pencil-square-o" ng-click="editarEtiqueta()" ></i>
                		</div>
                	</div>
                	<form class="ponerAbajo" name="editarEtiquetaForm" ng-show="modoEditarEtiqueta">
            	        <div class="iconoInternoCentro">
                            <input type="text" ng-init="nombreEtiquetaAng=etiqueta.nombre" ng-model = "nombreEtiquetaAng" required> 
                        </div>
                        <div class="iconoInternoCentro">
                            <button value="{{etiqueta.id_etiqueta}}" ng-disabled="!editarEtiquetaForm.$valid" ng-click="enviarEtiqueta($event)">Enviar</button>   
                        </div>            	        
                	</form>
                </div>
            </div>
            <div ng-show="!agregarEtiqueta" class="iconoInternoCentro">
               <i class="fa fa-plus-circle fa-2x" ng-click="agregarEtiqueta = true"></i>
            </div>
            <div class="agregarEntidad"  ng-show="agregarEtiqueta">
                <form class="ponerAbajo"  name="anadirEtiquetaForm" id="anadirEtiqueta">
                    <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                    <input type="text" ng-model="etiquetaAng" required />
                    <div class="iconoInternoEspaciado">
                      <i class="fa fa-paper-plane" ng-show="anadirEtiquetaForm.$valid" ng-click="anadirEtiqueta()"></i>
                      <i class="fa fa-times" ng-click="agregarEtiqueta=false"></i>
                    </div>
                </form>
            </div>
       </div>
    </div>
</div>
