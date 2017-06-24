<?php


abstract class BaseFacorrelat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $corpre;


	
	protected $corped;


	
	protected $corfac;


	
	protected $cornot;


	
	protected $cordph;


	
	protected $cordev;


	
	protected $coraju;


	
	protected $codpro;


	
	protected $proform;


	
	protected $corfaccont;


	
	protected $codprgd;


	
	protected $conpagd_id;


	
	protected $corprerot;


	
	protected $corprepat;


	
	protected $blonumfac;


	
	protected $corantcli;


	
	protected $fatipmov_id;


	
	protected $firprep1;


	
	protected $carprep1;


	
	protected $firprep2;


	
	protected $carprep2;


	
	protected $firprep3;


	
	protected $carprep3;


	
	protected $nomreppre;


	
	protected $cosmanobr;


	
	protected $porgasadm;


	
	protected $porutilid;


	
	protected $porcarfab;


	
	protected $fatipmov_deb_id;


	
	protected $id;

	
	protected $aFatipmovRelatedByFatipmovId;

	
	protected $aFatipmovRelatedByFatipmovDebId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCorpre($val=false)
  {

    if($val) return number_format($this->corpre,2,',','.');
    else return $this->corpre;

  }
  
  public function getCorped($val=false)
  {

    if($val) return number_format($this->corped,2,',','.');
    else return $this->corped;

  }
  
  public function getCorfac($val=false)
  {

    if($val) return number_format($this->corfac,2,',','.');
    else return $this->corfac;

  }
  
  public function getCornot($val=false)
  {

    if($val) return number_format($this->cornot,2,',','.');
    else return $this->cornot;

  }
  
  public function getCordph($val=false)
  {

    if($val) return number_format($this->cordph,2,',','.');
    else return $this->cordph;

  }
  
  public function getCordev($val=false)
  {

    if($val) return number_format($this->cordev,2,',','.');
    else return $this->cordev;

  }
  
  public function getCoraju($val=false)
  {

    if($val) return number_format($this->coraju,2,',','.');
    else return $this->coraju;

  }
  
  public function getCodpro($val=false)
  {

    if($val) return number_format($this->codpro,2,',','.');
    else return $this->codpro;

  }
  
  public function getProform()
  {

    return trim($this->proform);

  }
  
  public function getCorfaccont($val=false)
  {

    if($val) return number_format($this->corfaccont,2,',','.');
    else return $this->corfaccont;

  }
  
  public function getCodprgd()
  {

    return trim($this->codprgd);

  }
  
  public function getConpagdId()
  {

    return $this->conpagd_id;

  }
  
  public function getCorprerot()
  {

    return $this->corprerot;

  }
  
  public function getCorprepat()
  {

    return $this->corprepat;

  }
  
  public function getBlonumfac()
  {

    return $this->blonumfac;

  }
  
  public function getCorantcli()
  {

    return $this->corantcli;

  }
  
  public function getFatipmovId()
  {

    return $this->fatipmov_id;

  }
  
  public function getFirprep1()
  {

    return trim($this->firprep1);

  }
  
  public function getCarprep1()
  {

    return trim($this->carprep1);

  }
  
  public function getFirprep2()
  {

    return trim($this->firprep2);

  }
  
  public function getCarprep2()
  {

    return trim($this->carprep2);

  }
  
  public function getFirprep3()
  {

    return trim($this->firprep3);

  }
  
  public function getCarprep3()
  {

    return trim($this->carprep3);

  }
  
  public function getNomreppre()
  {

    return trim($this->nomreppre);

  }
  
  public function getCosmanobr($val=false)
  {

    if($val) return number_format($this->cosmanobr,2,',','.');
    else return $this->cosmanobr;

  }
  
  public function getPorgasadm($val=false)
  {

    if($val) return number_format($this->porgasadm,2,',','.');
    else return $this->porgasadm;

  }
  
  public function getPorutilid($val=false)
  {

    if($val) return number_format($this->porutilid,2,',','.');
    else return $this->porutilid;

  }
  
  public function getPorcarfab($val=false)
  {

    if($val) return number_format($this->porcarfab,2,',','.');
    else return $this->porcarfab;

  }
  
  public function getFatipmovDebId()
  {

    return $this->fatipmov_deb_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCorpre($v)
	{

    if ($this->corpre !== $v) {
        $this->corpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORPRE;
      }
  
	} 
	
	public function setCorped($v)
	{

    if ($this->corped !== $v) {
        $this->corped = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORPED;
      }
  
	} 
	
	public function setCorfac($v)
	{

    if ($this->corfac !== $v) {
        $this->corfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORFAC;
      }
  
	} 
	
	public function setCornot($v)
	{

    if ($this->cornot !== $v) {
        $this->cornot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORNOT;
      }
  
	} 
	
	public function setCordph($v)
	{

    if ($this->cordph !== $v) {
        $this->cordph = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORDPH;
      }
  
	} 
	
	public function setCordev($v)
	{

    if ($this->cordev !== $v) {
        $this->cordev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORDEV;
      }
  
	} 
	
	public function setCoraju($v)
	{

    if ($this->coraju !== $v) {
        $this->coraju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORAJU;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CODPRO;
      }
  
	} 
	
	public function setProform($v)
	{

    if ($this->proform !== $v) {
        $this->proform = $v;
        $this->modifiedColumns[] = FacorrelatPeer::PROFORM;
      }
  
	} 
	
	public function setCorfaccont($v)
	{

    if ($this->corfaccont !== $v) {
        $this->corfaccont = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::CORFACCONT;
      }
  
	} 
	
	public function setCodprgd($v)
	{

    if ($this->codprgd !== $v) {
        $this->codprgd = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CODPRGD;
      }
  
	} 
	
	public function setConpagdId($v)
	{

    if ($this->conpagd_id !== $v) {
        $this->conpagd_id = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CONPAGD_ID;
      }
  
	} 
	
	public function setCorprerot($v)
	{

    if ($this->corprerot !== $v) {
        $this->corprerot = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CORPREROT;
      }
  
	} 
	
	public function setCorprepat($v)
	{

    if ($this->corprepat !== $v) {
        $this->corprepat = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CORPREPAT;
      }
  
	} 
	
	public function setBlonumfac($v)
	{

    if ($this->blonumfac !== $v) {
        $this->blonumfac = $v;
        $this->modifiedColumns[] = FacorrelatPeer::BLONUMFAC;
      }
  
	} 
	
	public function setCorantcli($v)
	{

    if ($this->corantcli !== $v) {
        $this->corantcli = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CORANTCLI;
      }
  
	} 
	
	public function setFatipmovId($v)
	{

    if ($this->fatipmov_id !== $v) {
        $this->fatipmov_id = $v;
        $this->modifiedColumns[] = FacorrelatPeer::FATIPMOV_ID;
      }
  
		if ($this->aFatipmovRelatedByFatipmovId !== null && $this->aFatipmovRelatedByFatipmovId->getId() !== $v) {
			$this->aFatipmovRelatedByFatipmovId = null;
		}

	} 
	
	public function setFirprep1($v)
	{

    if ($this->firprep1 !== $v) {
        $this->firprep1 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::FIRPREP1;
      }
  
	} 
	
	public function setCarprep1($v)
	{

    if ($this->carprep1 !== $v) {
        $this->carprep1 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CARPREP1;
      }
  
	} 
	
	public function setFirprep2($v)
	{

    if ($this->firprep2 !== $v) {
        $this->firprep2 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::FIRPREP2;
      }
  
	} 
	
	public function setCarprep2($v)
	{

    if ($this->carprep2 !== $v) {
        $this->carprep2 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CARPREP2;
      }
  
	} 
	
	public function setFirprep3($v)
	{

    if ($this->firprep3 !== $v) {
        $this->firprep3 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::FIRPREP3;
      }
  
	} 
	
	public function setCarprep3($v)
	{

    if ($this->carprep3 !== $v) {
        $this->carprep3 = $v;
        $this->modifiedColumns[] = FacorrelatPeer::CARPREP3;
      }
  
	} 
	
	public function setNomreppre($v)
	{

    if ($this->nomreppre !== $v) {
        $this->nomreppre = $v;
        $this->modifiedColumns[] = FacorrelatPeer::NOMREPPRE;
      }
  
	} 
	
	public function setCosmanobr($v)
	{

    if ($this->cosmanobr !== $v) {
        $this->cosmanobr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::COSMANOBR;
      }
  
	} 
	
	public function setPorgasadm($v)
	{

    if ($this->porgasadm !== $v) {
        $this->porgasadm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::PORGASADM;
      }
  
	} 
	
	public function setPorutilid($v)
	{

    if ($this->porutilid !== $v) {
        $this->porutilid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::PORUTILID;
      }
  
	} 
	
	public function setPorcarfab($v)
	{

    if ($this->porcarfab !== $v) {
        $this->porcarfab = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacorrelatPeer::PORCARFAB;
      }
  
	} 
	
	public function setFatipmovDebId($v)
	{

    if ($this->fatipmov_deb_id !== $v) {
        $this->fatipmov_deb_id = $v;
        $this->modifiedColumns[] = FacorrelatPeer::FATIPMOV_DEB_ID;
      }
  
		if ($this->aFatipmovRelatedByFatipmovDebId !== null && $this->aFatipmovRelatedByFatipmovDebId->getId() !== $v) {
			$this->aFatipmovRelatedByFatipmovDebId = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacorrelatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->corpre = $rs->getFloat($startcol + 0);

      $this->corped = $rs->getFloat($startcol + 1);

      $this->corfac = $rs->getFloat($startcol + 2);

      $this->cornot = $rs->getFloat($startcol + 3);

      $this->cordph = $rs->getFloat($startcol + 4);

      $this->cordev = $rs->getFloat($startcol + 5);

      $this->coraju = $rs->getFloat($startcol + 6);

      $this->codpro = $rs->getFloat($startcol + 7);

      $this->proform = $rs->getString($startcol + 8);

      $this->corfaccont = $rs->getFloat($startcol + 9);

      $this->codprgd = $rs->getString($startcol + 10);

      $this->conpagd_id = $rs->getInt($startcol + 11);

      $this->corprerot = $rs->getInt($startcol + 12);

      $this->corprepat = $rs->getInt($startcol + 13);

      $this->blonumfac = $rs->getBoolean($startcol + 14);

      $this->corantcli = $rs->getInt($startcol + 15);

      $this->fatipmov_id = $rs->getInt($startcol + 16);

      $this->firprep1 = $rs->getString($startcol + 17);

      $this->carprep1 = $rs->getString($startcol + 18);

      $this->firprep2 = $rs->getString($startcol + 19);

      $this->carprep2 = $rs->getString($startcol + 20);

      $this->firprep3 = $rs->getString($startcol + 21);

      $this->carprep3 = $rs->getString($startcol + 22);

      $this->nomreppre = $rs->getString($startcol + 23);

      $this->cosmanobr = $rs->getFloat($startcol + 24);

      $this->porgasadm = $rs->getFloat($startcol + 25);

      $this->porutilid = $rs->getFloat($startcol + 26);

      $this->porcarfab = $rs->getFloat($startcol + 27);

      $this->fatipmov_deb_id = $rs->getInt($startcol + 28);

      $this->id = $rs->getInt($startcol + 29);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 30; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facorrelat object", $e);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacorrelatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacorrelatPeer::DATABASE_NAME);
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


												
			if ($this->aFatipmovRelatedByFatipmovId !== null) {
				if ($this->aFatipmovRelatedByFatipmovId->isModified()) {
					$affectedRows += $this->aFatipmovRelatedByFatipmovId->save($con);
				}
				$this->setFatipmovRelatedByFatipmovId($this->aFatipmovRelatedByFatipmovId);
			}

			if ($this->aFatipmovRelatedByFatipmovDebId !== null) {
				if ($this->aFatipmovRelatedByFatipmovDebId->isModified()) {
					$affectedRows += $this->aFatipmovRelatedByFatipmovDebId->save($con);
				}
				$this->setFatipmovRelatedByFatipmovDebId($this->aFatipmovRelatedByFatipmovDebId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FacorrelatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacorrelatPeer::doUpdate($this, $con);
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


												
			if ($this->aFatipmovRelatedByFatipmovId !== null) {
				if (!$this->aFatipmovRelatedByFatipmovId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipmovRelatedByFatipmovId->getValidationFailures());
				}
			}

			if ($this->aFatipmovRelatedByFatipmovDebId !== null) {
				if (!$this->aFatipmovRelatedByFatipmovDebId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipmovRelatedByFatipmovDebId->getValidationFailures());
				}
			}


			if (($retval = FacorrelatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCorpre();
				break;
			case 1:
				return $this->getCorped();
				break;
			case 2:
				return $this->getCorfac();
				break;
			case 3:
				return $this->getCornot();
				break;
			case 4:
				return $this->getCordph();
				break;
			case 5:
				return $this->getCordev();
				break;
			case 6:
				return $this->getCoraju();
				break;
			case 7:
				return $this->getCodpro();
				break;
			case 8:
				return $this->getProform();
				break;
			case 9:
				return $this->getCorfaccont();
				break;
			case 10:
				return $this->getCodprgd();
				break;
			case 11:
				return $this->getConpagdId();
				break;
			case 12:
				return $this->getCorprerot();
				break;
			case 13:
				return $this->getCorprepat();
				break;
			case 14:
				return $this->getBlonumfac();
				break;
			case 15:
				return $this->getCorantcli();
				break;
			case 16:
				return $this->getFatipmovId();
				break;
			case 17:
				return $this->getFirprep1();
				break;
			case 18:
				return $this->getCarprep1();
				break;
			case 19:
				return $this->getFirprep2();
				break;
			case 20:
				return $this->getCarprep2();
				break;
			case 21:
				return $this->getFirprep3();
				break;
			case 22:
				return $this->getCarprep3();
				break;
			case 23:
				return $this->getNomreppre();
				break;
			case 24:
				return $this->getCosmanobr();
				break;
			case 25:
				return $this->getPorgasadm();
				break;
			case 26:
				return $this->getPorutilid();
				break;
			case 27:
				return $this->getPorcarfab();
				break;
			case 28:
				return $this->getFatipmovDebId();
				break;
			case 29:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacorrelatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCorpre(),
			$keys[1] => $this->getCorped(),
			$keys[2] => $this->getCorfac(),
			$keys[3] => $this->getCornot(),
			$keys[4] => $this->getCordph(),
			$keys[5] => $this->getCordev(),
			$keys[6] => $this->getCoraju(),
			$keys[7] => $this->getCodpro(),
			$keys[8] => $this->getProform(),
			$keys[9] => $this->getCorfaccont(),
			$keys[10] => $this->getCodprgd(),
			$keys[11] => $this->getConpagdId(),
			$keys[12] => $this->getCorprerot(),
			$keys[13] => $this->getCorprepat(),
			$keys[14] => $this->getBlonumfac(),
			$keys[15] => $this->getCorantcli(),
			$keys[16] => $this->getFatipmovId(),
			$keys[17] => $this->getFirprep1(),
			$keys[18] => $this->getCarprep1(),
			$keys[19] => $this->getFirprep2(),
			$keys[20] => $this->getCarprep2(),
			$keys[21] => $this->getFirprep3(),
			$keys[22] => $this->getCarprep3(),
			$keys[23] => $this->getNomreppre(),
			$keys[24] => $this->getCosmanobr(),
			$keys[25] => $this->getPorgasadm(),
			$keys[26] => $this->getPorutilid(),
			$keys[27] => $this->getPorcarfab(),
			$keys[28] => $this->getFatipmovDebId(),
			$keys[29] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacorrelatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCorpre($value);
				break;
			case 1:
				$this->setCorped($value);
				break;
			case 2:
				$this->setCorfac($value);
				break;
			case 3:
				$this->setCornot($value);
				break;
			case 4:
				$this->setCordph($value);
				break;
			case 5:
				$this->setCordev($value);
				break;
			case 6:
				$this->setCoraju($value);
				break;
			case 7:
				$this->setCodpro($value);
				break;
			case 8:
				$this->setProform($value);
				break;
			case 9:
				$this->setCorfaccont($value);
				break;
			case 10:
				$this->setCodprgd($value);
				break;
			case 11:
				$this->setConpagdId($value);
				break;
			case 12:
				$this->setCorprerot($value);
				break;
			case 13:
				$this->setCorprepat($value);
				break;
			case 14:
				$this->setBlonumfac($value);
				break;
			case 15:
				$this->setCorantcli($value);
				break;
			case 16:
				$this->setFatipmovId($value);
				break;
			case 17:
				$this->setFirprep1($value);
				break;
			case 18:
				$this->setCarprep1($value);
				break;
			case 19:
				$this->setFirprep2($value);
				break;
			case 20:
				$this->setCarprep2($value);
				break;
			case 21:
				$this->setFirprep3($value);
				break;
			case 22:
				$this->setCarprep3($value);
				break;
			case 23:
				$this->setNomreppre($value);
				break;
			case 24:
				$this->setCosmanobr($value);
				break;
			case 25:
				$this->setPorgasadm($value);
				break;
			case 26:
				$this->setPorutilid($value);
				break;
			case 27:
				$this->setPorcarfab($value);
				break;
			case 28:
				$this->setFatipmovDebId($value);
				break;
			case 29:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacorrelatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCorpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorped($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCornot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCordph($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCordev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoraju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProform($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCorfaccont($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodprgd($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setConpagdId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCorprerot($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCorprepat($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBlonumfac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCorantcli($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFatipmovId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFirprep1($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCarprep1($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFirprep2($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCarprep2($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFirprep3($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCarprep3($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNomreppre($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCosmanobr($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPorgasadm($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPorutilid($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPorcarfab($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFatipmovDebId($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setId($arr[$keys[29]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacorrelatPeer::CORPRE)) $criteria->add(FacorrelatPeer::CORPRE, $this->corpre);
		if ($this->isColumnModified(FacorrelatPeer::CORPED)) $criteria->add(FacorrelatPeer::CORPED, $this->corped);
		if ($this->isColumnModified(FacorrelatPeer::CORFAC)) $criteria->add(FacorrelatPeer::CORFAC, $this->corfac);
		if ($this->isColumnModified(FacorrelatPeer::CORNOT)) $criteria->add(FacorrelatPeer::CORNOT, $this->cornot);
		if ($this->isColumnModified(FacorrelatPeer::CORDPH)) $criteria->add(FacorrelatPeer::CORDPH, $this->cordph);
		if ($this->isColumnModified(FacorrelatPeer::CORDEV)) $criteria->add(FacorrelatPeer::CORDEV, $this->cordev);
		if ($this->isColumnModified(FacorrelatPeer::CORAJU)) $criteria->add(FacorrelatPeer::CORAJU, $this->coraju);
		if ($this->isColumnModified(FacorrelatPeer::CODPRO)) $criteria->add(FacorrelatPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FacorrelatPeer::PROFORM)) $criteria->add(FacorrelatPeer::PROFORM, $this->proform);
		if ($this->isColumnModified(FacorrelatPeer::CORFACCONT)) $criteria->add(FacorrelatPeer::CORFACCONT, $this->corfaccont);
		if ($this->isColumnModified(FacorrelatPeer::CODPRGD)) $criteria->add(FacorrelatPeer::CODPRGD, $this->codprgd);
		if ($this->isColumnModified(FacorrelatPeer::CONPAGD_ID)) $criteria->add(FacorrelatPeer::CONPAGD_ID, $this->conpagd_id);
		if ($this->isColumnModified(FacorrelatPeer::CORPREROT)) $criteria->add(FacorrelatPeer::CORPREROT, $this->corprerot);
		if ($this->isColumnModified(FacorrelatPeer::CORPREPAT)) $criteria->add(FacorrelatPeer::CORPREPAT, $this->corprepat);
		if ($this->isColumnModified(FacorrelatPeer::BLONUMFAC)) $criteria->add(FacorrelatPeer::BLONUMFAC, $this->blonumfac);
		if ($this->isColumnModified(FacorrelatPeer::CORANTCLI)) $criteria->add(FacorrelatPeer::CORANTCLI, $this->corantcli);
		if ($this->isColumnModified(FacorrelatPeer::FATIPMOV_ID)) $criteria->add(FacorrelatPeer::FATIPMOV_ID, $this->fatipmov_id);
		if ($this->isColumnModified(FacorrelatPeer::FIRPREP1)) $criteria->add(FacorrelatPeer::FIRPREP1, $this->firprep1);
		if ($this->isColumnModified(FacorrelatPeer::CARPREP1)) $criteria->add(FacorrelatPeer::CARPREP1, $this->carprep1);
		if ($this->isColumnModified(FacorrelatPeer::FIRPREP2)) $criteria->add(FacorrelatPeer::FIRPREP2, $this->firprep2);
		if ($this->isColumnModified(FacorrelatPeer::CARPREP2)) $criteria->add(FacorrelatPeer::CARPREP2, $this->carprep2);
		if ($this->isColumnModified(FacorrelatPeer::FIRPREP3)) $criteria->add(FacorrelatPeer::FIRPREP3, $this->firprep3);
		if ($this->isColumnModified(FacorrelatPeer::CARPREP3)) $criteria->add(FacorrelatPeer::CARPREP3, $this->carprep3);
		if ($this->isColumnModified(FacorrelatPeer::NOMREPPRE)) $criteria->add(FacorrelatPeer::NOMREPPRE, $this->nomreppre);
		if ($this->isColumnModified(FacorrelatPeer::COSMANOBR)) $criteria->add(FacorrelatPeer::COSMANOBR, $this->cosmanobr);
		if ($this->isColumnModified(FacorrelatPeer::PORGASADM)) $criteria->add(FacorrelatPeer::PORGASADM, $this->porgasadm);
		if ($this->isColumnModified(FacorrelatPeer::PORUTILID)) $criteria->add(FacorrelatPeer::PORUTILID, $this->porutilid);
		if ($this->isColumnModified(FacorrelatPeer::PORCARFAB)) $criteria->add(FacorrelatPeer::PORCARFAB, $this->porcarfab);
		if ($this->isColumnModified(FacorrelatPeer::FATIPMOV_DEB_ID)) $criteria->add(FacorrelatPeer::FATIPMOV_DEB_ID, $this->fatipmov_deb_id);
		if ($this->isColumnModified(FacorrelatPeer::ID)) $criteria->add(FacorrelatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacorrelatPeer::DATABASE_NAME);

		$criteria->add(FacorrelatPeer::ID, $this->id);

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

		$copyObj->setCorpre($this->corpre);

		$copyObj->setCorped($this->corped);

		$copyObj->setCorfac($this->corfac);

		$copyObj->setCornot($this->cornot);

		$copyObj->setCordph($this->cordph);

		$copyObj->setCordev($this->cordev);

		$copyObj->setCoraju($this->coraju);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setProform($this->proform);

		$copyObj->setCorfaccont($this->corfaccont);

		$copyObj->setCodprgd($this->codprgd);

		$copyObj->setConpagdId($this->conpagd_id);

		$copyObj->setCorprerot($this->corprerot);

		$copyObj->setCorprepat($this->corprepat);

		$copyObj->setBlonumfac($this->blonumfac);

		$copyObj->setCorantcli($this->corantcli);

		$copyObj->setFatipmovId($this->fatipmov_id);

		$copyObj->setFirprep1($this->firprep1);

		$copyObj->setCarprep1($this->carprep1);

		$copyObj->setFirprep2($this->firprep2);

		$copyObj->setCarprep2($this->carprep2);

		$copyObj->setFirprep3($this->firprep3);

		$copyObj->setCarprep3($this->carprep3);

		$copyObj->setNomreppre($this->nomreppre);

		$copyObj->setCosmanobr($this->cosmanobr);

		$copyObj->setPorgasadm($this->porgasadm);

		$copyObj->setPorutilid($this->porutilid);

		$copyObj->setPorcarfab($this->porcarfab);

		$copyObj->setFatipmovDebId($this->fatipmov_deb_id);


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
			self::$peer = new FacorrelatPeer();
		}
		return self::$peer;
	}

	
	public function setFatipmovRelatedByFatipmovId($v)
	{


		if ($v === null) {
			$this->setFatipmovId(NULL);
		} else {
			$this->setFatipmovId($v->getId());
		}


		$this->aFatipmovRelatedByFatipmovId = $v;
	}


	
	public function getFatipmovRelatedByFatipmovId($con = null)
	{
		if ($this->aFatipmovRelatedByFatipmovId === null && ($this->fatipmov_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFatipmovPeer.php';

      $c = new Criteria();
      $c->add(FatipmovPeer::ID,$this->fatipmov_id);
      
			$this->aFatipmovRelatedByFatipmovId = FatipmovPeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipmovRelatedByFatipmovId;
	}

	
	public function setFatipmovRelatedByFatipmovDebId($v)
	{


		if ($v === null) {
			$this->setFatipmovDebId(NULL);
		} else {
			$this->setFatipmovDebId($v->getId());
		}


		$this->aFatipmovRelatedByFatipmovDebId = $v;
	}


	
	public function getFatipmovRelatedByFatipmovDebId($con = null)
	{
		if ($this->aFatipmovRelatedByFatipmovDebId === null && ($this->fatipmov_deb_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFatipmovPeer.php';

      $c = new Criteria();
      $c->add(FatipmovPeer::ID,$this->fatipmov_deb_id);
      
			$this->aFatipmovRelatedByFatipmovDebId = FatipmovPeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipmovRelatedByFatipmovDebId;
	}

} 