<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Soil Ferti</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Fitur
            </li>
            <li class="sidebar-item">
                <a href="{{route('dashboard')}}" class="sidebar-link">
                    <i class="fa fa-area-chart pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('products.index')}}" class="sidebar-link">
                    <i class="fa fa-database pe-2"></i>
                    Produk
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('articles.index')}}" class="sidebar-link">
                    <i class="fa fa-book pe-2"></i>
                    Artikel
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('gallery.index')}}" class="sidebar-link">
                    <i class="fa fa-image pe-2"></i>
                    Galeri Foto
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('comments.index')}}" class="sidebar-link">
                    <i class="fa fa-comment pe-2"></i>
                    Filter Komentar
                </a>
            </li>

            <li class="sidebar-header">
                Lainnya
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#lainnya" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                    Tema
                </a>
                <ul id="lainnya" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <!-- Ganti ID dan tambahkan class untuk memperbarui teks -->
                        <a href="#" class="sidebar-link" id="themeToggle">
                            <span id="themeText">Dark</span> Theme
                        </a>
                    </li>
                </ul>
            </li>

            
        </ul>
    </div>
</aside>