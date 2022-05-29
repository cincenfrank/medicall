<form action="{{route('dashboard.addDoctorService')}}" method="POST">
    @csrf
    <div class="modal fade" id="addService" tabindex="-1" aria-labelledby="addService" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Scegli il servizio</label>
                        <select class="form-select" aria-label="Default select example" id="name" name="serviceSelected">
                            <option selected>Open this select menu</option>
                            {{-- foreach tutti i servizi disponibili --}}
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="check" type="checkbox" value="check" id="myCheck">
                        <label class="form-check-label" for="defaultCheck1">
                            Gratuito
                        </label>
                    </div>

                    <div id="content2" class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control" id="price" value="0.00" name="price">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>