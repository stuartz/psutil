<?php
global $sp563fcc; $spf2272f = $sp563fcc->query("\n\t\tSELECT user_name, email FROM users\n\t\tWHERE user_name = '" . $_SESSION['Username'] . "'\n\t\t"); $sp2669f6 = $spf2272f->fetch(); $spf2272f->closeCursor(); if ($_SESSION['admin']) { $sp4ba1a1 = ''; } else { $sp4ba1a1 = 'disabled'; } ?>
<div class="mainf">
	<a style="text-align:center;" href="e976437.php?edit=pass">Change Password</a>
	<div class="well">
		<table width="100%" height="100%" cellpadding="10" cellspacing="0" border="0">
			<tr>
				<td align="left" valign="top" width="75%" height="100%">
				<div style="font-size: 14px;"><u><b>User Info:</b></u><br>

				<form method="post" action="e976437.php">
				<table border="0" cellpadding="3" cellspacing="0" align="center">
				<tr>
					<td align="right" valign="middle"><b>User Name: </b></td>
					<td align="left" valign="middle"><input disabled type="Text" name="user_name" value="<?php  echo htmlentities($sp2669f6['user_name']); ?>" <?php  echo $sp4ba1a1; ?> size="35"></td>
				</tr>
					<tr>
						<td align="right" valign="middle"><b>Email: </b></td>
						<td align="left" valign="middle"><input type="Text" name="email" value="<?php  echo htmlentities($sp2669f6['email']); ?>" size="35"></td>
					</tr>
		
					<tr>
						<td align="center" valign="middle" colspan="2"><input type="Submit" name="SubmitEditedMyAccount"
							value="Submit changes" style="font-size: 11px;"></td>
					</tr>
				</table>
				</form>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php 