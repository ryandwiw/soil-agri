

document.addEventListener("DOMContentLoaded", function () {
    var fadeIns = document.querySelectorAll('.fade-in');
    var fadeOuts = document.querySelectorAll('.fade-out');

    function checkAnimations() {
        fadeIns.forEach(function (fadeIn) {
            if (isElementInViewport(fadeIn)) {
                fadeIn.classList.add('show');
            }
        });

        fadeOuts.forEach(function (fadeOut) {
            if (isElementInViewport(fadeOut)) {
                fadeOut.classList.remove('hide');
            } else {
                fadeOut.classList.add('hide');
            }
        });
    }

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Trigger checkAnimations on page load and scroll
    window.addEventListener('load', checkAnimations);
    window.addEventListener('scroll', checkAnimations);
});




// product





document.addEventListener("DOMContentLoaded", function () {
    var animatedElement = document.querySelector('.animate-container');

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function handleScroll() {
        if (isElementInViewport(animatedElement)) {
            animatedElement.classList.add('active');
        } else {
            animatedElement.classList.remove('active');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();
});

document.addEventListener("DOMContentLoaded", function () {
    var animatedElement = document.querySelector('.animate-down');

    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function handleScroll() {
        if (isElementInViewport(animatedElement)) {
            animatedElement.classList.add('active');
        } else {
            animatedElement.classList.remove('active');
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll();
});


  

//   Gallery
  function changeImage(newImageUrl) {
    document.getElementById('mainImage').src = newImageUrl;
  }

  //Navbar

//   const searchIcon = document.getElementById('searchIcon');
//   const searchContainer = document.getElementById('searchContainer');
//   const exitButton = document.getElementById('exitButton');

//   // Menambahkan event listener untuk menanggapi klik pada logo pencarian
//   searchIcon.addEventListener('click', function() {
//     // Menampilkan atau menyembunyikan area pencarian saat logo pencarian diklik
//     searchContainer.style.display = (searchContainer.style.display === 'none' || searchContainer.style.display === '') ? 'block' : 'none';
//   });


//   // Menambahkan event listener untuk tombol "Exit"
//   exitButton.addEventListener('click', function() {
//     // Menyembunyikan area pencarian saat tombol "Exit" diklik
//     searchContainer.style.display = 'none';
//   });

// Ambil elemen navbar
const navbar = document.querySelector('.navbar');
const navbarBrand = document.querySelector('.navbar-brand');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', function () {
    if (window.innerWidth <= 767) {
        if (window.scrollY > navbar.offsetTop) {
            navbar.classList.add('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(10%)';
            scrollTopBtn.style.display = 'block';
        } else {
            navbar.classList.remove('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(0)';
            scrollTopBtn.style.display = 'none';
        }
    } else if (window.innerWidth > 767 && window.innerWidth <= 1024) { 
        if (window.scrollY > navbar.offsetTop) {
            navbar.classList.add('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(10%)';
        } else {
            navbar.classList.remove('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(0)';
        }
    }
     else {
        if (window.scrollY > navbar.offsetTop) {
            navbar.classList.add('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(50%)';
            navLinks.forEach(link => link.style.transform = 'translateX(-20%)');
            scrollTopBtn.style.display = 'block';
        } else {
            navbar.classList.remove('scrolled', 'fixed-top-navbar1');
            navbarBrand.style.transform = 'translateX(0)';
            navLinks.forEach(link => link.style.transform = 'translateX(0)');
            scrollTopBtn.style.display = 'none';
        }
    }
});

function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
  






// footer
// gdipake
function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Add animated class when footer is in view
        document.querySelector('.color-block').classList.add('animated');
        document.querySelector('.container').classList.add('animated-footer');
      } else {
        // Remove animated class when footer is out of view
        document.querySelector('.color-block').classList.remove('animated');
        document.querySelector('.container').classList.remove('animated-footer');
      }
    });
  }

  // Set up Intersection Observer
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.5, // Adjust this threshold as needed
  };

  const observer = new IntersectionObserver(handleIntersection, options);

  observer.observe(document.getElementById('myFooter'));

  
//   Product SHOW
// $(document).ready(function () {
//     $(".toggle-link").click(function () {
//         var contentId = $(this).attr("data-content");

//         // Sembunyikan semua konten kecuali yang sedang ditampilkan
//         $(".toggle-content").not("#" + contentId).hide();

//         // Toggle konten yang sedang diklik
//         $("#" + contentId).fadeIn("slow", function() {
//             $(this).focus();
//         });
//     });
// });

$(document).ready(function () {
    $(".toggle-link").click(function () {
        var contentId = $(this).attr("data-content");
        var iconId = $(this).attr("data-icon");
        var isOpen = $("#" + contentId).is(":visible");

        if (window.innerWidth < 768) {
            // Jika di mobile, gunakan efek slide
            $(".toggle-content").not("#" + contentId).slideUp();
            $("#" + contentId).slideToggle();
        } else {
            // Jika di desktop, gunakan efek fade
            $(".toggle-content").not("#" + contentId).fadeOut();
            $("#" + contentId).fadeToggle();
        }

        // Reset semua ikon menjadi fa-angle-up
        $(".toggle-link i").removeClass("fa-angle-up").addClass("fa-angle-down");

        // Ubah kelas ikon berdasarkan ID
        $("#" + iconId).toggleClass("fa-angle-down", isOpen).toggleClass("fa-angle-up", !isOpen);
    });
});

lightbox.option({
    'resizeDuration': 500,
    'imageFadeDuration' : 500,
    'wrapAround': false,
  })





// Article
// document.addEventListener("DOMContentLoaded", function () {
//     adjustArticleCount();
//     window.addEventListener("resize", adjustArticleCount);
// });

// function adjustArticleCount() {
//     var articles = document.querySelectorAll('.article');
//     var maxArticles = (window.innerWidth <= 768) ? 3 : 14;

//     articles.forEach(function (article, index) {
//         article.style.display = (index < maxArticles) ? 'block' : 'none';
//     });
// }

document.addEventListener("DOMContentLoaded", function () {
    adjustArticleCount();
    window.addEventListener("resize", adjustArticleCount);
});

function adjustArticleCount() {
    var articles = document.querySelectorAll('#articleContainer .article');
    var maxArticles;

    if (window.innerWidth <= 576) { // Perangkat seluler
        maxArticles = 3;
    } else if (window.innerWidth <= 768) { // iPad
        maxArticles = 8;
    } else { // Desktop
        maxArticles = 14;
    }

    articles.forEach(function (article, index) {
        article.style.display = (index < maxArticles) ? 'block' : 'none';
    });
}



// Why-CHoose

document.addEventListener("DOMContentLoaded", function () {
    var animatedElements = document.querySelectorAll(".animate-zoomIn");

    function handleIntersection(entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target);
            }
        });
    }

    var observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.3 // Ubah nilai ini sesuai kebutuhan
    });

    animatedElements.forEach(function (element) {
        observer.observe(element);
    });
});

// produk

var splide = new Splide('.splide', {
    perPage: 4, // Adjust the number of cards visible at once on mobile
    padding: '1rem',
    perMove: 1,
    drag: true,
    breakpoints: {
        600: {
            perPage: 1, // Adjust for tablets
            padding: '2rem', // Adjust the padding for mobile view
        },
        992: {
            perPage: 2, // Adjust for larger screens
            
        },
    },
});

splide.mount();

document.addEventListener('DOMContentLoaded', function () {
    var animatedElements = document.querySelectorAll('.custom-class'); 

    var observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up'); 
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 }); // Adjust the threshold based on your preference

    animatedElements.forEach(function (element) {
        observer.observe(element);
    });
});
