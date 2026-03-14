<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Anggota</title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>

</head>

<body>

    <h2>Data Anggota PMK Universitas Dipa Makassar</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Jenis</th>
                <th>Telepon</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($anggota as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->phone }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
