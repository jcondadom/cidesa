<?php


abstract class BaseNphiscon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $fecnom;


	
	protected $monto;


	
	protected $codcat;


	
	protected $codpar;


	
	protected $codescuela;


	
	protected $codniv;


	
	protected $codtipgas;


	
	protected $nomcon;


	
	protected $numrec;


	
	protected $cantidad;


	
	protected $fecnomdes;


	
	protected $especial;


	
	protected $fecnomespdes;


	
	protected $fecnomesphas;


	
	protected $codnomesp;


	
	protected $nomnomesp;


	
	protected $nomban;


	
	protected $cuenta_banco;


	
	protected $nomemp;


	
	protected $cedemp;


	
	protected $nomcar;


	
	protected $desniv;


	
	protected $nomcat;


	
	protected $numsem;


	
	protected $codban;


	
	protected $asided;


	
	protected $varia;


	
	protected $codtippag;


	
	protected $impcpt;


	
	protected $ordpag;


	
	protected $afepre;


	
	protected $numord;


	
	protected $codtipemp;


	
	protected $nomnom;


	
	protected $moncar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getFecnom($format = 'Y-m-d')
  {

    if ($this->fecnom === null || $this->fecnom === '') {
      return null;
    } elseif (!is_int($this->fecnom)) {
            $ts = adodb_strtotime($this->fecnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
      }
    } else {
      $ts = $this->fecnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCodescuela()
  {

    return trim($this->codescuela);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodtipgas()
  {

    return trim($this->codtipgas);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getNumrec($val=false)
  {

    if($val) return number_format($this->numrec,2,',','.');
    else return $this->numrec;

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getFecnomdes($format = 'Y-m-d')
  {

    if ($this->fecnomdes === null || $this->fecnomdes === '') {
      return null;
    } elseif (!is_int($this->fecnomdes)) {
            $ts = adodb_strtotime($this->fecnomdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomdes] as date/time value: " . var_export($this->fecnomdes, true));
      }
    } else {
      $ts = $this->fecnomdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEspecial()
  {

    return trim($this->especial);

  }
  
  public function getFecnomespdes($format = 'Y-m-d')
  {

    if ($this->fecnomespdes === null || $this->fecnomespdes === '') {
      return null;
    } elseif (!is_int($this->fecnomespdes)) {
            $ts = adodb_strtotime($this->fecnomespdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomespdes] as date/time value: " . var_export($this->fecnomespdes, true));
      }
    } else {
      $ts = $this->fecnomespdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecnomesphas($format = 'Y-m-d')
  {

    if ($this->fecnomesphas === null || $this->fecnomesphas === '') {
      return null;
    } elseif (!is_int($this->fecnomesphas)) {
            $ts = adodb_strtotime($this->fecnomesphas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnomesphas] as date/time value: " . var_export($this->fecnomesphas, true));
      }
    } else {
      $ts = $this->fecnomesphas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodnomesp()
  {

    return trim($this->codnomesp);

  }
  
  public function getNomnomesp()
  {

    return trim($this->nomnomesp);

  }
  
  public function getNomban()
  {

    return trim($this->nomban);

  }
  
  public function getCuentaBanco()
  {

    return trim($this->cuenta_banco);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getDesniv()
  {

    return trim($this->desniv);

  }
  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getNumsem()
  {

    return $this->numsem;

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getAsided()
  {

    return trim($this->asided);

  }
  
  public function getVaria()
  {

    return trim($this->varia);

  }
  
  public function getCodtippag()
  {

    return trim($this->codtippag);

  }
  
  public function getImpcpt()
  {

    return trim($this->impcpt);

  }
  
  public function getOrdpag()
  {

    return trim($this->ordpag);

  }
  
  public function getAfepre()
  {

    return trim($this->afepre);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getNomnom()
  {

    return trim($this->nomnom);

  }
  
  public function getMoncar($val=false)
  {

    if($val) return number_format($this->moncar,2,',','.');
    else return $this->moncar;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NphisconPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NphisconPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NphisconPeer::CODCAR;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NphisconPeer::CODCON;
      }
  
	} 
	
	public function setFecnom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnom !== $ts) {
      $this->fecnom = $ts;
      $this->modifiedColumns[] = NphisconPeer::FECNOM;
    }

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconPeer::MONTO;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = NphisconPeer::CODCAT;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NphisconPeer::CODPAR;
      }
  
	} 
	
	public function setCodescuela($v)
	{

    if ($this->codescuela !== $v) {
        $this->codescuela = $v;
        $this->modifiedColumns[] = NphisconPeer::CODESCUELA;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NphisconPeer::CODNIV;
      }
  
	} 
	
	public function setCodtipgas($v)
	{

    if ($this->codtipgas !== $v) {
        $this->codtipgas = $v;
        $this->modifiedColumns[] = NphisconPeer::CODTIPGAS;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMCON;
      }
  
	} 
	
	public function setNumrec($v)
	{

    if ($this->numrec !== $v) {
        $this->numrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconPeer::NUMREC;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconPeer::CANTIDAD;
      }
  
	} 
	
	public function setFecnomdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomdes !== $ts) {
      $this->fecnomdes = $ts;
      $this->modifiedColumns[] = NphisconPeer::FECNOMDES;
    }

	} 
	
	public function setEspecial($v)
	{

    if ($this->especial !== $v) {
        $this->especial = $v;
        $this->modifiedColumns[] = NphisconPeer::ESPECIAL;
      }
  
	} 
	
	public function setFecnomespdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomespdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomespdes !== $ts) {
      $this->fecnomespdes = $ts;
      $this->modifiedColumns[] = NphisconPeer::FECNOMESPDES;
    }

	} 
	
	public function setFecnomesphas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnomesphas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnomesphas !== $ts) {
      $this->fecnomesphas = $ts;
      $this->modifiedColumns[] = NphisconPeer::FECNOMESPHAS;
    }

	} 
	
	public function setCodnomesp($v)
	{

    if ($this->codnomesp !== $v) {
        $this->codnomesp = $v;
        $this->modifiedColumns[] = NphisconPeer::CODNOMESP;
      }
  
	} 
	
	public function setNomnomesp($v)
	{

    if ($this->nomnomesp !== $v) {
        $this->nomnomesp = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMNOMESP;
      }
  
	} 
	
	public function setNomban($v)
	{

    if ($this->nomban !== $v) {
        $this->nomban = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMBAN;
      }
  
	} 
	
	public function setCuentaBanco($v)
	{

    if ($this->cuenta_banco !== $v) {
        $this->cuenta_banco = $v;
        $this->modifiedColumns[] = NphisconPeer::CUENTA_BANCO;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = NphisconPeer::CEDEMP;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMCAR;
      }
  
	} 
	
	public function setDesniv($v)
	{

    if ($this->desniv !== $v) {
        $this->desniv = $v;
        $this->modifiedColumns[] = NphisconPeer::DESNIV;
      }
  
	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMCAT;
      }
  
	} 
	
	public function setNumsem($v)
	{

    if ($this->numsem !== $v) {
        $this->numsem = $v;
        $this->modifiedColumns[] = NphisconPeer::NUMSEM;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = NphisconPeer::CODBAN;
      }
  
	} 
	
	public function setAsided($v)
	{

    if ($this->asided !== $v) {
        $this->asided = $v;
        $this->modifiedColumns[] = NphisconPeer::ASIDED;
      }
  
	} 
	
	public function setVaria($v)
	{

    if ($this->varia !== $v) {
        $this->varia = $v;
        $this->modifiedColumns[] = NphisconPeer::VARIA;
      }
  
	} 
	
	public function setCodtippag($v)
	{

    if ($this->codtippag !== $v) {
        $this->codtippag = $v;
        $this->modifiedColumns[] = NphisconPeer::CODTIPPAG;
      }
  
	} 
	
	public function setImpcpt($v)
	{

    if ($this->impcpt !== $v) {
        $this->impcpt = $v;
        $this->modifiedColumns[] = NphisconPeer::IMPCPT;
      }
  
	} 
	
	public function setOrdpag($v)
	{

    if ($this->ordpag !== $v) {
        $this->ordpag = $v;
        $this->modifiedColumns[] = NphisconPeer::ORDPAG;
      }
  
	} 
	
	public function setAfepre($v)
	{

    if ($this->afepre !== $v) {
        $this->afepre = $v;
        $this->modifiedColumns[] = NphisconPeer::AFEPRE;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = NphisconPeer::NUMORD;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = NphisconPeer::CODTIPEMP;
      }
  
	} 
	
	public function setNomnom($v)
	{

    if ($this->nomnom !== $v) {
        $this->nomnom = $v;
        $this->modifiedColumns[] = NphisconPeer::NOMNOM;
      }
  
	} 
	
	public function setMoncar($v)
	{

    if ($this->moncar !== $v) {
        $this->moncar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NphisconPeer::MONCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NphisconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->codcon = $rs->getString($startcol + 3);

      $this->fecnom = $rs->getDate($startcol + 4, null);

      $this->monto = $rs->getFloat($startcol + 5);

      $this->codcat = $rs->getString($startcol + 6);

      $this->codpar = $rs->getString($startcol + 7);

      $this->codescuela = $rs->getString($startcol + 8);

      $this->codniv = $rs->getString($startcol + 9);

      $this->codtipgas = $rs->getString($startcol + 10);

      $this->nomcon = $rs->getString($startcol + 11);

      $this->numrec = $rs->getFloat($startcol + 12);

      $this->cantidad = $rs->getFloat($startcol + 13);

      $this->fecnomdes = $rs->getDate($startcol + 14, null);

      $this->especial = $rs->getString($startcol + 15);

      $this->fecnomespdes = $rs->getDate($startcol + 16, null);

      $this->fecnomesphas = $rs->getDate($startcol + 17, null);

      $this->codnomesp = $rs->getString($startcol + 18);

      $this->nomnomesp = $rs->getString($startcol + 19);

      $this->nomban = $rs->getString($startcol + 20);

      $this->cuenta_banco = $rs->getString($startcol + 21);

      $this->nomemp = $rs->getString($startcol + 22);

      $this->cedemp = $rs->getString($startcol + 23);

      $this->nomcar = $rs->getString($startcol + 24);

      $this->desniv = $rs->getString($startcol + 25);

      $this->nomcat = $rs->getString($startcol + 26);

      $this->numsem = $rs->getInt($startcol + 27);

      $this->codban = $rs->getString($startcol + 28);

      $this->asided = $rs->getString($startcol + 29);

      $this->varia = $rs->getString($startcol + 30);

      $this->codtippag = $rs->getString($startcol + 31);

      $this->impcpt = $rs->getString($startcol + 32);

      $this->ordpag = $rs->getString($startcol + 33);

      $this->afepre = $rs->getString($startcol + 34);

      $this->numord = $rs->getString($startcol + 35);

      $this->codtipemp = $rs->getString($startcol + 36);

      $this->nomnom = $rs->getString($startcol + 37);

      $this->moncar = $rs->getFloat($startcol + 38);

      $this->id = $rs->getInt($startcol + 39);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 40; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nphiscon object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

  
  public function get($m, $a)
    {

      if(method_exists($this,$m)){
        $obj_fk = $this->$m();
        if($obj_fk) return $obj_fk->$a();
      } return '';
    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphisconPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NphisconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NphisconPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = NphisconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getCodcon();
				break;
			case 4:
				return $this->getFecnom();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getCodcat();
				break;
			case 7:
				return $this->getCodpar();
				break;
			case 8:
				return $this->getCodescuela();
				break;
			case 9:
				return $this->getCodniv();
				break;
			case 10:
				return $this->getCodtipgas();
				break;
			case 11:
				return $this->getNomcon();
				break;
			case 12:
				return $this->getNumrec();
				break;
			case 13:
				return $this->getCantidad();
				break;
			case 14:
				return $this->getFecnomdes();
				break;
			case 15:
				return $this->getEspecial();
				break;
			case 16:
				return $this->getFecnomespdes();
				break;
			case 17:
				return $this->getFecnomesphas();
				break;
			case 18:
				return $this->getCodnomesp();
				break;
			case 19:
				return $this->getNomnomesp();
				break;
			case 20:
				return $this->getNomban();
				break;
			case 21:
				return $this->getCuentaBanco();
				break;
			case 22:
				return $this->getNomemp();
				break;
			case 23:
				return $this->getCedemp();
				break;
			case 24:
				return $this->getNomcar();
				break;
			case 25:
				return $this->getDesniv();
				break;
			case 26:
				return $this->getNomcat();
				break;
			case 27:
				return $this->getNumsem();
				break;
			case 28:
				return $this->getCodban();
				break;
			case 29:
				return $this->getAsided();
				break;
			case 30:
				return $this->getVaria();
				break;
			case 31:
				return $this->getCodtippag();
				break;
			case 32:
				return $this->getImpcpt();
				break;
			case 33:
				return $this->getOrdpag();
				break;
			case 34:
				return $this->getAfepre();
				break;
			case 35:
				return $this->getNumord();
				break;
			case 36:
				return $this->getCodtipemp();
				break;
			case 37:
				return $this->getNomnom();
				break;
			case 38:
				return $this->getMoncar();
				break;
			case 39:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getCodcon(),
			$keys[4] => $this->getFecnom(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getCodcat(),
			$keys[7] => $this->getCodpar(),
			$keys[8] => $this->getCodescuela(),
			$keys[9] => $this->getCodniv(),
			$keys[10] => $this->getCodtipgas(),
			$keys[11] => $this->getNomcon(),
			$keys[12] => $this->getNumrec(),
			$keys[13] => $this->getCantidad(),
			$keys[14] => $this->getFecnomdes(),
			$keys[15] => $this->getEspecial(),
			$keys[16] => $this->getFecnomespdes(),
			$keys[17] => $this->getFecnomesphas(),
			$keys[18] => $this->getCodnomesp(),
			$keys[19] => $this->getNomnomesp(),
			$keys[20] => $this->getNomban(),
			$keys[21] => $this->getCuentaBanco(),
			$keys[22] => $this->getNomemp(),
			$keys[23] => $this->getCedemp(),
			$keys[24] => $this->getNomcar(),
			$keys[25] => $this->getDesniv(),
			$keys[26] => $this->getNomcat(),
			$keys[27] => $this->getNumsem(),
			$keys[28] => $this->getCodban(),
			$keys[29] => $this->getAsided(),
			$keys[30] => $this->getVaria(),
			$keys[31] => $this->getCodtippag(),
			$keys[32] => $this->getImpcpt(),
			$keys[33] => $this->getOrdpag(),
			$keys[34] => $this->getAfepre(),
			$keys[35] => $this->getNumord(),
			$keys[36] => $this->getCodtipemp(),
			$keys[37] => $this->getNomnom(),
			$keys[38] => $this->getMoncar(),
			$keys[39] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setCodcon($value);
				break;
			case 4:
				$this->setFecnom($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setCodcat($value);
				break;
			case 7:
				$this->setCodpar($value);
				break;
			case 8:
				$this->setCodescuela($value);
				break;
			case 9:
				$this->setCodniv($value);
				break;
			case 10:
				$this->setCodtipgas($value);
				break;
			case 11:
				$this->setNomcon($value);
				break;
			case 12:
				$this->setNumrec($value);
				break;
			case 13:
				$this->setCantidad($value);
				break;
			case 14:
				$this->setFecnomdes($value);
				break;
			case 15:
				$this->setEspecial($value);
				break;
			case 16:
				$this->setFecnomespdes($value);
				break;
			case 17:
				$this->setFecnomesphas($value);
				break;
			case 18:
				$this->setCodnomesp($value);
				break;
			case 19:
				$this->setNomnomesp($value);
				break;
			case 20:
				$this->setNomban($value);
				break;
			case 21:
				$this->setCuentaBanco($value);
				break;
			case 22:
				$this->setNomemp($value);
				break;
			case 23:
				$this->setCedemp($value);
				break;
			case 24:
				$this->setNomcar($value);
				break;
			case 25:
				$this->setDesniv($value);
				break;
			case 26:
				$this->setNomcat($value);
				break;
			case 27:
				$this->setNumsem($value);
				break;
			case 28:
				$this->setCodban($value);
				break;
			case 29:
				$this->setAsided($value);
				break;
			case 30:
				$this->setVaria($value);
				break;
			case 31:
				$this->setCodtippag($value);
				break;
			case 32:
				$this->setImpcpt($value);
				break;
			case 33:
				$this->setOrdpag($value);
				break;
			case 34:
				$this->setAfepre($value);
				break;
			case 35:
				$this->setNumord($value);
				break;
			case 36:
				$this->setCodtipemp($value);
				break;
			case 37:
				$this->setNomnom($value);
				break;
			case 38:
				$this->setMoncar($value);
				break;
			case 39:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodescuela($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodniv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtipgas($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCantidad($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecnomdes($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEspecial($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecnomespdes($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecnomesphas($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodnomesp($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomnomesp($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomban($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCuentaBanco($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNomemp($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCedemp($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNomcar($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDesniv($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setNomcat($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNumsem($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodban($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setAsided($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setVaria($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodtippag($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setImpcpt($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setOrdpag($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setAfepre($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNumord($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCodtipemp($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setNomnom($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setMoncar($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setId($arr[$keys[39]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphisconPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphisconPeer::CODNOM)) $criteria->add(NphisconPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NphisconPeer::CODEMP)) $criteria->add(NphisconPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphisconPeer::CODCAR)) $criteria->add(NphisconPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NphisconPeer::CODCON)) $criteria->add(NphisconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NphisconPeer::FECNOM)) $criteria->add(NphisconPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NphisconPeer::MONTO)) $criteria->add(NphisconPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NphisconPeer::CODCAT)) $criteria->add(NphisconPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NphisconPeer::CODPAR)) $criteria->add(NphisconPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NphisconPeer::CODESCUELA)) $criteria->add(NphisconPeer::CODESCUELA, $this->codescuela);
		if ($this->isColumnModified(NphisconPeer::CODNIV)) $criteria->add(NphisconPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NphisconPeer::CODTIPGAS)) $criteria->add(NphisconPeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(NphisconPeer::NOMCON)) $criteria->add(NphisconPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NphisconPeer::NUMREC)) $criteria->add(NphisconPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NphisconPeer::CANTIDAD)) $criteria->add(NphisconPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NphisconPeer::FECNOMDES)) $criteria->add(NphisconPeer::FECNOMDES, $this->fecnomdes);
		if ($this->isColumnModified(NphisconPeer::ESPECIAL)) $criteria->add(NphisconPeer::ESPECIAL, $this->especial);
		if ($this->isColumnModified(NphisconPeer::FECNOMESPDES)) $criteria->add(NphisconPeer::FECNOMESPDES, $this->fecnomespdes);
		if ($this->isColumnModified(NphisconPeer::FECNOMESPHAS)) $criteria->add(NphisconPeer::FECNOMESPHAS, $this->fecnomesphas);
		if ($this->isColumnModified(NphisconPeer::CODNOMESP)) $criteria->add(NphisconPeer::CODNOMESP, $this->codnomesp);
		if ($this->isColumnModified(NphisconPeer::NOMNOMESP)) $criteria->add(NphisconPeer::NOMNOMESP, $this->nomnomesp);
		if ($this->isColumnModified(NphisconPeer::NOMBAN)) $criteria->add(NphisconPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(NphisconPeer::CUENTA_BANCO)) $criteria->add(NphisconPeer::CUENTA_BANCO, $this->cuenta_banco);
		if ($this->isColumnModified(NphisconPeer::NOMEMP)) $criteria->add(NphisconPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NphisconPeer::CEDEMP)) $criteria->add(NphisconPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(NphisconPeer::NOMCAR)) $criteria->add(NphisconPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NphisconPeer::DESNIV)) $criteria->add(NphisconPeer::DESNIV, $this->desniv);
		if ($this->isColumnModified(NphisconPeer::NOMCAT)) $criteria->add(NphisconPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(NphisconPeer::NUMSEM)) $criteria->add(NphisconPeer::NUMSEM, $this->numsem);
		if ($this->isColumnModified(NphisconPeer::CODBAN)) $criteria->add(NphisconPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NphisconPeer::ASIDED)) $criteria->add(NphisconPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NphisconPeer::VARIA)) $criteria->add(NphisconPeer::VARIA, $this->varia);
		if ($this->isColumnModified(NphisconPeer::CODTIPPAG)) $criteria->add(NphisconPeer::CODTIPPAG, $this->codtippag);
		if ($this->isColumnModified(NphisconPeer::IMPCPT)) $criteria->add(NphisconPeer::IMPCPT, $this->impcpt);
		if ($this->isColumnModified(NphisconPeer::ORDPAG)) $criteria->add(NphisconPeer::ORDPAG, $this->ordpag);
		if ($this->isColumnModified(NphisconPeer::AFEPRE)) $criteria->add(NphisconPeer::AFEPRE, $this->afepre);
		if ($this->isColumnModified(NphisconPeer::NUMORD)) $criteria->add(NphisconPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(NphisconPeer::CODTIPEMP)) $criteria->add(NphisconPeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(NphisconPeer::NOMNOM)) $criteria->add(NphisconPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NphisconPeer::MONCAR)) $criteria->add(NphisconPeer::MONCAR, $this->moncar);
		if ($this->isColumnModified(NphisconPeer::ID)) $criteria->add(NphisconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphisconPeer::DATABASE_NAME);

		$criteria->add(NphisconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setMonto($this->monto);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodescuela($this->codescuela);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodtipgas($this->codtipgas);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNumrec($this->numrec);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setFecnomdes($this->fecnomdes);

		$copyObj->setEspecial($this->especial);

		$copyObj->setFecnomespdes($this->fecnomespdes);

		$copyObj->setFecnomesphas($this->fecnomesphas);

		$copyObj->setCodnomesp($this->codnomesp);

		$copyObj->setNomnomesp($this->nomnomesp);

		$copyObj->setNomban($this->nomban);

		$copyObj->setCuentaBanco($this->cuenta_banco);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setDesniv($this->desniv);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setNumsem($this->numsem);

		$copyObj->setCodban($this->codban);

		$copyObj->setAsided($this->asided);

		$copyObj->setVaria($this->varia);

		$copyObj->setCodtippag($this->codtippag);

		$copyObj->setImpcpt($this->impcpt);

		$copyObj->setOrdpag($this->ordpag);

		$copyObj->setAfepre($this->afepre);

		$copyObj->setNumord($this->numord);

		$copyObj->setCodtipemp($this->codtipemp);

		$copyObj->setNomnom($this->nomnom);

		$copyObj->setMoncar($this->moncar);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NphisconPeer();
		}
		return self::$peer;
	}

} 