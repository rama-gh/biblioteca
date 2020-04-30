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
          <th scope="col">Id</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
      @foreach($autores as $item)
        <tr>
          
          <td>{{$item->id}}</td>
          <td>{{$item->apellido}}</td>
          <td>{{$item->nombre}}</td>
          <td> 
            <a class="btn btn-success" href="{{url('/autores/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
            <form method="post" action="{{url('/autores/'.$item->id)}}">
            @csrf
            {{method_field('DELETE')}}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea Borrar?');"><i class="fa fa-close"></i></button>
            </form>
          </td>
        </tr>
        @endforeach()
      </tbody>
    </table>
    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addAutor" >Nuevo Autor</button>  
    @include('addAutor')
  
  </div>    
@extends('footer')