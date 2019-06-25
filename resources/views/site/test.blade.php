@extends('layouts.web')
@include('layouts.navbar')
@section('content')




@foreach($edificios as $edificio)
  @if($edificio->contacto)
    {{ $edificio->nombre}}
        @foreach($estados as $estado)
          @if($edificio->estado==$estado->id)
            {{ $estado->nombre}}
          @endif
        @endforeach
          
        @foreach($paises as $pais)
        @if($edificio->pais==$pais->id)
          {{ $pais->nombre}}
        @endif
      @endforeach
  @endif
@endforeach



@endsection