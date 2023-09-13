@extends('dashboard/layouts/main') <!-- Ubah ini sesuai dengan layout Anda -->
@section('konten')
    <h1>Hasil Pencarian Tiket</h1>

    @if ($tickets->isEmpty())
        <p>Tidak ada tiket yang sesuai dengan pencarian Anda.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Rute Awal</th>
                    <th>Rute Akhir</th>
                    <th>Tanggal Berangkat</th>
                    <th>Jumlah Tiket Tersedia</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->from }}</td>
                        <td>{{ $ticket->to }}</td>
                        <td>{{ $ticket->departure_date }}</td>
                        <td>{{ $ticket->quantity }}</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    @endif
@endsection
