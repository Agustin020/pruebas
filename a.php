<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1800">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>

    </style>

    <script>
        function capturarFechas() {
            var fechaFinal = $('input[name=fechaFinal]').val();
            var fechaFinal2 = $('input[name=fechaFinal2]').val();
            var fechaFinal3 = $('input[name=fechaFinal3]').val();

            $('input[name=fechaFinal2]').prop('min', fechaFinal);
            $('input[name=fechaFinal3]').prop('min', fechaFinal2);

            if (fechaFinal !== '') {
                $('input[name=fechaFinal2]').prop('disabled', false);
                if (fechaFinal === fechaFinal2) {
                    $('#btnSubmit').prop('disabled', true);
                    $('#fechaIgual2').show();
                } else {
                    $('#btnSubmit').prop('disabled', false);
                    $('#fechaIgual2').hide();
                }
            } else {
                $('input[name=fechaFinal2]').prop('disabled', true);
                $('input[name=fechaFinal3]').prop('disabled', true);
                $('input[name=fechaFinal2]').val('');
                $('input[name=fechaFinal3]').val('');
            }


            if (fechaFinal2 !== '') {
                $('input[name=fechaFinal3]').prop('disabled', false);
                if (fechaFinal2 === fechaFinal3) {
                    $('#btnSubmit').prop('disabled', true);
                    $('#fechaIgual3').show();
                } else {
                    $('#btnSubmit').prop('disabled', false);
                    $('#fechaIgual3').hide();
                }
            } else {
                $('input[name=fechaFinal3]').prop('disabled', true);
                $('input[name=fechaFinal3]').val('');
            }

        }
    </script>
</head>



<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <form class="border p-4">
            <div class="mb-3">
                <label for="inputName" class="col-xs-4 col-form-label">Username</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Name">
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="" id="" placeholder="">
            </div>

            <div class="mb-3 row">
                <div class="col-auto">
                    <button type="submit" id="btnSubmit" class="btn btn-primary">Action</button>
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Fecha Final</label>
                <input type="date" id="fechaFinal" class="form-control" onchange="capturarFechas()" min="2022-08-01" name="fechaFinal" id="" aria-describedby="helpId" placeholder="">
                <small class="form-text text-danger" style="display: none;">Las fechas de los finales son iguales</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha Final 2</label>
                <input type="date" id="fechaFinal2" class="form-control" onchange="capturarFechas()" name="fechaFinal2" id="" aria-describedby="helpId" placeholder="" disabled>
                <small class="form-text text-danger" id="fechaIgual2" style="display: none;">Las fechas de los finales son iguales</small>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha Final 3</label>
                <input type="date" id="fechaFinal3" class="form-control" onchange="capturarFechas()" name="fechaFinal3" id="" aria-describedby="helpId" placeholder="" disabled>
                <small class="form-text text-danger" id="fechaIgual3" style="display: none;">Las fechas de los finales son iguales</small>
            </div>
        </form>
    </div>

</body>

</html>