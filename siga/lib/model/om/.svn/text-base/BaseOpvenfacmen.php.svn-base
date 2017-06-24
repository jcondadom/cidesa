<?php


abstract class BaseOpvenfacmen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mes;


	
	protected $mongra;


	
	protected $mosgra;


	
	protected $totmes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getMes()
  {

    return trim($this->mes);

  }
  
  public function getMongra($val=false)
  {

    if($val) return number_format($this->mongra,2,',','.');
    else return $this->mongra;

  }
  
  public function getMosgra($val=false)
  {

    if($val) return number_format($this->mosgra,2,',','.');
    else return $this->mosgra;

  }
  
  public function getTotmes($val=false)
  {

    if($val) return number_format($this->totmes,2,',','.');
    else return $this->totmes;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = OpvenfacmenPeer::MES;
      }
  
	} 
	
	public function setMongra($v)
	{

    if ($this->mongra !== $v) {
        $this->mongra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpvenfacmenPeer::MONGRA;
      }
  
	} 
	
	public function setMosgra($v)
	{

    if ($this->mosgra !== $v) {
        $this->mosgra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpvenfacmenPeer::MOSGRA;
      }
  
	} 
	
	public function setTotmes($v)
	{

    if ($this->totmes !== $v) {
        $this->totmes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpvenfacmenPeer::TOTMES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpvenfacmenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->mes = $rs->getString($startcol + 0);

      $this->mongra = $rs->getFloat($startcol + 1);

      $this->mosgra = $rs->getFloat($startcol + 2);

      $this->totmes = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opvenfacmen object", $e);
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
			$con = Propel::getConnection(OpvenfacmenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpvenfacmenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpvenfacmenPeer::DATABASE_NAME);
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
					$pk = OpvenfacmenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpvenfacmenPeer::doUpdate($this, $con);
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


			if (($retval = OpvenfacmenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpvenfacmenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMes();
				break;
			case 1:
				return $this->getMongra();
				break;
			case 2:
				return $this->getMosgra();
				break;
			case 3:
				return $this->getTotmes();
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
		$keys = OpvenfacmenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMes(),
			$keys[1] => $this->getMongra(),
			$keys[2] => $this->getMosgra(),
			$keys[3] => $this->getTotmes(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpvenfacmenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMes($value);
				break;
			case 1:
				$this->setMongra($value);
				break;
			case 2:
				$this->setMosgra($value);
				break;
			case 3:
				$this->setTotmes($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpvenfacmenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMongra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMosgra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotmes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpvenfacmenPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpvenfacmenPeer::MES)) $criteria->add(OpvenfacmenPeer::MES, $this->mes);
		if ($this->isColumnModified(OpvenfacmenPeer::MONGRA)) $criteria->add(OpvenfacmenPeer::MONGRA, $this->mongra);
		if ($this->isColumnModified(OpvenfacmenPeer::MOSGRA)) $criteria->add(OpvenfacmenPeer::MOSGRA, $this->mosgra);
		if ($this->isColumnModified(OpvenfacmenPeer::TOTMES)) $criteria->add(OpvenfacmenPeer::TOTMES, $this->totmes);
		if ($this->isColumnModified(OpvenfacmenPeer::ID)) $criteria->add(OpvenfacmenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpvenfacmenPeer::DATABASE_NAME);

		$criteria->add(OpvenfacmenPeer::ID, $this->id);

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

		$copyObj->setMes($this->mes);

		$copyObj->setMongra($this->mongra);

		$copyObj->setMosgra($this->mosgra);

		$copyObj->setTotmes($this->totmes);


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
			self::$peer = new OpvenfacmenPeer();
		}
		return self::$peer;
	}

} 