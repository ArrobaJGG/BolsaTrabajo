<div class="divNgView">
	<div class="compartimento">
	    <div class="titulo">
            <h4>Alumnos</h4>
        </div>
	    <div class="elementoRepetible alumno">
    		<div class="elementoInterno   animate-repeat-horizontal" ng-repeat = "alumno in alumnos">
    			<div ng-click = "ir('/BolsaTrabajo/resumen_alumno_controller/index/'+alumno.id_login)">
	    		    <div  class="dosPartes centrarElementos">
	    		        <div class="mitad">Nombre:</div>
	    		        <div class="mitad">{{alumno.nombre}}</div>
	    		    </div>
    		    </div>
    			<div  class="dosPartes centrarElementos">
                    <div class="mitad centrarElementos">Apellidos:</div>
                    <div class="mitad">{{alumno.apellidos}}</div>
                </div>
    		</div>
		</div>
		<div ng-show="alumnos.length ==0">
            No hay ofertas
        </div>
	</div>
	<div class ="compartimento">
	    <div class="titulo">
            <h4>Ofertas</h4>
        </div>
        <div class="elementoRepetible familias">
			<div class="elementoInterno seleccionableNav animate-repeat"  ng-repeat = "oferta in ofertas">
				<div ng-click = "ir('/BolsaTrabajo/mostrar_ofertas_controller/index/'+oferta.id_oferta)">
	        		<div class="tituloOferta">{{oferta.titulo}}</div>
	        		<div ng-show="oferta.nombre_empresa">Empresa: {{oferta.nombre_empresa}}</div>
	                <div>Descripcion: {{oferta.resumen}}</div>
				</div>
			</div>
		</div>
		<div ng-show="ofertas.length ==0">
		    No hay ofertas
		</div>
	</div>
</div>