<div class="divNgView">
	<div class="titulo">
        <h4>Ofertas</h4>
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