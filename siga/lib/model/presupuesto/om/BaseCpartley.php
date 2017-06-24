<?php


abstract class BaseCpartley extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $desart;


	
	protected $nomabr;


	
	protected $stacon;


	
	protected $stagob;


	
	protected $stapre;


	
	protected $staniv4;


	
	protected $staniv5;


	
	protected $staniv6;


	
	protected $portra;


	
	protected $id;

	
	protected $collCpsoltraslas;

	
	protected $lastCpsoltraslaCriteria = null;

	
	protected $collCpsoladidiss;

	
	protected $lastCpsoladidisCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getStagob()
  {

    return trim($this->stagob);

  }
  
  public function getStapre()
  {

    return trim($this->stapre);

  }
  
  public function getStaniv4()
  {

    return trim($this->staniv4);

  }
  
  public function getStaniv5()
  {

    return trim($this->staniv5);

  }
  
  public function getStaniv6()
  {

    return trim($this->staniv6);

  }
  
  public function getPortra($val=false)
  {

    if($val) return number_format($this->portra,2,',','.');
    else return $this->portra;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CpartleyPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CpartleyPeer::DESART;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CpartleyPeer::NOMABR;
      }
  
	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = CpartleyPeer::STACON;
      }
  
	} 
	
	public function setStagob($v)
	{

    if ($this->stagob !== $v) {
        $this->stagob = $v;
        $this->modifiedColumns[] = CpartleyPeer::STAGOB;
      }
  
	} 
	
	public function setStapre($v)
	{

    if ($this->stapre !== $v) {
        $this->stapre = $v;
        $this->modifiedColumns[] = CpartleyPeer::STAPRE;
      }
  
	} 
	
	public function setStaniv4($v)
	{

    if ($this->staniv4 !== $v) {
        $this->staniv4 = $v;
        $this->modifiedColumns[] = CpartleyPeer::STANIV4;
      }
  
	} 
	
	public function setStaniv5($v)
	{

    if ($this->staniv5 !== $v) {
        $this->staniv5 = $v;
        $this->modifiedColumns[] = CpartleyPeer::STANIV5;
      }
  
	} 
	
	public function setStaniv6($v)
	{

    if ($this->staniv6 !== $v) {
        $this->staniv6 = $v;
        $this->modifiedColumns[] = CpartleyPeer::STANIV6;
      }
  
	} 
	
	public function setPortra($v)
	{

    if ($this->portra !== $v) {
        $this->portra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpartleyPeer::PORTRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpartleyPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->desart = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->stacon = $rs->getString($startcol + 3);

      $this->stagob = $rs->getString($startcol + 4);

      $this->stapre = $rs->getString($startcol + 5);

      $this->staniv4 = $rs->getString($startcol + 6);

      $this->staniv5 = $rs->getString($startcol + 7);

      $this->staniv6 = $rs->getString($startcol + 8);

      $this->portra = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpartley object", $e);
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
			$con = Propel::getConnection(CpartleyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpartleyPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpartleyPeer::DATABASE_NAME);
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
					$pk = CpartleyPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpartleyPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpsoltraslas !== null) {
				foreach($this->collCpsoltraslas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpsoladidiss !== null) {
				foreach($this->collCpsoladidiss as $referrerFK) {
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


			if (($retval = CpartleyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpsoltraslas !== null) {
					foreach($this->collCpsoltraslas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpsoladidiss !== null) {
					foreach($this->collCpsoladidiss as $referrerFK) {
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
		$pos = CpartleyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getDesart();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getStacon();
				break;
			case 4:
				return $this->getStagob();
				break;
			case 5:
				return $this->getStapre();
				break;
			case 6:
				return $this->getStaniv4();
				break;
			case 7:
				return $this->getStaniv5();
				break;
			case 8:
				return $this->getStaniv6();
				break;
			case 9:
				return $this->getPortra();
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
		$keys = CpartleyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getDesart(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getStacon(),
			$keys[4] => $this->getStagob(),
			$keys[5] => $this->getStapre(),
			$keys[6] => $this->getStaniv4(),
			$keys[7] => $this->getStaniv5(),
			$keys[8] => $this->getStaniv6(),
			$keys[9] => $this->getPortra(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpartleyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setDesart($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setStacon($value);
				break;
			case 4:
				$this->setStagob($value);
				break;
			case 5:
				$this->setStapre($value);
				break;
			case 6:
				$this->setStaniv4($value);
				break;
			case 7:
				$this->setStaniv5($value);
				break;
			case 8:
				$this->setStaniv6($value);
				break;
			case 9:
				$this->setPortra($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpartleyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStagob($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStapre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStaniv4($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaniv5($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStaniv6($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPortra($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpartleyPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpartleyPeer::CODART)) $criteria->add(CpartleyPeer::CODART, $this->codart);
		if ($this->isColumnModified(CpartleyPeer::DESART)) $criteria->add(CpartleyPeer::DESART, $this->desart);
		if ($this->isColumnModified(CpartleyPeer::NOMABR)) $criteria->add(CpartleyPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpartleyPeer::STACON)) $criteria->add(CpartleyPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpartleyPeer::STAGOB)) $criteria->add(CpartleyPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpartleyPeer::STAPRE)) $criteria->add(CpartleyPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpartleyPeer::STANIV4)) $criteria->add(CpartleyPeer::STANIV4, $this->staniv4);
		if ($this->isColumnModified(CpartleyPeer::STANIV5)) $criteria->add(CpartleyPeer::STANIV5, $this->staniv5);
		if ($this->isColumnModified(CpartleyPeer::STANIV6)) $criteria->add(CpartleyPeer::STANIV6, $this->staniv6);
		if ($this->isColumnModified(CpartleyPeer::PORTRA)) $criteria->add(CpartleyPeer::PORTRA, $this->portra);
		if ($this->isColumnModified(CpartleyPeer::ID)) $criteria->add(CpartleyPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpartleyPeer::DATABASE_NAME);

		$criteria->add(CpartleyPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setStacon($this->stacon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setStaniv4($this->staniv4);

		$copyObj->setStaniv5($this->staniv5);

		$copyObj->setStaniv6($this->staniv6);

		$copyObj->setPortra($this->portra);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpsoltraslas() as $relObj) {
				$copyObj->addCpsoltrasla($relObj->copy($deepCopy));
			}

			foreach($this->getCpsoladidiss() as $relObj) {
				$copyObj->addCpsoladidis($relObj->copy($deepCopy));
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
			self::$peer = new CpartleyPeer();
		}
		return self::$peer;
	}

	
	public function initCpsoltraslas()
	{
		if ($this->collCpsoltraslas === null) {
			$this->collCpsoltraslas = array();
		}
	}

	
	public function getCpsoltraslas($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoltraslaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoltraslas === null) {
			if ($this->isNew()) {
			   $this->collCpsoltraslas = array();
			} else {

				$criteria->add(CpsoltraslaPeer::CODART, $this->getCodart());

				CpsoltraslaPeer::addSelectColumns($criteria);
				$this->collCpsoltraslas = CpsoltraslaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsoltraslaPeer::CODART, $this->getCodart());

				CpsoltraslaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsoltraslaCriteria) || !$this->lastCpsoltraslaCriteria->equals($criteria)) {
					$this->collCpsoltraslas = CpsoltraslaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsoltraslaCriteria = $criteria;
		return $this->collCpsoltraslas;
	}

	
	public function countCpsoltraslas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoltraslaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsoltraslaPeer::CODART, $this->getCodart());

		return CpsoltraslaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsoltrasla(Cpsoltrasla $l)
	{
		$this->collCpsoltraslas[] = $l;
		$l->setCpartley($this);
	}

	
	public function initCpsoladidiss()
	{
		if ($this->collCpsoladidiss === null) {
			$this->collCpsoladidiss = array();
		}
	}

	
	public function getCpsoladidiss($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoladidiss === null) {
			if ($this->isNew()) {
			   $this->collCpsoladidiss = array();
			} else {

				$criteria->add(CpsoladidisPeer::CODART, $this->getCodart());

				CpsoladidisPeer::addSelectColumns($criteria);
				$this->collCpsoladidiss = CpsoladidisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsoladidisPeer::CODART, $this->getCodart());

				CpsoladidisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsoladidisCriteria) || !$this->lastCpsoladidisCriteria->equals($criteria)) {
					$this->collCpsoladidiss = CpsoladidisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsoladidisCriteria = $criteria;
		return $this->collCpsoladidiss;
	}

	
	public function countCpsoladidiss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsoladidisPeer::CODART, $this->getCodart());

		return CpsoladidisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsoladidis(Cpsoladidis $l)
	{
		$this->collCpsoladidiss[] = $l;
		$l->setCpartley($this);
	}

} 