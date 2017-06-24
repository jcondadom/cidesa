<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fadefprg'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */
class FadefprgPeer extends BaseFadefprgPeer {

    public static function getProgramasForCombo() {
        $c = new Criteria();
        $obj = FadefprgPeer::doSelect($c);
        $arr = array();
        foreach ($obj as $ob) {
            $arr[$ob->getCodprg()] = $ob->getDesprg();
        }
        return $arr;
    }



    public static function getProgramasVigentes() { 
            $c = new Criteria();
            $sql = "CURRENT_DATE BETWEEN TO_DATE(diaini||'/'||mesini||'/'||TO_CHAR(NOW(), 'yyyy'), 'dd/mm/yyyy')
	    AND (CASE WHEN TO_DATE(diaini||'/'||mesini||'/'||TO_CHAR(NOW(), 'yyyy'), 'dd/mm/yyyy')
            >= TO_DATE(diafin||'/'||mesfin||'/'||TO_CHAR(NOW(), 'YYYY'), 'dd/mm/yyyy')
            THEN
            TO_DATE(diafin||'/'||mesfin||'/'||(SELECT EXTRACT(YEAR FROM CURRENT_TIMESTAMP))+1, 'dd/mm/yyyy')
            ELSE
            TO_DATE(diafin||'/'||mesfin||'/'||TO_CHAR(NOW(), 'YYYY'), 'dd/mm/yyyy')
            END)  AND staprg ='A'";
            $c->add(FadefprgPeer::CODPRG, $sql, Criteria :: CUSTOM);
            $obj = FadefprgPeer::doSelect($c);
            $arr = array();
            foreach ($obj as $ob) {
                $arr[$ob->getCodprg()] = $ob->getDesprg();
            }
            return $arr;
        }
    

}
