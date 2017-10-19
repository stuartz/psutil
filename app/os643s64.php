<?php
@ob_start(); session_start(); require_once 'includes/c04l340f.php'; require_once INC . '/f08034r.php'; $sp47dc23 = "Order Status Form"; require_once INC . '/h08034r.php'; ?>
<form class="mainf" name="orderdetails" id="orderdetailsfrm" method="post" action="">

<?php  $sp01e84c = supplier_list(); ?>

	<table class="tablebox">
		<tbody><tr>
			<td>Select A Supplier :
			</td>
			<td>
				<select id="selSupplier" name="selSupplier">
					<option value="">Select A Supplier</option>

<?php  $sp898c72 = 0; foreach ($sp01e84c as $sp006a9a) { echo "<option value='" . $sp006a9a['row_id'] . "'>" . $sp006a9a['companyName'] . "</option>"; $sp898c72++; } $_SESSION['suppliers'] = $sp01e84c; ?>

				</select>
			</td>
		</tr>
<?php 
if($_SESSION['admin'] != 1)
{ 
		echo	'<input id="dtype" type="hidden" value="normal" name="dtype">';
}else{ ?>		
		<tr>
			<td>Type :
			</td>
			<td>
					<select name="dtype" class="dtype" id="dtype">
						<option value="normal">Normal</option>
						<option value="table ">Table</option>
						<option value="json">JSON</option>
					</select>
			</td>
		</tr>
<?php } ?>
		<tr>
			<td>Query Type :
			</td>
			<td>
					<div class="qydiv">
						<div class="qydiv1"><input type="radio" selected class="qtype" name="querytype" value="1" id="q1"> PO Search</div>
						<div class="qydiv3"><input type="radio" class="qtype" name="querytype" value="3" id="q3"> Last Update Search</div>
						<div class="qydiv4"><input type="radio" class="qtype" name="querytype" value="4" id="q4"> All Open Search </div>
					</div>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>

			</td>
		</tr>
		<tr>
			<td>
				<div class="ponodiv" style="display:none">
					Enter Reference Number (PO #) :
				</div>
				<div class="datef" style="display:none">
					Status Date:
				</div>
			</td>
			<td>
				<div class="ponodiv" style="display:none">
					<input type="text" id="referencenumber" value="" name="referencenumber">
				</div>
				<div class="datef" style="display:none">
					<input type="text" readonly class="statusTimeStamp" name="statusTimeStamp" id="datepicker">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="submitbtntd">
				<input type="button" id="getorderstatus" value="Get Order Status" name="getorderstatus">
			</td>
		</tr>
	</tbody></table>



</form>
<?php  $spe2c7f4 = 'order'; require_once INC . '/footer.php'; ?>

