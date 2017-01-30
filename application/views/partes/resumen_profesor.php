<div>
	<div class="alumnos">
		<h3>Alumnos</h3>
		<div ng-repeat = "alumno in alumnos">
			{{alumno.nombre}}
			{{alumno.id_login}}
		</div>
	</div>
	<div class ="ofertas">
		<h3>Ofertas</h3>
		<div ng-repeat = "oferta in ofertas">
			{{oferta.nombre}}
		</div>
	</div>
</div>