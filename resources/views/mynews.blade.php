@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Mis noticias</h2>
            </div>
            <div class="col-12 mb-2">
                <a href="{{route('create_news')}}" class="btn btn-primary">Nueva noticia</a>
            </div>
            @if (Session::has('success'))
                <div class="col-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            @endif
            @forelse ($news as $item)
            <div class="col-6 my-2 pb-2 px-2">
                <div class="row">
                    <div class="col-11 boxNews border-bottom">
                        <div class="row">
                            <div class="col-8">
                                <p class="text-uppercase font-weight-bold text-primary mb-0">{{$item->category}}</p>
                                <p class="font-weight-bold text-secondary">{{$item->created_at}}</p>
                                <a class="text-decoration-none" href="{{route('news', [$item->id])}}">
                                    <h3 class="text-dark">{{$item->title}}</h3>
                                    <p class="text-dark">{{substr($item->content, 0, 144)}}...</p>
                                </a>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-center">
                                <a class="d-block w-100 text-decoration-none" href="{{route('news', [$item->id])}}">
                                    <img src='{{asset("storage/$item->image")}}' alt="" class="w-100">                        
                                </a>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-start">
                                <a class="mr-2 text-primary" href="{{route('edit_news', [$item->id])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="text-danger delete-button" href="{{route('delete_news', [$item->id])}}" class="text-primary">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        const deleteButtons = document.querySelectorAll('.delete-button')
        deleteButtons.forEach((btn) => {
            btn.addEventListener('click', (ev) => {
                ev.preventDefault()
                const customAlert = Swal.fire({
                    title: 'Atención',
                    text: '¿Deseas eliminar la noticia?',
                    icon: 'error',
                    confirmButtonText: 'Si',
                    showDenyButton: true,
                    denyButtonText: 'No'
                })

                customAlert.then((response) => {
                    if(response.isConfirmed){
                        location.href = btn.href
                    }
                })
            })
        })
    </script>

@endsection