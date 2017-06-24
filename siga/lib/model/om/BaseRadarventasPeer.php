<?php


abstract class BaseRadarventasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'radarventas';

	
	const CLASS_DEFAULT = 'lib.model.Radarventas';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RUTA_ID = 'radarventas.RUTA_ID';

	
	const FACLIENTE_ID = 'radarventas.FACLIENTE_ID';

	
	const VENDEDORES_ID = 'radarventas.VENDEDORES_ID';

	
	const FAFACTUR_ID = 'radarventas.FAFACTUR_ID';

	
	const FECHA = 'radarventas.FECHA';

	
	const STATUS = 'radarventas.STATUS';

	
	const ID = 'radarventas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('RutaId', 'FaclienteId', 'VendedoresId', 'FafacturId', 'Fecha', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RadarventasPeer::RUTA_ID, RadarventasPeer::FACLIENTE_ID, RadarventasPeer::VENDEDORES_ID, RadarventasPeer::FAFACTUR_ID, RadarventasPeer::FECHA, RadarventasPeer::STATUS, RadarventasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ruta_id', 'facliente_id', 'vendedores_id', 'fafactur_id', 'fecha', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('RutaId' => 0, 'FaclienteId' => 1, 'VendedoresId' => 2, 'FafacturId' => 3, 'Fecha' => 4, 'Status' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (RadarventasPeer::RUTA_ID => 0, RadarventasPeer::FACLIENTE_ID => 1, RadarventasPeer::VENDEDORES_ID => 2, RadarventasPeer::FAFACTUR_ID => 3, RadarventasPeer::FECHA => 4, RadarventasPeer::STATUS => 5, RadarventasPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('ruta_id' => 0, 'facliente_id' => 1, 'vendedores_id' => 2, 'fafactur_id' => 3, 'fecha' => 4, 'status' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RadarventasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RadarventasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RadarventasPeer::getTableMap();
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
		return str_replace(RadarventasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RadarventasPeer::RUTA_ID);

		$criteria->addSelectColumn(RadarventasPeer::FACLIENTE_ID);

		$criteria->addSelectColumn(RadarventasPeer::VENDEDORES_ID);

		$criteria->addSelectColumn(RadarventasPeer::FAFACTUR_ID);

		$criteria->addSelectColumn(RadarventasPeer::FECHA);

		$criteria->addSelectColumn(RadarventasPeer::STATUS);

		$criteria->addSelectColumn(RadarventasPeer::ID);

	}

	const COUNT = 'COUNT(radarventas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT radarventas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RadarventasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RadarventasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RadarventasPeer::doSelectRS($criteria, $con);
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
		$objects = RadarventasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RadarventasPeer::populateObjects(RadarventasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RadarventasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RadarventasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinRuta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RadarventasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RadarventasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);

		$rs = RadarventasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinRuta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RadarventasPeer::addSelectColumns($c);
		$startcol = (RadarventasPeer::NUM_COLUMNS - RadarventasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RutaPeer::addSelectColumns($c);

		$c->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RadarventasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RutaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRuta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRadarventas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRadarventass();
				$obj2->addRadarventas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RadarventasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RadarventasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);
	
			$criteria->addJoin(RadarventasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
		$rs = RadarventasPeer::doSelectRS($criteria, $con);
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

		RadarventasPeer::addSelectColumns($c);
		$startcol2 = (RadarventasPeer::NUM_COLUMNS - RadarventasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			RutaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + RutaPeer::NUM_COLUMNS;
	
			VendedoresPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + VendedoresPeer::NUM_COLUMNS;
	
			$c->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);
	
			$c->addJoin(RadarventasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RadarventasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = RutaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getRuta(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addRadarventas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initRadarventass();
					$obj2->addRadarventas($obj1);
				}
	

							
				$omClass = VendedoresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getVendedores(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addRadarventas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initRadarventass();
					$obj3->addRadarventas($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptRuta(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(RadarventasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(RadarventasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(RadarventasPeer::VENDEDORES_ID, VendedoresPeer::ID);
		
			$rs = RadarventasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptVendedores(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(RadarventasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(RadarventasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);
		
			$rs = RadarventasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptRuta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RadarventasPeer::addSelectColumns($c);
		$startcol2 = (RadarventasPeer::NUM_COLUMNS - RadarventasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			VendedoresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + VendedoresPeer::NUM_COLUMNS;
	
			$c->addJoin(RadarventasPeer::VENDEDORES_ID, VendedoresPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RadarventasPeer::getOMClass();

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
						$temp_obj2->addRadarventas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initRadarventass();
					$obj2->addRadarventas($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptVendedores(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		RadarventasPeer::addSelectColumns($c);
		$startcol2 = (RadarventasPeer::NUM_COLUMNS - RadarventasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			RutaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + RutaPeer::NUM_COLUMNS;
	
			$c->addJoin(RadarventasPeer::RUTA_ID, RutaPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RadarventasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = RutaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getRuta(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addRadarventas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initRadarventass();
					$obj2->addRadarventas($obj1);
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
		return RadarventasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RadarventasPeer::ID); 

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
			$comparison = $criteria->getComparison(RadarventasPeer::ID);
			$selectCriteria->add(RadarventasPeer::ID, $criteria->remove(RadarventasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RadarventasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RadarventasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Radarventas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RadarventasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Radarventas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RadarventasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RadarventasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RadarventasPeer::DATABASE_NAME, RadarventasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RadarventasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RadarventasPeer::DATABASE_NAME);

		$criteria->add(RadarventasPeer::ID, $pk);


		$v = RadarventasPeer::doSelect($criteria, $con);

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
			$criteria->add(RadarventasPeer::ID, $pks, Criteria::IN);
			$objs = RadarventasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRadarventasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RadarventasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RadarventasMapBuilder');
}
