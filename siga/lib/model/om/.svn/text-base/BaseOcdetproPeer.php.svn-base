<?php


abstract class BaseOcdetproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocdetpro';

	
	const CLASS_DEFAULT = 'lib.model.Ocdetpro';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODBANPRO = 'ocdetpro.CODBANPRO';

	
	const CODPAR = 'ocdetpro.CODPAR';

	
	const CANOBR = 'ocdetpro.CANOBR';

	
	const CANCON = 'ocdetpro.CANCON';

	
	const CANCONFIN = 'ocdetpro.CANCONFIN';

	
	const ADIPAR = 'ocdetpro.ADIPAR';

	
	const COSUNI = 'ocdetpro.COSUNI';

	
	const COSUNIFIN = 'ocdetpro.COSUNIFIN';

	
	const CODPRE = 'ocdetpro.CODPRE';

	
	const MONPRE = 'ocdetpro.MONPRE';

	
	const ID = 'ocdetpro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codbanpro', 'Codpar', 'Canobr', 'Cancon', 'Canconfin', 'Adipar', 'Cosuni', 'Cosunifin', 'Codpre', 'Monpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcdetproPeer::CODBANPRO, OcdetproPeer::CODPAR, OcdetproPeer::CANOBR, OcdetproPeer::CANCON, OcdetproPeer::CANCONFIN, OcdetproPeer::ADIPAR, OcdetproPeer::COSUNI, OcdetproPeer::COSUNIFIN, OcdetproPeer::CODPRE, OcdetproPeer::MONPRE, OcdetproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codbanpro', 'codpar', 'canobr', 'cancon', 'canconfin', 'adipar', 'cosuni', 'cosunifin', 'codpre', 'monpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codbanpro' => 0, 'Codpar' => 1, 'Canobr' => 2, 'Cancon' => 3, 'Canconfin' => 4, 'Adipar' => 5, 'Cosuni' => 6, 'Cosunifin' => 7, 'Codpre' => 8, 'Monpre' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (OcdetproPeer::CODBANPRO => 0, OcdetproPeer::CODPAR => 1, OcdetproPeer::CANOBR => 2, OcdetproPeer::CANCON => 3, OcdetproPeer::CANCONFIN => 4, OcdetproPeer::ADIPAR => 5, OcdetproPeer::COSUNI => 6, OcdetproPeer::COSUNIFIN => 7, OcdetproPeer::CODPRE => 8, OcdetproPeer::MONPRE => 9, OcdetproPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codbanpro' => 0, 'codpar' => 1, 'canobr' => 2, 'cancon' => 3, 'canconfin' => 4, 'adipar' => 5, 'cosuni' => 6, 'cosunifin' => 7, 'codpre' => 8, 'monpre' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcdetproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcdetproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcdetproPeer::getTableMap();
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
		return str_replace(OcdetproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcdetproPeer::CODBANPRO);

		$criteria->addSelectColumn(OcdetproPeer::CODPAR);

		$criteria->addSelectColumn(OcdetproPeer::CANOBR);

		$criteria->addSelectColumn(OcdetproPeer::CANCON);

		$criteria->addSelectColumn(OcdetproPeer::CANCONFIN);

		$criteria->addSelectColumn(OcdetproPeer::ADIPAR);

		$criteria->addSelectColumn(OcdetproPeer::COSUNI);

		$criteria->addSelectColumn(OcdetproPeer::COSUNIFIN);

		$criteria->addSelectColumn(OcdetproPeer::CODPRE);

		$criteria->addSelectColumn(OcdetproPeer::MONPRE);

		$criteria->addSelectColumn(OcdetproPeer::ID);

	}

	const COUNT = 'COUNT(ocdetpro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocdetpro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcdetproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcdetproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcdetproPeer::doSelectRS($criteria, $con);
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
		$objects = OcdetproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcdetproPeer::populateObjects(OcdetproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcdetproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcdetproPeer::getOMClass();
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
		return OcdetproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OcdetproPeer::ID); 

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
			$comparison = $criteria->getComparison(OcdetproPeer::ID);
			$selectCriteria->add(OcdetproPeer::ID, $criteria->remove(OcdetproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcdetproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcdetproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocdetpro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcdetproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocdetpro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcdetproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcdetproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcdetproPeer::DATABASE_NAME, OcdetproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcdetproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcdetproPeer::DATABASE_NAME);

		$criteria->add(OcdetproPeer::ID, $pk);


		$v = OcdetproPeer::doSelect($criteria, $con);

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
			$criteria->add(OcdetproPeer::ID, $pks, Criteria::IN);
			$objs = OcdetproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcdetproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcdetproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcdetproMapBuilder');
}
