<form action="{{ route('sewa.review') }}" method="post">
    @csrf
    <label for="tanggal_sewa">Tanggal Sewa</label><br>
    <input type="date" name="tanggal_sewa" id="tanggal_sewa"><br>
    <label for="tanggal_kembali">Tanggal Kembali</label><br>
    <input type="date" name="tanggal_kembali" id="tanggal_kembali"><br>
    <label for="mobil">Mobil</label>
    <input list="mobils" name="mobil" id="mobil">
        <datalist id="mobils">
            <option value="A">
            <option value="B">
            <option value="C">
        </datalist>
    <br>
    <input type="checkbox" name="supir" id="supir">
    <label for="supir">Supir</label><br>
    <input type="submit" value="Sewa">
</form>