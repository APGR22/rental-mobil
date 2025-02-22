<table>
    <tr>
        <th>Id</th>
        <th>Mobil yang sedang disewa</th>
        <th>Penyewa</th>
        <th>Aksi</th>
    </tr>
    @foreach ($sewas as $sewa)
        <tr>
            <td>{{ $sewa->id }}</td>
            <td>{{ $sewa->mobil }}</td>
            <td>{{ $sewa->penyewa }}</td>
            <td>
                <a href="{{ route('terima.review', ['penyewa' => $sewa->penyewa]) }}">
                    <button>Terima</button>
                </a>
            </td>
        </tr>
    @endforeach
</table>