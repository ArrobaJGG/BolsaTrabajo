<table border="1">
	<tr>
		<th>Nuevas Altas</th>
		<th>reportes</th>
	</tr>
	<tr>
		<td>
		<table>
			<p ng-show="estaCargandoNuevasAltas">cargando</p>
				<p ng-controller="nuevaAltaCtrl" style="border:1px solid" ng-repeat="nueva in nuevasAltas"> 
					nombre empresa: {{nueva.nombre}}</br>
					correo: {{nueva.correo}}<br>
					<button ng-click="validarEmpresa($event)" value="{{nueva.id_login}}">Validar</button>
					<button ng-click="borrarEmpresa($event)" value="{{nueva.id_login}}">Borrar</button>
					<br><span>{{mensaje}}</span>
				</p>
			
		</table>
		</td>
		<td>
			<div>
				<p ng-show="estaCargando">cargando</p>
				<p ng-controller="reporteCtrl"style="border:1px solid" ng-repeat="reporte in reportes"> 
					tipo: {{reporte.tipo}}<br/>
					nombre {{reporte.tipo}}: {{reporte.nombre}}</br>
					descripcion: {{reporte.descripcion}}<br/>
					<button ng-click="eliminarReporte($event,reporte.id_reporte)">Ignorar</button> <button  ng-click="eliminarEntidad($event,reporte.id_entidad,reporte.tipo)">Eliminar {{reporte.tipo}}</button>
				</p>
			</div>
		</td>
	</tr>
</table>

