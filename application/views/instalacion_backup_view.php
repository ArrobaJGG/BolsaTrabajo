<div ng-controller="backupCtrl" class="divNgView">
	<div class="dosPartes" ng-show="!cargando">
		<div>
			<upload  objeto-upload="archivoSubidos" tipo-archivo="'sql'" ir-a="'./correo'" to="../restaurar_pagina_controller/subir" ng-model="archivoSubido"></upload> 
		</div>
		<div>
			<button 
				ng-click="migrate('<?php echo base_url('/instalacion/correo')  ?>')">Sin backup</button>
		</div>
	</div>
	<i ng-show="cargando" class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
</div>
