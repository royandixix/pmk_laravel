<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Anggota</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
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

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        th,
        td {
            padding: 6px;
        }

        td {
            vertical-align: middle;
        }

        .text-center {
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
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Jenis Anggota</th>
                <th>Telepon</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($anggota as $i => $item)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nim }}</td>
                    <td class="text-center">{{ $item->tahun_angkatan }}</td>
                    <td>{{ $item->gender }}</td>
                    <td class="text-center">{{ $item->umur }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $item->jenis)) }}</td>
                    <td>{{ $item->phone }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>