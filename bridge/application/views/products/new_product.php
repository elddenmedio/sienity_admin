
			<script>
                            $(document).ready(function(){                                
                                $("input[id=sku<?= $sec?>]").keyup(function(){
                                    var info = $(this).val();
                                    var type = "sku";
                                    
                                    $.post("<?= base_url('index.php/autocomplete')?>", { info : info, type : type }, function ( data ) { 
                                        if( data !== ''){
                                            $("#content-sku<?= $sec?>").html(data);
                                            $("#content-sku<?= $sec?>").show("slow");
                                            $("#form-name<?= $sec?>").hide("slow");
                                            $("#form-description<?= $sec?>").hide("slow");
                                            $("#form-userfile<?= $sec?>").hide("slow");
                                            $("#name").prop('required',false);
                                            $("#description").prop('required',false);
                                            $("#userfile").prop('required',false);
                                        }
                                        else{
                                                $("#content-sku<?= $sec?>").hide("slow");
                                                $("#form-name<?= $sec?>").show("slow");
                                                $("#form-description<?= $sec?>").show("slow");
                                                $("#form-userfile<?= $sec?>").show("slow");
                                                $("#name<?= $sec?>").prop('required',true);
                                                $("#description<?= $sec?>").prop('required',true);
                                                $("#userfile<?= $sec?>").prop('required',true);
                                        }
                                    });
                                });
                                
                                //validate form quotation before send
                                $("#submit-quotation-b").click( function ( ) {
                                    $("#loading").show();
                                    $("div.quotation-input").removeClass("has-error");
                                    $("#handle-error").remove();

                                    var v_sku<?= $sec?>     = $("#sku<?= $sec?>").val();
                                    var v_stock<?= $sec?>   = $("#stock<?= $sec?>").val();
                                    var v_price<?= $sec?>   = $("#price<?= $sec?>").val();
                                    var v_qty<?= $sec?>     = $("#qty<?= $sec?>").val();

                                    if( v_sku<?= $sec?>.length < 1){
                                        var jqxhr   = $.get(base_url + "get_error/10", 
                                                            function( data ) {
                                                                $("#horizontal-form").before(data);
                                                            })
                                                            .done(function( ) {
                                                                $("#loading").hide();
                                                                $("#f-sku<?= $sec?>").addClass("has-error");
                                                                setTimeout(function() {
                                                                    $(".h-e-10").remove();
                                                                }, 7000);
                                                            });
                                        f_send = false;
                                    }
                                    else{
                                        //validate other input of new product if sku is new
                                        $.post(base_url + "validate_sku", { info : v_sku<?= $sec?> }, function ( data ) { 
                                            if( data === false){
                                                //validate product name, description and picture
                                                var v_name<?= $sec?>  = $("#name<?= $sec?>").val();
                                                var v_description<?= $sec?> = $("#description<?= $sec?>").val();
                                                //product name
                                                if( v_name<?= $sec?>.length < 1){
                                                    var jqxhr   = $.get(base_url + "get_error/14", 
                                                                        function( data ) {
                                                                            $("#horizontal-form").before(data);
                                                                        })
                                                                        .done(function( ) {
                                                                            $("#loading").hide();
                                                                            $("#f-name<?= $sec?>").addClass("has-error");
                                                                            setTimeout(function() {
                                                                                $(".h-e-14").remove();
                                                                            }, 7000);
                                                                        });
                                                    f_send = false;
                                                }
                                                //product description
                                                if( v_description<?= $sec?>.length < 1){
                                                    var jqxhr   = $.get(base_url + "get_error/15", 
                                                                        function( data ) {
                                                                            $("#horizontal-form").before(data);
                                                                        })
                                                                        .done(function( ) {
                                                                            $("#loading").hide();
                                                                            $("#f-description<?= $sec?>").addClass("has-error");
                                                                            setTimeout(function() {
                                                                                $(".h-e-15").remove();
                                                                            }, 7000);
                                                                        });
                                                    f_send = false;
                                                }
                                                //product image
                                                if( $("#userfile<?= $sec?>").get(0).files.length === 0) {
                                                    var jqxhr   = $.get(base_url + "get_error/16", 
                                                                        function( data ) {
                                                                            $("#horizontal-form").before(data);
                                                                        })
                                                                        .done(function( ) {
                                                                            $("#loading").hide();
                                                                            $("#f-userfile<?= $sec?>").addClass("has-error");
                                                                            setTimeout(function() {
                                                                                $(".h-e-16").remove();
                                                                            }, 7000);
                                                                        });
                                                    f_send = false;
                                                }
                                            }
                                        });
                                    }
                                    //validate if the first stock product is empty
                                    if( v_stock<?= $sec?>.length < 1){
                                        var jqxhr   = $.get(base_url + "get_error/11", 
                                                            function( data ) {
                                                                $("#horizontal-form").before(data);
                                                            })
                                                            .done(function( ) {
                                                                $("#loading").hide();
                                                                $("#f-stock<?= $sec?>").addClass("has-error");
                                                                setTimeout(function() {
                                                                    $(".h-e-11").remove();
                                                                }, 7000);
                                                            });
                                        f_send = false;
                                    }
                                    //validate if the first price product is empty
                                    if( v_price<?= $sec?>.length < 1){
                                        var jqxhr   = $.get(base_url + "get_error/12", 
                                                            function( data ) {
                                                                $("#horizontal-form").before(data);
                                                            })
                                                            .done(function( ) {
                                                                $("#loading").hide();
                                                                $("#f-price<?= $sec?>").addClass("has-error");
                                                                setTimeout(function() {
                                                                    $(".h-e-12").remove();
                                                                }, 7000);
                                                            });
                                        f_send = false;
                                    }
                                    //validate if the first quantity product is empty
                                    if( v_qty<?= $sec?>.length < 1){
                                        var jqxhr   = $.get(base_url + "get_error/13", 
                                                            function( data ) {
                                                                $("#horizontal-form").before(data);
                                                            })
                                                            .done(function( ) {
                                                                $("#loading").hide();
                                                                $("#f-qty<?= $sec?>").addClass("has-error");
                                                                setTimeout(function() {
                                                                    $(".h-e-13").remove();
                                                                }, 7000);
                                                            });
                                        f_send = false;
                                    }

                                    //SEND FORM
                                    if( f_send){
                                        return true;
                                    }
                                    else{
                                        $("body, html").animate({ 
                                                            scrollTop: $("h3").offset().top 
                                                          }, 600);
                                    }
                                });
                                
                                $("#content-sku<?= $sec?>").find("a").live('click',function(e){
                                    e.preventDefault();
                                    textoseparado = $(this).attr('id').split('|');
                                    $("#sku<?= $sec?>").val(textoseparado[0]);
                                    $("#stock<?= $sec?>").val(textoseparado[2]);
                                    $("#price<?= $sec?>").val(textoseparado[3]);
                                    $("#qty<?= $sec?>").val('1');
                                    $("#content-sku<?= $sec?>").hide("slow");
                                });
                                
                                //validate qty with product stock
                                /*
                                $("#qty<?= $sec?>").focusout(function() {
                                    var compare1    = parseInt($(this).val());
                                    var compare2    = parseInt($("#stock<?= $sec?>").val());

                                    if( compare1 >= compare2){
                                        var jqxhr   = $.get(base_url + "get_error/9", 
                                                            function( data ) {
                                                                $("#horizontal-form").before(data);
                                                            })
                                                            .done(function( ) {
                                                                $("#loading").hide();
                                                                $("#f-qty<?= $sec?>").addClass("has-error");
                                                                setTimeout(function() {
                                                                        $(".h-e-9").remove();
                                                                    }, 7000);
                                                            });

                                        f_send = false;

                                        $("body, html").animate({ 
                                                            scrollTop: $("h3").offset().top 
                                                          }, 600);
                                    }
                                    else{
                                        $("#f-qty<?= $sec?>").removeClass("has-error");
                                        $("#handle-error").remove();
                                    }
                                });
                                */
                            });
                        </script>
			
				<div class="col-md-6">
                                    <div class="form-group" id="f-sku<?= $sec?>">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input type="text" class="form-control" id="sku<?= $sec?>" name="sku[]" placeholder="" required="true">
                                        <div class="contenedor" id="content-sku<?= $sec?>" style="display: none;"></div>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-6" id="form-stock<?= $sec?>">
                                    <div class="form-group" id="f-stock<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{stock}</label>
                                        <input type="text" class="form-control" id="stock<?= $sec?>" name="stock[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-price<?= $sec?>">
                                    <div class="form-group" id="f-price<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{price}</label>
                                        <input type="text" class="form-control" id="price<?= $sec?>" name="price[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-discount<?= $sec?>">
                                    <div class="form-group" id="f-discount<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{discount}</label>
                                        <div class="input-group mb-2 mb-sm-0">
                                            <input type="text" class="form-control" id="discount<?= $sec?>" name="discount[]" placeholder="" onkeypress="validate(event)" maxlength="3">
                                            <div class="input-group-addon">%</div>
                                          </div>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-3" id="form-qty<?= $sec?>">
                                    <div class="form-group" id="f-qty<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{qty}</label>
                                        <input type="text" class="form-control" id="qty<?= $sec?>" name="qty[]" placeholder="" required="true" onkeypress="validate(event)">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-name<?= $sec?>" style="display: none;">
                                    <div class="form-group" id="f-name<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{product} {name}</label>
                                        <input type="text" class="form-control" id="name<?= $sec?>" name="name[]" placeholder="">
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-description<?= $sec?>" style="display: none;">
                                    <div class="form-group" id="f-description<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{description}</label>
                                        <textarea class="form-control" id="description<?= $sec?>" name="description[]" rows="3"></textarea>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
                                <div class="col-md-12" id="form-userfile<?= $sec?>" style="display: none;">
                                    <div class="form-group" id="f-userfile<?= $sec?>">
                                        <label for="exampleInputEmail1" class="text-capitalize">{picture}</label>
                                        <label class="custom-file">
                                            <input type="file" id="userfile<?= $sec?>" name="userfile[]" class="custom-file-input">
                                            <span class="custom-file-control"></span>
                                        </label>
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                    </div>
                                </div>
