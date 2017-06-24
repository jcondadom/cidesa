<?php


abstract class BaseMetasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'metas';

	
	const CLASS_DEFAULT = 'lib.model.Metas';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const VENDEDORES_ID = 'metas.VENDEDORES_ID';

	
	const CATPRODUCTOS_ID = 'metas.CATPRODUCTOS_ID';

	
	const CANTIDAD = 'metas.CANTIDAD';

	
	const MES_ASIGNACION = 'metas.MES_ASIGNACION';

	
	const ANIO_ASIGNACION = 'metas.ANIO_ASIGNACION';

	
	const STATUS = 'metas.STATUS';

	
	const ID = 'metas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('VendedoresId', 'CatproductosId', 'Cantidad', 'MesAsignacion', 'AnioAsignacion', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MetasPeer::VENDEDORES_ID, MetasPeer::CATPRODUCTOS_ID, MetasPeer::CANTIDAD, MetasPeer::MES_ASIGNACION, MetasPeer::ANIO_ASIGNACION, MetasPeer::STATUS, MetasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('vendedores_id', 'catproductos_id', 'cantidad', 'mes_asignacion', 'anio_asignacion', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('VendedoresId' => 0, 'CatproductosId' => 1, 'Cantidad' => 2, 'MesAsignacion' => 3, 'AnioAsignacion' => 4, 'Status' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (MetasPeer::VENDEDORES_ID => 0, MetasPeer::CATPRODUCTOS_ID => 1, MetasPeer::CANTIDAD => 2, MetasPeer::MES_ASIGNACION => 3, MetasPeer::ANIO_ASIGNACION => 4, MetasPeer::STATUS => 5, MetasPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('vendedores_id' => 0, 'catproductos_id' => 1, 'cantidad' => 2, 'mes_asignacion' => 3, 'anio_asignacion' => 4, 'status' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MetasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MetasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MetasPeer::getTableMap();
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
		return str_replace(MetasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MetasPeer::VENDEDORES_ID);

		$criteria->addSelectColumn(MetasPeer::CATPRODUCTOS_ID);

		$criteria->addSelectColumn(MetasPeer::CANTIDAD);

		$criteria->addSelectColumn(MetasPeer::MES_ASIGNACION);

		$criteria->addSelectColumn(MetasPeer::ANIO_ASIGNACION);

		$criteria->addSelectColumn(MetasPeer::STATUS);

		$criteria->addSelectColumn(MetasPeer::ID);

	}

	const COUNT = 'COUNT(metas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT metas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MetasPeer::doSelectRS($criteria, $con);
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
		$objects = MetasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MetasPeer::populateObjects(MetasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MetasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MetasPeer::getOMClass();
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
			$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);

		$rs = MetasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);

		$rs = MetasPeer::doSelectRS($criteria, $con);
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

		MetasPeer::addSelectColumns($c);
		$startcol = (MetasPeer::NUM_COLUMNS - MetasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		VendedoresPeer::addSelectColumns($c);

		$c->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasPeer::getOMClass();

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
										$temp_obj2->addMetas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMetass();
				$obj2->addMetas($obj1); 			}
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

		MetasPeer::addSelectColumns($c);
		$startcol = (MetasPeer::NUM_COLUMNS - MetasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatproductosPeer::addSelectColumns($c);

		$c->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasPeer::getOMClass();

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
										$temp_obj2->addMetas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMetass();
				$obj2->addMetas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MetasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
			$criteria->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	
		$rs = MetasPeer::doSelectRS($criteria, $con);
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

		MetasPeer::addSelectColumns($c);
		$startcol2 = (MetasPeer::NUM_COLUMNS - MetasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			VendedoresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + VendedoresPeer::NUM_COLUMNS;
	
			CatproductosPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CatproductosPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
			$c->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasPeer::getOMClass();


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
						$temp_obj2->addMetas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initMetass();
					$obj2->addMetas($obj1);
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
						$temp_obj3->addMetas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initMetass();
					$obj3->addMetas($obj1);
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
				$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(MetasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
		
			$rs = MetasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(MetasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(MetasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);
		
			$rs = MetasPeer::doSelectRS($criteria, $con);
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

		MetasPeer::addSelectColumns($c);
		$startcol2 = (MetasPeer::NUM_COLUMNS - MetasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatproductosPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatproductosPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasPeer::CATPRODUCTOS_ID, CatproductosPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasPeer::getOMClass();

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
						$temp_obj2->addMetas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initMetass();
					$obj2->addMetas($obj1);
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

		MetasPeer::addSelectColumns($c);
		$startcol2 = (MetasPeer::NUM_COLUMNS - MetasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			VendedoresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + VendedoresPeer::NUM_COLUMNS;
	
			$c->addJoin(MetasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MetasPeer::getOMClass();

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
						$temp_obj2->addMetas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initMetass();
					$obj2->addMetas($obj1);
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
		return MetasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MetasPeer::ID); 

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
			$comparison = $criteria->getComparison(MetasPeer::ID);
			$selectCriteria->add(MetasPeer::ID, $criteria->remove(MetasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MetasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MetasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Metas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MetasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Metas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MetasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MetasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MetasPeer::DATABASE_NAME, MetasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MetasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MetasPeer::DATABASE_NAME);

		$criteria->add(MetasPeer::ID, $pk);


		$v = MetasPeer::doSelect($criteria, $con);

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
			$criteria->add(MetasPeer::ID, $pks, Criteria::IN);
			$objs = MetasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMetasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MetasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MetasMapBuilder');
}
