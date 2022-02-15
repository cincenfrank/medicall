@extends('layouts.app')
{{-- <Navbar></Navbar> --}}

@section('content')
<jumbo-home></jumbo-home>

{{-- sezione carosello dottori --}}
<homepage-section-carousel
:title="'Our best doctors'"
:subtitle="'best in class'"
:description="'Descrizione della section dei dottori'"
>
    <div class="bottom">
        {{-- carousel with card-doctor --}}
        <card-doctor></card-doctor>
    </div>
</homepage-section-carousel>

{{-- sezione carosello servizi --}}
<homepage-section-carousel
:title="'Our services'"
:subtitle="'best in class'"
:description="'Descrizione della section dei servizi'"
>
    <div class="bottom">
        <h1>Carosello con lista dei servizi</h1>
    </div>
</homepage-section-carousel>

{{-- sezione testi con immagini --}}
<homepage-section-steps></homepage-section-steps>

{{-- sezione carosello recensioni --}}
<homepage-section-carousel
:title="'Our latest reviews'"
:subtitle="'best in class'"
:description="''"
>
    <div class="bottom">
        <h1>Carosello con lista dei servizi</h1>
    </div>
</homepage-section-carousel>

{{-- footer --}}
<the-footer></the-footer>
@endsection