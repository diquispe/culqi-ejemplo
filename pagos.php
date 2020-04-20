<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<input type="button" id="buyButton" value="pagar" data-producto="MI PRUDCTO BPNITO" data-precio="200">


<script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
<!-- Incluyendo Culqi Checkout -->
<script src="https://checkout.culqi.com/js/v3"></script>


<script>

    Culqi.publicKey = 'pk_test_1f17e4e5d21a20ce';

    var producto = "";
    var precio = "";

    $('#buyButton').on('click', function (e) {
        // Abre el formulario con la configuración en Culqi.settings

        var producto = $(this).attr('data-producto');
        var precio = $(this).attr('data-precio');


        Culqi.settings({
            title: producto,
            currency: 'USD',
            description: producto,
            amount: precio
        });


        Culqi.open();
        e.preventDefault();
    });

    function culqi() {
        if (Culqi.token) { // ¡Objeto Token creado exitosamente!


            var token = Culqi.token.id;
            var email = Culqi.token.email;

            var data = {producto: producto, precio: precio, token: token, email: email};

            var url = "proceso.php";
            $.post(url, data, function (res) {
                console.log(res);
            });


        } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
        }
    }</script>
</body>
</html>