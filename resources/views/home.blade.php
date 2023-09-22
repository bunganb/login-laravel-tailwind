@extends('layouts.app')
@section('content')
    <div class="wrapper flex flex-col min-h-screen items-center justify-center bg-gradient-to-tl from-slate-950 to-slate-600">
        <div
            class="font-lato flex h-20 w-1/4 items-center justify-center rounded border border-slate-200 bg-slate-100/30 text-2xl font-bold text-white backdrop-blur">
            Halo,{{ auth()->user()->username}}
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-700 w-10 mt-5 h-10 flex items-center justify-center rounded-full"><i class="las la-sign-out-alt"></i></button>
        </form>
    </div>
@endsection
