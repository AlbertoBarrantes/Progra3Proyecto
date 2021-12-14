<?php
$page_title = 'Pago';

session_start();

require_once('backend/public/public_header.php');
require_once('backend/public/navbar.php');

//error_reporting(0); 

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/checkout.css"> 
</head>
<body>
<div class="card mt-5 my-5 signup-form2 shadow text-center" style="max-width:100% !important;">
<h2>Registre su forma de pago</h2>
<p>Recuerde usar solo equipos confiables al usar esta pagína </p>
</div>
<div class="row">
  <div class="col-75">
    <div class="card mt-5 my-5 signup-form2 shadow text-center" style="max-width:70% !important;">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Dirección asociada a la tarjeta</h3>
            <div class="input-group">
            <label for="fname"><i class="fa fa-user"></i> Nombre completo</label>
            <input type="text" id="fname" name="firstname" placeholder="Ejemplo: Maria Gutierrez hermandez">
            </div>
            <div class="input-group">
            <label for="email"><i class="fa fa-envelope"></i> Correo electronico</label>
            <input type="text" id="email" name="email" placeholder="Ejemplo: Mari@example.com">
            </div>
            <div class="input-group">
            <label for="adr"><i class="fa fa-address-card-o"></i> Dirección</label>
            <input type="text" id="adr" name="address" placeholder="Ejemplo: San José, San José"> 
            </div>
            <div class="input-group">
            <label for="city"><i class="fa fa-home"></i> Ciudad</label>
            <input type="text" id="city" name="city" placeholder="San José">
            </div>

            <div class="row">
              <div class="col-50">
              <div class="input-group">
                <label for="state"><i class="fa fa-home"></i> Provincia</label>
                <input type="text" id="state" name="state" placeholder="San José">
                </div>
              </div>
              <div class="col-50">
              <div class="input-group">
                <label for="zip"><i class="fa fa-home"></i> Código postal</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Información de la tarjeta</h3>
            <label for="fname">Tipo de tarjetas aceptadas</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <div class="input-group">
            <label for="cname"><i class="fa fa-credit-card"></i> Nombre de la tarjeta</label>
            <input type="text" id="cname" name="cardname" placeholder="Nombre de la tarjeta">
            </div>
            <div class="input-group">
            <label for="ccnum"><i class="fa fa-credit-card"></i> Número de la trajeta</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Ejemplo: 1111-2222-3333-4444">
            </div>
            <div class="input-group">
            <label for="expmonth"><i class="fa fa-credit-card"></i> Mes de expiración</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Mes de expiración">
            </div>
            <div class="row">
              <div class="col-50">
              <div class="input-group">
                <label for="expyear"><i class="fa fa-credit-card"></i> Año de expiración</label>
                <input type="text" id="expyear" name="expyear" placeholder="Año de expiración">
                </div>
              </div>
              <div class="col-50">
              <div class="input-group">
                <label for="cvv"><i class="fa fa-credit-card"></i> CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="Numero de seguridad">
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Guardar esta tarjeta para futuros pagos
        </label>
        <input type="submit" value="Proceder al pago" class="btn btn-primary btn-lg">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="card mt-5 my-5 signup-form2 shadow text-center" style="max-width:90% !important;">
    
    <div class="input-group carrito">
    <span class="input-group-addon"><i class="fa fa-shopping-cart"> </i></span>
      <h4>Cart </h4>
      <label for="objetos">4</label>
    </div>
      <div class="input-group carrito">
      <span class="input-group-addon"><i class="fa fa-usd"> </i></span>
      <label for="viaje">Viaje</label>
  
      </div>  
      <div class="input-group carrito">
      <span class="input-group-addon"><i class="fa fa-usd"> </i></span>
      <label for="ipuesto">Impuesto</label>

      </div> 
      <div class="input-group carrito">
      <span class="input-group-addon"><i class="fa fa-usd"> </i></span>
      <label for="descuento">Descuento</label>  
      </div> 
      <div class="input-group carrito">
      <span class="input-group-addon"><i class="fa fa-usd"> </i></span>
      <label for="subtotal">Subtotal</label>
  
      </div> 
      <hr>
      <div class="input-group carrito">
      <H4>Total</H4>
      <span class="input-group-addon"><i class="fa fa-usd"> </i></span>
      <label for="total">0</label>
      </div>
    </div>  
    
    </div>
  </div>
</div>

<?php
  require_once('backend/public/public_footer.php');
?>

</body>



</html>
