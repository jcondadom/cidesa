<?php

/**
 * Clientes: Clase estática para el manejo de los clientes
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cliente
{

  /**
   * Función Principal para guardar datos del formulario Facliente
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $facliente Object Cliente-Benficiario-Recaudos a guardar
   * @return void
   */
    public static function salvarFacliente($facliente,$grid)
    {
      self::Grabar_Cliente($facliente);
      self::Grabar_Beneficiario($facliente);
      self::Grabar_Contribuyente($facliente);
      self::Grabar_RecaudosCliente($facliente);
      self::Grabar_PersonaContactoCliente($facliente,$grid);
    }


/**
   * Función para registrar Cliente
   *
   * @static
   * @param $facliente Object Cliente a guardar
   * @return void
   */
    public static function Grabar_Cliente($facliente){
    $facliente->save();

    }

     /**
   * Función para registrar un Beneficiario
   *
   * @static
   * @param $facliente Object Beneficiario a guardar
   * @return void
   */
    public static function Grabar_Beneficiario($facliente){

        $c = new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$facliente->getRifpro());
        $opbenefi = OpbenefiPeer::doSelectOne($c) ;
        if (isset($opbenefi))
        {
        $opbenefi->setNitben($facliente->getNitpro());
        }
        else
        {
        $opbenefi = new Opbenefi();

          $codtipben = Herramientas::getxLike('destipben','optipben','codtipben','%CLIENTE%');
          if ($codtipben=='<!Registro no Encontrado o Vacio!>')
          { $codtipben=null;}

          $opbenefi->setcodtipben($codtipben);
        $opbenefi->setCedrif($facliente->getRifpro());
        $opbenefi->setNomben($facliente->getNompro());
        $opbenefi->setNitben($facliente->getNitpro());
        $opbenefi->setDirben($facliente->getDirpro());
        $opbenefi->setTelben($facliente->getTelpro());
        $opbenefi->setCodcta($facliente->getCodcta());
        if ($facliente->getCodord()!="")
        { $opbenefi->setCodord($facliente->getCodord());}
        if ($facliente->getCodpercon()!="")
        { $opbenefi->setCodpercon($facliente->getCodpercon());}
        if ($facliente->getCodctasec()!="")
        { $opbenefi->setCodctasec($facliente->getCodctasec());}
        if ($facliente->getCodordadi()!="")
        { $opbenefi->setCodordadi($facliente->getCodordadi());}
        if ($facliente->getCodperconadi()!="")
        { $opbenefi->setCodperconadi($facliente->getCodperconadi());}
        if ($facliente->getCodordcontra()!="")
        { $opbenefi->setCodordcontra($facliente->getCodordcontra()); }
        if ($facliente->getCodpercontra()!="")
        { $opbenefi->setCodpercontra($facliente->getCodpercontra());}

      $opbenefi->save();

      return -1;
      }
    }

      /**
   * Función para registrar un Beneficiario
   *
   * @static
   * @param $facliente Object Beneficiario a guardar
   * @return void
   */
    public static function Grabar_Contribuyente($facliente){ //Ingresos
      $c = new Criteria();
      $c->add(CiconrepPeer::RIFCON,$facliente->getRifpro());
      $ciconrep = CiconrepPeer::doSelectOne($c) ;
      if (!$ciconrep)
      {
        $ciconrep_new = new Ciconrep();
        $ciconrep_new->setRifcon($facliente->getRifpro());
        $ciconrep_new->setNomcon($facliente->getNompro());
        $ciconrep_new->setNitcon($facliente->getNitpro());
        $ciconrep_new->setNaccon($facliente->getNacpro());
        $ciconrep_new->setTipcon($facliente->getTipper());
        $ciconrep_new->setDircon($facliente->getDirpro());
        $ciconrep_new->setTelcon($facliente->getTelpro());
        $ciconrep_new->setRepcon('C');
        $ciconrep_new->save();     
      }

    }

/**
   * Función para registrar Los recaudos del Cliente
   *
   * @static
   * @param $facliente Object Recaudos a guardar
   * @return void
   */
    public static function Grabar_RecaudosCliente($facliente){
      // Update many-to-many for "recargo"
      $c = new Criteria();
      $c->add(FarecproPeer::CODPRO, $facliente->getCodpro());
      FarecproPeer::doDelete($c);

      $ids = $facliente->getRecargo();
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $Farecpro = new Farecpro();
          $Farecpro->setCodpro($facliente->getCodpro());

          $c = new criteria();
          $c->add(CarecaudPeer::ID,$id);
          $obj = CarecaudPeer::doSelectOne($c);

          $Farecpro->setCodrec($obj->getCodrec());
          $Farecpro->save();
        }
      }
      return -1;
    }

    public static function eliminarFacliente($facliente){
      H::EliminarRegistro('CODPRO','Facliper',$facliente->getCodpro());
      $c = new Criteria();
      $c->add(FarecproPeer::CODPRO, $facliente->getCodpro());
      $obj = FarecproPeer::doSelect($c);

	  if ($obj)
	     foreach ($obj as $registro)
	   		$registro->delete();

	  $facliente->delete();

	  return true;
    }

    public static function Grabar_PersonaContactoCliente($facliente,$grid)
    {
    try {
      $x  = $grid[0];
      $j  = 0;

      while ($j<count($x))
       {
         $x[$j]->setCodpro($facliente->getCodpro());
         $x[$j]->save();
         $j++;
      }
       $z=$grid[1];
       $j=0;
       if (!empty($z[$j]))
       {
         while ($j<count($z))
         {
           $z[$j]->delete();
           $j++;
         }
       }
     return -1;

    }catch (Exception $ex){
      return 0;
    }

    }

}