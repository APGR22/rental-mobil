<label>Tanggal sewa: {{ $data['tanggal_sewa'] }}</label><br>
<label>Tanggal kembali: {{ $data['tanggal_kembali'] }}</label><br>
<label>Mobil: {{ $data['mobil'] }}</label><br>
<label>Supir: {{ $data['supir'] !== null ? $data['supir'] : '(tanpa supir)' }}</label><br>

<form action="{{ route('sewa.send') }}" method="post">
    @csrf
    <input type="hidden" name="tanggal_sewa" value="{{ $data['tanggal_sewa'] }}">
    <input type="hidden" name="tanggal_kembali" value="{{ $data['tanggal_kembali'] }}">
    <input type="hidden" name="mobil" value="{{ $data['mobil'] }}">
    <input type="hidden" name="supir" value="{{ $data['supir'] }}">
    <input type="submit" value="Confirm">
</form>