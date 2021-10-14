<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/forms.css">

    <title>Registrate</title>
</head>

<body>
    <div class="container">
        <div class="row  d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="<?php echo $this->tipoMensaje ?> text-center" role="alert">
                    <?php echo $this->mensaje ?>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center"> Registro de usuarios</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body" id="formulario" name="formulario">
                        <form method="POST" onsubmit="return validate()">
                            <div class="row">

                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Nombre(s)</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control text-capitalize" name="nombre" id="nombre" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Apellido Paterno</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control text-capitalize" name="apaterno" id="apaterno" placeholder="Apellido paterno" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Apellido Materno</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control text-capitalize" name="amaterno" id="amaterno" placeholder="Apellido materno" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Fecha de nacimiento</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="nacimiento" id="nacimiento" placeholder="Fecha de nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bolder"> @</span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Teléfono</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"class="form-control" name="telefono" id="telefono" placeholder="Teléfono a 10 dígitos"  maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="text-muted font-weight-bolder m-0">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" onkeyup="checkPass()">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="" class="text-muted font-weight-bolder m-0">Confirmación de password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password-confirm" id="password-confirm" placeholder="Confirmar Contraseña" onkeyup="checkPass()">
                                    </div>
                                    <span class="message"></span>
                                </div>
                                <div class="col-lg-12 text-center my-3">
                                    <button class="btn btn-primary" type="submit">Registrarse</button>
                                </div>
                            </div> <!-- row -->
                            <div id="resultado">
                         </div>
                        </form> <!-- /.form -->
                    </div><!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/login.js"></script>

</body>

</html>