<button class=" btn btn-primary position-fixed bottom-0 left-0 m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="box-shadow: 0 0.5rem 1rem rgb(0 0 0)  ; z-index:2">
    {{-- Show sidebar --}}
    <i class="display-5 p-2 fas fa-bars"></i>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 250px">
    @include('pages.partials.sidebar_lg')
</div>
