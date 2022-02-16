@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('guest.addReview') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_review" tabindex="-1" 
    {{-- aria-labelledby="modalReview" --}}
     aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aggiungi una nuova recensione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3  align-items-center">Scrivi la tua esperienza con
                        <span class="btn text-white bg-success">
                            {{ $user->first_name . ' ' . $user->last_name }}</span>
                    </div>
                    <div class="mb-3  align-items-center">
                        <label for="title" class="form-label ">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>Titolo Richiesto</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3  align-items-center">
                        <label for="name" class="form-label ">Nome</label>
                        <input type="text" class="form-control @error('reviewer_name') is-invalid @enderror" id="name"
                            name="reviewer_name">
                        @error('reviewer_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>'Errore nel nome'</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3  align-items-center d-flex">
                        <label for="rating" class="form-label ">Rating</label>
                        <select class="form-select w-25 ms-3 align-items-center @error('rating') is-invalid @enderror"
                            name="rating" id="rating">

                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>'Inserisci un voto'</strong>
                                </span>
                            @enderror

                            @foreach ($ratings as $rating)
                                <option name='rating' class="bg-secondary" value="{{ $rating['voto'] }}">
                                    {{ $rating['voto'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="reviewer_email" class="form-label ">Email</label>
                        <input type="email" class="form-control @error('reviewer_email') is-invalid @enderror"
                            id="reviewer_email" name="reviewer_email">
                        @error('reviewer_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>'Inserisci un'email valida'</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="content" class="form-label ">Recensione:</label>
                        <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content"
                            id="content" cols="30" rows="5"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>'Il contenuto della recensione è richiesto'</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit">Invia</button> --}}
                    <button id='submitButton' type="submit" class="btn btn-primary" 
                    {{-- data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal"
                        value="sentMessage" --}}
                        >
                        Invia</button>
                </div>
            </div>
        </div>
    </div>
</form>
