@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            @foreach ($news as $item)
            <div class="col-10 offset-1 my-2 border rounded">
                <div class="row">
                    <div class="col-4 d-flex align-items-center justify-content-center">
                        <img src='{{asset("storage/$item->image")}}' alt="" class="w-100">
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
                        </small><br>
                        <a href="{{route('news', [$item->id])}}">Ver más</a>
                    </div>
                </div>
            </div>                
            @endforeach
        </div>
    </div>
@endsection
