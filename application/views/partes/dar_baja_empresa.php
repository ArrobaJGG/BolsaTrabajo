<div class="divNgView">
    <div class="titulo">
        <h4>Dar baja Empresa</h4>
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
    <div class="elementoRepetible empresa">
        <div class="elementoInterno animate-repeat-horizontal">
            <form name="buscarForm" ng-submit="buscar(nombreAng,correoAng)">
                <div class="iconoInterno">
                    <i ng-click="buscar(nombreAng,correoAng)" class="fa fa-search">Buscar</i>
                </div>
                <div class="buscadorInterno">
                    <span>Nombre empresa:</span> <input ng-model="nombreAng" input type="text"><br>
                </div>
                <div class="buscadorInterno">
                    <span>correo: </span><input ng-model="correoAng" type="text"><br>
                </div>
                <button ng-hide="true" ng-click="buscar(nombreAng,correoAng)"></button>
            </form>
        </div>
        <div class="elementoInterno animate-repeat-horizontal" ng-repeat="empresa in empresas" ng-controller="borrarEmpresaCtrl">
        	<div class="iconoInterno">
                <i class="fa fa-times" ng-click="borrar(empresas,$index)"></i>
            </div>
        	Nombre empresa: {{empresa.nombre}}<br>
        	Correo: {{empresa.correo}}<br>
        	Estado: <span ng-show="estado(empresa.estado)">Validado</span><span ng-show="!estado(empresa.estado)">No validado</span>
        	<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
        </div>
        
    </div>
    <div class="compartimento" ng-show="empresas.length==0">
        <div class="titulo">No hay empresas</div>
        <img src="/BolsaTrabajo/assets/imgs/tumbleweed.gif">
    </div>
</div>