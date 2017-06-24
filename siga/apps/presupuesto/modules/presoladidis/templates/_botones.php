<?php $a = $cpsoladidis->cargarDefiniciones(); ?>
<?php $b = $cpsoladidis->cargarArtLey(); ?>

<table width="100%">
  <tr>
    <? if ($cpsoladidis->getArtStaniv6() == 'S'){
        if ($cpsoladidis->getStaniv6() != 'S' && ($cpsoladidis->getStacon() == 'S' || $cpsoladidis->getArtStacon() =='N') && ($cpsoladidis->getStagob() =='S' || $cpsoladidis->getArtStagob() == 'N') && ($cpsoladidis->getStapre()=='S' || $cpsoladidis->getArtStapre() =='N') && ($cpsoladidis->getStaniv4() == 'S' || $cpsoladidis->getArtStaniv4() == 'N') && ($cpsoladidis->getStaniv5() =='S' || $cpsoladidis->getArtStaniv5() =='N')) { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN6" value="<? echo "     ".$cpsoladidis->getAbrStaniv6(); ?>" onClick="Aprobar_Solicitud('N6');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN6" disabled=true value="<? echo "    ".$cpsoladidis->getAbrStaniv6(); ?>" onClick="Aprobar_Solicitud('N6');" >
	<? } }?>
    <? if ($cpsoladidis->getArtStaniv5() =='S'){
        if ($cpsoladidis->getStaniv5() != 'S' && ($cpsoladidis->getStacon() == 'S' || $cpsoladidis->getArtStacon() =='N') && ($cpsoladidis->getStagob() == 'S' || $cpsoladidis->getArtStagob() == 'N') && ($cpsoladidis->getStapre() == 'S' || $cpsoladidis->getArtStapre() =='N') && ($cpsoladidis->getStaniv4() == 'S' || $cpsoladidis->getArtStaniv4() =='N')) { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN5" value="<? echo "    ".$cpsoladidis->getAbrStaniv5(); ?>" onClick="Aprobar_Solicitud('N5');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN5" disabled=true value="<? echo "    ".$cpsoladidis->getAbrStaniv5(); ?>" onClick="Aprobar_Solicitud('N5');" >
        <? } }?>
    <? if ($cpsoladidis->getArtStaniv4() == 'S'){
        if ($cpsoladidis->getStaniv4() != 'S' && ($cpsoladidis->getStacon() == 'S' || $cpsoladidis->getArtStacon() == 'N') && ($cpsoladidis->getStagob() == 'S' || $cpsoladidis->getArtStagob() == 'N') && ($cpsoladidis->getStapre() == 'S' || $cpsoladidis->getArtStapre() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolN4" value="<? echo "    ".$cpsoladidis->getabrStaniv4(); ?>" onClick="Aprobar_Solicitud('N4');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolN4" disabled=true value="<? echo "    ".$cpsoladidis->getAbrStaniv4(); ?>" onClick="Aprobar_Solicitud('N4');" >
	<? } }?>
    <? if ($cpsoladidis->getArtStacon() == 'S'){
        if ($cpsoladidis->getStacon() != 'S') {?>
            <input type="button" class="sf_admin_action_save" id="AprSolC" value="<? echo "    ".$cpsoladidis->getAbrStacon(); ?>" onClick="Aprobar_Solicitud('C');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolC" disabled=true value="<? echo "    ".$cpsoladidis->getAbrStacon(); ?>" onClick="Aprobar_Solicitud('C');" >
	<? } }?>
    <? if ($cpsoladidis->getArtStagob() == 'S'){
        if ($cpsoladidis->getStagob() != 'S' && ($cpsoladidis->getStacon() == 'S' || $cpsoladidis->getArtStacon() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolG" value="<? echo "    ".$cpsoladidis->getAbrstagob(); ?>" onClick="Aprobar_Solicitud('G');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolG" disabled=true value="<? echo "    ".$cpsoladidis->getAbrstagob(); ?>" onClick="Aprobar_Solicitud('G');" >
	<? } }?>
    <? if ($cpsoladidis->getArtStapre() == 'S'){
        if ($cpsoladidis->getStapre() != 'S' && ($cpsoladidis->getStacon() == 'S' || $cpsoladidis->getArtStacon() == 'N') && ($cpsoladidis->getStagob() == 'S' || $cpsoladidis->getArtStagob() == 'N')) {?>
            <input type="button" class="sf_admin_action_save" id="AprSolP" value="<? echo "    ".$cpsoladidis->getAbrStapre(); ?>" onClick="Aprobar_Solicitud('P');" >
  	<? }else { ?>
            <input type="button" class="sf_admin_action_save" id="AprSolP" disabled=true value="<? echo "    ".$cpsoladidis->getAbrStapre(); ?>" onClick="Aprobar_Solicitud('P');" >
	<? } }?>
  </tr>
</table>