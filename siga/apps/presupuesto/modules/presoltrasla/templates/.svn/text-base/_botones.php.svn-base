<?php $a = $cpsoltrasla->cargarDefiniciones(); ?>
<?php $b = $cpsoltrasla->cargarArtLey(); ?>

<table width="100%">
  <tr>
    <? if ($cpsoltrasla->getArtStaniv6() == 'S'){
        if ($cpsoltrasla->getStaniv6() != 'S' && ($cpsoltrasla->getStacon() == 'S' || $cpsoltrasla->getArtStacon() =='N') && ($cpsoltrasla->getStagob() =='S' || $cpsoltrasla->getArtStagob() == 'N') && ($cpsoltrasla->getStapre()=='S' || $cpsoltrasla->getArtStapre() =='N') && ($cpsoltrasla->getStaniv4() == 'S' || $cpsoltrasla->getArtStaniv4() == 'N') && ($cpsoltrasla->getStaniv5() =='S' || $cpsoltrasla->getArtStaniv5() =='N')) { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN6" value="<? echo "     ".$cpsoltrasla->getAbrStaniv6(); ?>" onClick="Aprobar_Solicitud('N6');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN6" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrStaniv6(); ?>" onClick="Aprobar_Solicitud('N6');" >
	<? } }?>
    <? if ($cpsoltrasla->getArtStaniv5() =='S'){
        if ($cpsoltrasla->getStaniv5() != 'S' && ($cpsoltrasla->getStacon() == 'S' || $cpsoltrasla->getArtStacon() =='N') && ($cpsoltrasla->getStagob() == 'S' || $cpsoltrasla->getArtStagob() == 'N') && ($cpsoltrasla->getStapre() == 'S' || $cpsoltrasla->getArtStapre() =='N') && ($cpsoltrasla->getStaniv4() == 'S' || $cpsoltrasla->getArtStaniv4() =='N')) { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN5" value="<? echo "    ".$cpsoltrasla->getAbrStaniv5(); ?>" onClick="Aprobar_Solicitud('N5');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN5" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrStaniv5(); ?>" onClick="Aprobar_Solicitud('N5');" >
        <? } }?>
    <? if ($cpsoltrasla->getArtStaniv4() == 'S'){
        if ($cpsoltrasla->getStaniv4() != 'S' && ($cpsoltrasla->getStacon() == 'S' || $cpsoltrasla->getArtStacon() == 'N') && ($cpsoltrasla->getStagob() == 'S' || $cpsoltrasla->getArtStagob() == 'N') && ($cpsoltrasla->getStapre() == 'S' || $cpsoltrasla->getArtStapre() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolN4" value="<? echo "    ".$cpsoltrasla->getabrStaniv4(); ?>" onClick="Aprobar_Solicitud('N4');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN4" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrStaniv4(); ?>" onClick="Aprobar_Solicitud('N4');" >
	<? } }?>
    <? if ($cpsoltrasla->getArtStacon() == 'S'){
        if ($cpsoltrasla->getStacon() != 'S') {?>
            <input type="button" class="sf_admin_action_save" id="AprSolC" value="<? echo "    ".$cpsoltrasla->getAbrStacon(); ?>" onClick="Aprobar_Solicitud('C');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolC" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrStacon(); ?>" onClick="Aprobar_Solicitud('C');" >
	<? } }?>
    <? if ($cpsoltrasla->getArtStagob() == 'S'){
        if ($cpsoltrasla->getStagob() != 'S' && ($cpsoltrasla->getStacon() == 'S' || $cpsoltrasla->getArtStacon() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolG" value="<? echo "    ".$cpsoltrasla->getAbrstagob(); ?>" onClick="Aprobar_Solicitud('G');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolG" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrstagob(); ?>" onClick="Aprobar_Solicitud('G');" >
	<? } }?>
    <? if ($cpsoltrasla->getArtStapre() == 'S'){
        if ($cpsoltrasla->getStapre() != 'S' && ($cpsoltrasla->getStacon() == 'S' || $cpsoltrasla->getArtStacon() == 'N') && ($cpsoltrasla->getStagob() == 'S' || $cpsoltrasla->getArtStagob() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolP" value="<? echo "    ".$cpsoltrasla->getAbrStapre(); ?>" onClick="Aprobar_Solicitud('P');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolP" disabled=true value="<? echo "    ".$cpsoltrasla->getAbrStapre(); ?>" onClick="Aprobar_Solicitud('P');" >
	<? } }?>
  </tr>
</table>