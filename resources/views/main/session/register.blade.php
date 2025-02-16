<form action="{{ route('register.send') }}" method="post">
    @csrf

    <label for="no_ktp">No. KTP</label><br>
    <input type="number" name="no_ktp" id="no_ktp" value="{{ old('no_ktp') }}">
    @error('no_ktp')
        <label for="no_ktp">{{ $message }}</label>
    @enderror
    <br>

    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
    @error('nama')
        <label for="nama">{{ $message }}</label>
    @enderror
    <br>

    <label for="tanggal_lahir">Tanggal Lahir</label><br>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
    @error('tanggal_lahir')
        <label for="tanggal_lahir">{{ $message }}</label>
    @enderror
    <br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="{{ old('email') }}">
    @error('email')
        <label for="email">{{ $message }}</label>
    @enderror
    <br>

    <label for="no_telp">No. Telp</label><br>
    <input type="number" name="no_telp" id="no_telp" value="{{ old('no_telp') }}">
    @error('no_telp')
        <label for="no_telp">{{ $message }}</label>
    @enderror
    <br>

    <label for="username">Username</label><br>
    <input type="text" name="username" id="username" value="{{ old('username') }}">
    @error('username')
        <label for="username">{{ $message }}</label>
    @enderror
    <br>

    <label for="password">Password</label><br>
    <input type="text" name="password" id="password" value="{{ old('password') }}">
    @error('password')
        <label for="password">{{ $message }}</label>
    @enderror
    <br>

    <input type="submit" value="Submit">
</form>