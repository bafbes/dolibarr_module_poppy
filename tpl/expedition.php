<?php

	//Récupération de la liste des postes de travail
	$disabled = ($user->rights->workstation->all->lire) ? 0 : 1;
	
	$sql="SELECT rowid, ref FROM ".MAIN_DB_PREFIX."expedition WHERE entity IN (".getEntity('shipping',1).") AND fk_statut IN (0,1)";
	$TShipping = TRequeteCore::_get_id_by_sql($PDOdb, $sql,'ref','rowid');
	
?><input type="hidden" id="search_shipping" value="" />
<ul class="list-group" id="list-shipping"><?php

	foreach($TShipping as $id=>$label) {
		
		echo '<li class="list-group-item" exp-id="'.$id.'" onclick="javascript:setShipping('.$id.')"><a href="#">'.$label.'</a></li>';
		
	}

?></ul><?php

if(GETPOST('fk_shipping')>0) {
	
	?>
	<script type="text/javascript">
	$(document).ready(function() {
		setShipping(<?php echo (int)GETPOST('fk_shipping') ?>);
	});
	</script>
	<?php
	
	
}

	