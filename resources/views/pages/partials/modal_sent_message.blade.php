<div class="modal fade" id="modal_success" aria-hidden="true" 
{{-- aria-labelledby="exampleModalToggleLabel2" --}}
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if(Session::get('type') === 'review')
                        Review
                    @else
                        Messaggio
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(Session::get('type') === 'review')
                    Review inviata con successo!
                @else
                    Messaggio inviato con successo!
                @endif
            </div>
            <div class="modal-footer">
                {{-- <button class="btn btn-primary" data-bs-toggle="modal">Close</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
