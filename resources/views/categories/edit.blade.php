@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-header">
            <h1> Category Edit </h1>
        </div>
        <div class="card-body">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>

    @endif

    <form action="{{route('categories.update',['category'=>$category->id])}}" method="POST" novalidate>
        @csrf
        @method('PUT')
        

                                        <div class="form-group">
            <label for="nombre">Nombre</label>
                    <input class="form-control String"  type="text"  name="nombre" id="nombre" value="{{old('nombre',$category->nombre)}}"
                                    required="required"
                        >
                    @if($errors->has('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="foto">Foto</label>
                    <input class="form-control String"  type="text"  name="foto" id="foto" value="{{old('foto',$category->foto)}}"
                                    required="required"
                        >
                    @if($errors->has('foto'))
            <p class="text-danger">{{$errors->first('foto')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="descripcion">Descripcion</label>
                    <input class="form-control String"  type="text"  name="descripcion" id="descripcion" value="{{old('descripcion',$category->descripcion)}}"
                                    >
                    @if($errors->has('descripcion'))
            <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
                                <div class="form-group">
            <label for="estado">Estado</label>
                    <input class="form-control Integer"  type="number"  name="estado" id="estado" value="{{old('estado',$category->estado)}}"
                                    required="required"
                        >
                    @if($errors->has('estado'))
            <p class="text-danger">{{$errors->first('estado')}}</p>
            @endif
        </div>
                                                        <div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
    </form>
    </div>
        </div>

</div>
@endsection