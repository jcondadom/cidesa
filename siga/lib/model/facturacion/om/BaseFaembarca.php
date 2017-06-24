<?php


abstract class BaseFaembarca extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemb;


	
	protected $nomemb;


	
	protected $tipemb;


	
	protected $proemb;


	
	protected $eslora;


	
	protected $manga;


	
	protected $puntal;


	
	protected $calado;


	
	protected $sigimo;


	
	protected $peso;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getNomemb()
  {

    return trim($this->nomemb);

  }
  
  public function getTipemb()
  {

    return trim($this->tipemb);

  }
  
  public function getProemb()
  {

    return trim($this->proemb);

  }
  
  public function getEslora($val=false)
  {

    if($val) return number_format($this->eslora,2,',','.');
    else return $this->eslora;

  }
  
  public function getManga($val=false)
  {

    if($val) return number_format($this->manga,2,',','.');
    else return $this->manga;

  }
  
  public function getPuntal($val=false)
  {

    if($val) return number_format($this->puntal,2,',','.');
    else return $this->puntal;

  }
  
  public function getCalado($val=false)
  {

    if($val) return number_format($this->calado,2,',','.');
    else return $this->calado;

  }
  
  public function getSigimo()
  {

    return trim($this->sigimo);

  }
  
  public function getPeso($val=false)
  {

    if($val) return number_format($this->peso,2,',','.');
    else return $this->peso;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = FaembarcaPeer::CODEMB;
      }
  
	} 
	
	public function setNomemb($v)
	{

    if ($this->nomemb !== $v) {
        $this->nomemb = $v;
        $this->modifiedColumns[] = FaembarcaPeer::NOMEMB;
      }
  
	} 
	
	public function setTipemb($v)
	{

    if ($this->tipemb !== $v) {
        $this->tipemb = $v;
        $this->modifiedColumns[] = FaembarcaPeer::TIPEMB;
      }
  
	} 
	
	public function setProemb($v)
	{

    if ($this->proemb !== $v) {
        $this->proemb = $v;
        $this->modifiedColumns[] = FaembarcaPeer::PROEMB;
      }
  
	} 
	
	public function setEslora($v)
	{

    if ($this->eslora !== $v) {
        $this->eslora = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaembarcaPeer::ESLORA;
      }
  
	} 
	
	public function setManga($v)
	{

    if ($this->manga !== $v) {
        $this->manga = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaembarcaPeer::MANGA;
      }
  
	} 
	
	public function setPuntal($v)
	{

    if ($this->puntal !== $v) {
        $this->puntal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaembarcaPeer::PUNTAL;
      }
  
	} 
	
	public function setCalado($v)
	{

    if ($this->calado !== $v) {
        $this->calado = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaembarcaPeer::CALADO;
      }
  
	} 
	
	public function setSigimo($v)
	{

    if ($this->sigimo !== $v) {
        $this->sigimo = $v;
        $this->modifiedColumns[] = FaembarcaPeer::SIGIMO;
      }
  
	} 
	
	public function setPeso($v)
	{

    if ($this->peso !== $v) {
        $this->peso = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaembarcaPeer::PESO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaembarcaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemb = $rs->getString($startcol + 0);

      $this->nomemb = $rs->getString($startcol + 1);

      $this->tipemb = $rs->getString($startcol + 2);

      $this->proemb = $rs->getString($startcol + 3);

      $this->eslora = $rs->getFloat($startcol + 4);

      $this->manga = $rs->getFloat($startcol + 5);

      $this->puntal = $rs->getFloat($startcol + 6);

      $this->calado = $rs->getFloat($startcol + 7);

      $this->sigimo = $rs->getString($startcol + 8);

      $this->peso = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faembarca object", $e);
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
			$con = Propel::getConnection(FaembarcaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaembarcaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaembarcaPeer::DATABASE_NAME);
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
					$pk = FaembarcaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaembarcaPeer::doUpdate($this, $con);
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


			if (($retval = FaembarcaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaembarcaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemb();
				break;
			case 1:
				return $this->getNomemb();
				break;
			case 2:
				return $this->getTipemb();
				break;
			case 3:
				return $this->getProemb();
				break;
			case 4:
				return $this->getEslora();
				break;
			case 5:
				return $this->getManga();
				break;
			case 6:
				return $this->getPuntal();
				break;
			case 7:
				return $this->getCalado();
				break;
			case 8:
				return $this->getSigimo();
				break;
			case 9:
				return $this->getPeso();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaembarcaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemb(),
			$keys[1] => $this->getNomemb(),
			$keys[2] => $this->getTipemb(),
			$keys[3] => $this->getProemb(),
			$keys[4] => $this->getEslora(),
			$keys[5] => $this->getManga(),
			$keys[6] => $this->getPuntal(),
			$keys[7] => $this->getCalado(),
			$keys[8] => $this->getSigimo(),
			$keys[9] => $this->getPeso(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaembarcaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemb($value);
				break;
			case 1:
				$this->setNomemb($value);
				break;
			case 2:
				$this->setTipemb($value);
				break;
			case 3:
				$this->setProemb($value);
				break;
			case 4:
				$this->setEslora($value);
				break;
			case 5:
				$this->setManga($value);
				break;
			case 6:
				$this->setPuntal($value);
				break;
			case 7:
				$this->setCalado($value);
				break;
			case 8:
				$this->setSigimo($value);
				break;
			case 9:
				$this->setPeso($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaembarcaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemb($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemb($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipemb($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProemb($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEslora($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setManga($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPuntal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCalado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSigimo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPeso($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaembarcaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaembarcaPeer::CODEMB)) $criteria->add(FaembarcaPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(FaembarcaPeer::NOMEMB)) $criteria->add(FaembarcaPeer::NOMEMB, $this->nomemb);
		if ($this->isColumnModified(FaembarcaPeer::TIPEMB)) $criteria->add(FaembarcaPeer::TIPEMB, $this->tipemb);
		if ($this->isColumnModified(FaembarcaPeer::PROEMB)) $criteria->add(FaembarcaPeer::PROEMB, $this->proemb);
		if ($this->isColumnModified(FaembarcaPeer::ESLORA)) $criteria->add(FaembarcaPeer::ESLORA, $this->eslora);
		if ($this->isColumnModified(FaembarcaPeer::MANGA)) $criteria->add(FaembarcaPeer::MANGA, $this->manga);
		if ($this->isColumnModified(FaembarcaPeer::PUNTAL)) $criteria->add(FaembarcaPeer::PUNTAL, $this->puntal);
		if ($this->isColumnModified(FaembarcaPeer::CALADO)) $criteria->add(FaembarcaPeer::CALADO, $this->calado);
		if ($this->isColumnModified(FaembarcaPeer::SIGIMO)) $criteria->add(FaembarcaPeer::SIGIMO, $this->sigimo);
		if ($this->isColumnModified(FaembarcaPeer::PESO)) $criteria->add(FaembarcaPeer::PESO, $this->peso);
		if ($this->isColumnModified(FaembarcaPeer::ID)) $criteria->add(FaembarcaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaembarcaPeer::DATABASE_NAME);

		$criteria->add(FaembarcaPeer::ID, $this->id);

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

		$copyObj->setCodemb($this->codemb);

		$copyObj->setNomemb($this->nomemb);

		$copyObj->setTipemb($this->tipemb);

		$copyObj->setProemb($this->proemb);

		$copyObj->setEslora($this->eslora);

		$copyObj->setManga($this->manga);

		$copyObj->setPuntal($this->puntal);

		$copyObj->setCalado($this->calado);

		$copyObj->setSigimo($this->sigimo);

		$copyObj->setPeso($this->peso);


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
			self::$peer = new FaembarcaPeer();
		}
		return self::$peer;
	}

} 