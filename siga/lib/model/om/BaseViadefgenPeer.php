<?php


abstract class BaseViadefgenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viadefgen';

	
	const CLASS_DEFAULT = 'lib.model.Viadefgen';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOLVIA = 'viadefgen.NUMSOLVIA';

	
	const NUMCALVIANAC = 'viadefgen.NUMCALVIANAC';

	
	const NUMCALVIAINT = 'viadefgen.NUMCALVIAINT';

	
	const VALUNITRI = 'viadefgen.VALUNITRI';

	
	const VALDOLAR = 'viadefgen.VALDOLAR';

	
	const NUMRELGASADI = 'viadefgen.NUMRELGASADI';

	
	const CODPAR = 'viadefgen.CODPAR';

	
	const RUBINT = 'viadefgen.RUBINT';

	
	const CORSOLBOL = 'viadefgen.CORSOLBOL';

	
	const CORSOLTRA = 'viadefgen.CORSOLTRA';

	
	const REPPREIMPSOL = 'viadefgen.REPPREIMPSOL';

	
	const REPPREIMPCAL = 'viadefgen.REPPREIMPCAL';

	
	const CODPRISUP = 'viadefgen.CODPRISUP';

	
	const CODPRIADI = 'viadefgen.CODPRIADI';

	
	const CODPRIGAS = 'viadefgen.CODPRIGAS';

	
	const CORRENSOL = 'viadefgen.CORRENSOL';

	
	const TIPCOM = 'viadefgen.TIPCOM';

	
	const ID = 'viadefgen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsolvia', 'Numcalvianac', 'Numcalviaint', 'Valunitri', 'Valdolar', 'Numrelgasadi', 'Codpar', 'Rubint', 'Corsolbol', 'Corsoltra', 'Reppreimpsol', 'Reppreimpcal', 'Codprisup', 'Codpriadi', 'Codprigas', 'Corrensol', 'Tipcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViadefgenPeer::NUMSOLVIA, ViadefgenPeer::NUMCALVIANAC, ViadefgenPeer::NUMCALVIAINT, ViadefgenPeer::VALUNITRI, ViadefgenPeer::VALDOLAR, ViadefgenPeer::NUMRELGASADI, ViadefgenPeer::CODPAR, ViadefgenPeer::RUBINT, ViadefgenPeer::CORSOLBOL, ViadefgenPeer::CORSOLTRA, ViadefgenPeer::REPPREIMPSOL, ViadefgenPeer::REPPREIMPCAL, ViadefgenPeer::CODPRISUP, ViadefgenPeer::CODPRIADI, ViadefgenPeer::CODPRIGAS, ViadefgenPeer::CORRENSOL, ViadefgenPeer::TIPCOM, ViadefgenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsolvia', 'numcalvianac', 'numcalviaint', 'valunitri', 'valdolar', 'numrelgasadi', 'codpar', 'rubint', 'corsolbol', 'corsoltra', 'reppreimpsol', 'reppreimpcal', 'codprisup', 'codpriadi', 'codprigas', 'corrensol', 'tipcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsolvia' => 0, 'Numcalvianac' => 1, 'Numcalviaint' => 2, 'Valunitri' => 3, 'Valdolar' => 4, 'Numrelgasadi' => 5, 'Codpar' => 6, 'Rubint' => 7, 'Corsolbol' => 8, 'Corsoltra' => 9, 'Reppreimpsol' => 10, 'Reppreimpcal' => 11, 'Codprisup' => 12, 'Codpriadi' => 13, 'Codprigas' => 14, 'Corrensol' => 15, 'Tipcom' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (ViadefgenPeer::NUMSOLVIA => 0, ViadefgenPeer::NUMCALVIANAC => 1, ViadefgenPeer::NUMCALVIAINT => 2, ViadefgenPeer::VALUNITRI => 3, ViadefgenPeer::VALDOLAR => 4, ViadefgenPeer::NUMRELGASADI => 5, ViadefgenPeer::CODPAR => 6, ViadefgenPeer::RUBINT => 7, ViadefgenPeer::CORSOLBOL => 8, ViadefgenPeer::CORSOLTRA => 9, ViadefgenPeer::REPPREIMPSOL => 10, ViadefgenPeer::REPPREIMPCAL => 11, ViadefgenPeer::CODPRISUP => 12, ViadefgenPeer::CODPRIADI => 13, ViadefgenPeer::CODPRIGAS => 14, ViadefgenPeer::CORRENSOL => 15, ViadefgenPeer::TIPCOM => 16, ViadefgenPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('numsolvia' => 0, 'numcalvianac' => 1, 'numcalviaint' => 2, 'valunitri' => 3, 'valdolar' => 4, 'numrelgasadi' => 5, 'codpar' => 6, 'rubint' => 7, 'corsolbol' => 8, 'corsoltra' => 9, 'reppreimpsol' => 10, 'reppreimpcal' => 11, 'codprisup' => 12, 'codpriadi' => 13, 'codprigas' => 14, 'corrensol' => 15, 'tipcom' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViadefgenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViadefgenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViadefgenPeer::getTableMap();
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
		return str_replace(ViadefgenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViadefgenPeer::NUMSOLVIA);

		$criteria->addSelectColumn(ViadefgenPeer::NUMCALVIANAC);

		$criteria->addSelectColumn(ViadefgenPeer::NUMCALVIAINT);

		$criteria->addSelectColumn(ViadefgenPeer::VALUNITRI);

		$criteria->addSelectColumn(ViadefgenPeer::VALDOLAR);

		$criteria->addSelectColumn(ViadefgenPeer::NUMRELGASADI);

		$criteria->addSelectColumn(ViadefgenPeer::CODPAR);

		$criteria->addSelectColumn(ViadefgenPeer::RUBINT);

		$criteria->addSelectColumn(ViadefgenPeer::CORSOLBOL);

		$criteria->addSelectColumn(ViadefgenPeer::CORSOLTRA);

		$criteria->addSelectColumn(ViadefgenPeer::REPPREIMPSOL);

		$criteria->addSelectColumn(ViadefgenPeer::REPPREIMPCAL);

		$criteria->addSelectColumn(ViadefgenPeer::CODPRISUP);

		$criteria->addSelectColumn(ViadefgenPeer::CODPRIADI);

		$criteria->addSelectColumn(ViadefgenPeer::CODPRIGAS);

		$criteria->addSelectColumn(ViadefgenPeer::CORRENSOL);

		$criteria->addSelectColumn(ViadefgenPeer::TIPCOM);

		$criteria->addSelectColumn(ViadefgenPeer::ID);

	}

	const COUNT = 'COUNT(viadefgen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viadefgen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViadefgenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViadefgenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViadefgenPeer::doSelectRS($criteria, $con);
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
		$objects = ViadefgenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViadefgenPeer::populateObjects(ViadefgenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViadefgenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViadefgenPeer::getOMClass();
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
		return ViadefgenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViadefgenPeer::ID); 

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
			$comparison = $criteria->getComparison(ViadefgenPeer::ID);
			$selectCriteria->add(ViadefgenPeer::ID, $criteria->remove(ViadefgenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViadefgenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViadefgenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viadefgen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViadefgenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viadefgen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViadefgenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViadefgenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViadefgenPeer::DATABASE_NAME, ViadefgenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViadefgenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViadefgenPeer::DATABASE_NAME);

		$criteria->add(ViadefgenPeer::ID, $pk);


		$v = ViadefgenPeer::doSelect($criteria, $con);

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
			$criteria->add(ViadefgenPeer::ID, $pks, Criteria::IN);
			$objs = ViadefgenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViadefgenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViadefgenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViadefgenMapBuilder');
}
