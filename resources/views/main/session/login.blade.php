<a href="{{ route('register') }}"><button>Register</button></a>
<br><br>
<form action="{{ route('login.send') }}">
    <label for="username">Username</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="password">Password</label><br>
    <input type="text" name="password" id="password">
</form>