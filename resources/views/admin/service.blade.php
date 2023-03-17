@extends('layouts.adminApp')

@section('content')
    <button id="add-service-btn" class="btn btn-primary">Add Service</button>

    <div id="add-service-form" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px;">
            <form class="form" id="add-service-form-data">
                @csrf
                <div class="form-group mb-3">
                  <label for="service-name">Service</label>
                  <input required type="text" class="form-control" name="service" id="service-name">    
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
        </div>
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $i => $service)
                <tr>
                    <th scope="row">{{ $i + 1 }}</th>
                    <td>{{ $service->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('service.destroy', ['service' => $service->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const addServiceBtn = document.querySelector('#add-service-btn');
        const addServiceForm = document.querySelector('#add-service-form');
        const addServiceFormData = document.querySelector('#add-service-form-data');

        addServiceBtn.addEventListener('click', () => {
            addServiceForm.style.display = 'block';
            addServiceFormData.addEventListener('submit', (e) => {
                e.preventDefault();
                axios.post('{{ route('service.store') }}', new FormData(addServiceFormData))
                    .then(response => {
                        console.log(response.data);
                        addServiceForm.style.display = 'none';
                        location.reload(); // Refresh the page to show the new service in the table
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
