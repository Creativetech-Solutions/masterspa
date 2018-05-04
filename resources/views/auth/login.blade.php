

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://sagicorconvention.com/assets/admin/theme/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://sagicorconvention.com/assets/js/jquery.js"></script>
<script type="text/javascript" src="https://sagicorconvention.com/assets/js/jquery-ui.js"></script>
</head>
<body>
<div class="bgb">
  <div id="content">
    <header class="logintitle">
      <h1></i> Admin Panel<span>Master Spa</span></h1>
    </header>
    <div class="loginwrap">
      <form id="admin_form" name="admin_form" method="POST" action="{{ route('login') }}" class="xform loginform">
        {{ csrf_field() }}
        <section>
          <div class="row">
            <div class="col col-12">
              <label class="input">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </label>
            </div>
          </div>
        </section>
        <section>
          <div class="row">
            <div class="col col-12">
              <label class="input">
                <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </label>
            </div>
          </div>
        </section>
        <footer>
          <button name="submit" class="button-login">Login</button>
        </footer>
      </form>
    </div>
    <div class="loginshadow"></div>
    <div id="footer">Master Spa</div>
    
    <div id="message-box">
                </div><!-- message-box -->
   
  </div>
</div>
</body>
</html>