<div class="divNgView">
    <div class="titulo">
        <h4>Dar baja Profesor</h4>
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
    <div class="elementoRepetible alumno">
        <div class="elementoInterno animate-repeat-horizontal">
            <form name="buscarForm" ng-submit="buscar(nombreAng,correoAng)">
                <div class="iconoInterno">
                    <i ng-click="buscar(nombreAng,apellidoAng)" class="fa fa-search">Buscar</i>
                </div>
                <div class="buscadorInterno">
                    <span>Nombre:</span> <input ng-model="nombreAng" input type="text"><br>
                </div>
                <div class="buscadorInterno">
                    <span>Correo: </span><input ng-model="correoAng" type="text"><br>
                </div>
                <button ng-hide="true" ng-click="buscar(nombreAng,correoAng)"></button>
            </form>
        </div>
        <div class="elementoInterno animate-repeat-horizontal" ng-repeat="profesor in profesores" ng-controller="borrarProfesorCtrl">
        	<div class="iconoInterno">
                <i class="fa fa-times" ng-click="borrar(profesores,$index)"></i>
            </div>
        	Nombre profesor: {{profesor.nombre}}<br>
        	Correo: {{profesor.correo}}<br>
        	Activo: <span ng-show="estado(profesor.activo)">Si</span><span ng-show="!estado(profesor.activo)">No</span><br>
        	<button ng-click="borrar($event)" value="{{profesor.id_login}}">Eliminar</button>
        	<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
        </div>
    </div>
</div>