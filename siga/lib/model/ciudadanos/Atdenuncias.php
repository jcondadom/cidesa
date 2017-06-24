<?php

/**
 * Subclase para representar una fila de la tabla 'atdenuncias'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atdenuncias extends BaseAtdenuncias
{

  protected $nombre = '';
  protected $cedula = '';
  protected $unidad = '';
  protected $status = '';
  protected $cedsol = '';
  protected $nomsol = '';
  protected $ciudadano = "";

  public function afterHydrate(){

    //$atsolici = $this->getAtsolici();
    $atunidad = $this->getAtunidades();
    //$this->nombre = $atsolici->getNombre();
    if($atunidad) $this->unidad = $atunidad->getDesuni();

    $atciudadano = $this->getAtciudadano();
    if($atciudadano) $this->nomsol = $atciudadano->getNomsol();
    if($atciudadano) $this->cedsol = $atciudadano->getCedsol();

  }


  public function getStatus()
  {
    $status = $this->getAtestayu();
    if($status)
      return $status->getDesest();
    else
      return "Sin Estado";
  }

  public function getTipo()
  {
    $tipo = $this->getAttipsol();
    if($tipo)
      return $tipo->getDestipsol();
    else
      return "Sin Tipo";
  }


  public function getStatus_()
  {
    return $this->status;
  }

  public function getId($val = false)
  {
    if($val)
    {
      $id = parent::getId();
      if(!$id) return 'XXXXXX';
      else return self::getNroexp();
    }else return parent::getId();

  }

  public function save($con = null)
  {
    if($this->id){
      $atdenuncias = AtdenunciasPeer::retrieveByPK($this->id);
      if($atdenuncias->getAtestayuId()!=$this->atestayu_id){
        $atdetest = new Atdetest();
        $atdetest->setAtdenunciasId($this->id);
        $atdetest->setDescripcion($this->respuesta);        
        $atdetest->setAtestayuDesde($atdenuncias->getAtestayuId());
        $atdetest->setAtestayuHasta($this->atestayu_id);
        $atdetest->setUsuario(sfContext::getInstance()->getUser()->getAttribute('usuario'));
        $atdetest->save();
      }
    }

    return parent::save($con);


  }


}
