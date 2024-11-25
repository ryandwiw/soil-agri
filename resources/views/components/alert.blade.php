<script>
    function pindahHalaman() {
        Swal.fire("Halaman akan Berpindah ");
    }

    function deleteContent() {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Hal Ini Akan Menghapus Data",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus '
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan "Yes", submit form
                document.getElementById('deleteForm').submit();
            }
        });
    }

    function deleteGallery() {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Hal Ini Akan Menghapus Gambar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus '
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan "Yes", submit form
                document.getElementById('deleteGambar').submit();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = '{{ session('success') }}';
        var errorMessage = '{{ session('error') }}';

        if (successMessage) {
            Swal.fire({
                title: 'Success!',
                text: successMessage,
                icon: 'success',
                confirmButtonColor: '#3085d6',
            });
        }

    });



    document.addEventListener('DOMContentLoaded', function() {
        var errorMessage = '{{ session('error') }}';

        if (errorMessage) {
            Swal.fire({
                title: 'error!',
                text: errorMessage,
                icon: 'error',
                confirmButtonColor: '#3085d6',
            });
        }
    });

    function confirmInput() {
        Swal.fire({
            title: 'Apakah Semua Input Sudah Di Cek ?',
            text: "Hal Ini Akan Menyimpan Datanya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Buat '
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan "Yes", submit form
                document.getElementById('inputForm').submit();
            }
        });
    }

    function confirmUpdate() {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Hal Ini Akan Mengubah Datanya",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Update '
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan "Yes", submit form
                document.getElementById('editForm').submit();
            }
        });
    }
</script>
