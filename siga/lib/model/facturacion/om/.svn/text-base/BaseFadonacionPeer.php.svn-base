<?php


abstract class BaseFadonacionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadonacion';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fadonacion';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NRODON = 'fadonacion.NRODON';

	
	const FECDON = 'fadonacion.FECDON';

	
	const CODPRO = 'fadonacion.CODPRO';

	
	const DESDON = 'fadonacion.DESDON';

	
	const MONDON = 'fadonacion.MONDON';

	
	const REAPOR = 'fadonacion.REAPOR';

	
	const STATUS = 'fadonacion.STATUS';

	
	const ID = 'fadonacion.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nrodon', 'Fecdon', 'Codpro', 'Desdon', 'Mondon', 'Reapor', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadonacionPeer::NRODON, FadonacionPeer::FECDON, FadonacionPeer::CODPRO, FadonacionPeer::DESDON, FadonacionPeer::MONDON, FadonacionPeer::REAPOR, FadonacionPeer::STATUS, FadonacionPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nrodon', 'fecdon', 'codpro', 'desdon', 'mondon', 'reapor', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nrodon' => 0, 'Fecdon' => 1, 'Codpro' => 2, 'Desdon' => 3, 'Mondon' => 4, 'Reapor' => 5, 'Status' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FadonacionPeer::NRODON => 0, FadonacionPeer::FECDON => 1, FadonacionPeer::CODPRO => 2, FadonacionPeer::DESDON => 3, FadonacionPeer::MONDON => 4, FadonacionPeer::REAPOR => 5, FadonacionPeer::STATUS => 6, FadonacionPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('nrodon' => 0, 'fecdon' => 1, 'codpro' => 2, 'desdon' => 3, 'mondon' => 4, 'reapor' => 5, 'status' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FadonacionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FadonacionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadonacionPeer::getTableMap();
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
		return str_replace(FadonacionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadonacionPeer::NRODON);

		$criteria->addSelectColumn(FadonacionPeer::FECDON);

		$criteria->addSelectColumn(FadonacionPeer::CODPRO);

		$criteria->addSelectColumn(FadonacionPeer::DESDON);

		$criteria->addSelectColumn(FadonacionPeer::MONDON);

		$criteria->addSelectColumn(FadonacionPeer::REAPOR);

		$criteria->addSelectColumn(FadonacionPeer::STATUS);

		$criteria->addSelectColumn(FadonacionPeer::ID);

	}

	const COUNT = 'COUNT(fadonacion.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadonacion.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadonacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadonacionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadonacionPeer::doSelectRS($criteria, $con);
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
		$objects = FadonacionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadonacionPeer::populateObjects(FadonacionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadonacionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadonacionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFacliente(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadonacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadonacionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadonacionPeer::CODPRO, FaclientePeer::CODPRO);

		$rs = FadonacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFacliente(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadonacionPeer::addSelectColumns($c);
		$startcol = (FadonacionPeer::NUM_COLUMNS - FadonacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaclientePeer::addSelectColumns($c);

		$c->addJoin(FadonacionPeer::CODPRO, FaclientePeer::CODPRO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadonacionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaclientePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFacliente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadonacion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadonacions();
				$obj2->addFadonacion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadonacionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadonacionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FadonacionPeer::CODPRO, FaclientePeer::CODPRO);
	
		$rs = FadonacionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadonacionPeer::addSelectColumns($c);
		$startcol2 = (FadonacionPeer::NUM_COLUMNS - FadonacionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaclientePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaclientePeer::NUM_COLUMNS;
	
			$c->addJoin(FadonacionPeer::CODPRO, FaclientePeer::CODPRO);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadonacionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FaclientePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFacliente(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadonacion($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFadonacions();
					$obj2->addFadonacion($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FadonacionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FadonacionPeer::ID); 

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
			$comparison = $criteria->getComparison(FadonacionPeer::ID);
			$selectCriteria->add(FadonacionPeer::ID, $criteria->remove(FadonacionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadonacionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadonacionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadonacion) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadonacionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadonacion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadonacionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadonacionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadonacionPeer::DATABASE_NAME, FadonacionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadonacionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadonacionPeer::DATABASE_NAME);

		$criteria->add(FadonacionPeer::ID, $pk);


		$v = FadonacionPeer::doSelect($criteria, $con);

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
			$criteria->add(FadonacionPeer::ID, $pks, Criteria::IN);
			$objs = FadonacionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadonacionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FadonacionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FadonacionMapBuilder');
}
