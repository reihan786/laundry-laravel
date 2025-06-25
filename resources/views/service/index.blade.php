@extends('app')
@section('content')
    <div class="container">
        <div class="row justifify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Service Manage</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('insert/service') }}" class="btn btn-primary mt-2 mb-2">Create</a>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Service</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confrim('Yakin mau mengahpus file ini?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
