<?php

/**
 * Subclass for representing a row from the 'fcsoldet'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcsoldet.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcsoldet extends BaseFcsoldet
{
    protected $edodecrsstatus='';
    public function getEdodecrsstatus()
	{
		if (self::getEdodec() == 'P'){
			$edodecrsstatus = "PAGADA";
		}else{
			if (H::dateDiff('d',self::getFecven(),date('d')) <= 0){
				$edodecrsstatus = "VIGENTE";
			}if(( self::getEdoDec()!="P")&& (self::getFecven()< date("'d/m/Y",time()))){
                                $edodecrsstatus = "PENDIENTE";
                        }
                        else{
				$edodecrsstatus = "VENCIDA";
			}

		}
		return $edodecrsstatus;
	}
}
