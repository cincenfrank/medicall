<form action="{{ route('guest.addReview') }}" method="POST">
    @csrf
    <div class="modal fade" id="modal_review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3  align-items-center">
                        <label for="name" class="form-label ">Nome</label>
                        <input type="text" class="form-control" id="name" name="reviewer_name">
                    </div>
                    <div class="mb-3  align-items-center d-flex">
                        <label for="rating" class="form-label ">Rating</label>
                        <select class="form-select w-25 ms-3 align-items-center" name="rating" id="rating">

                            @foreach ($ratings as $rating)
                                <option name='rating' class="bg-secondary" value="{{ $rating['voto'] }}">
                                    {{ $rating['voto'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="reviewer_email" class="form-label ">Email</label>
                        <input type="email" class="form-control" id="reviewer_email" name="reviewer_email">
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="content" class="form-label ">Recensione:</label>
                        <textarea type="text" class="form-control" name="content" id="content" cols="30"
                            rows="5"></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit">Invia</button> --}}
                    <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" value="sentMessage">
                        Invia</button>
                </div>
            </div>
        </div>
    </div>
</form>
