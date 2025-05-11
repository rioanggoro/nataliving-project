<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') - Nataliving</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="min-h-screen">
        @yield('content')
    </div>

    @if(request()->query('auth') == 'required')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Silahkan Login Terlebih Dahulu',
                icon: 'info',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4F46E5'
            });
        });
    </script>
    @endif
</body>

</html>
