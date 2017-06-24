<?php


abstract class BaseFatartraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fatartra';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fatartra';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFTAR = 'fatartra.REFTAR';

	
	const FECTAR = 'fatartra.FECTAR';

	
	const REFORD = 'fatartra.REFORD';

	
	const CODEMP = 'fatartra.CODEMP';

	
	const DESTAR = 'fatartra.DESTAR';

	
	const ARERES = 'fatartra.ARERES';

	
	const DIACUL = 'fatartra.DIACUL';

	
	const REAPOR = 'fatartra.REAPOR';

	
	const APRORDTRA = 'fatartra.APRORDTRA';

	
	const USUAPRORD = 'fatartra.USUAPRORD';

	
	const FECAPRORD = 'fatartra.FECAPRORD';

	
	const OBSAPRORD = 'fatartra.OBSAPRORD';

	
	const ID = 'fatartra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reftar', 'Fectar', 'Reford', 'Codemp', 'Destar', 'Areres', 'Diacul', 'Reapor', 'Aprordtra', 'Usuaprord', 'Fecaprord', 'Obsaprord', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FatartraPeer::REFTAR, FatartraPeer::FECTAR, FatartraPeer::REFORD, FatartraPeer::CODEMP, FatartraPeer::DESTAR, FatartraPeer::ARERES, FatartraPeer::DIACUL, FatartraPeer::REAPOR, FatartraPeer::APRORDTRA, FatartraPeer::USUAPRORD, FatartraPeer::FECAPRORD, FatartraPeer::OBSAPRORD, FatartraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reftar', 'fectar', 'reford', 'codemp', 'destar', 'areres', 'diacul', 'reapor', 'aprordtra', 'usuaprord', 'fecaprord', 'obsaprord', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reftar' => 0, 'Fectar' => 1, 'Reford' => 2, 'Codemp' => 3, 'Destar' => 4, 'Areres' => 5, 'Diacul' => 6, 'Reapor' => 7, 'Aprordtra' => 8, 'Usuaprord' => 9, 'Fecaprord' => 10, 'Obsaprord' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (FatartraPeer::REFTAR => 0, FatartraPeer::FECTAR => 1, FatartraPeer::REFORD => 2, FatartraPeer::CODEMP => 3, FatartraPeer::DESTAR => 4, FatartraPeer::ARERES => 5, FatartraPeer::DIACUL => 6, FatartraPeer::REAPOR => 7, FatartraPeer::APRORDTRA => 8, FatartraPeer::USUAPRORD => 9, FatartraPeer::FECAPRORD => 10, FatartraPeer::OBSAPRORD => 11, FatartraPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('reftar' => 0, 'fectar' => 1, 'reford' => 2, 'codemp' => 3, 'destar' => 4, 'areres' => 5, 'diacul' => 6, 'reapor' => 7, 'aprordtra' => 8, 'usuaprord' => 9, 'fecaprord' => 10, 'obsaprord' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FatartraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FatartraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FatartraPeer::getTableMap();
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
		return str_replace(FatartraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FatartraPeer::REFTAR);

		$criteria->addSelectColumn(FatartraPeer::FECTAR);

		$criteria->addSelectColumn(FatartraPeer::REFORD);

		$criteria->addSelectColumn(FatartraPeer::CODEMP);

		$criteria->addSelectColumn(FatartraPeer::DESTAR);

		$criteria->addSelectColumn(FatartraPeer::ARERES);

		$criteria->addSelectColumn(FatartraPeer::DIACUL);

		$criteria->addSelectColumn(FatartraPeer::REAPOR);

		$criteria->addSelectColumn(FatartraPeer::APRORDTRA);

		$criteria->addSelectColumn(FatartraPeer::USUAPRORD);

		$criteria->addSelectColumn(FatartraPeer::FECAPRORD);

		$criteria->addSelectColumn(FatartraPeer::OBSAPRORD);

		$criteria->addSelectColumn(FatartraPeer::ID);

	}

	const COUNT = 'COUNT(fatartra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fatartra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FatartraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FatartraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FatartraPeer::doSelectRS($criteria, $con);
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
		$objects = FatartraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FatartraPeer::populateObjects(FatartraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FatartraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FatartraPeer::getOMClass();
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
		return FatartraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FatartraPeer::ID); 

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
			$comparison = $criteria->getComparison(FatartraPeer::ID);
			$selectCriteria->add(FatartraPeer::ID, $criteria->remove(FatartraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FatartraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FatartraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fatartra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FatartraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fatartra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FatartraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FatartraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FatartraPeer::DATABASE_NAME, FatartraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FatartraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FatartraPeer::DATABASE_NAME);

		$criteria->add(FatartraPeer::ID, $pk);


		$v = FatartraPeer::doSelect($criteria, $con);

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
			$criteria->add(FatartraPeer::ID, $pks, Criteria::IN);
			$objs = FatartraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFatartraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FatartraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FatartraMapBuilder');
}
