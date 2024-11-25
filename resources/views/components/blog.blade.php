<section id="artikel-landing">
    <div class="container-fluid mt-5 p-5">
        <div id="animatedHeading">
            <h1 class="text-center fw-bold text-uppercase " >Konten Unggulan</h1>
            <p class="text-center fw-light jarak-text-co-lead" >Kabar Terkini dan Informasi dari Soil Agriculture Indonesia </p>
        </div>
       
        <hr>
        <div class="row">
            @php $counter = 0; @endphp
            @foreach ($articles as $article)
            @if ($counter < 14)
                <div class="col-lg-4 col-md-4 col-sm-12 p-4">
                    <div class="row mt-3">
                        <div class="col-md-12 landing-article-image-lead">
                            <img src="{{ asset($article->gambar_1) }}" class="img-fluid  mr-3 " alt="Blog Post Image" >
                        </div>
                        <div class="col-md-12 ">
                            <a href="{{ route('articles.show', $article->slug) }}" class="fw-bold" style="color: inherit; text-decoration:none;">
                            <h3 class="mt-0 text-judul-article-landing" >{{ $article->judul }}</h3>
                        </a>
                            <p class="text-muted">Published on {{ $article->created_at->format('F j, Y') }}</p>
                            <p style="font-size: 15px; margin-top:10px;" class="text-justify">{{ str_replace('&nbsp;', ' ', substr(strip_tags($article->isi), 0, 300)) }}...</p>
                        </div>
                    </div>
                </div>
            @endif
            @php $counter++; @endphp
            @endforeach

    
            <div class="col-lg-12 col-md-12 col-sm 12 p-4" ">
                <div>
                    <a href="{{route('articles.index')}}" class="btn btn-danger mt-3 fw-medium" style="width:100%;" >Lihat Semua Cerita</a>
                </div>
            </div>
    
    
    
        </div>
    </div>
    

    <script>
        $(document).ready(function() {
            // Function to check if an element is in the viewport
            function isElementInViewport(element) {
                var rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
    
            // Function to add animation class when element is in the viewport
            function animateOnScroll() {
                var element = document.getElementById('artikel-landing');
                if (isElementInViewport(element)) {
                    $('#animatedHeading').addClass('animate__animated animate__fadeInUp');
                    // You can add more animation classes as needed
                }
            }
    
            // Initial check on page load
            animateOnScroll();
    
            // Check on scroll
            $(window).scroll(function() {
                animateOnScroll();
            });
        });
    </script>
</section>

