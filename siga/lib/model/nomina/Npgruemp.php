<?php

/**
 * Subclase para representar una fila de la tabla 'npgruemp'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npgruemp extends BaseNpgruemp
{
    protected $obj=array();
    protected $check="";
    protected $nomemp="";
    protected $nomcar="";

    public function getNomemp()
    {
        return Herramientas::getX('codemp','Nphojint','Nomemp',self::getCodemp());
    }

    public function getNomcar()
    {
        return Herramientas::getX('codcar','Npcargos','nomcar',self::getCodcar());
    }

    public function getNomnom()
    {
        return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
    }

    public function getDesgru()
    {
        return Herramientas::getX('codgru','Npgrupos','desgru',self::getCodgru());
    }   
}
