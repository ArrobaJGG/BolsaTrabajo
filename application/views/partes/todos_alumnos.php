<div class="divNgView">
	<div class="titulo">
        <h4>Todos los alumnos</h4>
    </div>
    <div class="paginas">
        <div>
            <i ng-click="anteriorPagina()" ng-show="pagina>0"class="fa fa-arrow-left"></i>
        </div>
        <div>pagina {{pagina+1}} de {{numeroPaginas}}</div>
        <div>
            <i ng-show="pagina<numeroPaginas-1" ng-click="siguientePagina()" class="fa fa-arrow-right"></i>
        </div>
    </div>
    <div class="elementoRepetible familias">
		<div class="elementoInterno seleccionableNav animate-repeat-horizontal" ng-controller="alumnoCtrl" ng-repeat="alumno in alumnos">
			<div>
			Nombre:{{alumno.nombre}}<br>
			Apellidos:{{alumno.apellidos}}
			<mi-editor-perfil alumno = "alumno.id_login"></mi-editor-perfil>
			</div>
		</div>
	</div>
</div>