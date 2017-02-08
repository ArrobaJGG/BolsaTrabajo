<div class="divNgView">
    <div class="titulo"><h4>Dar alta alumno</h4></div>
    <div class="dosPartes">
        <div class="compartimento">        
            <form class="compartimento" name="crearUnUsuario" >
                <span>correo(nombre usuario)</span><input ng-model="userAng" type="text" name="usuario" required>
                <button ng-disabled="!crearUnUsuario.$valid" ng-click="enviar()">Enviar</button>
                <br>
                <span ng-show = "usuarioCreado">{{mensaje}}</span>
            </form>
            <div ng-if="archivoSubidos">
                <div ng-repeat="(correo,mensaje) in archivoSubidos.mensajes">
                    Correo: {{correo}}<br>
                    Mensaje:{{mensaje}}
                </div>
                <div ng-show="archivoSubidos.cargando">Cargando...</div>
            </div>
        </div>
        <div class="compartimento">
           <div>
               <div class="titulo"><h4>Formato archivo csv</h4></div>
               <section class="formatoCsv">
                   <div class="esquinaSuperior"></div>
                   correo<hr>
                   correo1@gmail.com<hr>
                   correo2@hotmail.com<hr>
                   correo3@hotmail.com<hr>
                   correo4@hotmail.com<hr>
                   correo5@hotmail.com<hr>
                   correo6@hotmail.com<hr>
               </section>
           </div>
           <upload  objeto-upload="archivoSubidos" tipo-archivo="'csv'"  to="./registro_controller/crear/alumno" ng-model="archivoSubido"></upload> 
        </div>
        
    </div>
    
</div>