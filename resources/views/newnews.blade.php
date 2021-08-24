@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Nueva noticia</h2>
                <form action="{{route('save_news')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea class="form-control" id="content" name="content" rows="6">
                            {{old('content')}}
                        </textarea>
                        @error('content')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Sección de la noticia</label>
                        <select class="form-control" name="category" id="category">
                            <option disabled selected>Elige una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen de la noticia</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection