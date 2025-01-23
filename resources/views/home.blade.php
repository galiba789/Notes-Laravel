@extends('layout/layout')
@section('content')

@include('top_bar')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container" id="notas">
                <h1 class="text-center mb-4">Minhas Notas</h1>

                @if(count($notes) == 0)
                <div class="row">
                    <h1>Don't have notes!!</h1>
                </div>

                @else
                <div class="row">
                    @foreach ($notes as $note)
                        @include('note')
                    @endforeach
                </div>

                @endif

                <div class="text-center mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaNota">
                        <a href="{{route('new')}}">
                            <i class="bi bi-plus-lg me-2"></i>Nova Nota
                        </a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endSection
