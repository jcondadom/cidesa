<?php

/**
 * cross_app_link_to: Función para generar un link entre aplicaciones.
 * La version 1.0 de symfony no lo soporta y por eso se creo una helper para realizar el link
 * entre aplicaciones
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
function link_to_seniat($rif)
{
  return link_to_function(image_tag('SENIAT.JPG'), "javascript: var w = window.open('http://contribuyente.seniat.gob.ve/BuscaRif/BuscaRif.jsp?p_rif=".str_replace('-', '', $rif)."')");
}

function link_to_snc($rif)
{
  return link_to_function(image_tag('snc.jpg'), "javascript: var w = window.open('http://rncenlinea.snc.gob.ve/reportes/resultado_busqueda?rif=".str_replace('-', '', $rif)."&search=RIF')");
}

?>