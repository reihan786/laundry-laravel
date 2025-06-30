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
                        <form action="{{ route('customer.update', $customer->id) }}" method="post">
                            @csrf
                            @method("put")
                            <label for="" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $customer->name }}" required>

                            <label for="" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" value="{{ $customer->phone }}"
                                required>


                            <label for="" class="form-label">adress</label>
                            <textarea type="description" name="adress" class="form-control" cols="30" rows="5">{{ $customer->adress}}</textarea>

                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                            <a href="{{ url('customer') }}" class="btn btn-secondary mt-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
