<?php

/**
 * Subclase para representar una fila de la tabla 'viadetcalviatra'.
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
class Viadetcalviatra extends BaseViadetcalviatra
{
    protected $check=0;
    protected $mondiadol=0;
    protected $montotdol=0;
    protected $forcal="";
    protected $cancal="";

    public function getPartida()
    {
    	$refsol=H::getX_vacio('Numcal','Viacalviatra','refsol',$this->numcal);
    	$tipvia=H::getX_vacio('Numsol','Viasolviatra','tipvia',$refsol);
    	if ($tipvia=='I'){
    		$regdefgen=ViadefgenPeer::doSelectOne(new Criteria());
    		if ($regdefgen){
    			if ($regdefgen->getCodpar()!='')
    				return $regdefgen->getCodpar();
    			else return '';
    		}else return '';
    	}else return H::getX_vacio('Codrub','Viadefrub','Codpar',$this->codrub);    	
    }
}
