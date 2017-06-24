<?php

/**
 * Subclass for representing a row from the 'fcdetinm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdetinm.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdetinm extends BaseFcdetinm
{
	protected $mtrcon='';
	protected $anodec='';
        protected $destip='';
        protected $porexo='';
        protected $valntr='';
        protected $tvalter='';


        public function getDestip()
	{
		return Herramientas::getX('codtip','Fcvalinm','destip',self::getCodtip());
	}
        public function getPorexo()
	{
                return H::FormatoMonto(self::getValcon()* self::getMtrcon());

	}
        public function getValntr()
	{
                return H::FormatoMonto((self::getValcon()* self::getMtrcon())- self::getDprcon());

	}
         public function getTValter()
	{
                return H::FormatoMonto(self::getValter()* self::getMtrter());

	}

        }
