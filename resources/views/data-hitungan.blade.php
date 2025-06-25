<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <a href="{{ url('belajar') }}">Back</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Angka1</th>
            <th>Angka2</th>
            <th>Hasil</th>
            <th>Actions</th>
        </tr>
        @foreach ($counts as $index => $c)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->jenis }}</td>
                <td>{{ $c->angka1 }}</td>
                <td>{{ $c->angka2 }}</td>
                <td>{{ $c->hasil }}</td>
                <td>
                    <a href="{{ route('edit.data-hitung', ['jenis' => $c->jenis, 'id' => $c->id]) }}">Edit</a>
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
