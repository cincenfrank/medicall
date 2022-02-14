<form action="" method="POST">
    @csrf
    <div class="modal fade" id="modal_review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aggiungi una nuova recensione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3  align-items-center">Scrivi la tua esperienza:
                        {{ $user->first_name . ' ' . $user->last_name }}</div>
                    <div class="mb-3  align-items-center">
                        <label for="patient_name" class="form-label ">Title</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name">
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="patient_email" class="form-label ">Email</label>
                        <input type="email" class="form-control" id="patient_email" name="patient_email">
                    </div>

                    <div class="mb-3 align-items-center">
                        <label for="card" class="form-label ">Messaggio</label>
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
                        Invia Messaggio</button>
                </div>
            </div>
        </div>
    </div>
</form>
