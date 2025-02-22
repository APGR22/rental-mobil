Mobil: {{ $sewa->mobil }} <br>
Penyewa: {{ $sewa->penyewa }} <br>
<br>
<form action="{{ route('terima.send') }}" method="post">
    @csrf

    <label for="tanggal_dikembalikan">Tanggal dikembalikan</label><br>
    <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan">
    @error('tanggal_dikembalikan')
        <label for="tanggal_dikembalikan">{{ $message }}</label>
    @enderror
    <br>

    <input type="hidden" name="penyewa" value="{{ $sewa->penyewa }}"><br>

    <input type="submit" value="Terima">
</form>