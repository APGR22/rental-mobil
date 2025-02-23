Mobil: {{ $sewa->mobil }} <br>
Penyewa: {{ $sewa->penyewa }} <br>
<br>
<form action="{{ route('terima.review') }}" method="post">
    @csrf

    <label for="tanggal_dikembalikan">Tanggal dikembalikan</label><br>
    <input type="date" name="tanggal_dikembalikan" id="tanggal_dikembalikan" value="{{ old('tanggal_dikembalikan') }}">
    @error('tanggal_dikembalikan')
        <label for="tanggal_dikembalikan">{{ $message }}</label>
    @enderror
    <br>
    <label>Ada kerusakan?</label><br>
    <input type="radio" name="ada_kerusakan" id="ada_kerusakan_ya" value="Ya" @if(old('ada_kerusakan') === 'Ya') checked @endif><label for="ada_kerusakan_ya">Ya</label><br>
    <input type="radio" name="ada_kerusakan" id="ada_kerusakan_tidak" value="Tidak" @if(old('ada_kerusakan') === 'Tidak') checked @endif><label for="ada_kerusakan_tidak">Tidak</label><br>
    @error('ada_kerusakan')
        <label>{{ $message }}</label><br>
    @enderror

    <input type="hidden" name="mobil" value="{{ $sewa->mobil }}"><br>

    <input type="submit" value="Terima">
</form>