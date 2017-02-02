<div class="divNgView">
	<div class="titulo">
		<h4>Dar baja Alumno</h4>
		<div class="paginas">
			<div>
				<i ng-click="anteriorPagina()" ng-show="pagina>0"class="fa fa-arrow-left"></i>
			</div>
			<div>pagina {{pagina+1}} de {{numeroPaginas}}</div>
			<div>
				<i ng-show="pagina<numeroPaginas-1" ng-click="siguientePagina()" class="fa fa-arrow-right"></i>
			</div>
		</div>
	</div>
	<div class="elementoRepetible alumno">
		<div class="elementoInterno animate-repeat-horizontal">
            <form name="buscarForm" ng-submit="buscar(nombreAng,apellidoAng)">
                <div class="iconoInterno">
                    <i ng-click="buscar(nombreAng,apellidoAng)" class="fa fa-search">Buscar</i>
                </div>
                <div class="buscadorInterno">
                    <span>Nombre:</span> <input ng-model="nombreAng" input type="text"><br>
                </div>
                <div class="buscadorInterno">
                    <span>Apellidos: </span><input ng-model="apellidoAng" type="text"><br>
                </div>
                <button ng-hide="true" ng-click="buscar(nombreAng,apellidoAng)"></button>
            </form>
        </div>
		<div class="elementoInterno animate-repeat-horizontal" ng-repeat="alumno in alumnos" ng-controller="borrarAlumnoCtrl">
			<div class="iconoInterno">
				<i class="fa fa-times" ng-click="borrar(alumnos,$index)"></i>
			</div>
			Nombre: {{alumno.nombre}}<br>
			Apellidos: {{alumno.apellidos}}<br>
			<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
		</div>
    </div>
	 <div class="compartimento" ng-show="alumnos.length==0">
        <div class="titulo">No hay alumnos</div>
        <img src="/BolsaTrabajo/assets/imgs/tumbleweed.gif">
    </div>
</div>