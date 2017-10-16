<?php
$sp47dc23 = "Inventory Request Form"; require_once INC . '/h08034r.php'; $sp3cb9f1 = "0"; ?>

  <div class="container" >

    <div style="text-align:center;padding-top:40px;">
        <form class="well" role="form" action="<?php  echo $sp1f3cb3; ?>" >
            <input type="hidden" name="op" value="inventory">
            <input name="companyName" id="companyName" type="hidden">
            <div class="row">
                <div class="col-sm-5">
                    <label for="productID">Product ID:</label>
                    <input type="text"  id="productID" name="productID" placeholder="Enter product ID" required>
                </div>
                <div class="col-sm-5">
                    <label for="companies" >Select Company:</label>
                    <select name="companyID" id="companies"  required>
                        <option value="">--select one--</option>

    <?php  foreach ($sp2c9bfa as $sp263a81 => $sp93d81f) { $sp2153b5 = $spccc977 == $sp263a81 ? 'selected' : ''; echo "<option value=\"{$sp263a81}\" {$sp2153b5}>{$sp93d81f}</option>"; } ?>

                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-default" >Submit</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <h3 style="text-align:center;"><?php  echo $spc1bf8a; ?> Listings for ProductID #<?php  echo $sp5118d1; ?></h3>

<?php  if (isset($spb7a591['errorMessage']) && $spb7a591['errorMessage']) { echo '<h4 style="color:orangered;">' . $spb7a591['errorMessage'] . '</h4>'; } else { if (isset($spb7a591['ProductVariationInventory'])) { echo '
            <table id="resultsTable" class="display">
                <thead>
                    <tr>
                        <th class="brand">Brand</th>'; if (isset($spb7a591['ProductVariationInventory'][0]->partID) && $spb7a591['ProductVariationInventory'][0]->partID != NULL) { $sp3cb9f1 = "1"; echo '<th>Part ID</th>'; } echo '
                        <th class="descript">Description</th><th class="quantity">Quantity</th><th class="colorAtr">Color</th>
                        <th class="sizeAtr">Size</th><th class="extra">Extra Attr</th>
                        <th class="hidden-xs entry">Entry Type</th><th class="hidden-xs time">Timestamp</th><th class="hidden-xs msg">Msg?</th>
                    </tr>
                </thead>
                <tbody>'; if (isset($spb7a591['ProductVariationInventory'])) { foreach ($spb7a591['ProductVariationInventory'] as $sp5b3d50) { echo '
                                <tr>
                                    <td class="brand dt-body-right">'; echo isset($sp5b3d50['partBrand']) ? $sp5b3d50['partBrand'] : ' '; echo '</td>'; echo $sp3cb9f1 == 1 ? "<td class=' dt-body-right'>{$sp5b3d50['partID']}</td>" : ' '; echo '
                                    <td class="descript dt-body-right">'; echo isset($sp5b3d50['partDescription']) ? $sp5b3d50['partDescription'] : ' '; echo ' </td>
                                    <td class="quantity dt-body-right">'; echo isset($sp5b3d50['quantityAvailable']) ? $sp5b3d50['quantityAvailable'] : ' '; echo '</td>
                                    <td class="colorAtr dt-body-right">'; echo isset($sp5b3d50['attributeColor']) ? $sp5b3d50['attributeColor'] : ' '; echo '</td>
                                    <td class="sizeAtr dt-body-right">'; echo isset($sp5b3d50['attributeSize']) ? $sp5b3d50['attributeSize'] : ' '; echo '</td>
                                    <td class="extra dt-body-right">'; if ($sp5b3d50['AttributeFlex'][0]['ID']) { echo '<table class="table table-bordered">
                                                <tbody>'; foreach ($sp5b3d50['AttributeFlex'] as $sp027736) { $sp80e09a = isset($sp027736['ID']) ? $sp027736['ID'] : isset($sp027736['id']) ? $sp027736['id'] : ''; $sp6f2f8e = isset($sp027736['Name']) ? $sp027736['Name'] : isset($sp027736['name']) ? $sp027736['name'] : ''; $sp4e75f6 = isset($sp027736['Value']) ? $sp027736['Value'] : isset($sp027736['value']) ? $sp027736['value'] : ''; echo "\n                                                    <tr>\n                                                        <td>ID: {$sp80e09a}</td>\n                                                        <td>Name: {$sp6f2f8e}</td>\n                                                        <td>Value: {$sp4e75f6}</td>\n                                                    </tr>"; } echo "</tbody></table>"; } echo '</td>
                                    <td class="hidden-xs entry dt-body-right">'; echo isset($sp5b3d50['entryType']) ? $sp5b3d50['entryType'] : ' '; echo '</td>
                                    <td class="hidden-xs time dt-body-right">'; echo isset($sp5b3d50['validTimestamp']) ? substr($sp5b3d50['validTimestamp'], 0, 10) : ' '; echo '</td>
                                    <td class="hidden-xs msg dt-body-right">'; echo isset($sp5b3d50['customProductMessage']) ? $sp5b3d50['customProductMessage'] : ' '; echo '</td></tr>'; } } echo '</tbody></table>'; } if ($spb7a591['ProductCompanionInventory'][0]['partID']) { $sp3cb9f1 = "0"; echo '<hr>
            <h3>Companion Items available</h3>
            <table id="resultsTable" class="table table-condensed table-bordered table-hover gradienttable">
                <thead>
                    <tr>
                        <th class="brand2">Brand</th>'; if ($spb7a591['ProductCompanionInventory'][0]['partID']) { $sp3cb9f1 = "1"; echo '<th>Part ID</th>'; } echo '
                        <th class="descript2">Description</th><th class="quantity2">Quantity</th><th class="colorAtr2">Color</th>
                        <th class="sizeAtr2">Size</th><th class="extra2">Extra Attr</th>
                        <th class="hidden-xs entry2">Entry Type</th><th class="hidden-xs time2">Timestamp</th><th class="hidden-xs msg2">Msg?</th>
                    </tr>
                </thead>
                <tbody>'; foreach ($spb7a591['ProductCompanionInventory'] as $sp5b3d50) { echo '
                    <tr>
                        <td class="brand2 dt-body-right">'; echo isset($sp5b3d50['partBrand']) ? $sp5b3d50['partBrand'] : ' '; echo '</td>'; echo $sp3cb9f1 == 1 ? "<td class='dt-body-right'>{$sp5b3d50->partID}</td>" : ''; echo '
                        <td class="descript2 dt-body-right">'; echo isset($sp5b3d50['partDescription']) ? $sp5b3d50['partDescription'] : ' '; echo '</td>
                        <td class="quantity2 dt-body-right">'; echo isset($sp5b3d50['quantityAvailable']) ? $sp5b3d50['quantityAvailable'] : ' '; echo '</td>
                        <td class="colorAtr2 dt-body-right">'; echo isset($sp5b3d50['attributeColor']) ? $sp5b3d50['attributeColor'] : ' '; echo '</td>
                        <td class="sizeAtr2 dt-body-right">'; echo isset($sp5b3d50['attributeSize']) ? $sp5b3d50['attributeSize'] : ' '; echo '</td>
                        <td class="extra2 dt-body-right">'; if ($sp5b3d50['AttributeFlex'][0]['ID']) { echo '
                                <table class="table table-bordered">
                                    <tbody>'; foreach ($sp5b3d50['AttributeFlex'] as $sp027736) { $sp80e09a = isset($sp027736['ID']) ? $sp027736['ID'] : isset($sp027736['ID']) ? $sp027736['ID'] : ''; $sp6f2f8e = isset($sp027736['Name']) ? $sp027736['Name'] : isset($sp027736['Name']) ? $sp027736['Name'] : ''; $sp4e75f6 = isset($sp027736['Value']) ? $sp027736['Value'] : isset($sp027736['Value']) ? $sp027736['Value'] : ''; echo "\n                                        <tr>\n                                            <td>ID: {$sp80e09a}</td>\n                                            <td>Name: {$sp6f2f8e}</td>\n                                            <td>Value: {$sp4e75f6}</td>\n                                        </tr>"; } echo "</tbody></table>"; } echo '
                        </td>
                        <td class="hidden-xs entry2 dt-body-right">'; echo isset($sp5b3d50['entryType']) ? $sp5b3d50['entryType'] : ' '; echo '</td>
                        <td class="hidden-xs time2 dt-body-right">'; echo isset($sp5b3d50['validTimestamp']) ? substr($sp5b3d50['validTimestamp'], 0, 10) : ' '; echo '</td>
                        <td class="hidden-xs msg2 dt-body-right">'; echo isset($sp5b3d50['customProductMessage']) ? $sp5b3d50['customProductMessage'] : ' '; echo '</td></tr>'; } echo '</tbody></table>'; } } ?>
        <br>The current date and time is <?php  echo date("Y-m-d H:i:s"); ?>

    </div>
    <?php  include "includes/logo.html"; ?>
</div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script language="javascript">
        // set company name when document is loaded
        $( document ).ready(function() {
            var companyName = $("#companies option:selected").text();
            $("#companyName").val(companyName);
        });
        // add companyName to input when company is changed
        $("#companies").change(function(){
            var companyName = $("#companies option:selected").text();
            $("#companyName").val(companyName);
            var x =this.selectedOptions[0].innerHTML;
            if(x.indexOf("N/A") !== -1){
                alert("This company is not yet available. Please choose another.");
            }
        });
    </script>

    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTableConf.js"></script>

  </BODY>
</HTML>
<?php 