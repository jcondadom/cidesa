<?php
/**
 * Presupuesto: Clase estática para trabajar con el modulo de Contabilidad Presupuestaria
 *
 * @package    Roraima
 * @subpackage presupuesto
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Presupuesto.class.php 61944 2015-05-07 18:48:13Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Producion
{

  public static function SalvarTarjetadeTrabajo($clasemodelo,$grid,$grid2){
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $clasemodelo->setReapor($loguse);
    $clasemodelo->save();

    self::Grabar_DetalleTarjeta($clasemodelo,$grid);
    self::Grabar_DetalleMedidas($clasemodelo,$grid2);
  }

  public static function Grabar_DetalleTarjeta($clasemodelo,$grid){
    $x = $grid[0];
    $j = 0;
    $reftar=$clasemodelo->getReftar();
    while ($j < count($x)) {
      if ($x[$j]->getCodart() != '') {
        $x[$j]->setReftar($reftar);
        //Materiales
          if ($x[$j]->getDatmat()!=''){
            $mat= new Criteria();
            $mat->add(FamattartraPeer::REFTAR,$reftar);                 
            $mat->add(FamattartraPeer::CODART,$x[$j]->getCodart());                 
            FamattartraPeer::doDelete($mat);

            $cadenamat=split('!',$x[$j]->getDatmat());
            $m=0;
            while ($m<(count($cadenamat)-1))
            {
               $aux=$cadenamat[$m];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $famattartra2= new Famattartra();
                 $famattartra2->setReftar($reftar);
                 $famattartra2->setCodart($x[$j]->getCodart());
                 $famattartra2->setCodmat($aux2[0]);                 
                 $famattartra2->setNumpla($aux2[2]);               
                 $famattartra2->setDocref(H::toFloat($aux2[3]));
                 $famattartra2->save();                  
              }
             $m++;
            }//while
          }
          //Mano de Obra
          if ($x[$j]->getDatper()!=''){
            $man= new Criteria();
            $man->add(FamantartraPeer::REFTAR,$reftar);                 
            $man->add(FamantartraPeer::CODART,$x[$j]->getCodart());                 
            FamantartraPeer::doDelete($man);

            $cadenaman=split('!',$x[$j]->getDatper());
            $o=0;
            while ($o<(count($cadenaman)-1))
            {
               $aux=$cadenaman[$o];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $famantartra2= new Famantartra();
                 $famantartra2->setReftar($reftar);
                 $famantartra2->setCodart($x[$j]->getCodart());
                 $famantartra2->setCodman($aux2[0]);                 
                 $famantartra2->setCodemp($aux2[2]);               
                 $famantartra2->setHorpla(H::toFloat($aux2[4]));
                 $famantartra2->setHoreje(H::toFloat($aux2[5]));
                 $famantartra2->save();                  
              }
             $o++;
            }//while
          }
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l])) {
      while ($l < count($z)) {
        $z[$l]->delete();
        $l++;
      }
    }
  }

    public static function Grabar_DetalleMedidas($clasemodelo,$grid){
    $x = $grid[0];
    $j = 0;
    $reftar=$clasemodelo->getReftar();
    while ($j < count($x)) {
      if ($x[$j]->getDesmed() != '') {
        $x[$j]->setReftar($reftar);
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l])) {
      while ($l < count($z)) {
        $z[$l]->delete();
        $l++;
      }
    }
  }

}
?>
