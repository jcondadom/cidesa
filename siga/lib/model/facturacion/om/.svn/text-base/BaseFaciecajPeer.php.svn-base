<?php


abstract class BaseFaciecajPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'faciecaj';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Faciecaj';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODALM = 'faciecaj.CODALM';

	
	const CODCAJ = 'faciecaj.CODCAJ';

	
	const CODUSU = 'faciecaj.CODUSU';

	
	const NUMFACINI = 'faciecaj.NUMFACINI';

	
	const NUMFACCIE = 'faciecaj.NUMFACCIE';

	
	const NUMCTRINI = 'faciecaj.NUMCTRINI';

	
	const NUMCTRCIE = 'faciecaj.NUMCTRCIE';

	
	const OBSERV = 'faciecaj.OBSERV';

	
	const MONCIE = 'faciecaj.MONCIE';

	
	const FECHORCIE = 'faciecaj.FECHORCIE';

	
	const CODAPE = 'faciecaj.CODAPE';

	
	const ID = 'faciecaj.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm', 'Codcaj', 'Codusu', 'Numfacini', 'Numfaccie', 'Numctrini', 'Numctrcie', 'Observ', 'Moncie', 'Fechorcie', 'Codape', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaciecajPeer::CODALM, FaciecajPeer::CODCAJ, FaciecajPeer::CODUSU, FaciecajPeer::NUMFACINI, FaciecajPeer::NUMFACCIE, FaciecajPeer::NUMCTRINI, FaciecajPeer::NUMCTRCIE, FaciecajPeer::OBSERV, FaciecajPeer::MONCIE, FaciecajPeer::FECHORCIE, FaciecajPeer::CODAPE, FaciecajPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm', 'codcaj', 'codusu', 'numfacini', 'numfaccie', 'numctrini', 'numctrcie', 'observ', 'moncie', 'fechorcie', 'codape', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm' => 0, 'Codcaj' => 1, 'Codusu' => 2, 'Numfacini' => 3, 'Numfaccie' => 4, 'Numctrini' => 5, 'Numctrcie' => 6, 'Observ' => 7, 'Moncie' => 8, 'Fechorcie' => 9, 'Codape' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (FaciecajPeer::CODALM => 0, FaciecajPeer::CODCAJ => 1, FaciecajPeer::CODUSU => 2, FaciecajPeer::NUMFACINI => 3, FaciecajPeer::NUMFACCIE => 4, FaciecajPeer::NUMCTRINI => 5, FaciecajPeer::NUMCTRCIE => 6, FaciecajPeer::OBSERV => 7, FaciecajPeer::MONCIE => 8, FaciecajPeer::FECHORCIE => 9, FaciecajPeer::CODAPE => 10, FaciecajPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm' => 0, 'codcaj' => 1, 'codusu' => 2, 'numfacini' => 3, 'numfaccie' => 4, 'numctrini' => 5, 'numctrcie' => 6, 'observ' => 7, 'moncie' => 8, 'fechorcie' => 9, 'codape' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FaciecajMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FaciecajMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaciecajPeer::getTableMap();
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
		return str_replace(FaciecajPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaciecajPeer::CODALM);

		$criteria->addSelectColumn(FaciecajPeer::CODCAJ);

		$criteria->addSelectColumn(FaciecajPeer::CODUSU);

		$criteria->addSelectColumn(FaciecajPeer::NUMFACINI);

		$criteria->addSelectColumn(FaciecajPeer::NUMFACCIE);

		$criteria->addSelectColumn(FaciecajPeer::NUMCTRINI);

		$criteria->addSelectColumn(FaciecajPeer::NUMCTRCIE);

		$criteria->addSelectColumn(FaciecajPeer::OBSERV);

		$criteria->addSelectColumn(FaciecajPeer::MONCIE);

		$criteria->addSelectColumn(FaciecajPeer::FECHORCIE);

		$criteria->addSelectColumn(FaciecajPeer::CODAPE);

		$criteria->addSelectColumn(FaciecajPeer::ID);

	}

	const COUNT = 'COUNT(faciecaj.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT faciecaj.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaciecajPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaciecajPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaciecajPeer::doSelectRS($criteria, $con);
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
		$objects = FaciecajPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaciecajPeer::populateObjects(FaciecajPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaciecajPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaciecajPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaciecajPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaciecajPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FaciecajPeer::CODCAJ, FadefcajPeer::ID);
	
			$criteria->addJoin(FaciecajPeer::CODAPE, FaapecajPeer::ID);
	
		$rs = FaciecajPeer::doSelectRS($criteria, $con);
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

		FaciecajPeer::addSelectColumns($c);
		$startcol2 = (FaciecajPeer::NUM_COLUMNS - FaciecajPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefcajPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefcajPeer::NUM_COLUMNS;
	
			FaapecajPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaapecajPeer::NUM_COLUMNS;
	
			$c->addJoin(FaciecajPeer::CODCAJ, FadefcajPeer::ID);
	
			$c->addJoin(FaciecajPeer::CODAPE, FaapecajPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaciecajPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FadefcajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefcaj(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFaciecaj($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFaciecajs();
					$obj2->addFaciecaj($obj1);
				}
	

							
				$omClass = FaapecajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaapecaj(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFaciecaj($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFaciecajs();
					$obj3->addFaciecaj($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFadefcaj(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FaciecajPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FaciecajPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FaciecajPeer::CODAPE, FaapecajPeer::ID);
		
			$rs = FaciecajPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaapecaj(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FaciecajPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FaciecajPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FaciecajPeer::CODCAJ, FadefcajPeer::ID);
		
			$rs = FaciecajPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFadefcaj(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FaciecajPeer::addSelectColumns($c);
		$startcol2 = (FaciecajPeer::NUM_COLUMNS - FaciecajPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaapecajPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaapecajPeer::NUM_COLUMNS;
	
			$c->addJoin(FaciecajPeer::CODAPE, FaapecajPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaciecajPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FaapecajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaapecaj(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFaciecaj($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFaciecajs();
					$obj2->addFaciecaj($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaapecaj(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FaciecajPeer::addSelectColumns($c);
		$startcol2 = (FaciecajPeer::NUM_COLUMNS - FaciecajPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefcajPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefcajPeer::NUM_COLUMNS;
	
			$c->addJoin(FaciecajPeer::CODCAJ, FadefcajPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaciecajPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FadefcajPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefcaj(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFaciecaj($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFaciecajs();
					$obj2->addFaciecaj($obj1);
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
		return FaciecajPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaciecajPeer::ID); 

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
			$comparison = $criteria->getComparison(FaciecajPeer::ID);
			$selectCriteria->add(FaciecajPeer::ID, $criteria->remove(FaciecajPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaciecajPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaciecajPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Faciecaj) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaciecajPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Faciecaj $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaciecajPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaciecajPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaciecajPeer::DATABASE_NAME, FaciecajPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaciecajPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaciecajPeer::DATABASE_NAME);

		$criteria->add(FaciecajPeer::ID, $pk);


		$v = FaciecajPeer::doSelect($criteria, $con);

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
			$criteria->add(FaciecajPeer::ID, $pks, Criteria::IN);
			$objs = FaciecajPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaciecajPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FaciecajMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FaciecajMapBuilder');
}
