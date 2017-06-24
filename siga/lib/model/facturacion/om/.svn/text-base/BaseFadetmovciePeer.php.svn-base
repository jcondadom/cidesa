<?php


abstract class BaseFadetmovciePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadetmovcie';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fadetmovcie';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCIE = 'fadetmovcie.CODCIE';

	
	const REFFAC = 'fadetmovcie.REFFAC';

	
	const NUMERO = 'fadetmovcie.NUMERO';

	
	const MONPAG = 'fadetmovcie.MONPAG';

	
	const TIPPAG_ID = 'fadetmovcie.TIPPAG_ID';

	
	const CODBAN_ID = 'fadetmovcie.CODBAN_ID';

	
	const COMISION = 'fadetmovcie.COMISION';

	
	const ID = 'fadetmovcie.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcie', 'Reffac', 'Numero', 'Monpag', 'TippagId', 'CodbanId', 'Comision', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadetmovciePeer::CODCIE, FadetmovciePeer::REFFAC, FadetmovciePeer::NUMERO, FadetmovciePeer::MONPAG, FadetmovciePeer::TIPPAG_ID, FadetmovciePeer::CODBAN_ID, FadetmovciePeer::COMISION, FadetmovciePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcie', 'reffac', 'numero', 'monpag', 'tippag_id', 'codban_id', 'comision', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcie' => 0, 'Reffac' => 1, 'Numero' => 2, 'Monpag' => 3, 'TippagId' => 4, 'CodbanId' => 5, 'Comision' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FadetmovciePeer::CODCIE => 0, FadetmovciePeer::REFFAC => 1, FadetmovciePeer::NUMERO => 2, FadetmovciePeer::MONPAG => 3, FadetmovciePeer::TIPPAG_ID => 4, FadetmovciePeer::CODBAN_ID => 5, FadetmovciePeer::COMISION => 6, FadetmovciePeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codcie' => 0, 'reffac' => 1, 'numero' => 2, 'monpag' => 3, 'tippag_id' => 4, 'codban_id' => 5, 'comision' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FadetmovcieMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FadetmovcieMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadetmovciePeer::getTableMap();
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
		return str_replace(FadetmovciePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadetmovciePeer::CODCIE);

		$criteria->addSelectColumn(FadetmovciePeer::REFFAC);

		$criteria->addSelectColumn(FadetmovciePeer::NUMERO);

		$criteria->addSelectColumn(FadetmovciePeer::MONPAG);

		$criteria->addSelectColumn(FadetmovciePeer::TIPPAG_ID);

		$criteria->addSelectColumn(FadetmovciePeer::CODBAN_ID);

		$criteria->addSelectColumn(FadetmovciePeer::COMISION);

		$criteria->addSelectColumn(FadetmovciePeer::ID);

	}

	const COUNT = 'COUNT(fadetmovcie.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadetmovcie.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadetmovciePeer::doSelectRS($criteria, $con);
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
		$objects = FadetmovciePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadetmovciePeer::populateObjects(FadetmovciePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadetmovciePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadetmovciePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFaciecaj(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadetmovciePeer::CODCIE, FaciecajPeer::ID);

		$rs = FadetmovciePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFaciecaj(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadetmovciePeer::addSelectColumns($c);
		$startcol = (FadetmovciePeer::NUM_COLUMNS - FadetmovciePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaciecajPeer::addSelectColumns($c);

		$c->addJoin(FadetmovciePeer::CODCIE, FaciecajPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadetmovciePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaciecajPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaciecaj(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadetmovcie($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadetmovcies();
				$obj2->addFadetmovcie($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadetmovciePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FadetmovciePeer::CODCIE, FaciecajPeer::ID);
	
		$rs = FadetmovciePeer::doSelectRS($criteria, $con);
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

		FadetmovciePeer::addSelectColumns($c);
		$startcol2 = (FadetmovciePeer::NUM_COLUMNS - FadetmovciePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaciecajPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaciecajPeer::NUM_COLUMNS;
	
			$c->addJoin(FadetmovciePeer::CODCIE, FaciecajPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadetmovciePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FaciecajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaciecaj(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadetmovcie($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFadetmovcies();
					$obj2->addFadetmovcie($obj1);
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
		return FadetmovciePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FadetmovciePeer::ID); 

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
			$comparison = $criteria->getComparison(FadetmovciePeer::ID);
			$selectCriteria->add(FadetmovciePeer::ID, $criteria->remove(FadetmovciePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadetmovciePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadetmovciePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadetmovcie) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadetmovciePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadetmovcie $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadetmovciePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadetmovciePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadetmovciePeer::DATABASE_NAME, FadetmovciePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadetmovciePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadetmovciePeer::DATABASE_NAME);

		$criteria->add(FadetmovciePeer::ID, $pk);


		$v = FadetmovciePeer::doSelect($criteria, $con);

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
			$criteria->add(FadetmovciePeer::ID, $pks, Criteria::IN);
			$objs = FadetmovciePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadetmovciePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FadetmovcieMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FadetmovcieMapBuilder');
}
