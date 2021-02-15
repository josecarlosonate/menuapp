@extends('layouts.header')


@section('titulo','Tu Menu')

@section('contenido')
    <div class="row cajaFondo">
        <div class="cajaSeccion1">
            <div class="cajaImagen">
                <div class="img">
                    {{-- <img src="{{ asset('layout/img/categorias/desayuno.jpg') }}" alt="img_desayuno"> --}}
                </div>                
                <div class="bordecaja"></div>
            </div>
            <div class="cajaSeccionInfo"> 
                <div class="nameCat1">
                    Desayunos
                </div>
                <div class="desayuno">
                    <ul class="">
                        <li class="m-1">
                            <div class="precio">
                                <span class="name">Arepa de huevo</span>
                                <span class="pesos"> $12.000</span>
                            </div>
                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>
                            
                        </li>
                        <li class="m-1">
                            <div class="precio">
                                <span class="name">Opcion 2</span>
                                <span class="pesos"> $22.000</span>
                            </div>
                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>
                            
                        </li>
                        <li class="m-1">
                            <div class="precio">
                                <span class="name">Opcion 3</span>
                                <span class="pesos"> $8.000</span>
                            </div>
                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>        
                        </li>
                        <li class="m-1">
                            <div class="precio">
                                <span class="name">Opcion 4</span>
                                <span class="pesos"> $10.000</span>
                            </div>
                            <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h6>        
                        </li>
                    </ul>
                </div>
            </div>
            <div class="extras">
                <div class="extrasFlex">
                    <span>EXTRAS</span>
                    <span>***************</span>
                </div>
            </div>
        </div>
    </div>
@endsection