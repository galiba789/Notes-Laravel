<div class="col-12 col-md-6 col-lg-4 mb-3">
    <div class="card bg-secondary text-white h-100">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{$note['title']}}</h5>
            <p class="card-text flex-grow-1">{{ $note['text'] }}</p>

            <small>
                <p class="card-text flex-grow-1">Criada em: {{ date('Y-m-d H-i-s', strtotime($note['created_at'])) }}</p>
            </small>
            @if ($note['created_at'] != $note['updated_at'])
                <small>
                    <p class="card-text flex-grow-1 mt-3">Editada em: {{ date('Y-m-d H-i-s', strtotime($note['updated_at'])) }}</p>
                </small>
            @endif
            <div class="d-flex justify-content-end mt-auto">
                <a href="{{ route('edit', ['id' => Crypt::encrypt($note['id'])]) }}"><button class="btn btn-warning me-2" title="Editar"><i class="bi bi-pencil"></i></button></a>
                <a href="{{ route('delete', ['id' => Crypt::encrypt($note['id'])]) }}"><button class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></button></a>
            </div>
        </div>
    </div>
</div>
