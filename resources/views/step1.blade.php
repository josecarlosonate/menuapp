@extends('layouts.header')

@section('titulo', 'Pasos')

@section('contenido')

<div class="row cajaPasos">

    <div class="col-xs-8 offset-xs-2 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <form role=" form" action="" method="" class="f1">
            <h3 class="stepTitulo">Elige un tema</h3>
            <p class="text-muted stepInfo">Para iniciar necesitas un tema, mas adelante podras cambiarlo.</p>
            <div class="f1-steps">
                <div class="f1-progress">
                    <div class="f1-progress-line colorPrimariojose" data-now-value="16.66" data-number-of-steps="3"
                        style="width: 16.66%;">
                    </div>
                </div>
                <div class="f1-step active">
                    <div class="f1-step-icon"><i class="fa fa-dashboard "></i></div>
                    <p>Paso 1</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-archive "></i></div>
                    <p>Paso 2</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-align-justify"></i></div>
                    <p>Paso 3</p>
                </div>
            </div>

            <fieldset>
                <div class="form-group">
                    <ul class="list-group list-group-horizontal text-info text-center row">
                        <li class="list-group-item col-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" checked>Dark
                                </label>
                            </div>
                            <div>
                                <img src="{{ asset('layout/img/temas/tema1.png') }}" class="rounded img-fluid"
                                    alt="tema1">
                            </div>
                        </li>
                        <li class="list-group-item col-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" disabled name="optradio">Ligth
                                </label>
                            </div>
                            <div>
                                <img src="{{ asset('layout/img/temas/sintema.png') }}" class="rounded img-fluid"
                                    alt="tema1">
                            </div>
                        </li>
                        <li class="list-group-item col-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" disabled name="optradio">Clear
                                </label>
                            </div>
                            <div>
                                <img src="{{ asset('layout/img/temas/sintema.png') }}" class="rounded img-fluid"
                                    alt="tema1">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="f1-buttons btnSolo">
                    <button type="button" class="btn btn-next btn-info ">Siguiente</button>
                </div>
            </fieldset>

            <fieldset id="p2">
                <div id="errorCategoria" class="alert alert-danger ocultar" role="alert">
                    Falta categoria!
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success" type="button" id="btnAgregar">Agregar</button>
                    </div>
                    <input type="text" class="form-control" name="categoria" id="categoria"
                        placeholder="Nombre Categoria" aria-label>
                </div>
                <h6 id="licat" class="text-center ">Aun no hay categorias</h6>
                <ul class="list-group list-group-flush" id="ulCategoria">
                    {{-- <li  class="list-group-item"></li> --}}
                </ul>
                <br>
                <div class="f1-buttons ">
                    <button type="button" class="btn btn-previous btn-secondary">Atras</button>
                    {{-- <button type="button" class="btn btn-success">Guardar</button> --}}
                    <button type="button" id="nextcategoria"
                        class="btn btn-next btn-info ">Siguiente</button>
                </div>
            </fieldset>

            <fieldset id="p3">
                <div class="input-group mb-3">
                    <div id="errorSltCategoria" class="alert alert-danger ocultar" role="alert">
                        no ha elejido categoria!
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Elija Una Categoria:</span>
                    </div>
                    <select class="form-control" name="subcategoria" id="sltcategoria">
                        {{-- <option value="">Listado de categorias</option> --}}
                    </select>
                </div>
                <div id="errorPrecio" class="alert alert-danger ocultar" role="alert">
                    no ha asignado un precio!
                </div>
                <div class="input-group mb-3 ocultar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Precio</span>
                    </div>
                    <input type="text" value="xx" name="precio" id="precio" class="form-control" placeholder="Asigna un Precio" aria-label="Precio" aria-describedby="basic-addon1">
                </div>
                <div id="errorsubc" class="alert alert-danger ocultar" role="alert">
                    falta subcategoria!
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-success" type="button" id="btnAgregarS">Agregar</button>
                    </div>
                    <input type="text" class="form-control" name="nameSubcategoria" id="nameSubcategoria"
                        placeholder="Nombre SubCategoria" aria-label>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-dark m-0">
                        <caption class="ocultar" id="lblsub">Listado de subcategorias</caption>
                        <thead>
                            <tr id="tablaCabeza">
                            </tr>
                        </thead>

                        <tbody class="" id="tablaCuerpo">
                            <th id="thcat0"></th>
                        </tbody>
                        
                    </table>
                    <table class="table table-dark" id="tbSinSubCategorias">
                        <thead>
                            <tr>
                                <th class=" text-center">
                                    Aun no hay Subcategorias agregadas
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <br>
                <div class="f1-buttons">
                    <button type="button" class="btn btn-previous btn-secondary">Atras</button>
                    <a href="{{route('menu.show')}}" class="btn btn-info" id="btnverMenu"> Ver Menu</a>
                </div>
            </fieldset>

        </form>
    </div>
</div>

@endsection