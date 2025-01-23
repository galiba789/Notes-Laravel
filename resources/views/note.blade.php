<div class="col-12 col-md-6 col-lg-4 mb-3">
    <div class="card bg-secondary text-white h-100">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{$note['title']}}</h5>
            <p class="card-text flex-grow-1">{{ $note['text'] }}</p>
            <div class="d-flex justify-content-end mt-auto">
                <button class="btn btn-warning me-2" title="Editar"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    </div>
</div>
