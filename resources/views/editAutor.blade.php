@include('header')         
            
<form method="POST" action="{{url('/autores/'.$autor->id)}}" enctype="multipart/form-data">
  @csrf<!-- llave de seguridad con csrf -->
  {{method_field('PATCH')}}
        <div class="col md-8">
          <div class="form-group col-md-6">
            <label for="nombre">{{'Nombre'}}</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$autor->nombre}}" required>
          </div>
          <div class="form-group col-md-6">
          <label for="apellido">{{'Apellido'}}</label>
            <input type="text" class="form-control" name="apellido" placeholder="apellido" value="{{$autor->apellido}}"  required>
            
            <input type="submit" class=" col-md-6 btn btn-primary" value="Actualizar">
          </div>
        
      </form>
    