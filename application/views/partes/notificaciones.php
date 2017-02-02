<div class="divNgView">
	<section class="compartimento">
		<div class="titulo">Nuevas Altas</div>
		<div>
           <p ng-show="estaCargandoNuevasAltas">cargando</p>
           <div class="elementoNotificacion">
                <div class="animate-repeat" ng-controller="nuevaAltaCtrl" ng-repeat="nueva in nuevasAltas"> 
                    Nombre empresa: {{nueva.nombre}}</br>
                    Correo: {{nueva.correo}}
                    <br><span>{{mensaje}}</span>
                    <div class="iconos">
                        <i class="fa fa-check" ng-click="validarEmpresa($event)" value="{{nueva.id_login}}"></i>
                        <i class="fa fa-trash-o fa-lg" ng-click="borrarEmpresa($event)" value="{{nueva.id_login}}"></i>
                    </div>  
                </div>
            </div>
            <span>{{mensajeNuevasAltas}}</span>
        </div>
    </section>
    <section class="compartimento">
	    <div class="titulo">Reportes</div>
		<div>
			<p ng-show="estaCargando">cargando</p>
			<div class="elementoNotificacion">
    			<div class="animate-repeat" ng-controller="reporteCtrl" ng-repeat="reporte in reportes"> 
    				Tipo: {{reporte.tipo}}<br/>
    				nombre {{reporte.tipo}}: {{reporte.nombre}}</br>
    				descripcion: {{reporte.descripcion}}<br/>
    				<div class="iconos">
        				<i class="fa fa-times" ng-click="eliminarReporte($event,reporte.id_reporte)">Ignorar</i>
        				<i class="fa fa-trash-o"  ng-click="eliminarEntidad($event,reporte.id_entidad,reporte.tipo,reporte.id_reporte)">Eliminar {{reporte.tipo}}</i>
    			    </div>
    			</div>
    			<span>{{mensajeReportes}}</span>
			</div>
		</div>
	</section>
</div>

