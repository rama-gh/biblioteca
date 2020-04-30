<div class="modal fade" id="addAutor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Agregar Autor</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('/autores')}}" enctype="multipart/form-data">
              @csrf<!-- llave de seguridad con csrf -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nombre">{{'Nombre'}}</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                      </div>
                      <div class="form-group col-md-6">
                      <label for="apellido">{{'Apellido'}}</label>
                        <input type="text" class="form-control" name="apellido" placeholder="apellido" required>
                      </div>
                   
              
                    <input type="submit" class="btn btn-primary" value="Agregar">
                  </form>
            
        </div>
    </div>
</div>