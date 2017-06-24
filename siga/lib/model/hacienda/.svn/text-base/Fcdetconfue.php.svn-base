<?php

/**
 * Subclass for representing a row from the 'fcdetconfue'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdetconfue.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcdetconfue extends BaseFcdetconfue
{
    protected $nomfue='';
    protected $descripcion='';
    public function getNomfue(){
        return H::getX('codfue', 'fcfuepre', 'nomfue', self::getFuente());
    }
    public function getDescripcion(){
       if(self::getNumcuo()=='01'){
           'Cuota NÂº '.(self::getNumcuo() -1) ;
       }
    }
}
