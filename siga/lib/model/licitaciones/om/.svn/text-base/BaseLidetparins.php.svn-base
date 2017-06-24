<?php


abstract class BaseLidetparins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numins;


	
	protected $lidetparval_id;


	
	protected $cantidins;


	
	protected $subtotins;


	
	protected $aprobado;


	
	protected $id;

	
	protected $aLiinspecciones;

	
	protected $aLidetparval;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumins()
  {

    return trim($this->numins);

  }
  
  public function getLidetparvalId()
  {

    return $this->lidetparval_id;

  }
  
  public function getCantidins($val=false)
  {

    if($val) return number_format($this->cantidins,2,',','.');
    else return $this->cantidins;

  }
  
  public function getSubtotins($val=false)
  {

    if($val) return number_format($this->subtotins,2,',','.');
    else return $this->subtotins;

  }
  
  public function getAprobado()
  {

    return $this->aprobado;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumins($v)
	{

    if ($this->numins !== $v) {
        $this->numins = $v;
        $this->modifiedColumns[] = LidetparinsPeer::NUMINS;
      }
  
		if ($this->aLiinspecciones !== null && $this->aLiinspecciones->getNumins() !== $v) {
			$this->aLiinspecciones = null;
		}

	} 
	
	public function setLidetparvalId($v)
	{

    if ($this->lidetparval_id !== $v) {
        $this->lidetparval_id = $v;
        $this->modifiedColumns[] = LidetparinsPeer::LIDETPARVAL_ID;
      }
  
		if ($this->aLidetparval !== null && $this->aLidetparval->getId() !== $v) {
			$this->aLidetparval = null;
		}

	} 
	
	public function setCantidins($v)
	{

    if ($this->cantidins !== $v) {
        $this->cantidins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparinsPeer::CANTIDINS;
      }
  
	} 
	
	public function setSubtotins($v)
	{

    if ($this->subtotins !== $v) {
        $this->subtotins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparinsPeer::SUBTOTINS;
      }
  
	} 
	
	public function setAprobado($v)
	{

    if ($this->aprobado !== $v) {
        $this->aprobado = $v;
        $this->modifiedColumns[] = LidetparinsPeer::APROBADO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetparinsPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numins = $rs->getString($startcol + 0);

      $this->lidetparval_id = $rs->getInt($startcol + 1);

      $this->cantidins = $rs->getFloat($startcol + 2);

      $this->subtotins = $rs->getFloat($startcol + 3);

      $this->aprobado = $rs->getBoolean($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetparins object", $e);
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
			$con = Propel::getConnection(LidetparinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetparinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetparinsPeer::DATABASE_NAME);
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


												
			if ($this->aLiinspecciones !== null) {
				if ($this->aLiinspecciones->isModified()) {
					$affectedRows += $this->aLiinspecciones->save($con);
				}
				$this->setLiinspecciones($this->aLiinspecciones);
			}

			if ($this->aLidetparval !== null) {
				if ($this->aLidetparval->isModified()) {
					$affectedRows += $this->aLidetparval->save($con);
				}
				$this->setLidetparval($this->aLidetparval);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetparinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetparinsPeer::doUpdate($this, $con);
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


												
			if ($this->aLiinspecciones !== null) {
				if (!$this->aLiinspecciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiinspecciones->getValidationFailures());
				}
			}

			if ($this->aLidetparval !== null) {
				if (!$this->aLidetparval->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidetparval->getValidationFailures());
				}
			}


			if (($retval = LidetparinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetparinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumins();
				break;
			case 1:
				return $this->getLidetparvalId();
				break;
			case 2:
				return $this->getCantidins();
				break;
			case 3:
				return $this->getSubtotins();
				break;
			case 4:
				return $this->getAprobado();
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
		$keys = LidetparinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumins(),
			$keys[1] => $this->getLidetparvalId(),
			$keys[2] => $this->getCantidins(),
			$keys[3] => $this->getSubtotins(),
			$keys[4] => $this->getAprobado(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetparinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumins($value);
				break;
			case 1:
				$this->setLidetparvalId($value);
				break;
			case 2:
				$this->setCantidins($value);
				break;
			case 3:
				$this->setSubtotins($value);
				break;
			case 4:
				$this->setAprobado($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetparinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLidetparvalId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantidins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSubtotins($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAprobado($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetparinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetparinsPeer::NUMINS)) $criteria->add(LidetparinsPeer::NUMINS, $this->numins);
		if ($this->isColumnModified(LidetparinsPeer::LIDETPARVAL_ID)) $criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->lidetparval_id);
		if ($this->isColumnModified(LidetparinsPeer::CANTIDINS)) $criteria->add(LidetparinsPeer::CANTIDINS, $this->cantidins);
		if ($this->isColumnModified(LidetparinsPeer::SUBTOTINS)) $criteria->add(LidetparinsPeer::SUBTOTINS, $this->subtotins);
		if ($this->isColumnModified(LidetparinsPeer::APROBADO)) $criteria->add(LidetparinsPeer::APROBADO, $this->aprobado);
		if ($this->isColumnModified(LidetparinsPeer::ID)) $criteria->add(LidetparinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetparinsPeer::DATABASE_NAME);

		$criteria->add(LidetparinsPeer::ID, $this->id);

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

		$copyObj->setNumins($this->numins);

		$copyObj->setLidetparvalId($this->lidetparval_id);

		$copyObj->setCantidins($this->cantidins);

		$copyObj->setSubtotins($this->subtotins);

		$copyObj->setAprobado($this->aprobado);


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
			self::$peer = new LidetparinsPeer();
		}
		return self::$peer;
	}

	
	public function setLiinspecciones($v)
	{


		if ($v === null) {
			$this->setNumins(NULL);
		} else {
			$this->setNumins($v->getNumins());
		}


		$this->aLiinspecciones = $v;
	}


	
	public function getLiinspecciones($con = null)
	{
		if ($this->aLiinspecciones === null && (($this->numins !== "" && $this->numins !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';

      $c = new Criteria();
      $c->add(LiinspeccionesPeer::NUMINS,$this->numins);
      
			$this->aLiinspecciones = LiinspeccionesPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiinspecciones;
	}

	
	public function setLidetparval($v)
	{


		if ($v === null) {
			$this->setLidetparvalId(NULL);
		} else {
			$this->setLidetparvalId($v->getId());
		}


		$this->aLidetparval = $v;
	}


	
	public function getLidetparval($con = null)
	{
		if ($this->aLidetparval === null && ($this->lidetparval_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLidetparvalPeer.php';

      $c = new Criteria();
      $c->add(LidetparvalPeer::ID,$this->lidetparval_id);
      
			$this->aLidetparval = LidetparvalPeer::doSelectOne($c, $con);

			
		}
		return $this->aLidetparval;
	}

} 