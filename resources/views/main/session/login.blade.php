<a href="{{ route('register') }}"><button>Register</button></a>
<br><br>
<form action="{{ route('login.send') }}" method="post">
    @csrf
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username" value="{{ old('username') }}">
    @error('username')
        {{ $message }}
    @enderror
    <br>
    <label for="password">Password</label><br>
    <input type="text" name="password" id="password" value="{{ old('password') }}">
    @error('password')
        {{ $message }}
    @enderror
    <br>
    <input type="submit" value="Submit">
</form>
<br>
@if (session()->has('loginError'))
    <p>{{ session()->get('loginError') }}</p>
@endif