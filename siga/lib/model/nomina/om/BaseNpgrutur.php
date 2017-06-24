<?php


abstract class BaseNpgrutur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtur;


	
	protected $codnom;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $codgru;


	
	protected $feclun;


	
	protected $jorlun;


	
	protected $fecmar;


	
	protected $jormar;


	
	protected $fecmie;


	
	protected $jormie;


	
	protected $fecjue;


	
	protected $jorjue;


	
	protected $fecvie;


	
	protected $jorvie;


	
	protected $fecsab;


	
	protected $jorsab;


	
	protected $fecdom;


	
	protected $jordom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtur()
  {

    return trim($this->codtur);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getFeclun($format = 'Y-m-d')
  {

    if ($this->feclun === null || $this->feclun === '') {
      return null;
    } elseif (!is_int($this->feclun)) {
            $ts = adodb_strtotime($this->feclun);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feclun] as date/time value: " . var_export($this->feclun, true));
      }
    } else {
      $ts = $this->feclun;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJorlun()
  {

    return trim($this->jorlun);

  }
  
  public function getFecmar($format = 'Y-m-d')
  {

    if ($this->fecmar === null || $this->fecmar === '') {
      return null;
    } elseif (!is_int($this->fecmar)) {
            $ts = adodb_strtotime($this->fecmar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmar] as date/time value: " . var_export($this->fecmar, true));
      }
    } else {
      $ts = $this->fecmar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJormar()
  {

    return trim($this->jormar);

  }
  
  public function getFecmie($format = 'Y-m-d')
  {

    if ($this->fecmie === null || $this->fecmie === '') {
      return null;
    } elseif (!is_int($this->fecmie)) {
            $ts = adodb_strtotime($this->fecmie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmie] as date/time value: " . var_export($this->fecmie, true));
      }
    } else {
      $ts = $this->fecmie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJormie()
  {

    return trim($this->jormie);

  }
  
  public function getFecjue($format = 'Y-m-d')
  {

    if ($this->fecjue === null || $this->fecjue === '') {
      return null;
    } elseif (!is_int($this->fecjue)) {
            $ts = adodb_strtotime($this->fecjue);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecjue] as date/time value: " . var_export($this->fecjue, true));
      }
    } else {
      $ts = $this->fecjue;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJorjue()
  {

    return trim($this->jorjue);

  }
  
  public function getFecvie($format = 'Y-m-d')
  {

    if ($this->fecvie === null || $this->fecvie === '') {
      return null;
    } elseif (!is_int($this->fecvie)) {
            $ts = adodb_strtotime($this->fecvie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvie] as date/time value: " . var_export($this->fecvie, true));
      }
    } else {
      $ts = $this->fecvie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJorvie()
  {

    return trim($this->jorvie);

  }
  
  public function getFecsab($format = 'Y-m-d')
  {

    if ($this->fecsab === null || $this->fecsab === '') {
      return null;
    } elseif (!is_int($this->fecsab)) {
            $ts = adodb_strtotime($this->fecsab);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsab] as date/time value: " . var_export($this->fecsab, true));
      }
    } else {
      $ts = $this->fecsab;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJorsab()
  {

    return trim($this->jorsab);

  }
  
  public function getFecdom($format = 'Y-m-d')
  {

    if ($this->fecdom === null || $this->fecdom === '') {
      return null;
    } elseif (!is_int($this->fecdom)) {
            $ts = adodb_strtotime($this->fecdom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdom] as date/time value: " . var_export($this->fecdom, true));
      }
    } else {
      $ts = $this->fecdom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getJordom()
  {

    return trim($this->jordom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtur($v)
	{

    if ($this->codtur !== $v) {
        $this->codtur = $v;
        $this->modifiedColumns[] = NpgruturPeer::CODTUR;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpgruturPeer::CODNOM;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECFIN;
    }

	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = NpgruturPeer::CODGRU;
      }
  
	} 
	
	public function setFeclun($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclun] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclun !== $ts) {
      $this->feclun = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECLUN;
    }

	} 
	
	public function setJorlun($v)
	{

    if ($this->jorlun !== $v) {
        $this->jorlun = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORLUN;
      }
  
	} 
	
	public function setFecmar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmar !== $ts) {
      $this->fecmar = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECMAR;
    }

	} 
	
	public function setJormar($v)
	{

    if ($this->jormar !== $v) {
        $this->jormar = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORMAR;
      }
  
	} 
	
	public function setFecmie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmie !== $ts) {
      $this->fecmie = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECMIE;
    }

	} 
	
	public function setJormie($v)
	{

    if ($this->jormie !== $v) {
        $this->jormie = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORMIE;
      }
  
	} 
	
	public function setFecjue($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecjue] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecjue !== $ts) {
      $this->fecjue = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECJUE;
    }

	} 
	
	public function setJorjue($v)
	{

    if ($this->jorjue !== $v) {
        $this->jorjue = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORJUE;
      }
  
	} 
	
	public function setFecvie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvie !== $ts) {
      $this->fecvie = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECVIE;
    }

	} 
	
	public function setJorvie($v)
	{

    if ($this->jorvie !== $v) {
        $this->jorvie = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORVIE;
      }
  
	} 
	
	public function setFecsab($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsab] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsab !== $ts) {
      $this->fecsab = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECSAB;
    }

	} 
	
	public function setJorsab($v)
	{

    if ($this->jorsab !== $v) {
        $this->jorsab = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORSAB;
      }
  
	} 
	
	public function setFecdom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdom !== $ts) {
      $this->fecdom = $ts;
      $this->modifiedColumns[] = NpgruturPeer::FECDOM;
    }

	} 
	
	public function setJordom($v)
	{

    if ($this->jordom !== $v) {
        $this->jordom = $v;
        $this->modifiedColumns[] = NpgruturPeer::JORDOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpgruturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtur = $rs->getString($startcol + 0);

      $this->codnom = $rs->getString($startcol + 1);

      $this->fecini = $rs->getDate($startcol + 2, null);

      $this->fecfin = $rs->getDate($startcol + 3, null);

      $this->codgru = $rs->getString($startcol + 4);

      $this->feclun = $rs->getDate($startcol + 5, null);

      $this->jorlun = $rs->getString($startcol + 6);

      $this->fecmar = $rs->getDate($startcol + 7, null);

      $this->jormar = $rs->getString($startcol + 8);

      $this->fecmie = $rs->getDate($startcol + 9, null);

      $this->jormie = $rs->getString($startcol + 10);

      $this->fecjue = $rs->getDate($startcol + 11, null);

      $this->jorjue = $rs->getString($startcol + 12);

      $this->fecvie = $rs->getDate($startcol + 13, null);

      $this->jorvie = $rs->getString($startcol + 14);

      $this->fecsab = $rs->getDate($startcol + 15, null);

      $this->jorsab = $rs->getString($startcol + 16);

      $this->fecdom = $rs->getDate($startcol + 17, null);

      $this->jordom = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npgrutur object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpgruturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpgruturPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpgruturPeer::DATABASE_NAME);
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
					$pk = NpgruturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpgruturPeer::doUpdate($this, $con);
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


			if (($retval = NpgruturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgruturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtur();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getFecini();
				break;
			case 3:
				return $this->getFecfin();
				break;
			case 4:
				return $this->getCodgru();
				break;
			case 5:
				return $this->getFeclun();
				break;
			case 6:
				return $this->getJorlun();
				break;
			case 7:
				return $this->getFecmar();
				break;
			case 8:
				return $this->getJormar();
				break;
			case 9:
				return $this->getFecmie();
				break;
			case 10:
				return $this->getJormie();
				break;
			case 11:
				return $this->getFecjue();
				break;
			case 12:
				return $this->getJorjue();
				break;
			case 13:
				return $this->getFecvie();
				break;
			case 14:
				return $this->getJorvie();
				break;
			case 15:
				return $this->getFecsab();
				break;
			case 16:
				return $this->getJorsab();
				break;
			case 17:
				return $this->getFecdom();
				break;
			case 18:
				return $this->getJordom();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpgruturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtur(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFecfin(),
			$keys[4] => $this->getCodgru(),
			$keys[5] => $this->getFeclun(),
			$keys[6] => $this->getJorlun(),
			$keys[7] => $this->getFecmar(),
			$keys[8] => $this->getJormar(),
			$keys[9] => $this->getFecmie(),
			$keys[10] => $this->getJormie(),
			$keys[11] => $this->getFecjue(),
			$keys[12] => $this->getJorjue(),
			$keys[13] => $this->getFecvie(),
			$keys[14] => $this->getJorvie(),
			$keys[15] => $this->getFecsab(),
			$keys[16] => $this->getJorsab(),
			$keys[17] => $this->getFecdom(),
			$keys[18] => $this->getJordom(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgruturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtur($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setFecini($value);
				break;
			case 3:
				$this->setFecfin($value);
				break;
			case 4:
				$this->setCodgru($value);
				break;
			case 5:
				$this->setFeclun($value);
				break;
			case 6:
				$this->setJorlun($value);
				break;
			case 7:
				$this->setFecmar($value);
				break;
			case 8:
				$this->setJormar($value);
				break;
			case 9:
				$this->setFecmie($value);
				break;
			case 10:
				$this->setJormie($value);
				break;
			case 11:
				$this->setFecjue($value);
				break;
			case 12:
				$this->setJorjue($value);
				break;
			case 13:
				$this->setFecvie($value);
				break;
			case 14:
				$this->setJorvie($value);
				break;
			case 15:
				$this->setFecsab($value);
				break;
			case 16:
				$this->setJorsab($value);
				break;
			case 17:
				$this->setFecdom($value);
				break;
			case 18:
				$this->setJordom($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpgruturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodgru($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeclun($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setJorlun($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecmar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setJormar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecmie($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setJormie($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecjue($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setJorjue($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecvie($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setJorvie($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecsab($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setJorsab($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecdom($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setJordom($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpgruturPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpgruturPeer::CODTUR)) $criteria->add(NpgruturPeer::CODTUR, $this->codtur);
		if ($this->isColumnModified(NpgruturPeer::CODNOM)) $criteria->add(NpgruturPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpgruturPeer::FECINI)) $criteria->add(NpgruturPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpgruturPeer::FECFIN)) $criteria->add(NpgruturPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpgruturPeer::CODGRU)) $criteria->add(NpgruturPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(NpgruturPeer::FECLUN)) $criteria->add(NpgruturPeer::FECLUN, $this->feclun);
		if ($this->isColumnModified(NpgruturPeer::JORLUN)) $criteria->add(NpgruturPeer::JORLUN, $this->jorlun);
		if ($this->isColumnModified(NpgruturPeer::FECMAR)) $criteria->add(NpgruturPeer::FECMAR, $this->fecmar);
		if ($this->isColumnModified(NpgruturPeer::JORMAR)) $criteria->add(NpgruturPeer::JORMAR, $this->jormar);
		if ($this->isColumnModified(NpgruturPeer::FECMIE)) $criteria->add(NpgruturPeer::FECMIE, $this->fecmie);
		if ($this->isColumnModified(NpgruturPeer::JORMIE)) $criteria->add(NpgruturPeer::JORMIE, $this->jormie);
		if ($this->isColumnModified(NpgruturPeer::FECJUE)) $criteria->add(NpgruturPeer::FECJUE, $this->fecjue);
		if ($this->isColumnModified(NpgruturPeer::JORJUE)) $criteria->add(NpgruturPeer::JORJUE, $this->jorjue);
		if ($this->isColumnModified(NpgruturPeer::FECVIE)) $criteria->add(NpgruturPeer::FECVIE, $this->fecvie);
		if ($this->isColumnModified(NpgruturPeer::JORVIE)) $criteria->add(NpgruturPeer::JORVIE, $this->jorvie);
		if ($this->isColumnModified(NpgruturPeer::FECSAB)) $criteria->add(NpgruturPeer::FECSAB, $this->fecsab);
		if ($this->isColumnModified(NpgruturPeer::JORSAB)) $criteria->add(NpgruturPeer::JORSAB, $this->jorsab);
		if ($this->isColumnModified(NpgruturPeer::FECDOM)) $criteria->add(NpgruturPeer::FECDOM, $this->fecdom);
		if ($this->isColumnModified(NpgruturPeer::JORDOM)) $criteria->add(NpgruturPeer::JORDOM, $this->jordom);
		if ($this->isColumnModified(NpgruturPeer::ID)) $criteria->add(NpgruturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpgruturPeer::DATABASE_NAME);

		$criteria->add(NpgruturPeer::ID, $this->id);

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

		$copyObj->setCodtur($this->codtur);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setFeclun($this->feclun);

		$copyObj->setJorlun($this->jorlun);

		$copyObj->setFecmar($this->fecmar);

		$copyObj->setJormar($this->jormar);

		$copyObj->setFecmie($this->fecmie);

		$copyObj->setJormie($this->jormie);

		$copyObj->setFecjue($this->fecjue);

		$copyObj->setJorjue($this->jorjue);

		$copyObj->setFecvie($this->fecvie);

		$copyObj->setJorvie($this->jorvie);

		$copyObj->setFecsab($this->fecsab);

		$copyObj->setJorsab($this->jorsab);

		$copyObj->setFecdom($this->fecdom);

		$copyObj->setJordom($this->jordom);


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
			self::$peer = new NpgruturPeer();
		}
		return self::$peer;
	}

} 