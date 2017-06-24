<?php


abstract class BaseFaordcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faordcom';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faordcom';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCOM = 'faordcom.ORDCOM';

	
	const FECORD = 'faordcom.FECORD';

	
	const DESORD = 'faordcom.DESORD';

	
	const MONORD = 'faordcom.MONORD';

	
	const CEDRIF = 'faordcom.CEDRIF';

	
	const NOMPRO = 'faordcom.NOMPRO';

	
	const DIRPRO = 'faordcom.DIRPRO';

	
	const CODALMSAP = 'faordcom.CODALMSAP';

	
	const ID = 'faordcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom', 'Fecord', 'Desord', 'Monord', 'Cedrif', 'Nompro', 'Dirpro', 'Codalmsap', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaordcomPeer::ORDCOM, FaordcomPeer::FECORD, FaordcomPeer::DESORD, FaordcomPeer::MONORD, FaordcomPeer::CEDRIF, FaordcomPeer::NOMPRO, FaordcomPeer::DIRPRO, FaordcomPeer::CODALMSAP, FaordcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom', 'fecord', 'desord', 'monord', 'cedrif', 'nompro', 'dirpro', 'codalmsap', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom' => 0, 'Fecord' => 1, 'Desord' => 2, 'Monord' => 3, 'Cedrif' => 4, 'Nompro' => 5, 'Dirpro' => 6, 'Codalmsap' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FaordcomPeer::ORDCOM => 0, FaordcomPeer::FECORD => 1, FaordcomPeer::DESORD => 2, FaordcomPeer::MONORD => 3, FaordcomPeer::CEDRIF => 4, FaordcomPeer::NOMPRO => 5, FaordcomPeer::DIRPRO => 6, FaordcomPeer::CODALMSAP => 7, FaordcomPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom' => 0, 'fecord' => 1, 'desord' => 2, 'monord' => 3, 'cedrif' => 4, 'nompro' => 5, 'dirpro' => 6, 'codalmsap' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaordcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaordcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaordcomPeer::getTableMap();
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
		return str_replace(FaordcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaordcomPeer::ORDCOM);

		$criteria->addSelectColumn(FaordcomPeer::FECORD);

		$criteria->addSelectColumn(FaordcomPeer::DESORD);

		$criteria->addSelectColumn(FaordcomPeer::MONORD);

		$criteria->addSelectColumn(FaordcomPeer::CEDRIF);

		$criteria->addSelectColumn(FaordcomPeer::NOMPRO);

		$criteria->addSelectColumn(FaordcomPeer::DIRPRO);

		$criteria->addSelectColumn(FaordcomPeer::CODALMSAP);

		$criteria->addSelectColumn(FaordcomPeer::ID);

	}

	const COUNT = 'COUNT(faordcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faordcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaordcomPeer::doSelectRS($criteria, $con);
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
		$objects = FaordcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaordcomPeer::populateObjects(FaordcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaordcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaordcomPeer::getOMClass();
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
		return FaordcomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaordcomPeer::ID); 

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
			$comparison = $criteria->getComparison(FaordcomPeer::ID);
			$selectCriteria->add(FaordcomPeer::ID, $criteria->remove(FaordcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaordcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaordcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faordcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaordcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faordcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaordcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaordcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaordcomPeer::DATABASE_NAME, FaordcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaordcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaordcomPeer::DATABASE_NAME);

		$criteria->add(FaordcomPeer::ID, $pk);


		$v = FaordcomPeer::doSelect($criteria, $con);

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
			$criteria->add(FaordcomPeer::ID, $pks, Criteria::IN);
			$objs = FaordcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaordcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaordcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaordcomMapBuilder');
}
