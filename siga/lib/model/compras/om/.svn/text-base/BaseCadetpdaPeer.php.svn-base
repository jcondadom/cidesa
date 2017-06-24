<?php


abstract class BaseCadetpdaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadetpda';

	
	const CLASS_DEFAULT = 'lib.model.compras.Cadetpda';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPDA = 'cadetpda.REFPDA';

	
	const ORDCOM = 'cadetpda.ORDCOM';

	
	const CODART = 'cadetpda.CODART';

	
	const DESART = 'cadetpda.DESART';

	
	const CANART = 'cadetpda.CANART';

	
	const FECENT = 'cadetpda.FECENT';

	
	const TIPTRA = 'cadetpda.TIPTRA';

	
	const DIRORI = 'cadetpda.DIRORI';

	
	const CODEDO = 'cadetpda.CODEDO';

	
	const CATIPALM_ID = 'cadetpda.CATIPALM_ID';

	
	const TMART = 'cadetpda.TMART';

	
	const CODPRO = 'cadetpda.CODPRO';

	
	const OBSERV = 'cadetpda.OBSERV';

	
	const MES = 'cadetpda.MES';

	
	const ID = 'cadetpda.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpda', 'Ordcom', 'Codart', 'Desart', 'Canart', 'Fecent', 'Tiptra', 'Dirori', 'Codedo', 'CatipalmId', 'Tmart', 'Codpro', 'Observ', 'Mes', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadetpdaPeer::REFPDA, CadetpdaPeer::ORDCOM, CadetpdaPeer::CODART, CadetpdaPeer::DESART, CadetpdaPeer::CANART, CadetpdaPeer::FECENT, CadetpdaPeer::TIPTRA, CadetpdaPeer::DIRORI, CadetpdaPeer::CODEDO, CadetpdaPeer::CATIPALM_ID, CadetpdaPeer::TMART, CadetpdaPeer::CODPRO, CadetpdaPeer::OBSERV, CadetpdaPeer::MES, CadetpdaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpda', 'ordcom', 'codart', 'desart', 'canart', 'fecent', 'tiptra', 'dirori', 'codedo', 'catipalm_id', 'tmart', 'codpro', 'observ', 'mes', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpda' => 0, 'Ordcom' => 1, 'Codart' => 2, 'Desart' => 3, 'Canart' => 4, 'Fecent' => 5, 'Tiptra' => 6, 'Dirori' => 7, 'Codedo' => 8, 'CatipalmId' => 9, 'Tmart' => 10, 'Codpro' => 11, 'Observ' => 12, 'Mes' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (CadetpdaPeer::REFPDA => 0, CadetpdaPeer::ORDCOM => 1, CadetpdaPeer::CODART => 2, CadetpdaPeer::DESART => 3, CadetpdaPeer::CANART => 4, CadetpdaPeer::FECENT => 5, CadetpdaPeer::TIPTRA => 6, CadetpdaPeer::DIRORI => 7, CadetpdaPeer::CODEDO => 8, CadetpdaPeer::CATIPALM_ID => 9, CadetpdaPeer::TMART => 10, CadetpdaPeer::CODPRO => 11, CadetpdaPeer::OBSERV => 12, CadetpdaPeer::MES => 13, CadetpdaPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refpda' => 0, 'ordcom' => 1, 'codart' => 2, 'desart' => 3, 'canart' => 4, 'fecent' => 5, 'tiptra' => 6, 'dirori' => 7, 'codedo' => 8, 'catipalm_id' => 9, 'tmart' => 10, 'codpro' => 11, 'observ' => 12, 'mes' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CadetpdaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CadetpdaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadetpdaPeer::getTableMap();
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
		return str_replace(CadetpdaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadetpdaPeer::REFPDA);

		$criteria->addSelectColumn(CadetpdaPeer::ORDCOM);

		$criteria->addSelectColumn(CadetpdaPeer::CODART);

		$criteria->addSelectColumn(CadetpdaPeer::DESART);

		$criteria->addSelectColumn(CadetpdaPeer::CANART);

		$criteria->addSelectColumn(CadetpdaPeer::FECENT);

		$criteria->addSelectColumn(CadetpdaPeer::TIPTRA);

		$criteria->addSelectColumn(CadetpdaPeer::DIRORI);

		$criteria->addSelectColumn(CadetpdaPeer::CODEDO);

		$criteria->addSelectColumn(CadetpdaPeer::CATIPALM_ID);

		$criteria->addSelectColumn(CadetpdaPeer::TMART);

		$criteria->addSelectColumn(CadetpdaPeer::CODPRO);

		$criteria->addSelectColumn(CadetpdaPeer::OBSERV);

		$criteria->addSelectColumn(CadetpdaPeer::MES);

		$criteria->addSelectColumn(CadetpdaPeer::ID);

	}

	const COUNT = 'COUNT(cadetpda.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadetpda.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadetpdaPeer::doSelectRS($criteria, $con);
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
		$objects = CadetpdaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadetpdaPeer::populateObjects(CadetpdaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadetpdaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadetpdaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatipalm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);

		$rs = CadetpdaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCaprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);

		$rs = CadetpdaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatipalm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadetpdaPeer::addSelectColumns($c);
		$startcol = (CadetpdaPeer::NUM_COLUMNS - CadetpdaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatipalmPeer::addSelectColumns($c);

		$c->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadetpdaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatipalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatipalm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadetpda($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadetpdas();
				$obj2->addCadetpda($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCaprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadetpdaPeer::addSelectColumns($c);
		$startcol = (CadetpdaPeer::NUM_COLUMNS - CadetpdaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CaproveePeer::addSelectColumns($c);

		$c->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadetpdaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCaprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadetpda($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadetpdas();
				$obj2->addCadetpda($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadetpdaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);
	
			$criteria->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);
	
		$rs = CadetpdaPeer::doSelectRS($criteria, $con);
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

		CadetpdaPeer::addSelectColumns($c);
		$startcol2 = (CadetpdaPeer::NUM_COLUMNS - CadetpdaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatipalmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatipalmPeer::NUM_COLUMNS;
	
			CaproveePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CaproveePeer::NUM_COLUMNS;
	
			$c->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);
	
			$c->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadetpdaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CatipalmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatipalm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadetpda($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCadetpdas();
					$obj2->addCadetpda($obj1);
				}
	

							
				$omClass = CaproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCaprovee(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadetpda($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCadetpdas();
					$obj3->addCadetpda($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCatipalm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadetpdaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);
		
			$rs = CadetpdaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCaprovee(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadetpdaPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadetpdaPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);
		
			$rs = CadetpdaPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCatipalm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadetpdaPeer::addSelectColumns($c);
		$startcol2 = (CadetpdaPeer::NUM_COLUMNS - CadetpdaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CaproveePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CaproveePeer::NUM_COLUMNS;
	
			$c->addJoin(CadetpdaPeer::CODPRO, CaproveePeer::CODPRO);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadetpdaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CaproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCaprovee(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadetpda($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadetpdas();
					$obj2->addCadetpda($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCaprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadetpdaPeer::addSelectColumns($c);
		$startcol2 = (CadetpdaPeer::NUM_COLUMNS - CadetpdaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatipalmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatipalmPeer::NUM_COLUMNS;
	
			$c->addJoin(CadetpdaPeer::CATIPALM_ID, CatipalmPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadetpdaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CatipalmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatipalm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadetpda($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCadetpdas();
					$obj2->addCadetpda($obj1);
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
		return CadetpdaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadetpdaPeer::ID); 

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
			$comparison = $criteria->getComparison(CadetpdaPeer::ID);
			$selectCriteria->add(CadetpdaPeer::ID, $criteria->remove(CadetpdaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadetpdaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadetpdaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadetpda) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadetpdaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadetpda $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadetpdaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadetpdaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadetpdaPeer::DATABASE_NAME, CadetpdaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadetpdaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadetpdaPeer::DATABASE_NAME);

		$criteria->add(CadetpdaPeer::ID, $pk);


		$v = CadetpdaPeer::doSelect($criteria, $con);

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
			$criteria->add(CadetpdaPeer::ID, $pks, Criteria::IN);
			$objs = CadetpdaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadetpdaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CadetpdaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CadetpdaMapBuilder');
}
