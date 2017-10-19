<div id="loader"></div>
<div id="datacontent"></div>
<?php  include "includes/logo.html"; ?>
</div>
<!------------ Including jQuery Date UI with CSS -------------->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function() {	$('.qtype').click(function(){var qval = $(this).val();$("#referencenumber").val('');$(".statusTimeStamp").val('');if(qval == 3){$(".ponodiv").hide();$(".datef").show();}else{$(".datef").hide();}if(qval == 1){$(".datef").hide();$(".ponodiv").show();}else{$(".ponodiv").hide();}});$(function() {$("#datepicker").datepicker();$("#datepicker").datepicker("option", "dateFormat", 'yy-mm-dd');});
$(document).on('click','#get<?php  echo $spe2c7f4; ?>status', function(){var qval = $('input[name=querytype]:checked').val();var selSupplier = $('#selSupplier').val();var dtype = $('#dtype').val();var referencenumber = $('#referencenumber').val();	var statusTimeStamp = $('.statusTimeStamp').val();var error = 0;if(selSupplier == ""){alert("Select Supplier");error = 1;return false}	if($('input[name=querytype]:checked').length<=0){alert("No Querytype checked");error = 1;return false}
<?php  if ($spe2c7f4 == 'shipping') { ?>				
if(referencenumber == ""){alert("Add  referencenumber");error = 1;return false}
<?php  } ?>
if(error == 0){if(dtype=="normal"){callapi(selSupplier, qval, dtype, referencenumber, statusTimeStamp);return false;}else{this.form.action = "<?php  echo $spe2c7f4;?>643s64.php";$('#orderdetailsfrm').submit();return false;}return false;}return false;});function callapi(selSupplier, qval, dtype, referencenumber, statusTimeStamp){var newurl="<?php  echo $spe2c7f4;?>643s64.php";var data={};data['selSupplier']=selSupplier;data['querytype']=qval;data['dtype']=dtype;data['referencenumber']=referencenumber;data['statusTimeStamp']=statusTimeStamp;$.ajax({ url: newurl,data: data,type: 'post', beforeSend: function(output) {$("#loader").html('Please wait...');$("#datacontent").html("");},success: function(output) {$("#loader").html('');$("#datacontent").html(output);$('#gvOrdersloop').DataTable();}});	}});
</script>
</body>
</html>
<?php 
