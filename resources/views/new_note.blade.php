@extends('layout/layout')

@section('content')
    @include('top_bar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container" id="novaNota">
                    <h1 class="text-center mb-4">Criar Nova Nota</h1>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('newNoteSubmit') }}" method="POST" novalidate>
                                        @csrf

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Título</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Digite o título da nota" required value="{{ old('title') }}">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Conteúdo</label>
                                            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Digite o conteúdo da nota"
                                                required>{{ old('content') }}</textarea>
                                            @error('content')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-save me-2"></i>Salvar Nota
                                            </button>
                                            <a href="{{ route('home') }}" class="btn btn-secondary ms-2">
                                                <i class="bi bi-arrow-left me-2"></i>Voltar
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
