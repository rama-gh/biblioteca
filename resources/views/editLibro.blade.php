@include('header')         
            
            <form method="POST" action="{{url('/libro/'.$libro->id)}}" enctype="multipart/form-data">
              @csrf<!-- llave de seguridad con csrf -->
              {{method_field('PATCH')}}
                    <div class="col md-8">
                      <div class="form-group col-md-6">
                      <label for="nombre">{{'Nombre'}}</label>
                        <input type="text" class="form-control" name="nombre" placeholder="nombre" value="{{$libro->nombre}}"  required>
                      </div>
                      <div class="form-group col-md-10">
                      <label for="año">{{'Anio'}}</label>
                        <input type="number" class="form-control" name="año" placeholder="año" value="{{$libro->anio}}" >
                      </div>
                      <div class="form-group col-md-10">
                        <label for="idAutor">{{'Autor'}}</label>
                          <input type="text" class="form-control" name="idAutor" placeholder="id autor" value="{{$libro->idAutor}}" required>
                      </div>
                      
                      <input type="submit" class=" col-md-6 btn btn-primary" value="Actualizar">
                    </div>
                    
                  </form>
                