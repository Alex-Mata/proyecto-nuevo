<style type="text/css">
  body {
    background-image: url(img/iceep.png);
     background-size: 100%;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
}

 </style>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css
    /css/fontello.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container" style="margin-top:130px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div style="opacity: .9" class="panel panel-default">
          <div class="panel-heading">
            <strong>Signature-IGS16</strong>
          </div>
          <div class="panel-body">
            <form role="form" method="POST">
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img class="profile-img"
                      src="img/igs.jpeg" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Username" name="user" id="user" type="text" autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" type="password" name="pass" id="pass" " value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="button" name="login" id="login" value="Login" t" class="btn btn-lg btn-primary btn-block">
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="panel-footer ">
            No Tienes Una Cuenta! 
            <a data-toggle='modal' data-target='#editUsu' onclick=""> Crear Cuenta </a>
          </div>
    </div>
   </div>
  </div>
      </div>
    </div>
  </div>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>





<div class="container" style="margin-top:40px">
<div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidd  <div class="modal-content">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            <strong>Signature-IGS16</strong>
          </div>
          <div class="panel-body">
            <form action="insertar_admin.php" method="get" autocomplete="off">
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img class="profile-img"
                      src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <label>Ingrese nombre</label>
                        <input class="form-control" required id="nombre" name="nombre" type="text" placeholder="INGRESE NOMBRE"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <label>ingrese Cargo</label>
                        <input class="form-control" required id="cargo" name="cargo" type="text" placeholder="INGRESE CARGO"></input>
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <label>Contraseña</label>
                       <input class="form-control" required id="contra" name="contra" type="password" placeholder="INGRESE CONTRASEÑA"></input>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <label>E-mail</label>
                       <input type="email"  required id="email" name="email" class="form-control" placeholder="INGRESE EMAIL"></input>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-success" value="Guardar">
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
</body>

  <script type="js/jquery.js"></script>
</html>

<script>
  $(document).ready(function() {
    $('#login').click(function(){
      var user = $('#user').val();
      var pass = $('#pass').val();
      if($.trim(user).length > 0 && $.trim(pass).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:{user:user, pass:pass},
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Login");
            if (data=="1") {
              $(location).attr('href','index.php');
            } else {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales son incorrectas.</div>");
            }
          }
        });
      };
    });
  });
</script>