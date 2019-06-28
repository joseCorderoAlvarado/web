<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> 
</head>
<body>
<?php
include("lib_carrito.php");
?>
<div class="panel panel-default" >
 <div class="panel-heading">
  <form method="Post" action="DatosVentaU.php">   
      <div class="row ">
              <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Ingrese los números de su tarjeta" required="" minlength="16" maxlength="16" onkeypress="return filterFloat(event,this);">
                 <script type="text/javascript">
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}

</script>
              </div>
          </div>
     <div class="row ">
              <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" > Mes de expiración</span>
                  <input type="text" class="form-control" placeholder="MM" minlength="2" maxlength="2" onkeypress="return filterFloat(event,this);" />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >  Año de exipración</span>
                  <input type="text" class="form-control" placeholder="YY"minlength="2" maxlength="2" onkeypress="return filterFloat(event,this);" />
              </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >  CCV</span>
                  <input type="text" class="form-control" placeholder="CCV"minlength="3" maxlength="3" onkeypress="return filterFloat(event,this);" />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
<img src="images/1.png" class="img-rounded" />
         </div>
          </div>
     <div class="row ">
              <div class="col-md-12 pad-adjust">

                  <input type="text" class="form-control" placeholder="Nombre de la tarjeta" maxlength="24" minlength="4" />
              </div>
          </div>
     <div class="row">
<div class="col-md-12 pad-adjust">
    <div class="checkbox">
  
  </div>
</div>
     </div>
       <div class="row ">
               <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                
                  <input type="submit"  class="btn btn-warning btn-block" value="Pagar ahora" />
                </form>
              </div>

               <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
              <form method="Post" action="ver_carrito.php">
                  <input type="submit"  class="btn btn-danger" value="CANCELAR"  >
              </form>
              </div>

          </div>
     
                   </div>
              </div>
</body>
</html>

