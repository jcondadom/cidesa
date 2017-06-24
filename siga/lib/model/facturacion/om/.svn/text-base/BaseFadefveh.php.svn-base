<?php


abstract class BaseFadefveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $plaveh;


	
	protected $marca;


	
	protected $tipo;


	
	protected $color;


	
	protected $codemptra;


	
	protected $id;

	
	protected $aFaemptra;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getPlaveh()
  {

    return trim($this->plaveh);

  }
  
  public function getMarca()
  {

    return trim($this->marca);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getColor()
  {

    return trim($this->color);

  }
  
  public function getCodemptra()
  {

    return trim($this->codemptra);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setPlaveh($v)
	{

    if ($this->plaveh !== $v) {
        $this->plaveh = $v;
        $this->modifiedColumns[] = FadefvehPeer::PLAVEH;
      }
  
	} 
	
	public function setMarca($v)
	{

    if ($this->marca !== $v) {
        $this->marca = $v;
        $this->modifiedColumns[] = FadefvehPeer::MARCA;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FadefvehPeer::TIPO;
      }
  
	} 
	
	public function setColor($v)
	{

    if ($this->color !== $v) {
        $this->color = $v;
        $this->modifiedColumns[] = FadefvehPeer::COLOR;
      }
  
	} 
	
	public function setCodemptra($v)
	{

    if ($this->codemptra !== $v) {
        $this->codemptra = $v;
        $this->modifiedColumns[] = FadefvehPeer::CODEMPTRA;
      }
  
		if ($this->aFaemptra !== null && $this->aFaemptra->getCodemptra() !== $v) {
			$this->aFaemptra = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefvehPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->plaveh = $rs->getString($startcol + 0);

      $this->marca = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->color = $rs->getString($startcol + 3);

      $this->codemptra = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefveh object", $e);
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
			$con = Propel::getConnection(FadefvehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefvehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefvehPeer::DATABASE_NAME);
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


												
			if ($this->aFaemptra !== null) {
				if ($this->aFaemptra->isModified()) {
					$affectedRows += $this->aFaemptra->save($con);
				}
				$this->setFaemptra($this->aFaemptra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadefvehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefvehPeer::doUpdate($this, $con);
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


												
			if ($this->aFaemptra !== null) {
				if (!$this->aFaemptra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaemptra->getValidationFailures());
				}
			}


			if (($retval = FadefvehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPlaveh();
				break;
			case 1:
				return $this->getMarca();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getColor();
				break;
			case 4:
				return $this->getCodemptra();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefvehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPlaveh(),
			$keys[1] => $this->getMarca(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getColor(),
			$keys[4] => $this->getCodemptra(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPlaveh($value);
				break;
			case 1:
				$this->setMarca($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setColor($value);
				break;
			case 4:
				$this->setCodemptra($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefvehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPlaveh($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMarca($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setColor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodemptra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefvehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefvehPeer::PLAVEH)) $criteria->add(FadefvehPeer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(FadefvehPeer::MARCA)) $criteria->add(FadefvehPeer::MARCA, $this->marca);
		if ($this->isColumnModified(FadefvehPeer::TIPO)) $criteria->add(FadefvehPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FadefvehPeer::COLOR)) $criteria->add(FadefvehPeer::COLOR, $this->color);
		if ($this->isColumnModified(FadefvehPeer::CODEMPTRA)) $criteria->add(FadefvehPeer::CODEMPTRA, $this->codemptra);
		if ($this->isColumnModified(FadefvehPeer::ID)) $criteria->add(FadefvehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefvehPeer::DATABASE_NAME);

		$criteria->add(FadefvehPeer::ID, $this->id);

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

		$copyObj->setPlaveh($this->plaveh);

		$copyObj->setMarca($this->marca);

		$copyObj->setTipo($this->tipo);

		$copyObj->setColor($this->color);

		$copyObj->setCodemptra($this->codemptra);


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
			self::$peer = new FadefvehPeer();
		}
		return self::$peer;
	}

	
	public function setFaemptra($v)
	{


		if ($v === null) {
			$this->setCodemptra(NULL);
		} else {
			$this->setCodemptra($v->getCodemptra());
		}


		$this->aFaemptra = $v;
	}


	
	public function getFaemptra($con = null)
	{
		if ($this->aFaemptra === null && (($this->codemptra !== "" && $this->codemptra !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaemptraPeer.php';

      $c = new Criteria();
      $c->add(FaemptraPeer::CODEMPTRA,$this->codemptra);
      
			$this->aFaemptra = FaemptraPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaemptra;
	}

} 