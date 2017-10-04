
<div class="alert alert-danger ew-alert h-e-<?= $error?>" role="alert" id="handle-error" style="margin-top: 20px;">
            <span class="glyphicon glyphicon-remove-sign"></span> error
            <br>
            <?php 
                    switch($error):
                        case 1:
            ?>
                            Todos los campos son requeridos.
            <?php 
                            break;
                        case 2:
            ?>
                            El campo proyecto debe contener al menos 5 caracteres de longitud.
            <?php 
                            break;
                        case 3:
            ?>
                            El campo para debe contener al menos 5 caracteres de longitud.
            <?php 
                            break;
                        case 4:
            ?>
                            El campo email debe contener una dirección de correo válida.
            <?php 
                            break;
                        case 5:
            ?>
                            El campo rfc debe estar entre 12 y 13 caracteres de longitud (según sea el caso).
            <?php 
                            break;
                        case 6:
            ?>
                            El campo nombre del rfc debe contener al menos 5 caracteres de longitud.
            <?php 
                            break;
                        case 7:
            ?>
                            El campo teléfono del rfc debe estar entre 10 y 11 números de longitud (dependiendo la lada).
            <?php 
                            break;
                        case 8:
            ?>
                            El campo dirección del rfc debe contener al menos 20 caracteres de longitud.
            <?php 
                            break;
                        case 9:
            ?>
                            El campo quantity no puede ser mayor a la cantidad de stock del producto.
            <?php 
                            break;
                        case 10:
            ?>
                            El campo sku es obligatorio.
            <?php 
                            break;
                        case 11:
            ?>
                            El campo stock es obligatorio.
            <?php 
                            break;
                        case 12:
            ?>
                            El campo price es obligatorio.
            <?php 
                            break;
                        case 13:
            ?>
                            El campo cantidad es obligatorio.
            <?php 
                            break;
                        case 14:
            ?>
                            El campo nombre del producto es obligatorio.
            <?php 
                            break;
                        case 15:
            ?>
                            El campo descripción del producto es obligatorio.
            <?php 
                            break;
                        case 16:
            ?>
                            La imágen del producto es obligatorio.
            <?php 
                            break;
                        case 17:
            ?>
                            El campo Delivery Time tiene que ser de la siguiente forma {dd-dd(space)time} [time as day, week, month, etc.]
            <?php 
                            break;
                        default:
                            echo $error;
                            break;
                    endswitch;
            ?>
        </div>
