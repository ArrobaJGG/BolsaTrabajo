<div class="divNgView">
	<div class="titulo">
        <h4>Ofertas</h4>
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
    	<div class="elementoInterno seleccionableNav animate-repeat-horizontal" ng-repeat="oferta in ofertas">
    	    <div ng-click = "ir('/BolsaTrabajo/mostrar_ofertas_controller/index/'+oferta.id_oferta)">
        		<div class="tituloOferta">{{oferta.titulo}}</div>
        		<div ng-show="oferta.nombre_empresa">Empresa: {{oferta.nombre_empresa}}</div>
                <div>Descripcion: {{oferta.resumen}}</div>
            </div>
    	</div>
	</div>
</div>