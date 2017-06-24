<?php

/**
 * Subclase para representar una fila de la tabla 'causualm'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Causualm extends BaseCausualm
{
    protected $grid=array();
    protected $check=0;
    protected $codest='';
    protected $todos='';
    protected $usuarios=null;

    public function getNomuse()
    {
        if(!$this->usuarios){
            $c = new Criteria();
            $c->add(UsuariosPeer::CEDEMP,$this->cedemp);
            $this->usuarios = UsuariosPeer::doSelectOne($c);
            if($this->usuarios) return $this->usuarios->getNomuse();
            else return '';
        }else return $this->usuarios->getNomuse();        
    }

    public function getNomalm()
    {
        $cadefalm = $this->getCadefalm();
        if($cadefalm) return $cadefalm->getNomalm();
        else return '';
    }
}
