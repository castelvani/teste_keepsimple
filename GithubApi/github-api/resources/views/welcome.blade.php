<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel fetch</title>
</head>

<body>
    <form method="GET" action="/github/user">
        <label for="username">Nome de usuario</label>
        <input type="text" id="username" name="user">
        <button>buscar</button>
    </form>
    @if($userInfo)
    @foreach ($userInfo as $key => $user)
    <p>{{$key}} {{ $user }}</p>
    @endforeach
    @endif
</body>

</html>