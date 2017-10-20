<?php $sp47dc23 = "Inventory Admin"; require_once INC . '/h08034r.php';  if (isset($_SESSION['tl'])) { $sp8ccae7 = $_SESSION['tl']; if ($sp8ccae7 < 0) { $sp2abdd3 = "Trial period has expired.  Please contact <a href='mailto:criticalcomputingrx@gmail.com?"; $sp2abdd3 .= "subject=Request%20for%20a%20license&body=I%20would%20like%20a%20license%20for%20PS%20Utilities'"; $sp2abdd3 .= ">Critical Computing Rx</a> for a license."; echo $sp2abdd3; exit; } } ?>


	<table class="table mainf" style="text-align:center;border: background-color:#FFF;">
		<tbody><tr>
        			<td colspan="3" style="background-color:#ffffff;" align="left" valign="top">
                        <div >
                            <form style="float:right" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2JYRGPG5D2488">
<table>
<tr><td><input type="hidden" name="on0" value="Level">Level</td></tr><tr><td><select name="os0">
	<option value="Thank You">Thank You $25.00 USD</option>
	<option value="Towards Version 2">Towards Version 2 $50.00 USD</option>
	<option value="Prepay Version 2 (per yr.)">Prepay Version 2 (per yr.) $197.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
                            <form role="form" action="" method="post">
                                <input id="op" type="hidden" name="op" value="">
                                <div class="form-group">
                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default" onclick="addCo()"
                                                data-toggle="tooltip" title="Add or update company parameters" data-placement="bottom">
                                            Update Company</button>
                                        <button type="button" class="btn btn-default" onclick="deleteCo()"
                                                data-toggle="tooltip" title="Reset Company from database" data-placement="bottom">
                                            Reset Company</button>
                                        <button type="button" class="btn btn-default" onclick="updateCo()"
                                                data-toggle="tooltip" title="Retrieve all companies from promostandards (does not change username/password values)"
                                                data-placement="bottom">
                                            Update All Endpoints</button>
                                    </div><br><br><br><br>
                                    <div>
                                        <div id="companyDiv" class="hidden">
                                            <label for="companies">Select Company:</label>
                                            <select name=companyID id="companies"  required>
                                                    <option>--select one--</option>
                                                    <option value="new">Add New</option>
                                                <?php  foreach ($sp2c9bfa as $sp263a81 => $sp93d81f) { echo "<option style=\"color:{$sp99e24b[$sp263a81]}\" value=\"{$sp263a81}\">{$sp93d81f}</option>"; } ?>

                                            </select>
                                            <input name="companyName" id="companyName" type="hidden" value="<?php  echo $spc1bf8a; ?>">
                                        </div>
                                        <div  id="userInfo" class="hidden row">
                                            <div id="usercol" class="col-md-4">
                                                <div>
                                                    <label class="col-md-4" for="username">User ID:</label>
                                                    <input class="col-md-9" id="username" type="text" name="userName" placeholder="Incomplete">
                                                </div>
                                                <div>
                                                    <label class="col-md-4" for="password">Password:</label>
                                                    <input class="col-md-9"  id="password" name="password" type="text" placeholder="Incomplete">
                                                </div>
                                                <!--div>
                                                    <label class="col-md-4" for="entity"><button class="dialogit1">Select Entity</button></label>
                                                    <input class="col-md-9"  id="entity" name="entity" type="hidden" >
                                                    <input class="col-md-9" id="supplier_name" placeholder="Incomplete" disabled="true">
                                                </div-->
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <label id="invUrlLabel" class="col-md-6" for="invUrl">Inventory Url:</label>
                                                    <input class="col-md-12" id="invUrl" name="invUrl" type="text" placeholder="Incomplete">
                                                </div>
                                                <div>
                                                    <label id="statusUrlLabel" class="col-md-6" for="statusUrl">Order Status Url:</label>
                                                    <input class="col-md-12"  id="statusUrl" name="statusUrl" type="text" placeholder="Incomplete">
                                                </div>
                                                <div>
                                                    <label id="shippingUrlLabel" class="col-md-6" for="shippingUrl">Shipping Status Url:</label>
                                                    <input class="col-md-12"  id="shippingUrl" name="shippingUrl" type="text" placeholder="Incomplete">
                                                </div>
                                                <div>
                                                    <label id="productUrlLabel" class="col-md-6" for="productUrl">Product data Url:</label>
                                                    <input disabled class="col-md-12"  id="productUrl" name="" type="text" placeholder="Future">
                                                </div>
                                                <div>
                                                    <label id="productUrlLabel" class="col-md-6" for="productUrl">Product Pricing Url:</label>
                                                    <input disabled class="col-md-12"  id="productUrl" name="" type="text" placeholder="Future">
                                                </div><div>
                                                    <label id="productUrlLabel" class="col-md-6" for="productUrl">Purchase Order Url:</label>
                                                    <input disabled class="col-md-12"  id="productUrl" name="" type="text" placeholder="Future">
                                                </div>
                                                <div>
                                                    <label id="mediaUrlLabel" class="col-md-6" for="mediaUrl">Media Url:</label>
                                                    <input disabled class="col-md-12"  id="mediaUrl" name="" type="text" placeholder="Future">
                                                </div>
                                            </div>
                                    </div><br>
                                </div>
                                    <br><button id="submit" type="submit" class="btn btn-default hidden" >Submit</button>


                            </form>

                            <hr>
