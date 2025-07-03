@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="mb-3" align="right">
                    <a href="{{ route('trans.create') }}" class="btn btn-success">Tambah</a>
                    <table class="table table-bordered text-center">

                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>No Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($datas as $index => $data)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td><a href="{{ route('trans.show', $data->id) }}">{{ $data->order_code }}</a></td>
                            <td>{{ $data->customer->name }}</td>
                            <td>{{ $data->order_end_date }}</td>
                            <td>{{ $data->status_text }}</td>
                            <td>
                                <a href="{{ route('print_struck', $data->id) }}" class="btn btn-warning btn-sm">Print</a>
                                <a href="{{ route('trans.show', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('trans.destroy', $data->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Yakin mau mengahpus file ini?')"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
