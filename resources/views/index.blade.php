@extends('layout/layout')
@section('content')

    <div class="login-container mt-5">

        <h2 class="mb-4">Login</h2>
            <img src="{{ asset('assets/img/Notes.png')}}" alt="">
            <form action="/loginSubmit" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <input type="submit" value="Login">
            </form>

            {{-- Invalid login --}}
            @if(session('loginError'))
                <div class="mt-2 alert alert-danger text-center">
                    {{ session('loginError') }}
                </div>
            @endif
    </div>

@endSection
