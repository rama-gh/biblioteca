@include('header')
  <body>
    <style>
        .container{
          margin-top: 40px;
        }

        .btn{
          margin-bottom: 10px;
        }
        a{
          display: inline-block;
        }
      
      </style>
 
  <div class="container col-md-10">
    <table id="table_id" class="display">
      <thead>
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">Nombre</th>
          <th scope="col">Autor</th>
          <th scope="col">Año</th>
          <th scope="col">Estado</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
      @foreach($libros as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->nombre}}</td>

        @foreach ($autores as $item2)
          
          @if ($item->idAutor == $item2->id)
              <td>{{$item2->nombre}} {{$item2->apellido}}</td>
          @endif
          
        @endforeach

        <td>{{$item->anio}}</td>
        @if ($item->estado == 1)
        <td>Disponible</td>
        @else
        <td>Prestado</td> 
        @endif 
          <td>
            <a class="btn btn-success" href="{{url('/libros/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
            <form method="POST" action="{{url('/libros/'.$item->id)}}">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea Borrar?');"><i class="fa fa-close"></i></button>
            </form>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table>
    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addLibro" >Agregar </button>  
    @include('addLibro')
  
  </div>    
@extends('footer')