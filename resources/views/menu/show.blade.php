@extends('layouts.header')


@section('titulo', 'Tu Menu')

@section('contenido')
    <div class="card text-center">

        <div class="card-header" id="infoHeader">
            Gracias por crear su menu con nosotros por favor lea la siguiente informacion <span class="text-danger"> ¡es
                importante!</span>
        </div>

        <div class="card-body" id="infoBody">
            <p class="text-secondary text-justify">Debajo de esta caja, encontrara su menu con las configuraciones
                selecionadas en los 3 pasos anteriores, recuerde que a partir de este momento usted podra agregar nuevas
                categorias o subcategorias como tambien modificar las ya existentes, si deseea puede cambiar y personalizar
                a su gusto el tema elegido en el paso #1, ademas podra asignar un precio y una breve descripcion a cada
                plato o bebida.</p>
            <p class="text-secondary text-justify">Si presenta algun tipo de inconveniente o necesita ayuda con la
                configuracion de su menu no dude en contactarnos, nuestro equipo de desarrolladores esta altamente
                capacitado para dar solucion a su problema en el menor tiempo posible.</p>
            <p class="text-info text-justify m-0 font-weight-bold">ELON SAS</p>
            <p class="text-info text-justify"><i class="fa fa-whatsapp"></i> 31565462xx</p>
            <p class="text-info mb-0">Recuerde que:</p> <p class="text-danger">Para realizar cambios debe ingresar al sitema</p>
        </div>

        <div class="card-footer text-muted">
            {{-- 2 days ago --}}
            <button class="btn btn-sm btn-outline-info" id="btnInfoMenu"><i class="fa fa-arrow-down "></i></button>
        </div>
    </div>
    <br>
    <div class="card ocultar" id="cardAccion">

        <div class="card-header m-0 p-0">
            <div class="input-group mb-0">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="">¿que accion desea realizar?</span>
                </div>
                <select class="form-control" name="subcategoria" id="sltaccion">
                    <option value="" class="text-center">--- ---</option>
                    <option value=""> Cambiar Tema</option>
                    <option value=""> SubCategoria | NUEVA| EDITAR| ELIMINAR|</option>
                    <option value=""> Categoria | NUEVA| EDITAR| ELIMINAR| AGREGAR-FOTO </option>
                </select>
            </div>
        </div>
        <div class="text-danger">Para realizar cambios debe ingresar al sitema</div>

        <div class="card-body ocultar">
            <div class="input-group-prepend p-2" >
                <span class="input-group-text mr-2" id="">Listado De Categorias</span>
                <button class="btn btn-secondary "><i class="fa fa-plus"></i> Crear Nueva Categoria</button>
            </div>
            <table id="listUsuarios" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>ROL</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                
                <tbody>
                    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row fondoMenu">
        
    </div>

@endsection
