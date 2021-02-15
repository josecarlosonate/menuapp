@extends('layouts.app')
@section('content')
<div class="container">

    <div class="card mb-4">

        <div class="card-header">
            <h1> Subcategory Show </h1>
        </div>

    <div class="card-body">
                                                        <div class="form-group">
            <label class="col-form-label" for="value">Nombre</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$subcategory->nombre}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Foto</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$subcategory->foto}}">
        </div>
                                <div class="form-group">
            <label class="col-form-label" for="value">Descripcion</label>
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$subcategory->descripcion}}">
        </div>
                                                    </div>

    </div>

    <div class="card mb-4">

        
    </div>



    <a href="{{ url()->previous() }}">Back</a>
</div>
@endsection