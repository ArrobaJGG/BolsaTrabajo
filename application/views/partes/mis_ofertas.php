<div class="divNgView">
	<div class="titulo">
        <h4>Mis ofertas</h4>
    </div>
    <div class="elementoRepetible familias">
    	<div ng-click = "ir('/BolsaTrabajo/mostrar_ofertas_controller/index/'+oferta.id_oferta)" class="elementoInterno  seleccionableNav animate-repeat-horizontal"  ng-repeat="oferta in ofertas">
    	    <div >
        		<div class="tituloOferta">{{oferta.titulo}}</div>
        		<div ng-show="oferta.nombre_empresa">Empresa: {{oferta.nombre_empresa}}</div>
        		<div>Descripcion: {{oferta.resumen}}</div>
    		</div>
    	</div>
	</div>
</div>