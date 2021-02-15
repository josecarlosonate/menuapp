@extends('layouts.header')

@section('contenido')
    <div class="row cajaInfoInicio">
        <div class="col-sm-8 offset-sm-2 text infoInicio">
            <h1>Tu Menu <strong>Movil</strong></h1>
            {{-- <h1>¿Te gustaría convertir tu carta y menú en una carta digital accesible desde el móvil ?</h1> --}}
            <div class="description">
                <p>
                    {{-- Crea tu menu digital en 3 <strong>sencillos</strong> pasos. --}}
                    ¿Te gustaría convertir tu carta y menú en una carta digital accesible desde el móvil ?
                    {{-- evita el contagio y la propagacion del covid-19. --}}
                </p>
                <a href="{{route('pasos')}}" class="aEmpecemos">
                    <button class="btn btn-info btn-md" id="btnEmpecemos">Empecemos</button>
                </a>
            </div>
        </div>
    </div>
@endsection
