@extends('layouts.auth')

@section('content')

    <style>
        .custom-background {
            background-image: url('{{ asset('assets/image/carousel-1.jpg') }}');
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8);
            margin-top: 100px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

    <body class="custom-background">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="container">

            <div class="card">
                <h2 class="text-center mb-3">Soil Agriculture Indonesia</h2>
                <hr class="mt-0 mb-2">
                <h3 class="text-center mb-3 mt-2">Register Admin</h3>

                <form method="POST" action="{{ url('/register') }}">
                    @csrf
                    <div class="form-group mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}"
                            placeholder="Masukkan Email">
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="name">Username:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Masukkan name" required>
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Masukkan Password" required>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3 mt-3">
                        <label for="confirmPassword">Re-type Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" id="confirmPassword"
                            placeholder="Masukkan Password Lagi" required>
                    </div>
                    <div class="text-center">

                        <button type="submit" class="btn btn-danger">Register</button>
                    </div>
                </form>
            </div>
        </div>
        @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </body>

    {{-- <h2>Register</h2>

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <label for="name">Username</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span>{{ $message }}</span>
        @enderror

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span>{{ $message }}</span>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Register</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    </body>

    </html> --}}

@endsection
