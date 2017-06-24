<?php


abstract class BaseMetasvendedorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'metasvendedor';

	
	const CLASS_DEFAULT = 'lib.model.Metasvendedor';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const VENDEDORES_ID = 'metasvendedor.VENDEDORES_ID';

	
	const CATPRODUCTOS_ID = 'metasvendedor.CATPRODUCTOS_ID';

	
	const CANTIDAD = 'metasvendedor.CANTIDAD';

	
	const ID = 'metasvendedor.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('VendedoresId', 'CatproductosId', 'Cantidad', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MetasvendedorPeer::VENDEDORES_ID, MetasvendedorPeer::CATPRODUCTOS_ID, MetasvendedorPeer::CANTIDAD, MetasvendedorPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('vendedores_id', 'catproductos_id', 'cantidad', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('VendedoresId' => 0, 'CatproductosId' => 1, 'Cantidad' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (MetasvendedorPeer::VENDEDORES_ID => 0, MetasvendedorPeer::CATPRODUCTOS_ID => 1, MetasvendedorPeer::CANTIDAD => 2, MetasvendedorPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('vendedores_id' => 0, 'catproductos_id' => 1, 'cantidad' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MetasvendedorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MetasvendedorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MetasvendedorPeer::getTableMap();
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
		return str_replace(MetasvendedorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MetasvendedorPeer::VENDEDORES_ID);

		$criteria->addSelectColumn(MetasvendedorPeer::CATPRODUCTOS_ID);

		$criteria->addSelectColumn(MetasvendedorPeer::CANTIDAD);

		$criteria->addSelectColumn(MetasvendedorPeer::ID);

	}

	const COUNT = 'COUNT(metasvendedor.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT metasvendedor.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
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
		$objects = MetasvendedorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MetasvendedorPeer::populateObjects(MetasvendedorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MetasvendedorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MetasvendedorPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinVendedores(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);

		$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatproductos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);

		$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinVendedores(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MetasvendedorPeer::addSelectColumns($c);
		$startcol = (MetasvendedorPeer::NUM_COLUMNS - MetasvendedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VendedoresPeer::addSelectColumns($c);

		$c->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasvendedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = VendedoresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getVendedores(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMetasvendedor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMetasvendedors();
				$obj2->addMetasvendedor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatproductos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MetasvendedorPeer::addSelectColumns($c);
		$startcol = (MetasvendedorPeer::NUM_COLUMNS - MetasvendedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatproductosPeer::addSelectColumns($c);

		$c->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasvendedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatproductosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatproductos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMetasvendedor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMetasvendedors();
				$obj2->addMetasvendedor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
			$criteria->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	
		$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
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

		MetasvendedorPeer::addSelectColumns($c);
		$startcol2 = (MetasvendedorPeer::NUM_COLUMNS - MetasvendedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			VendedoresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + VendedoresPeer::NUM_COLUMNS;
	
			CatproductosPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CatproductosPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
			$c->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasvendedorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = VendedoresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getVendedores(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addMetasvendedor($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initMetasvendedors();
					$obj2->addMetasvendedor($obj1);
				}
	

							
				$omClass = CatproductosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCatproductos(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addMetasvendedor($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initMetasvendedors();
					$obj3->addMetasvendedor($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptVendedores(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
		
			$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCatproductos(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(MetasvendedorPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(MetasvendedorPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);
		
			$rs = MetasvendedorPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptVendedores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MetasvendedorPeer::addSelectColumns($c);
		$startcol2 = (MetasvendedorPeer::NUM_COLUMNS - MetasvendedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatproductosPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatproductosPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasvendedorPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasvendedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CatproductosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatproductos(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addMetasvendedor($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initMetasvendedors();
					$obj2->addMetasvendedor($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatproductos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MetasvendedorPeer::addSelectColumns($c);
		$startcol2 = (MetasvendedorPeer::NUM_COLUMNS - MetasvendedorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			VendedoresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + VendedoresPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasvendedorPeer::VENDEDORES_ID, VendedoresPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasvendedorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = VendedoresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getVendedores(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addMetasvendedor($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initMetasvendedors();
					$obj2->addMetasvendedor($obj1);
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
		return MetasvendedorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MetasvendedorPeer::ID); 

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
			$comparison = $criteria->getComparison(MetasvendedorPeer::ID);
			$selectCriteria->add(MetasvendedorPeer::ID, $criteria->remove(MetasvendedorPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MetasvendedorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MetasvendedorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Metasvendedor) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MetasvendedorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Metasvendedor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MetasvendedorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MetasvendedorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MetasvendedorPeer::DATABASE_NAME, MetasvendedorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MetasvendedorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MetasvendedorPeer::DATABASE_NAME);

		$criteria->add(MetasvendedorPeer::ID, $pk);


		$v = MetasvendedorPeer::doSelect($criteria, $con);

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
			$criteria->add(MetasvendedorPeer::ID, $pks, Criteria::IN);
			$objs = MetasvendedorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMetasvendedorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MetasvendedorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MetasvendedorMapBuilder');
}
