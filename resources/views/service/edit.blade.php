@extends('app');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h3 class="card_title">
                        {{ $title }}
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('service.update', $service->id) }}" method="post">
                            @csrf
                            @method("put")
                            <label for="" class="form-label">Service Name</label>
                            <input type="text" class="form-control" name="service_name"
                                value="{{ $service->service_name }}" required>

                            <label for="" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $service->price }}"
                                required>


                            <label for="" class="form-label">Description</label>
                            <textarea type="description" name="description" class="form-control" cols="30" rows="5">{{ $service->description }}</textarea>

                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                            <a href="{{ url('service') }}" class="btn btn-secondary mt-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
