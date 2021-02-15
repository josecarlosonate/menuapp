@extends('layouts.app')
@section('content')
<div class="container">

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1> Subcategories </h1>
        </div>
    <div class="card-body">

    <div>
        <a href="{{route('subcategories.create')}}">New</a>
    </div>
    <table class="table table-striped">
        @if(count($subcategories))
        <thead>
            <tr>
                <th>&nbsp;</th>
                                
                                
                                                <td>Nombre</td>
                
                                                <td>Foto</td>
                
                                                <td>Descripcion</td>
                
                                
                                
                            </tr>

        </thead>
        @endif
        <tbody>
            @forelse($subcategories as $subcategory)
            <tr>
                <td>
                    <a href="{{route('subcategories.show',['subcategory'=>$subcategory] )}}">Show</a>
                    <a href="{{route('subcategories.edit',['subcategory'=>$subcategory] )}}">Edit</a>
                    <a href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('delete-subcategory-{{$subcategory->id}}').submit();">
                        Delete
                    </a>
                    <form id="delete-subcategory-{{$subcategory->id}}" action="{{route('subcategories.destroy',['subcategory'=>$subcategory])}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                                                                                                                <td>{{$subcategory->nombre}}</td>
                                                                <td>{{$subcategory->foto}}</td>
                                                                <td>{{$subcategory->descripcion}}</td>
                                                                                                
            </tr>
            @empty
            <p>No Subcategories</p>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>

</div>

@endsection