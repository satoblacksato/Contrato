@extends('admin.template.main')
@section('title','Edicion de Contratos')
@section('content')
@section('contrato','active')

{!! Form::open(['route' => ['contrato.update',$contrato],'method'=>'PUT']) !!}
<h2>Editando Consultor: </h2>
<div class="form-group">
         <div class="form-group col-lg-8">
  {!! Form::label('empleado','Consultor',['class'=>'col-lg-1 control-label']) !!}
         <div class="col-lg-8">
  {!! Form::select('empleado',$empleado,$contrato->empleado->id,['class' => 'form-control select-empleado','multiple','required']) !!}
</div></div>
       <div class="form-group col-lg-8">
  {!! Form::label('fondos_origen','Fondos de Origen',['class'=>'col-lg-1 control-label']) !!}
       <div class="col-lg-8">
  {!! Form::text('fondos_origen',$contrato->fondos_origen,['class' => 'form-control', 'placeholder'=>'Fondos de Origen','required']) !!}
</div></div>
       <div class="form-group col-lg-12">
  {!! Form::label('indicador','Indicador(Dias restantes)',['class'=>'col-lg-1 control-label']) !!}
         <div class="col-lg-4">
  {!! Form::text('indicador',$contrato->indicador,['class' => 'form-control', 'placeholder'=>'Indicador','required']) !!}
</div></div>
       <div class="form-group col-lg-8">
  {!! Form::label('monto','Monto($)',['class'=>'col-lg-1 control-label']) !!}
           <div class="col-lg-8">
  {!! Form::text('monto',$contrato->monto,['class' => 'form-control', 'placeholder'=>'Monto','required']) !!}
</div></div>
       <div class="form-group col-lg-8">
  {!! Form::label('duracion','Duracion',['class'=>'col-lg-1 control-label']) !!}
             <div class="col-lg-8">
  {!! Form::text('duracion',$contrato->duracion,['class' => 'form-control', 'placeholder'=>'Duracion','required']) !!}
</div></div>
       <div class="form-group col-lg-6">
  {!! Form::label('estado','Estado',['class'=>'col-lg-1 control-label']) !!}
               <div class="col-lg-8">
  {!! Form::select('estado',['' => 'SELECCIONE EL ESTADO', 'activo'=>'activo','proximo'=>'proximo','finalizado'=>'finalizado'],$contrato->estado,['class'=>'form-control select-estado','multiple','required']) !!}
</div></div>
       <div class="form-group col-lg-12">
  {!! Form::label('tipo','Tipo(Obra,Serv., etc.)',['class'=>'col-lg-1 control-label']) !!}
    <div class="col-lg-8">
  {!! Form::text('tipo',$contrato->tipo,['class' => 'form-control', 'placeholder'=>'tipo','required']) !!}
</div></div>
         <div class="form-group col-lg-8">
  {!! Form::label('actividad','Actividad',['class'=>'col-lg-1 control-label']) !!}
      <div class="col-lg-8">
  {!! Form::text('actividad',$contrato->actividad,['class' => 'form-control', 'placeholder'=>'actividad','required']) !!}
</div></div>
         <div class="form-group col-lg-6">
  {!! Form::label('desde','desde',['class'=>'col-lg-1 control-label']) !!}
        <div class="col-lg-6">
  {!! Form::text('desde',$contrato->desde,['class' => 'form-control', 'placeholder'=>'aaaa-dd-aa','required']) !!}
</div></div>
           <div class="form-group col-lg-6">
  {!! Form::label('hasta','hasta',['class'=>'col-lg-1 control-label']) !!}
          <div class="col-lg-6">
  {!! Form::text('hasta',$contrato->hasta,['class' => 'form-control', 'placeholder'=>'aaaa-dd-aa','required']) !!}
</div></div>
<br>
           <div class="form-group col-lg-8">
  {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
</div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
  $('.select-empleado').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN EMPLEADO"
  });
</script>
<script>
  $('.select-estado').chosen({
no_results_text: "No se encontro ninguna coincidencia con:",
max_selected_options: 1,
placeholder_text_multiple: "SELECCIONE UN ESTADO"
  });
</script>
@endsection
