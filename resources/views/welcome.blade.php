@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($news as $item)
            <div class="col-6 my-2 pb-2 px-2">
                <div class="row">
                    <div class="col-11 boxNews border-bottom">
                        <div class="row">
                            <div class="col-8">
                                <a href="{{route('category',[$item->cat_id])}}" class="text-uppercase font-weight-bold text-primary mb-0">{{$item->category}}</a>
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
                            <div class="col-12 mb-2">
                                <i class="text-primary fas fa-share-square btn-share" data-news="{{$item->id}}"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        const shareButtons = document.querySelectorAll('.btn-share')
        shareButtons.forEach((btn) => {
            btn.addEventListener('click', (ev) => {
                const customAlert = Swal.fire({
                    title: 'Compartir',
                    text: `Copia el siguiente enlace en tus redes para compartir la noticia: ${location.host}/noticia/${btn.dataset.news}`,
                    icon: 'info',
                    confirmButtonText: 'Hecho',
                })
            })
        })
    </script>
@endsection
