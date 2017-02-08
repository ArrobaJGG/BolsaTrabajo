<div>
	<div ng-show="!upload.cargando" class="upload">
	    <div  class="asset-upload">Arrastre aqui para subir un archivo {{tipoArchivo}}</div>
	    <i class="fa fa-plus-circle fa-2x"></i>
	</div>
	<div ng-show="upload.cargando">
		
		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
	</div>
</div>