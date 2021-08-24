@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 py-4">
                <h1 class="text-center">{{ $news->title }}</h1>
                <div class="row">
                    <div class="col-12 my-2">
                        <img src='{{asset("storage/$news->image")}}' alt="" class="w-100">
                    </div>
                </div>
                <p>{{ $news->content }}</p>
                <small>
                    <b>Autor: </b> {{ $news->author }}
                </small><br>
                <small>
                    <b>Fecha de publicación:</b> {{ $news->created_at }}
                </small><br>
                <small>
                    <b>Categoría:</b> {{ $news->category }}
                </small>
            </div>
        </div>
    </div>
@endsection
