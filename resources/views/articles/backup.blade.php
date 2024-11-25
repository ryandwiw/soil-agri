<!-- resources/views/artikel/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container-fluid p-5">
        <hr>
        <p><a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;"><i class="fa fa-home" aria-hidden="true" style="margin-right:5px;"></i>Beranda</a> / <a
                href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">Artikel</a> /
            <strong>{{ $article->judul }}</strong>
        </p>
        <hr class="mb-5">
        <h1 class="text-center">{{ $article->judul }}</h1>
        <p class="text-center"><i class="fa fa-user" aria-hidden="true" style="margin-right: 5px;"></i><strong>{{ $article->penulis }}</strong> | {{ $article->created_at->format('F d , Y') }}</p>
        
        @if ($article->gambar_1)
            <img src="{{ asset($article->gambar_1) }}" alt="Gambar 1" class="img-fluid picture-article-lead mt-3">
        @endif

        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 col-sm-8">
                {!! $article->isi !!}
                <p class="mt-3 mb-3"><strong>Tags:</strong> <button class="btn btn-secondary"
                        style="margin-left: 30px;">{{ $article->kategori }}</button></p>

                <hr>

                <div class="row">
                    <div class="col-md-4 d-flex align-items-center justify-content-start share-icons-art-back">
                        <a href="{{ route('articles.index') }}" class="fw-bold ms-3"
                            style="text-decoration: none ; color:rgb(43, 43, 43); ">Kembali</a>
                    </div>
                    <div class="col-md-8">
                        <div class="mt-3">
                            <ul class="custom-ul">
                                <li class="list-group-item">

                                    <div class="share-icons-art ">
                                        <span class="share-text-art hide-text-active">Bagikan Artikel Ini : </span>
                                        <span class="share-text-art hide-text">Bagikan Artikel </span>
                                        <!-- Facebook Share -->
                                        <a href="" target="_blank" class="share-icon-art"><i
                                                class="fab fa-facebook"></i></a>

                                        <!-- Twitter Share -->
                                        <a href="" target="_blank" class="share-icon-art"><i
                                                class="fab fa-twitter"></i></a>

                                        <!-- WhatsApp Share -->
                                        <a href="}" target="_blank" class="share-icon-art"><i
                                                class="fab fa-whatsapp"></i></a>

                                        <!-- Email Share -->
                                        <a href="" class="share-icon-art"><i class="far fa-envelope"></i></a>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-8">
                        <p>Komentar :</p>
                        <div class="card">
                            @forelse($comments as $comment)
                                <div class="card-body text-start m-0 p-2">
                                    <p class="card-title"><strong>{{ $comment->nama }}</strong></p>
                                    <p class="card-text mb-3">{{ $comment->isi_komentar }}</p>
                                    <p class="cart-text">{{ $comment->formatted_created_at }}</p>
                                    <hr>
                                </div>
        
                            @empty
                                <p>Tidak ada komentar.</p>
                            @endforelse
                        </div>
                        @include('components.alert')
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr>
                        <h4>Leave a Reply</h4>
                        <p class="mt-2">Alamat email Anda tidak akan dipublikasikan.</p>
                        <form action="{{ route('comments.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <div class="form-group mb-3 mt-3">
                                <label for="nama" class="mb-3">Nama *</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="email" class="mb-3">Email *</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="isi_komentar" class="mb-3">Komentar</label>
                                <textarea name="isi_komentar" class="form-control" id="komentar" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
                        </form>
                    </div>
                </div>



                <hr>



            </div>
            <div class="col-lg-1 col-sm-1 col-md-0"></div>

            <div class="col-lg-12 col-md-12 col-sm-12" id="articleContainer">
                <strong class="mb-3 mt-3">Artikel Lainnya</strong>

                @php $counter = 0; @endphp

                @foreach ($articles as $article)
                    @if ($counter < 14)
                        <div class="row mt-3">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <img src="{{ asset($article->gambar_1) }}"
                                    class="article-picture img-fluid float-left mr-3" style="" alt="Blog Post Image">
                            </div>
                            <div class="col-lg-5 col-md-7 col-sm-5">
                                <a href="{{ route('articles.show', $article->id) }}"
                                    style="text-decoration: none; color:inherit;">
                                    <h5 class="mt-0">{{ $article->judul }}</h5>
                                </a>
                                <p class="text-muted device-ipad-text desktop-article-font">Published on
                                    {{ $article->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        @php $counter++; @endphp
                    @else
                    @break
                    @endif
                @endforeach
        </div>

      





    </div>
    <hr class="mt-3 mb-3">

</div>
@endsection
