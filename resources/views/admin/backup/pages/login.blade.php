
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Sagicor Convention 2018</title>



  <!-- Bootstrap -->

  <link href="http://localhost/sagicorconvention/assets/site/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/sagicorconvention/assets/site/css/bootstrap/bootstrap-formhelpers.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="http://localhost/sagicorconvention/assets/site/css/style.css" rel="stylesheet">

  <script type="text/javascript" src="http://localhost/sagicorconvention/assets/site/js/modernizr.custom.26633.js"></script>



  <noscript>

    <link rel="stylesheet" type="text/css" href="http://localhost/sagicorconvention/assets/site/css/fallback.css" />

  </noscript>

  <!--[if lt IE 9]>

  <link rel="stylesheet" type="text/css" href="http://localhost/sagicorconvention/assets/site/css/fallback.css" />

  <![endif]-->

  <link href="http://localhost/sagicorconvention/assets/site/css/progress-wizard.min.css" rel="stylesheet">



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

  <!-- jQuery -->
  <script src="http://localhost/sagicorconvention/assets/site/js/jquery-1.12.3.min.js"></script>

</head>

<body>

<div class="container">

  <div class="header clearfix">

    <h3 class="text-muted"><a href="http://localhost/masterspa/"><img src="http://localhost/masterspa/assets/site/img/Sagicor2018Logo_FINAL.jpg" style="max-height:114px" alt="Sagicor Convention 2018 | Montreal" /></a></h3>


  </div>


  <!-- content -->


  <div class="loginfloat ">
    <form method="post" action="{{route('cpanel')}}" lpformnum="30">
      <h1 style="color:#00adef;">Login</h1><br>
      <div class="inset">
        <p>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" style="color: rgb(0, 0, 0); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
        </p>
        <p>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" style="color: rgb(0, 0, 0); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
        </p>
        <div class="alert-danger"></div>
      </div>

      <p class="p-container">
        <span><a href="http://localhost/sagicorconvention/login/register">Click here to request your username and password</a></span><br>            <span class="pull-left"><a href="http://localhost/sagicorconvention/login/reset">Forgot password? Click here to reset.</a></span><br>
        <input type="submit" value="Log in" id="dosubmit" name="login">
      </p>
      <input type="hidden" value="1" name="doLogin">
    </form>
  </div>
  <div id="ri-grid" class="ri-grid ri-grid-size-2 ri-shadow">
    <img class="img-responsive flip-img" src="http://localhost/sagicorconvention/assets/site/images/Culture01.jpg"/>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript">

    /*$(document).on('blur, keyup','input', function(e){
     if($(this).val() != '')
     $(this).css('background-image','none');
     else
     $(this).css('background-image','url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAALZJREFUOBFjYKAANDQ0rGWiQD9IqzgL0BQ3IKMXiB8AcSKQ/waIrYDsKUD8Fir2pKmpSf/fv3+zgPxfzMzMSbW1tbeBbAaQC+b+//9fB4h9gOwikCAQTAPyDYHYBciuBQkANfcB+WZAbPP37992kBgIUOoFBiZGRsYkIL4ExJvZ2NhAXmFgYmLKBPLPAfFuFhaWJpAYEBQC+SeA+BDQC5UQIQpJYFgdodQLLyh0w6j20RCgUggAAEREPpKMfaEsAAAAAElFTkSuQmCC")');
     })*/


    /*  $(function() {

     $( '#ri-grid' ).gridrotator( {
     w1024			: {
     rows	: 3,
     columns	: 6
     },
     w768			: {
     rows	: 3,
     columns	: 7
     },
     w480			: {
     rows	: 3,
     columns	: 5
     },
     w320			: {
     rows	: 2,
     columns	: 4
     },
     w240			: {
     rows	: 2,
     columns	: 3
     }
     } );

     });*/
  </script>
  <!-- content end -->

  <footer class="footer">

    <p>&copy; 2016 Sunlinc. All rights reserved. <span class="pull-right">



    </span></p>

  </footer>


</div> <!-- /container -->



<script type="text/javascript" src="http://localhost/sagicorconvention/assets/site/js/jquery.gridrotator.js"></script>
<script type="text/javascript">
    $(function() {

        $( '#ri-grid' ).gridrotator( {
            w1024			: {
                rows	: 3,
                columns	: 6
            },
            w768			: {
                rows	: 3,
                columns	: 7
            },
            w480			: {
                rows	: 3,
                columns	: 5
            },
            w320			: {
                rows	: 2,
                columns	: 4
            },
            w240			: {
                rows	: 2,
                columns	: 3
            }
        } );

    });
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="http://localhost/sagicorconvention/assets/site/js/bootstrap/bootstrap.min.js"></script>
<script src="http://localhost/sagicorconvention/assets/site/js/bootstrap/bootstrap-formhelpers.min.js"></script>

</body>

</html>
<script src="http://localhost/sagicorconvention/assets/site/js/jquery-1.12.3.min.js"></script>

<script src="http://localhost/sagicorconvention/assets/site/js/bootstrap/bootstrap.min.js"></script>
<script src="http://localhost/sagicorconvention/assets/site/js/bootstrap/bootstrap-formhelpers.min.js"></script>
<script>


    $(document).on('keyup','input:not([type="email"])',function(e){
        var val = $(this).val();
        val = val.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        $(this).val(val);
    })
</script>