@extends('layouts.app')
@section('add_head_scripts')
@include('pages.partials.head_scripts')
@endsection

{{-- <Navbar></Navbar> --}}

@section('content')
<jumbo-home></jumbo-home>

{{-- sezione carosello servizi --}}
<homepage-section-carousel title="Le Specializzazioni disponibili" subtitle="I Servizi" description="L'elenco delle prestazioni mediche che potrai trovare su Medicall">
    {{-- <div class="bottom w-100"> --}}
    <home-service-carousel class="bottom w-100"></home-service-carousel>
    {{-- </div> --}}
</homepage-section-carousel>

{{-- sezione carosello dottori --}}
<homepage-section-carousel title="I Dottori più richiesti" subtitle="Medici Professionisti" description="Una piccola selezione di alcuni tra i migliori dottori che si trovano su Medicall">
    {{-- <div class="bottom w-100"> --}}
    {{-- carousel with card-doctor --}}
    <home-doctor-carousel class="bottom w-100">

    </home-doctor-carousel>
    {{-- </div> --}}
</homepage-section-carousel>

{{-- sezione testi con immagini --}}
<homepage-section-steps></homepage-section-steps>

{{-- sezione carosello recensioni --}}
{{-- <homepage-section-carousel :title="'Our latest reviews'" :subtitle="'best in class'" :description="''">
    <div class="bottom">
        <h1>Carosello con lista dei servizi</h1>
    </div>
</homepage-section-carousel> --}}
<homepage-section-carousel title="Le Recensioni" subtitle="Alcune Recensioni Recenti" description="Una piccola selezione di alcune delle recensioni più recenti">
    <home-review-carousel class="bottom w-100">

    </home-review-carousel>
</homepage-section-carousel>
{{-- footer --}}
{{-- <the-footer></the-footer> --}}
@endsection