<?php if ($sp263229) { foreach ($sp263229 as $spb443cb) { echo "<p>{$spb443cb}</p>"; } } ?>
<?php if($sp8ccae7){ echo '<a style="float:right;" href="mailto:criticalcomputingrx@gmail.com?subject=Request%20for%20a%20license&body=I%20would%20like%20a%20license%20for%20PS%20Utilities" target="_top">Registration</a>';}?>
                    <hr>
                    The current date and time is <?php  echo date(DATE_COOKIE); ?>

                <a style="font-size:large;float:right;" href="License-Commercial.php" target="license">License</a>
                </div>
                </td></tr></table>
                <div id="dialog1" title="Suppliers">
        			<div id="table1">
        				<table id="vendorTable1" class="display" width="100%"></table>
        			</div>
        			<div id="infoDialog"></div>
                </div>
                <?php  include "includes/logo.html"; ?>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script language="JavaScript">
            function addCo() {
                $('#userInfo, #companyDiv, #submit').removeClass('hidden');
                $('#username, #password, #companies').attr('required',true);
                $("#op").val('add');
            }
            function deleteCo() {
                $('#userInfo').removeClass('hidden').addClass('hidden');
                $('#username, #password').removeAttr('required');
                $('#companies').attr('required',true);
                $('#companyDiv, #submit').removeClass('hidden');
                $("#op").val('delete');
            }
            function updateCo() {
                $('#userInfo, #companyDiv, #submit').removeClass('hidden').addClass('hidden');
                $('#username, #password, #invUrl, #statusUrl, #companies').removeAttr('required');
                $("#op").val('update');
                if(confirm("Are you sure you want to update all endpoints?")){
                    $.post('a46437.php',{op:'update'});
                    $.alert('Companies are being updated in the background.','Updating');
                    setTimeout("$('#timedialog').dialog('close')",3000);
                }
            }

            $.extend({ alert: function (message, title) {
                $("<div id='timedialog'></div>").dialog( {
                    close: function (event, ui) { $(this).remove(); },
                    resizable: false,
                    title: title,
                    modal: true
                }).text(message);
            }});

            // get stored company info when company is changed
            $("#companies").click(function(){
                var companyid = this.selectedOptions[0].value;
                if(companyid == 'new') {
                    // add inputs for a new company
                    var $div1 = $div = $('<div>');
                    var $label = $('<label>').attr('for', 'compID').text('Company ID:').addClass('col-md-4');
                    var $input = $('<input type="text">').attr({id: 'compID', name: 'company_id',required:'required'}).addClass('col-md-9');
                    $label.appendTo($div);
                    $input.appendTo($div);
                    $div.appendTo($div1);
                    $div1.appendTo($('#usercol'));
                    var $div1 = $div = $('<div>');
                    var $label = $('<label>').attr('for', 'compN').text('Company Name:').addClass('col-md-4');
                    var $input = $('<input type="text">')
                        .attr({id: 'compN', name: 'companyNew',required:'required'}).addClass('col-md-9');
                    $label.appendTo($div);
                    $input.appendTo($div);
                    $div.appendTo($div1);
                    $div1.appendTo($('#usercol'));
                    $div = $('#invUrlLabel').parent();
                    var $label = $('<label>').attr('for', 'urlv').text('Inventory Version:').addClass('col-md-6');
                    var $input = $('<input type="text">').attr({id: 'urlv', name: 'invVersion',placeholder: 'ie. 1.0.0'}).addClass('col-md-12');
                    $label.appendTo($div);
                    $input.appendTo($div);
                    $div = $('#statusUrlLabel').parent();
                    var $label = $('<label>').attr('for', 'urlv').text('Order Status Version:').addClass('col-md-6');
                    var $input = $('<input type="text">').attr({id: 'urlv', name: 'statusVersion',placeholder: 'ie. 1.0.0'}).addClass('col-md-12');
                    $label.appendTo($div);
                    $input.appendTo($div);
                    $div = $('#shippingUrlLabel').parent();
                    var $label = $('<label>').attr('for', 'urlv').text('Shipping Status Version:').addClass('col-md-6');
                    var $input = $('<input type="text">').attr({id: 'urlv', name: 'shippingVersion',placeholder: 'ie. 1.0.0'}).addClass('col-md-12');
                    $label.appendTo($div);
                    $input.appendTo($div);

                }else if(companyid != '--select one--') {
                    $.post('a46437.php',{op:'info',id:companyid}, function (data) {
                        $("#username").val(data.userName);
                        $("#password").val(data.password);
                        $("#entity").val(data.entity);
                        $("#supplier_name").val(data.entity);
                        $("#invUrl").val(data.invUrl);
                        $("#statusUrl").val(data.statusUrl);
                        $("#shippingUrl").val(data.shippingUrl);
                        $("#productUrl").val(data.productUrl);
                        $("#mediaUrl").val(data.mediaUrl);
                        if (data.invEndPt) {
                            $("#invUrlLabel").html('<a target="_blank" href="' + data.invEndPt + '">Inventory Url:</a> <span style="font-size:small;">(click to find wsdl url)</span>');
                        }else{$("#invUrlLabel").html('Inventory Url');}
                        if (data.statusEndPt) {
                            $("#statusUrlLabel").html('<a target="_blank" href="' + data.statusEndPt + '">Order Status Url:</a> <span style="font-size:small;">(click to find wsdl url)</span>');
                        }else{$("#statusUrlLabel").html('Order Status Url');}
                        if (data.shippingEndPt) {
                            $("#shippingUrlLabel").html('<a target="_blank" href="' + data.shippingEndPt + '">Shipping Status Url:</a> <span style="font-size:small;">(click to find wsdl url)</span>');
                        }else{$("#shippingUrlLabel").html('Shipping Status Url');}
                       /* if (data.productEndPt) {
                            $("#productUrlLabel").html('<a href="' + data.productEndPt + '">Product Url:</a><span style="font-size:small;">(click to find wsdl url)</span>');
                        }else{$("#productUrlLabel").html('Product Data Url');}
                        if (data.mediaEndPt) {
                            $("#mediaUrlLabel").html('<a href="' + data.productEndPt + '">Media Url:</a><span style="font-size:small;">(click to find wsdl url)</span>');
                        }else{$("#mediaUrlLabel").html('Media Url');}
                        */

                    },"json");
                    var companyName = $('#companies option:selected').text();
                    $('#companyName').val(companyName);
                }
            });
            //$.fn.bootstrapBtn = $.fn.button.noConflict();
            // set company name
            $( document ).ready(function() {

        		$("#dialog1").dialog({
        			autoOpen: false,
        			modal: false,
        			width: 360,
        			height: 600,
        			buttons: {
        				"Dismiss": function() {
        					$(this).dialog("close");
        					$('#add_vendor1').removeClass('hidden').addClass('hidden');
        					$('#table1, #add_vendor1_btn').removeClass('hidden');
        				}
        			}
        		});

        		$("#infoDialog").dialog({
        			autoOpen: false,
        			modal: false,
        			width: 350,
        			height: 400,
        			buttons: {
        				"Dismiss": function() {
        					$(this).dialog("close");
        					$(this).empty();
        				}
        			}
        		});

                var companyName = $('#companies option:selected').text();
                $('#companyName').val(companyName);
                // initiates tooltips
                $('[data-toggle="tooltip"]').tooltip();

/*
        		var url = 'vendors_dialog.php';
        		$.getJSON( url, function(data) {
        			//set up tables
        			var supplier = data.supplier;
        			var both = supplier.concat(data.decorator);
        			myTable1 = $('#vendorTable1').DataTable({
        							"data": both,
        							"paging":   false,
        							"orderClasses": false,
        							"info":     false,
        							"aoColumnDefs": [
        								{ "mData": null,"aTargets": [ 0 ],"sDefaultContent": "",sTitle: '', "sClass": "info","bSearchable": false, "bSortable": false},
        								{ "mData": 0,"aTargets": [ 1 ],"sClass": "vendor-select", sTitle: "Supplier","bSearchable": true },
        								{ "mData": 3,"aTargets": [ 2 ],sTitle: "Entity #","bSearchable": true},
        								{ "mData": 2,"aTargets": [ 3 ],"bSearchable": false,"visible": false},
        								{ "mData": 1,"aTargets": [ 4 ],"bSearchable": false,"visible": false}
        							]
        			});

        			//set up click function for table rows to add vendor to inputs
        			$(document).on('click', '#vendorTable1 tr .vendor-select', function(){
        				var id = myTable1.row(this).data()[3];
        				var name = myTable1.row(this).data()[0];
        				add_supplier(id,name);
        			});

        			// set up click function for company info
        			$(document).on('click', '#vendorTable1 tr .info', function(){
        				var id = myTable1.row(this).data()[2];
        				var name = myTable1.row(this).data()[0];
        				$("#infoDialog").load(url,{"id":id},function (){
        					$("#infoDialog").dialog('open');
        				});

        			});
        		});


        		/*
        		 * open dialog for supplier/decorator on button click or as default at beginning of order
        		 *
        		$(".dialogit1").on("click", function(e) {
        			e.preventDefault();
        			$("#dialog1").dialog("option", "title", "Suppliers").dialog("open");
        		});
                */

            });


        	/*
        	 * add selected vendor to supplier input
        	 *
        	function add_supplier(vendorID,vendorName){
        		$("#dialog1").dialog("close");
        		$('#entity').val(vendorID);
        		$('#supplier_name').val("("+vendorName+")");
        	}
*/

        </script>


        </BODY>
        </HTML>
<?php
