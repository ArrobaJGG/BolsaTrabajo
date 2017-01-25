<table border="1">
	<tr>
		<th>Nuevas Altas</th>
		<th>reportes</th>
	</tr>
	<tr>
		<td>
		<table>
			<p ng-show="estaCargandoNuevasAltas">cargando</p>
				<p style="border:1px solid" ng-repeat="nueva in nuevasAltas"> 
					nombre empresa: {{nueva.nombre}}</br>
					correo: {{nueva.correo}}<br>
					<button ng-click="validarEmpresa($event)" value="{{nueva.id_login}}">Validar</button>
				</p>
			
		</table>
		</td>
		<td>
			<div>
				<p ng-show="estaCargando">cargando</p>
				<p style="border:1px solid" ng-repeat="reporte in reportes"> 
					tipo: {{reporte.tipo}}<br/>
					nombre {{reporte.tipo}}: {{reporte.nombre}}</br>
					descripcion: {{reporte.descripcion}}<br/>
				</p>
			</div>
		</td>
	</tr>
</table>

