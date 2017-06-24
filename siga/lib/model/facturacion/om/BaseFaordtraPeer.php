<?php


abstract class BaseFaordtraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faordtra';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faordtra';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFORD = 'faordtra.REFORD';

	
	const FECORD = 'faordtra.FECORD';

	
	const REFCOT = 'faordtra.REFCOT';

	
	const REFPRE = 'faordtra.REFPRE';

	
	const CODCLI = 'faordtra.CODCLI';

	
	const CODSED = 'faordtra.CODSED';

	
	const CODEMB = 'faordtra.CODEMB';

	
	const DESORD = 'faordtra.DESORD';

	
	const DIACUL = 'faordtra.DIACUL';

	
	const REAPOR = 'faordtra.REAPOR';

	
	const APRORDTRA = 'faordtra.APRORDTRA';

	
	const USUAPRORD = 'faordtra.USUAPRORD';

	
	const FECAPRORD = 'faordtra.FECAPRORD';

	
	const OBSAPRORD = 'faordtra.OBSAPRORD';

	
	const RECORDTRA = 'faordtra.RECORDTRA';

	
	const USURECORD = 'faordtra.USURECORD';

	
	const FECRECORD = 'faordtra.FECRECORD';

	
	const OBSRECORD = 'faordtra.OBSRECORD';

	
	const ID = 'faordtra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reford', 'Fecord', 'Refcot', 'Refpre', 'Codcli', 'Codsed', 'Codemb', 'Desord', 'Diacul', 'Reapor', 'Aprordtra', 'Usuaprord', 'Fecaprord', 'Obsaprord', 'Recordtra', 'Usurecord', 'Fecrecord', 'Obsrecord', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaordtraPeer::REFORD, FaordtraPeer::FECORD, FaordtraPeer::REFCOT, FaordtraPeer::REFPRE, FaordtraPeer::CODCLI, FaordtraPeer::CODSED, FaordtraPeer::CODEMB, FaordtraPeer::DESORD, FaordtraPeer::DIACUL, FaordtraPeer::REAPOR, FaordtraPeer::APRORDTRA, FaordtraPeer::USUAPRORD, FaordtraPeer::FECAPRORD, FaordtraPeer::OBSAPRORD, FaordtraPeer::RECORDTRA, FaordtraPeer::USURECORD, FaordtraPeer::FECRECORD, FaordtraPeer::OBSRECORD, FaordtraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reford', 'fecord', 'refcot', 'refpre', 'codcli', 'codsed', 'codemb', 'desord', 'diacul', 'reapor', 'aprordtra', 'usuaprord', 'fecaprord', 'obsaprord', 'recordtra', 'usurecord', 'fecrecord', 'obsrecord', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reford' => 0, 'Fecord' => 1, 'Refcot' => 2, 'Refpre' => 3, 'Codcli' => 4, 'Codsed' => 5, 'Codemb' => 6, 'Desord' => 7, 'Diacul' => 8, 'Reapor' => 9, 'Aprordtra' => 10, 'Usuaprord' => 11, 'Fecaprord' => 12, 'Obsaprord' => 13, 'Recordtra' => 14, 'Usurecord' => 15, 'Fecrecord' => 16, 'Obsrecord' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (FaordtraPeer::REFORD => 0, FaordtraPeer::FECORD => 1, FaordtraPeer::REFCOT => 2, FaordtraPeer::REFPRE => 3, FaordtraPeer::CODCLI => 4, FaordtraPeer::CODSED => 5, FaordtraPeer::CODEMB => 6, FaordtraPeer::DESORD => 7, FaordtraPeer::DIACUL => 8, FaordtraPeer::REAPOR => 9, FaordtraPeer::APRORDTRA => 10, FaordtraPeer::USUAPRORD => 11, FaordtraPeer::FECAPRORD => 12, FaordtraPeer::OBSAPRORD => 13, FaordtraPeer::RECORDTRA => 14, FaordtraPeer::USURECORD => 15, FaordtraPeer::FECRECORD => 16, FaordtraPeer::OBSRECORD => 17, FaordtraPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('reford' => 0, 'fecord' => 1, 'refcot' => 2, 'refpre' => 3, 'codcli' => 4, 'codsed' => 5, 'codemb' => 6, 'desord' => 7, 'diacul' => 8, 'reapor' => 9, 'aprordtra' => 10, 'usuaprord' => 11, 'fecaprord' => 12, 'obsaprord' => 13, 'recordtra' => 14, 'usurecord' => 15, 'fecrecord' => 16, 'obsrecord' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaordtraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaordtraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaordtraPeer::getTableMap();
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
		return str_replace(FaordtraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaordtraPeer::REFORD);

		$criteria->addSelectColumn(FaordtraPeer::FECORD);

		$criteria->addSelectColumn(FaordtraPeer::REFCOT);

		$criteria->addSelectColumn(FaordtraPeer::REFPRE);

		$criteria->addSelectColumn(FaordtraPeer::CODCLI);

		$criteria->addSelectColumn(FaordtraPeer::CODSED);

		$criteria->addSelectColumn(FaordtraPeer::CODEMB);

		$criteria->addSelectColumn(FaordtraPeer::DESORD);

		$criteria->addSelectColumn(FaordtraPeer::DIACUL);

		$criteria->addSelectColumn(FaordtraPeer::REAPOR);

		$criteria->addSelectColumn(FaordtraPeer::APRORDTRA);

		$criteria->addSelectColumn(FaordtraPeer::USUAPRORD);

		$criteria->addSelectColumn(FaordtraPeer::FECAPRORD);

		$criteria->addSelectColumn(FaordtraPeer::OBSAPRORD);

		$criteria->addSelectColumn(FaordtraPeer::RECORDTRA);

		$criteria->addSelectColumn(FaordtraPeer::USURECORD);

		$criteria->addSelectColumn(FaordtraPeer::FECRECORD);

		$criteria->addSelectColumn(FaordtraPeer::OBSRECORD);

		$criteria->addSelectColumn(FaordtraPeer::ID);

	}

	const COUNT = 'COUNT(faordtra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faordtra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaordtraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaordtraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaordtraPeer::doSelectRS($criteria, $con);
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
		$objects = FaordtraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaordtraPeer::populateObjects(FaordtraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaordtraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaordtraPeer::getOMClass();
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
		return FaordtraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaordtraPeer::ID); 

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
			$comparison = $criteria->getComparison(FaordtraPeer::ID);
			$selectCriteria->add(FaordtraPeer::ID, $criteria->remove(FaordtraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaordtraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaordtraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faordtra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaordtraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faordtra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaordtraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaordtraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaordtraPeer::DATABASE_NAME, FaordtraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaordtraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaordtraPeer::DATABASE_NAME);

		$criteria->add(FaordtraPeer::ID, $pk);


		$v = FaordtraPeer::doSelect($criteria, $con);

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
			$criteria->add(FaordtraPeer::ID, $pks, Criteria::IN);
			$objs = FaordtraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaordtraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaordtraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaordtraMapBuilder');
}
