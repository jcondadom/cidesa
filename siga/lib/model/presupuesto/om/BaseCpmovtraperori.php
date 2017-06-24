<?php


abstract class BaseCpmovtraperori extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $codori;


	
	protected $perpre;


	
	protected $monmov;


	
	protected $id;

	
	protected $aCptrasla;

	
	protected $aCpdeftit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getCodori()
  {

    return trim($this->codori);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = CpmovtraperoriPeer::REFTRA;
      }
  
		if ($this->aCptrasla !== null && $this->aCptrasla->getReftra() !== $v) {
			$this->aCptrasla = null;
		}

	} 
	
	public function setCodori($v)
	{

    if ($this->codori !== $v) {
        $this->codori = $v;
        $this->modifiedColumns[] = CpmovtraperoriPeer::CODORI;
      }
  
		if ($this->aCpdeftit !== null && $this->aCpdeftit->getCodpre() !== $v) {
			$this->aCpdeftit = null;
		}

	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = CpmovtraperoriPeer::PERPRE;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovtraperoriPeer::MONMOV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpmovtraperoriPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftra = $rs->getString($startcol + 0);

      $this->codori = $rs->getString($startcol + 1);

      $this->perpre = $rs->getString($startcol + 2);

      $this->monmov = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpmovtraperori object", $e);
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
			$con = Propel::getConnection(CpmovtraperoriPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovtraperoriPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovtraperoriPeer::DATABASE_NAME);
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


												
			if ($this->aCptrasla !== null) {
				if ($this->aCptrasla->isModified()) {
					$affectedRows += $this->aCptrasla->save($con);
				}
				$this->setCptrasla($this->aCptrasla);
			}

			if ($this->aCpdeftit !== null) {
				if ($this->aCpdeftit->isModified()) {
					$affectedRows += $this->aCpdeftit->save($con);
				}
				$this->setCpdeftit($this->aCpdeftit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpmovtraperoriPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpmovtraperoriPeer::doUpdate($this, $con);
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


												
			if ($this->aCptrasla !== null) {
				if (!$this->aCptrasla->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCptrasla->getValidationFailures());
				}
			}

			if ($this->aCpdeftit !== null) {
				if (!$this->aCpdeftit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdeftit->getValidationFailures());
				}
			}


			if (($retval = CpmovtraperoriPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovtraperoriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getCodori();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovtraperoriPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getCodori(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovtraperoriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setCodori($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovtraperoriPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodori($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovtraperoriPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovtraperoriPeer::REFTRA)) $criteria->add(CpmovtraperoriPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(CpmovtraperoriPeer::CODORI)) $criteria->add(CpmovtraperoriPeer::CODORI, $this->codori);
		if ($this->isColumnModified(CpmovtraperoriPeer::PERPRE)) $criteria->add(CpmovtraperoriPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(CpmovtraperoriPeer::MONMOV)) $criteria->add(CpmovtraperoriPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpmovtraperoriPeer::ID)) $criteria->add(CpmovtraperoriPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovtraperoriPeer::DATABASE_NAME);

		$criteria->add(CpmovtraperoriPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setCodori($this->codori);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonmov($this->monmov);


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
			self::$peer = new CpmovtraperoriPeer();
		}
		return self::$peer;
	}

	
	public function setCptrasla($v)
	{


		if ($v === null) {
			$this->setReftra(NULL);
		} else {
			$this->setReftra($v->getReftra());
		}


		$this->aCptrasla = $v;
	}


	
	public function getCptrasla($con = null)
	{
		if ($this->aCptrasla === null && (($this->reftra !== "" && $this->reftra !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCptraslaPeer.php';

      $c = new Criteria();
      $c->add(CptraslaPeer::REFTRA,$this->reftra);
      
			$this->aCptrasla = CptraslaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCptrasla;
	}

	
	public function setCpdeftit($v)
	{


		if ($v === null) {
			$this->setCodori(NULL);
		} else {
			$this->setCodori($v->getCodpre());
		}


		$this->aCpdeftit = $v;
	}


	
	public function getCpdeftit($con = null)
	{
		if ($this->aCpdeftit === null && (($this->codori !== "" && $this->codori !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdeftitPeer.php';

      $c = new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$this->codori);
      
			$this->aCpdeftit = CpdeftitPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdeftit;
	}

} 