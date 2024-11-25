@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-1 mb-1 p-5">
        <p>
            <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;"><i class="fa fa-home" aria-hidden="true" style="margin-right:5px;"></i>Beranda</a> /
            <a href="{{ route('artikel') }}" style="text-decoration: none; color: inherit; font-weight:bold;">Artikel</a>
        </p>
        <div class="mt-3 mb-1">
            <h1 class="text-center fw-bold text-uppercase " >Konten Unggulan</h1>
            <p class="text-center fw-light jarak-text-co-lead" >Kabar Terkini dan Informasi dari Soil Agriculture Indonesia </p>
        </div>
       
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 p-4">
                <!-- Loop through each artikel -->
                @foreach ($articles as $article)
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <img src="{{ asset($article->gambar_1) }}" class="img-fluid float-left mr-3 fixed-height-img" alt="Blog Post Image" style="border-radius: 13px;">
                        </div>
                        <div class="col-md-8">
                            <p style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true" style="margin-right: 5px;"></i><strong class="text-capitalize">{{$article->penulis}}</strong> | {{ $article->created_at->format('F j, Y') }}</p>
                            <h4 class="mt-0 fw-bold">{{ $article->judul }}</h4>
                            <p style="font-size: 13px; margin-top:10px;">{{ str_replace('&nbsp;', ' ', substr(strip_tags($article->isi), 0, 300)) }}...</p>


                            <a href="{{ route('articles.show', $article->id) }}" class="fw-bold btn btn-secondary" style="color: inherit; text-decoration:none; font-size:13px;">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            
            </div>
    
            <div class="d-flex justify-content-center">

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($articles->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $articles->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif
    
                        @for ($i = 1; $i <= $articles->lastPage(); $i++)
                            <li class="page-item {{ $i == $articles->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
    
                        @if ($articles->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $articles->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
    
    
    
        </div>
    </div>

    
@endsection