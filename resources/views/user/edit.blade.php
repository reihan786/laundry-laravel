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
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method("put")
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ $user->name }}" required>

                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                required>


                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ $user->password}}" required>

                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                            <a href="{{ url('user') }}" class="btn btn-secondary mt-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
