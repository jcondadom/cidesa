<?php


abstract class BaseFarinsteduPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'farinstedu';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Farinstedu';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODINST = 'farinstedu.CODINST';

	
	const NOMINST = 'farinstedu.NOMINST';

	
	const DIRINST = 'farinstedu.DIRINST';

	
	const TELINST = 'farinstedu.TELINST';

	
	const FAXINST = 'farinstedu.FAXINST';

	
	const EMAILINST = 'farinstedu.EMAILINST';

	
	const CODEDO = 'farinstedu.CODEDO';

	
	const CODCIU = 'farinstedu.CODCIU';

	
	const CODMUN = 'farinstedu.CODMUN';

	
	const MATINST = 'farinstedu.MATINST';

	
	const PERSONA = 'farinstedu.PERSONA';

	
	const ID = 'farinstedu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codinst', 'Nominst', 'Dirinst', 'Telinst', 'Faxinst', 'Emailinst', 'Codedo', 'Codciu', 'Codmun', 'Matinst', 'Persona', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FarinsteduPeer::CODINST, FarinsteduPeer::NOMINST, FarinsteduPeer::DIRINST, FarinsteduPeer::TELINST, FarinsteduPeer::FAXINST, FarinsteduPeer::EMAILINST, FarinsteduPeer::CODEDO, FarinsteduPeer::CODCIU, FarinsteduPeer::CODMUN, FarinsteduPeer::MATINST, FarinsteduPeer::PERSONA, FarinsteduPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codinst', 'nominst', 'dirinst', 'telinst', 'faxinst', 'emailinst', 'codedo', 'codciu', 'codmun', 'matinst', 'persona', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codinst' => 0, 'Nominst' => 1, 'Dirinst' => 2, 'Telinst' => 3, 'Faxinst' => 4, 'Emailinst' => 5, 'Codedo' => 6, 'Codciu' => 7, 'Codmun' => 8, 'Matinst' => 9, 'Persona' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FarinsteduPeer::CODINST => 0, FarinsteduPeer::NOMINST => 1, FarinsteduPeer::DIRINST => 2, FarinsteduPeer::TELINST => 3, FarinsteduPeer::FAXINST => 4, FarinsteduPeer::EMAILINST => 5, FarinsteduPeer::CODEDO => 6, FarinsteduPeer::CODCIU => 7, FarinsteduPeer::CODMUN => 8, FarinsteduPeer::MATINST => 9, FarinsteduPeer::PERSONA => 10, FarinsteduPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codinst' => 0, 'nominst' => 1, 'dirinst' => 2, 'telinst' => 3, 'faxinst' => 4, 'emailinst' => 5, 'codedo' => 6, 'codciu' => 7, 'codmun' => 8, 'matinst' => 9, 'persona' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FarinsteduMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FarinsteduMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FarinsteduPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(FarinsteduPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FarinsteduPeer::CODINST);

		$criteria->addSelectColumn(FarinsteduPeer::NOMINST);

		$criteria->addSelectColumn(FarinsteduPeer::DIRINST);

		$criteria->addSelectColumn(FarinsteduPeer::TELINST);

		$criteria->addSelectColumn(FarinsteduPeer::FAXINST);

		$criteria->addSelectColumn(FarinsteduPeer::EMAILINST);

		$criteria->addSelectColumn(FarinsteduPeer::CODEDO);

		$criteria->addSelectColumn(FarinsteduPeer::CODCIU);

		$criteria->addSelectColumn(FarinsteduPeer::CODMUN);

		$criteria->addSelectColumn(FarinsteduPeer::MATINST);

		$criteria->addSelectColumn(FarinsteduPeer::PERSONA);

		$criteria->addSelectColumn(FarinsteduPeer::ID);

	}

	const COUNT = 'COUNT(farinstedu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT farinstedu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FarinsteduPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FarinsteduPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FarinsteduPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FarinsteduPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FarinsteduPeer::populateObjects(FarinsteduPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FarinsteduPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FarinsteduPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FarinsteduPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FarinsteduPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(FarinsteduPeer::ID);
			$selectCriteria->add(FarinsteduPeer::ID, $criteria->remove(FarinsteduPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(FarinsteduPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(FarinsteduPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Farinstedu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FarinsteduPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Farinstedu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FarinsteduPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FarinsteduPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(FarinsteduPeer::DATABASE_NAME, FarinsteduPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FarinsteduPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FarinsteduPeer::DATABASE_NAME);

		$criteria->add(FarinsteduPeer::ID, $pk);


		$v = FarinsteduPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(FarinsteduPeer::ID, $pks, Criteria::IN);
			$objs = FarinsteduPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFarinsteduPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FarinsteduMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FarinsteduMapBuilder');
}
