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
                                window.location.reload()
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
                   // console.log(button.getAttribute("data-value"));
                     paymentPrice = button.getAttribute("data-value");
                     document.getElementById('checkout-message').innerText =
                         "Stai per effettuare un pagamento di € " + paymentPrice;
                })
            });
        });
    </script>
@endsection


@section('content')
    <div class="d-flex p-1 p-md-3 p-lg-5">
        <div class="d-flex flex-grow-1 flex-column text-center justify-content-center">
            @if(!$hasPremium)
            <h1 class="mb-5">I nostri pacchetti Premium</h1>
            @else
            <h1 class="mb-5">Il tuo abbonamento attuale</h1>
            @endif
            <div class="d-flex justify-content-center flex-grow-1 align-items-center">
                @if (!$hasPremium)
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($subscriptions as $subscription)
                            <div class="col">
                                <div class="card h-100 rounded-3 custom-shadow button-price w-100"
                                    data-bs-toggle="modal" data-bs-target="#modalPayment"
                                    id="{{ 'btn' . $subscription->id }}" data-value="{{ $subscription->price }}">
                                    <div class="card-header text-white bg-primary">
                                        <h3 class="card-title fw-bolder mt-2">{{ $subscription->name }}</h3>
                                    </div>
                                    <div
                                        class="card-body position-relative bg-primary text-white text-center pb-5">

                                        {{-- <p class="">Risulta in cima alle ricerche per
                                            <strong>{{ $subscription->duration_hours }}</strong> ore</p> --}}
                                        <p class="">{{ $subscription->description }}</p>
                                        <h1 class="sub-price text-center fw-bold position-absolute">
                                            {{ $subscription->price }}</h1>
                                    </div>
                                    <div class="card-footer bg-white text-primary text-center border-top-0">
                                        <h2>Acquista</h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @include('pages.partials.modal_payment_braintree')
                    </div>
                @else
            {{-- <h1 class="mb-5">Il tuo Abbonamento attuale</h1> --}}
                <div class="card text-center col-6 custom-shadow">
                      <h2 class="card-header bg-primary text-white">{{ $userInfo->subscriptions[0]->name }}</h2>
                    <div class="card-body">
                        
                        <p class="card-text">Il tuo abbonamento sarà ancora valido per:</p>
                      <count-down expiration-date="{{ $userInfo->subscriptions[0]->pivot->expiration_date }}"></count-down>
                    
                    </div>
                    <div class="card-footer bg-white border-0">
                    </div>
                </div>

                    {{-- <div class="row">
                        <h3>Hai già effettuato l'acquisto della subscription</h3>
                        <p>{{ $userInfo->subscriptions[0]->pivot->expiration_date }}</p>
                        <p>{{ $userInfo->subscriptions[0]->name }}</p>
                        <p>{{ $userInfo->subscriptions[0]->price }}</p>
                        <p>{{ $userInfo->subscriptions[0]->description }}</p>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>
@endsection
