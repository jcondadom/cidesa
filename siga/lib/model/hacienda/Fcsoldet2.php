<?php

/**
 * Subclase para representar una fila de la tabla 'fcsoldet2'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.hacienda
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fcsoldet2 extends BaseFcsoldet2
{
    protected $edodecstatus='';
   /* public function getEdodecstatus()
	{
		if (self::getEdodec() == 'P'){
			$edodecstatus = "PAGADA";
		}else{ if  (self::getFecven()< date("Y-m-d")){
                                $edodecstatus = "VENCIDA";
			}else{
				$edodecstatus = "VIGENTE";
			}

		}
		return $edodecstatus;
	}*/
    
     public function afterHydrate() {
         if (self::getEdodec() == 'P'){
			$this->edodecstatus = "PAGADA";
		}else{ if  (self::getFecven()< date("Y-m-d")){
                                $this->edodecstatus = "VENCIDA";
			}else{
				$this->edodecstatus = "VIGENTE";
			}

		}
     }
}
