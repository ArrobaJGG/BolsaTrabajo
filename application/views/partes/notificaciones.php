<table border="1">
	<tr>
		<th>Nuevas Altas</th>
		<th>reportes</th>
	</tr>
	<tr>
		<td>
		<table>
			
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

