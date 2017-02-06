<div class="divNgView">
	<div class="compartimento">
	    <div class="titulo">
            <h4>Alumnos</h4>
        </div>
	    <div class="elementoRepetible alumno">
    		<div class="elementoInterno   animate-repeat-horizontal" ng-repeat = "alumno in alumnos">
    		    <div  class="dosPartes centrarElementos">
    		        <div class="mitad">Nombre:</div>
    		        <div class="mitad">{{alumno.nombre}}</div>
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
		<div ng-repeat = "oferta in ofertas">
			{{oferta.nombre}}
		</div>
		<div ng-show="ofertas.length ==0">
		    No hay ofertas
		</div>
	</div>
</div>