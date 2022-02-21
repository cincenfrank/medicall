@extends('layouts.dashboard')

@section('add_head_scripts')
    <!-- includes the Braintree JS client SDK -->
    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.min.js"></script> --}}
    <!-- includes jQuery -->
    {{-- <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
@endsection

@section('script_brain_tree')
    <script>
        // assegnamo valore 0 ad una variabile globale
        let paymentPrice = 0;
        // creiamo delle funzioni che si eseguono al caricamento della pagina
        document.addEventListener('DOMContentLoaded', function() {
            // assegnamo al bottone con id # una nuova let
            let button = document.querySelector('#submit-button');
            // braintree crea una nuova transazione 
            braintree.dropin.create({
                authorization: "{{ \Braintree\ClientToken::generate() }}",
                container: '#dropin-container'
            }, function(createErr, instance) {
                // al click sul bottone effettua il pagamento
                button.addEventListener('click', function() {
                    // funzionalità braintree
                    instance.requestPaymentMethod(function(err, payload) {
                        $.get("{{ route('dashboard.payment.make') }}", {
                            payload,
                            price: paymentPrice,
                        }, function(response) {
                            if (response.success) {
                                alert('Payment successfull!');
                            } else {
                                alert('Payment failed');
                            }
                        }, 'json');
                    });
                });
            });
            // al click sul bottone con i prezzi, assegnamo il giusto prezzo alla variabile globale
            const buttons = document.querySelectorAll('.button-price')
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    paymentPrice = button.value;
                    document.getElementById('checkout-message').innerText = "Stai per effettuare un pagamento di €. " + paymentPrice;
                })
            });
        });
    </script>
@endsection


@section('content')
    <div class="d-flex">
        <div class="d-flex flex-grow-1 flex-column text-center justify-content-center">
            <h3>Subscriptions</h3>
            <div class="d-flex justify-content-center flex-grow-1 align-items-center">
                {{-- @dump($subscriptions) --}}
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($subscriptions as $subscription)
                        <div class="col">
                            <div class="card bg-primary" style="min-widht:300px">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $subscription->name }}</h5>
                                    <h5 class="card-title">{{ $subscription->price }}</h5>
                                    <h5 class="card-title">Tempo: {{ $subscription->duration_hours }} ore</h5>
                                    <p class="card-title">{{ $subscription->description }}</p>
                                    <div>
                                        {{-- <a class="btn btn-success btn-sm " href="#" role="button">Acquista</a> --}}
                                        <button type="button" class="btn btn-success button-price" data-bs-toggle="modal"
                                            data-bs-target="#modalPayment" id="{{ 'btn' . $subscription->id }}"
                                            value="{{ $subscription->price }}">
                                            Acquista
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('pages.partials.modal_payment_braintree')
            </div>
        </div>
    </div>
    </div>
@endsection
