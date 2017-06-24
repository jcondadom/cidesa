<?php
/**
 * english language file
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Stephane Chamberland <stephane.chamberland@ec.gc.ca>
 */

// settings must be present and set appropriately for the language
$lang['encoding']   = 'utf-8';
$lang['direction']  = 'ltr';

// for admin plugins, the menu prompt to be displayed in the admin menu
// if set here, the plugin doesn't need to override the getMenuText() method
$lang['menu']       = 'Gestionaire des fichier de Configuration Textuels';

// custom language strings for the plugin
$lang['desc']       = "Gestionaire des fichier de Configuration Textuels";

$lang['error']      = "Mise a jour impossible, valeur non valide, priere de la verifier<br />La valeur erronne est entoure d'un cadre rouge.";
$lang['updated']    = 'Mise a jour complete avec sucess.';

$lang['locked']     = "Le fichier de configuration ne peut etre mis a jour, Si cela n'est pa intentionel, <br />
                       assurez vous que le fichier de confugaration local ait les permissions adequates.";

$lang['btn_addnew']     = "Nouvel Item";

$lang['msg_howto']     = "Vous pouvez mettre a jour les valeurs ci bas. Pour effacer un valeur ou lui redonner sa valeur par default, simplement effacer le champ text avant de sauvegarder.<br /> Pour modifier un nom de parameter, simplement l'effacer avant de l'ajouter sous un autre nom.<br />Prendre note que les item en carateres <b>gras</b> ne peuvent etre effaces (valuers par default).";

$lang['msg_howtoadd']     = "Utiliser le formulaire ci bas pour ajouter un nouvel item.";

$lang['msg_chooseConf'] = "Priere de choisir quel fichier de configuration vous desirez editer.";

$lang['msg_editThisConf'] = "Vous pouvez choisir d'editer un autre fichier de configuration ici. <br />Prendre note toutefois que les modifications faites ci-haut seront alors perdu si vous ne les avez pas sauvegardees.";


$lang['btn_editThisConf'] = "Editer Cette Config";

$lang['filelocked'] = "<b>ATTENTION</b>: Vous n'avez pas la permission de sauvegarder le fichier de configuration";
