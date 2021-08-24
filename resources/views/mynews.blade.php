@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="col-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
            @forelse ($news as $item)
                <div class="col-12 my-2 border rounded">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <img src='{{"storage/$item->image"}}' alt="" class="w-100">
                        </div>
                        <div class="col-8">
                            <h1>{{$item->title}}</h1>
                            <p>{{substr($item->content, 0, 144)}}...</p>
                            <small>
                                <b>Autor: </b> {{$item->author}}
                            </small><br>
                            <small>
                                <b>Fecha de publicación:</b> {{$item->created_at}}
                            </small><br>
                            <small>
                                <b>Categoría:</b> {{$item->category}}
                            </small>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-start">
                                    <a class="btn mr-2 mb-2 btn-primary" href="{{route('news', [$item->id])}}">Ver más</a>
                                    <a href="{{route('edit_news', [$item->id])}}" class="btn mr-2 mb-2 btn-secondary">Editar noticia</a>
                                    <a href="{{route('delete_news', [$item->id])}}" class="btn mr-2 mb-2 btn-danger">Eliminar noticia</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            @empty
                <div class="col-12">
                    <h2 class="text-center">No has ingresado noticias</h2>
                </div>  
            @endforelse
            <div class="col-12">
                <a href="{{route('create_news')}}" class="btn btn-primary">Nueva noticia</a>
            </div>
        </div>
    </div>
@endsection