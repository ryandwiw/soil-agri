<!-- resources/views/artikel/show.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container-fluid padding-article-id">

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
                <div class="picture-isi-article">
                    {!! $article->isi !!}
                </div>
                <p class="mt-3 mb-3"><strong>Tags:</strong> <button class="btn btn-secondary"
                        style="margin-left: 30px;">{{ $article->kategori }}</button></p>
                        <p><i class="fa-solid fa-eye"></i> {{ $article->views }}</p>
                <hr>
                <div class="row mt-5 mb-3 ">
                    <div class="col lg-12 col-md-12 col-sm-12">
                        
                        <div class="d-flex justify-content-start">
                            <p class="d-flex align-items-end" style="margin-right: 5px;">Bagikan Di : </p>
                            <a data-mdb-ripple-init class="btn  btn-floating m-1" style="background-color: #3b5998; color:aliceblue"
                                href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
            
                            <!-- Twitter -->
                            <a data-mdb-ripple-init class="btn  btn-floating m-1" style="background-color: #55acee; color:aliceblue"
                                href="#!" role="button"><i class="fab fa-twitter"></i></a>
            
                            <!-- Google -->
                            <a data-mdb-ripple-init class="btn  btn-floating m-1" style="background-color: #dd4b39; color:aliceblue"
                                href="mailto:admin.soilferti@gmail.com" role="button"><i class="fab fa-google"></i></a>
            
                            <!-- Instagram -->
                            <a data-mdb-ripple-init class="btn  btn-floating m-1" style="background-color: #ac2bac; color:aliceblue"
                                href="https://www.instagram.com/soilfertiagri/" role="button"><i class="fab fa-instagram"></i></a>
            
                            <!-- Linkedin -->
                            <a data-mdb-ripple-init class="btn  btn-floating m-1" style="background-color: #0082ca; color:aliceblue"
                                href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                        </div>
        
        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button id="toggleComments" class="btn btn-primary mt-3 mb-3">Lihat Komentar</button>
                        <div id="commentsSection" class="card" style="display: none;">
                            <p>Komentar :</p>
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
                        <div id="leaveReplySection" style="display: none;">
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
                        @include('components.alert')
                    </div>
                </div>
                
                <!-- Tambahkan jQuery atau script JavaScript lainnya di sini -->
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var commentsSection = document.getElementById('commentsSection');
                        var leaveReplySection = document.getElementById('leaveReplySection');
                        var toggleCommentsButton = document.getElementById('toggleComments');
                
                        toggleCommentsButton.addEventListener('click', function() {
                            // Toggle tampilan komentar dan Leave a Reply
                            if (commentsSection.style.display === 'none') {
                                commentsSection.style.display = 'block';
                                leaveReplySection.style.display = 'block';
                                toggleCommentsButton.innerText = 'Sembunyikan Komentar';
                            } else {
                                commentsSection.style.display = 'none';
                                leaveReplySection.style.display = 'none';
                                toggleCommentsButton.innerText = 'Lihat Komentar';
                            }
                        });
                    });
                </script>



                <hr>



            </div>
            <div class="col-lg-1 col-sm-1 col-md-0"></div>

            <div class="col-lg-12 col-md-12 col-sm-12" id="articleContainer">
                <strong class="mb-3 mt-3">Artikel Lainnya</strong>

                @php $counter = 0; @endphp

                @foreach ($articles as $otherArticle)
                @if ($counter < 14 && $otherArticle->id !== $article->id)
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <img src="{{ asset($otherArticle->gambar_1) }}" class="img-fluid float-left mr-3 fixed-height-img" alt="Blog Post Image" style="border-radius: 13px;">
                        </div>
                        <div class="col-md-8">
                            <p style="font-size: 12px;"><i class="fa fa-user" aria-hidden="true" style="margin-right: 5px;"></i><strong class="text-capitalize">{{$otherArticle->penulis}}</strong> | {{ $otherArticle->created_at->format('F j, Y') }}</p>
                            <h4 class="mt-0 fw-bold">{{ $otherArticle->judul }}</h4>
                            <p style="font-size: 13px; margin-top:10px;">{{ str_replace('&nbsp;', ' ', substr(strip_tags($otherArticle->isi), 0, 300)) }}...</p>
    
                            <a href="{{ route('articles.show', $otherArticle->slug) }}" class="fw-bold btn btn-secondary" style="color: inherit; text-decoration:none; font-size:13px;">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <hr>
                    @php $counter++; @endphp
                @endif
            @endforeach
        </div>

      





    </div>
    <hr class="mt-3 mb-3">

</div>
@endsection
