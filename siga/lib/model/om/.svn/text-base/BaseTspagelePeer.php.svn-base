<?php


abstract class BaseTspagelePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tspagele';

	
	const CLASS_DEFAULT = 'lib.model.Tspagele';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'tspagele.REFPAG';

	
	const NUMCUE = 'tspagele.NUMCUE';

	
	const FECPAG = 'tspagele.FECPAG';

	
	const MONPAG = 'tspagele.MONPAG';

	
	const ESTPAG = 'tspagele.ESTPAG';

	
	const LOGUSE = 'tspagele.LOGUSE';

	
	const TIPDOC = 'tspagele.TIPDOC';

	
	const DESPAG = 'tspagele.DESPAG';

	
	const CEDRIF = 'tspagele.CEDRIF';

	
	const TIPTXT = 'tspagele.TIPTXT';

	
	const FECANU = 'tspagele.FECANU';

	
	const DESANU = 'tspagele.DESANU';

	
	const FECPAGADO = 'tspagele.FECPAGADO';

	
	const FECEFEPAG = 'tspagele.FECEFEPAG';

	
	const CODMON = 'tspagele.CODMON';

	
	const VALMON = 'tspagele.VALMON';

	
	const CODDIREC = 'tspagele.CODDIREC';

	
	const ID = 'tspagele.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Numcue', 'Fecpag', 'Monpag', 'Estpag', 'Loguse', 'Tipdoc', 'Despag', 'Cedrif', 'Tiptxt', 'Fecanu', 'Desanu', 'Fecpagado', 'Fecefepag', 'Codmon', 'Valmon', 'Coddirec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TspagelePeer::REFPAG, TspagelePeer::NUMCUE, TspagelePeer::FECPAG, TspagelePeer::MONPAG, TspagelePeer::ESTPAG, TspagelePeer::LOGUSE, TspagelePeer::TIPDOC, TspagelePeer::DESPAG, TspagelePeer::CEDRIF, TspagelePeer::TIPTXT, TspagelePeer::FECANU, TspagelePeer::DESANU, TspagelePeer::FECPAGADO, TspagelePeer::FECEFEPAG, TspagelePeer::CODMON, TspagelePeer::VALMON, TspagelePeer::CODDIREC, TspagelePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'numcue', 'fecpag', 'monpag', 'estpag', 'loguse', 'tipdoc', 'despag', 'cedrif', 'tiptxt', 'fecanu', 'desanu', 'fecpagado', 'fecefepag', 'codmon', 'valmon', 'coddirec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Numcue' => 1, 'Fecpag' => 2, 'Monpag' => 3, 'Estpag' => 4, 'Loguse' => 5, 'Tipdoc' => 6, 'Despag' => 7, 'Cedrif' => 8, 'Tiptxt' => 9, 'Fecanu' => 10, 'Desanu' => 11, 'Fecpagado' => 12, 'Fecefepag' => 13, 'Codmon' => 14, 'Valmon' => 15, 'Coddirec' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (TspagelePeer::REFPAG => 0, TspagelePeer::NUMCUE => 1, TspagelePeer::FECPAG => 2, TspagelePeer::MONPAG => 3, TspagelePeer::ESTPAG => 4, TspagelePeer::LOGUSE => 5, TspagelePeer::TIPDOC => 6, TspagelePeer::DESPAG => 7, TspagelePeer::CEDRIF => 8, TspagelePeer::TIPTXT => 9, TspagelePeer::FECANU => 10, TspagelePeer::DESANU => 11, TspagelePeer::FECPAGADO => 12, TspagelePeer::FECEFEPAG => 13, TspagelePeer::CODMON => 14, TspagelePeer::VALMON => 15, TspagelePeer::CODDIREC => 16, TspagelePeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'numcue' => 1, 'fecpag' => 2, 'monpag' => 3, 'estpag' => 4, 'loguse' => 5, 'tipdoc' => 6, 'despag' => 7, 'cedrif' => 8, 'tiptxt' => 9, 'fecanu' => 10, 'desanu' => 11, 'fecpagado' => 12, 'fecefepag' => 13, 'codmon' => 14, 'valmon' => 15, 'coddirec' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TspageleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TspageleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TspagelePeer::getTableMap();
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
		return str_replace(TspagelePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TspagelePeer::REFPAG);

		$criteria->addSelectColumn(TspagelePeer::NUMCUE);

		$criteria->addSelectColumn(TspagelePeer::FECPAG);

		$criteria->addSelectColumn(TspagelePeer::MONPAG);

		$criteria->addSelectColumn(TspagelePeer::ESTPAG);

		$criteria->addSelectColumn(TspagelePeer::LOGUSE);

		$criteria->addSelectColumn(TspagelePeer::TIPDOC);

		$criteria->addSelectColumn(TspagelePeer::DESPAG);

		$criteria->addSelectColumn(TspagelePeer::CEDRIF);

		$criteria->addSelectColumn(TspagelePeer::TIPTXT);

		$criteria->addSelectColumn(TspagelePeer::FECANU);

		$criteria->addSelectColumn(TspagelePeer::DESANU);

		$criteria->addSelectColumn(TspagelePeer::FECPAGADO);

		$criteria->addSelectColumn(TspagelePeer::FECEFEPAG);

		$criteria->addSelectColumn(TspagelePeer::CODMON);

		$criteria->addSelectColumn(TspagelePeer::VALMON);

		$criteria->addSelectColumn(TspagelePeer::CODDIREC);

		$criteria->addSelectColumn(TspagelePeer::ID);

	}

	const COUNT = 'COUNT(tspagele.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tspagele.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TspagelePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TspagelePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TspagelePeer::doSelectRS($criteria, $con);
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
		$objects = TspagelePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TspagelePeer::populateObjects(TspagelePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TspagelePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TspagelePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTsdefmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TspagelePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TspagelePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TspagelePeer::CODMON, TsdefmonPeer::CODMON);

		$rs = TspagelePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTsdefmon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TspagelePeer::addSelectColumns($c);
		$startcol = (TspagelePeer::NUM_COLUMNS - TspagelePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefmonPeer::addSelectColumns($c);

		$c->addJoin(TspagelePeer::CODMON, TsdefmonPeer::CODMON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TspagelePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdefmonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdefmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTspagele($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTspageles();
				$obj2->addTspagele($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TspagelePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TspagelePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(TspagelePeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = TspagelePeer::doSelectRS($criteria, $con);
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

		TspagelePeer::addSelectColumns($c);
		$startcol2 = (TspagelePeer::NUM_COLUMNS - TspagelePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefmonPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefmonPeer::NUM_COLUMNS;
	
			$c->addJoin(TspagelePeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TspagelePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = TsdefmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTsdefmon(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTspagele($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initTspageles();
					$obj2->addTspagele($obj1);
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
		return TspagelePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TspagelePeer::ID); 

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
			$comparison = $criteria->getComparison(TspagelePeer::ID);
			$selectCriteria->add(TspagelePeer::ID, $criteria->remove(TspagelePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TspagelePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TspagelePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tspagele) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TspagelePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tspagele $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TspagelePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TspagelePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TspagelePeer::DATABASE_NAME, TspagelePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TspagelePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TspagelePeer::DATABASE_NAME);

		$criteria->add(TspagelePeer::ID, $pk);


		$v = TspagelePeer::doSelect($criteria, $con);

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
			$criteria->add(TspagelePeer::ID, $pks, Criteria::IN);
			$objs = TspagelePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTspagelePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TspageleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TspageleMapBuilder');
}
