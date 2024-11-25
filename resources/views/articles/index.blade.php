

@extends(auth()->check() ? 'layouts.admin' : 'layouts.main')
    

@section('content')
@auth
<div class="mb-4">
    <p class="">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit; " onclick="pindahHalaman()">Dashboard</a> /
        <a class="fw-bold" style="text-decoration: none; color: inherit; cursor:text; ">Artikel</a>
    </p>
    <h3 class="text-center">Admin Soilferti</h3>
</div>
<div class="container mt-5">
    <h3>Daftar Artikel</h3>
    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3 mt-3" onclick="pindahHalaman()">Buat Artikel Baru</a>
    <div class="mb-3">
        <form method="get" action="{{ route('articles.index') }}" class="form-inline">
            <label for="urutan" class="mr-2">Urutan:</label>
            <select name="urutan" id="urutan" class="form-control mr-2" onchange="this.form.submit()">
                <option value="terbaru" {{ $urutan == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                <option value="terlama" {{ $urutan == 'terlama' ? 'selected' : '' }}>Terlama</option>
            </select>
        </form>
    </div>

    @foreach ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-center mb-2"><strong>Judul :</strong> {{ $article->judul }}</h5>

                <div class="text-center">

                    @if ($article->gambar_1)
                        <img src="{{ asset($article->gambar_1) }}" alt="{{ $article->gambar_1 }}" class="img-fluid mb-3"
                            style="max-width: 300px; max-height:300px;">
                    @endif
                </div>

                <p class="card-text mb-3"><strong>Penulis: </strong> {{ $article->penulis }}</p>
                <p class="card-text mb-3"><strong>Kategori: </strong> {{ $article->kategori }}</p>


                <p class="mb-2 fw-bold">Isi :</p>
                @php
                    $shortContent = substr(strip_tags($article->isi), 0, 300);
                @endphp

                <p class="card-text mb-3" id="shortContent{{ $article->id }}">{{ $shortContent }}</p>

                <div id="fullContent{{ $article->id }}" style="display: none;">
                    <p class="card-text">{!! nl2br(e($article->isi)) !!}</p>
                </div>

                @if (strlen($article->isi) > 300)
                    <a href="#" class="btn btn-primary mt-3"
                        onclick="toggleContent({{ $article->id }})">Selengkapnya</a>
                @endif

                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary mt-3" onclick="pindahHalaman()">Lihat Di Publik</a>


                <a href="{{ route('articles.edit', $article->slug) }}" class="btn btn-warning mt-3" onclick="pindahHalaman()">Edit</a>
                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST" style="display: inline;"
                    >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3" >Delete</button>
                </form>
            </div>
        </div>
    @endforeach

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
@include('components.alert')


@else
<div class="container-fluid mt-1 mb-1 p-5">
    <p>
        <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;"><i class="fa fa-home" aria-hidden="true" style="margin-right:5px;"></i>Beranda</a> /
        <a href="{{ route('articles.index') }}" style="text-decoration: none; color: inherit; font-weight:bold;">Artikel</a>
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


                        <a href="{{ route('articles.show', $article->slug) }}" class="fw-bold btn btn-secondary" style="color: inherit; text-decoration:none; font-size:13px;">Baca Selengkapnya</a>
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

@endauth
 

@endsection




