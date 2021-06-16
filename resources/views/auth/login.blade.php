<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/css/login.css">
    <title>LOGIN SITESI</title>
</head>
<body>
    <!-- fa pls -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- animate.css -->
<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/67239/animate.min.css" rel="stylesheet" />

<!-- under overlay stuff -->
<div class="body"></div>

<!-- the panel -->
<div class="overlay">
  <div class="ui-panel login-panel animated bounceInDown">
    <header>
      <div class="left logo">
        <a href="#logo"><span>WELCOME TO SITESI</span></a>
      </div>

      <div class="right">
        <a href="#close" id="close" class="ui-button close">
          x
        </a>
      </div>
    </header>

    <div class="login-form">
      <div class="subtitle">Login</div>
      <form method="POST" action="{{ route('login') }}">
      @csrf
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    </div>

    <footer>

      <div class="right form-actions">
      <button type="submit" class="btn btn-dark">Login</button>
        <a href="{{ route('register') }}" class="btn btn-warning" role="button">Register</a>
        </form>
      </div>
    </footer>
  </div>
</div>

<!-- get dem fancy typefaces -->
<script type="text/javascript" src="//use.typekit.net/psm0wvc.js"></script>
<script type="text/javascript">
  try {
    Typekit.load();
  } catch (e) {}
</script>
</body>
</html>