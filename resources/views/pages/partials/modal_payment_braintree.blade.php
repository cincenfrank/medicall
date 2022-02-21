<div>
    <div class="modal fade text-white" id="modalPayment" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Acquista</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Conferma il tuo acquisto</h5>

                    {{-- id Braintree --}}
                    <div id="dropin-wrapper">
                        <div id="checkout-message"></div>
                        <div id="dropin-container"></div>
                        {{-- <button id="">Submit payment</button> --}}
                    </div>
                    {{--FINE id Braintree --}}

                    {{-- <form>
                        <div class="mb-3  align-items-center">
                            <label for="price" class="form-label mb-0 fs-3" id="test_prezzo">Prezzo:
                                € {{ $subscription->price }}</label>
                </div>
                <div class="mb-3  align-items-center">
                    <label for="name" class="form-label ">Intestatario</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>

                <div class="mb-3 align-items-center">
                    <label for="card" class="form-label ">Numero della
                        Carta</label>
                    <input type="text" class="form-control" id="card" aria-describedby="emailHelp">
                </div>

                <div class="mb-3 d-flex  gap-5">
                    <div>
                        <label for="card" class="form-label ">Scadenza</label>
                        <input type="date" class="form-control" id="card" aria-describedby="emailHelp">
                    </div>
                    <div>
                        <label for="card" class="form-label ">CVC</label>
                        <input type="number" class="form-control" id="card" aria-describedby="emailHelp">
                    </div>
                </div>
                <div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submit-button" class="btn btn-primary">Acquista</button>
            </div>
        </div>
    </div>
</div>
