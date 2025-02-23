Mobil: {{ $data['mobil'] }} <br>
Penyewa: {{ $data['penyewa'] }} <br>
Keterlambatan: {{ $data['keterlambatan'] /*tidak ada atau lama waktu keterlambatan*/ }} <br>
Kerusakan: {{ $data['ada_kerusakan'] /*tidak ada atau ada*/ }} <br>
denda: {{ $data['denda'] /*total*/ }} <br>

<form action="{{ route('terima.send') }}" method="post">
    @csrf
    <input type="hidden" name="mobil" value="{{ $data['mobil'] }}">
    <input type="hidden" name="tanggal_dikembalikan" value="{{ $data['tanggal_dikembalikan'] }}">
    <input type="hidden" name="keterlambatan" value="{{ $data['keterlambatan'] }}">
    <input type="hidden" name="ada_kerusakan" value="{{ $data['ada_kerusakan'] }}">
    <input type="hidden" name="denda" value="{{ $data['denda'] }}">
    <input type="submit" value="Konfirmasi">
</form>