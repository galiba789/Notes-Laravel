@extends('layout/layout')

@section('content')

@include('top_bar')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container text-center" id="confirmDelete">
                <h1 class="text-center mb-4">Confirmar Exclusão</h1>

                <div class="alert alert-warning" role="alert">
                    <p>Você tem certeza que deseja excluir a nota <strong>"{{ $note->title }}"</strong>?</p>
                    <p>Essa ação não pode ser desfeita.</p>
                </div>

                    <a href="{{ route('deleteConfirm', ['id' => Crypt::encrypt($note->id)]) }}" class="btn btn-danger ms-2">
                        <i class="bi bi-trash me-2"></i>Confirmar Exclusão
                    </a>

                    <a href="{{ route('home') }}" class="btn btn-secondary ms-2">
                        <i class="bi bi-arrow-left me-2"></i>Cancelar
                    </a>

            </div>
        </div>
    </div>
</div>

@endsection
