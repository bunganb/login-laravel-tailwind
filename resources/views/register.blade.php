@extends('layouts.app')
@section('content')
    <div class="wrapper flex min-h-screen w-full items-center justify-center bg-cover bg-no-repeat text-fuchsia-50"
        loading="lazy" style="background-image: url('{{ asset('assets/image/bg.jpeg') }}')">
        <div
            class="font-lato container flex h-fit w-fit flex-col items-center rounded bg-white/30 px-10 py-10 backdrop-blur">
            <h1 class="text-4xl font-bold text-slate-900">Register</h1>
            <form action="" method="POST">
                @csrf
                @if (session()->has('registerError'))
                    <div class="my-5 h-10 w-full rounded bg-pink-700/40 px-4 py-1.5 text-pink-950">
                        {{ session('registerError') }}
                    </div>
                @endif
                <div class="mt-3">
                    <label class="text-md my-2 block font-semibold text-slate-900" for="name">Name</label>
                    <input autocomplete="off"
                        class="@error('name')
                        is-invalid
                                  @enderror w-full rounded-md bg-white/30 px-4 py-1.5 text-black backdrop-blur focus:outline-none"
                        id="name" name="name" type="text" value=" {{ old('name') }}">
                    @error('name')
                        <small class="invalid-message mt-1 block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="text-md my-2 block font-semibold text-slate-900" for="username">Username</label>
                    <input autocomplete="off"
                        class="@error('username')
                        is-invalid
                                  @enderror w-full rounded-md bg-white/30 px-4 py-1.5 text-black backdrop-blur focus:outline-none"
                        id="username" name="username" type="text" value="{{ old('username') }}">
                    @error('username')
                        <small class="invalid-message mt-1 block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3 flex gap-3">
                    <div>
                        <label class="text-md my-2 block font-semibold text-slate-900" for="password">Password</label>
                        <input
                            class="@error('password')
                            is-invalid
                                      @enderror w-full rounded-md bg-white/30 px-4 py-1.5 text-slate-500 backdrop-blur focus:outline-none"
                            id="password" name="password" type="password">
                        @error('password')
                            <small class="invalid-message mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="text-md my-2 block font-semibold text-slate-900" for="password">Confirm
                            Password</label>
                        <input
                            class="@error('confirmPassword')
                            is-invalid
                                      @enderror w-full rounded-md bg-white/30 px-4 py-1.5 text-slate-500 backdrop-blur focus:outline-none"
                            id="password" name="confirmPassword" type="password">
                        @error('confirmPassword')
                            <small class="invalid-message mt-1 block">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button class="mt-3 w-full rounded-md bg-slate-900 py-1">Sign Up</button>
                <p class="mt-4 font-semibold text-slate-900">Already Have an Account ?<a class="text-white/95"
                        href="{{ route('login') }}"> Sign In!</a></p>
            </form>
        </div>
    </div>
@endsection
