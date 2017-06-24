<?php


abstract class BaseBnmunicip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmun;


	
	protected $nommun;


	
	protected $bnestado_codest;


	
	protected $id;

	
	protected $aBnestado;

	
	protected $collBnparroqs;

	
	protected $lastBnparroqCriteria = null;

	
	protected $collBnciudads;

	
	protected $lastBnciudadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getNommun()
  {

    return trim($this->nommun);

  }
  
  public function getBnestadoCodest()
  {

    return trim($this->bnestado_codest);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = strtoupper($v);
        $this->modifiedColumns[] = BnmunicipPeer::CODMUN;
      }
  
	} 
	
	public function setNommun($v)
	{

    if ($this->nommun !== $v) {
        $this->nommun = strtoupper($v);
        $this->modifiedColumns[] = BnmunicipPeer::NOMMUN;
      }
  
	} 
	
	public function setBnestadoCodest($v)
	{

    if ($this->bnestado_codest !== $v) {
        $this->bnestado_codest = strtoupper($v);
        $this->modifiedColumns[] = BnmunicipPeer::BNESTADO_CODEST;
      }
  
		if ($this->aBnestado !== null && $this->aBnestado->getCodest() !== $v) {
			$this->aBnestado = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnmunicipPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmun = $rs->getString($startcol + 0);

      $this->nommun = $rs->getString($startcol + 1);

      $this->bnestado_codest = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnmunicip object", $e);
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
			$con = Propel::getConnection(BnmunicipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnmunicipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnmunicipPeer::DATABASE_NAME);
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


												
			if ($this->aBnestado !== null) {
				if ($this->aBnestado->isModified()) {
					$affectedRows += $this->aBnestado->save($con);
				}
				$this->setBnestado($this->aBnestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BnmunicipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnmunicipPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collBnparroqs !== null) {
				foreach($this->collBnparroqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collBnciudads !== null) {
				foreach($this->collBnciudads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aBnestado !== null) {
				if (!$this->aBnestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBnestado->getValidationFailures());
				}
			}


			if (($retval = BnmunicipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBnparroqs !== null) {
					foreach($this->collBnparroqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collBnciudads !== null) {
					foreach($this->collBnciudads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnmunicipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmun();
				break;
			case 1:
				return $this->getNommun();
				break;
			case 2:
				return $this->getBnestadoCodest();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnmunicipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmun(),
			$keys[1] => $this->getNommun(),
			$keys[2] => $this->getBnestadoCodest(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnmunicipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmun($value);
				break;
			case 1:
				$this->setNommun($value);
				break;
			case 2:
				$this->setBnestadoCodest($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnmunicipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmun($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBnestadoCodest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnmunicipPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnmunicipPeer::CODMUN)) $criteria->add(BnmunicipPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(BnmunicipPeer::NOMMUN)) $criteria->add(BnmunicipPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(BnmunicipPeer::BNESTADO_CODEST)) $criteria->add(BnmunicipPeer::BNESTADO_CODEST, $this->bnestado_codest);
		if ($this->isColumnModified(BnmunicipPeer::ID)) $criteria->add(BnmunicipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnmunicipPeer::DATABASE_NAME);

		$criteria->add(BnmunicipPeer::ID, $this->id);

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

		$copyObj->setCodmun($this->codmun);

		$copyObj->setNommun($this->nommun);

		$copyObj->setBnestadoCodest($this->bnestado_codest);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getBnparroqs() as $relObj) {
				$copyObj->addBnparroq($relObj->copy($deepCopy));
			}

			foreach($this->getBnciudads() as $relObj) {
				$copyObj->addBnciudad($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new BnmunicipPeer();
		}
		return self::$peer;
	}

	
	public function setBnestado($v)
	{


		if ($v === null) {
			$this->setBnestadoCodest(NULL);
		} else {
			$this->setBnestadoCodest($v->getCodest());
		}


		$this->aBnestado = $v;
	}


	
	public function getBnestado($con = null)
	{
		if ($this->aBnestado === null && (($this->bnestado_codest !== "" && $this->bnestado_codest !== null))) {
						include_once 'lib/model/om/BaseBnestadoPeer.php';

      $c = new Criteria();
      $c->add(BnestadoPeer::CODEST,$this->bnestado_codest);
      
			$this->aBnestado = BnestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aBnestado;
	}

	
	public function initBnparroqs()
	{
		if ($this->collBnparroqs === null) {
			$this->collBnparroqs = array();
		}
	}

	
	public function getBnparroqs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBnparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBnparroqs === null) {
			if ($this->isNew()) {
			   $this->collBnparroqs = array();
			} else {

				$criteria->add(BnparroqPeer::BNMUNICIP_CODMUN, $this->getCodmun());

				BnparroqPeer::addSelectColumns($criteria);
				$this->collBnparroqs = BnparroqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BnparroqPeer::BNMUNICIP_CODMUN, $this->getCodmun());

				BnparroqPeer::addSelectColumns($criteria);
				if (!isset($this->lastBnparroqCriteria) || !$this->lastBnparroqCriteria->equals($criteria)) {
					$this->collBnparroqs = BnparroqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBnparroqCriteria = $criteria;
		return $this->collBnparroqs;
	}

	
	public function countBnparroqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBnparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BnparroqPeer::BNMUNICIP_CODMUN, $this->getCodmun());

		return BnparroqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBnparroq(Bnparroq $l)
	{
		$this->collBnparroqs[] = $l;
		$l->setBnmunicip($this);
	}

	
	public function initBnciudads()
	{
		if ($this->collBnciudads === null) {
			$this->collBnciudads = array();
		}
	}

	
	public function getBnciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBnciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBnciudads === null) {
			if ($this->isNew()) {
			   $this->collBnciudads = array();
			} else {

				$criteria->add(BnciudadPeer::BNMUNICIP_CODMUN, $this->getCodmun());

				BnciudadPeer::addSelectColumns($criteria);
				$this->collBnciudads = BnciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BnciudadPeer::BNMUNICIP_CODMUN, $this->getCodmun());

				BnciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastBnciudadCriteria) || !$this->lastBnciudadCriteria->equals($criteria)) {
					$this->collBnciudads = BnciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBnciudadCriteria = $criteria;
		return $this->collBnciudads;
	}

	
	public function countBnciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBnciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BnciudadPeer::BNMUNICIP_CODMUN, $this->getCodmun());

		return BnciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBnciudad(Bnciudad $l)
	{
		$this->collBnciudads[] = $l;
		$l->setBnmunicip($this);
	}

} 