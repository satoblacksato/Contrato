@extends('admin.template.main')
@section('title','Listado de Contratista')
@section('content')
@section('empleado','active')
<a href="{{ asset('admin/empleado/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
  <table class="table table-condensed table-bordered table-bordered table-responsive">
    <thead>
      <th>#</th>
      <th>DNI</th>
      <th>NOMBRE</th>
      <th>APELLIDO</th>
      <th>PROGRAMA</th>
      <th>REPARTICION</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach ($empleados as $empleado)
         <tr>
           <td>{{$empleado->id}}</td>
           <td>{{$empleado->dni}}</td>
           <td>{{$empleado->nombre}}</td>
           <td>{{$empleado->apellido}}</td>
           <td>{{$empleado->programa}}</td>
           <td>{{$empleado->distribution->nombre}}</td>
           <td><a href="{{route('admin.empleado.destroy',$empleado->id)}}" onclick="return confirm('Desea eliminar a {{$empleado->nombre}} {{$empleado->apellido}}?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
               <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
               <a href="" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>
         </tr>
      @endforeach

    </tbody>
  </table>
{!! $empleados->render() !!}
@endsection