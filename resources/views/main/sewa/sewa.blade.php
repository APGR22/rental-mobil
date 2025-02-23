<form action="{{ route('sewa.review') }}" method="post">
    @csrf
    <label for="tanggal_sewa">Tanggal Sewa</label>
    <br>
    <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="{{ old('tanggal_sewa') }}">
    @error('tanggal_sewa')
        {{ $message }}
    @enderror
    <br>

    <label for="tanggal_kembali">Tanggal Kembali</label><br>
    <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}">
    @error('tanggal_kembali')
        {{ $message }}
    @enderror
    <br>

    <label for="mobil">Mobil</label>
    <input list="mobils" name="mobil" id="mobil" value="{{ old('mobil') }}">
        <datalist id="mobils">
            @foreach ($mobils as $mobil)
                @if((!$mobil->sedang_disewa) && (!$mobil->sedang_perbaikan))
                    <option value="{{ $mobil->tipe }}">{{ $mobil->harga }}</option>
                @endif
            @endforeach
        </datalist>
    @error('mobil')
        {{ $message }}
    @enderror
    <br>

    <label for="supir">Supir (kosong = tanpa supir)</label>
    <input list="supirs" name="supir" id="supir" value="{{ old('supir') }}">
        <datalist id="supirs">
            @foreach ($supirs as $supir)
                @if(!$supir->sedang_bekerja)
                    <option value="{{ $supir->nama }}">{{ $supir->harga }}</option>
                @endif
            @endforeach
        </datalist>
    @error('supir')
        {{ $message }}
    @enderror
    <br>

    <input type="submit" value="Sewa"><br>
    @if(session()->has('error'))
        {{ session()->get('error') }}
    @endif
</form>