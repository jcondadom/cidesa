<?php

/**
 * Subclass for representing a row from the 'empresa'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Empresa extends BaseEmpresa
{
   protected $ano="";
   protected $codempdes="";
   protected $descripcion="";
   protected $salban="";
   protected $movtra="";
   protected $preegr="";
   protected $preing="";
   protected $creesq="";

   //TXT CESTATICKET
   protected $codpla="";
   protected $canreg="0";
   protected $codnom="";
   protected $tiptxt="";
   protected $tipnom="";
   protected $fecefe="";
   protected $montot="0,00";
   protected $obj=array();
   protected $direccion="";
   protected $fecnom="";
}