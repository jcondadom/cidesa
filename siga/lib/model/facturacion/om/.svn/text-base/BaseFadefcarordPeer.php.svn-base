<?php


abstract class BaseFadefcarordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fadefcarord';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fadefcarord';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NIVFAM = 'fadefcarord.NIVFAM';

	
	const CODPRG = 'fadefcarord.CODPRG';

	
	const CONPAGPRE_ID = 'fadefcarord.CONPAGPRE_ID';

	
	const CONPAGPED_ID = 'fadefcarord.CONPAGPED_ID';

	
	const ID = 'fadefcarord.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nivfam', 'Codprg', 'ConpagpreId', 'ConpagpedId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FadefcarordPeer::NIVFAM, FadefcarordPeer::CODPRG, FadefcarordPeer::CONPAGPRE_ID, FadefcarordPeer::CONPAGPED_ID, FadefcarordPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nivfam', 'codprg', 'conpagpre_id', 'conpagped_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nivfam' => 0, 'Codprg' => 1, 'ConpagpreId' => 2, 'ConpagpedId' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (FadefcarordPeer::NIVFAM => 0, FadefcarordPeer::CODPRG => 1, FadefcarordPeer::CONPAGPRE_ID => 2, FadefcarordPeer::CONPAGPED_ID => 3, FadefcarordPeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('nivfam' => 0, 'codprg' => 1, 'conpagpre_id' => 2, 'conpagped_id' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FadefcarordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FadefcarordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FadefcarordPeer::getTableMap();
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
		return str_replace(FadefcarordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FadefcarordPeer::NIVFAM);

		$criteria->addSelectColumn(FadefcarordPeer::CODPRG);

		$criteria->addSelectColumn(FadefcarordPeer::CONPAGPRE_ID);

		$criteria->addSelectColumn(FadefcarordPeer::CONPAGPED_ID);

		$criteria->addSelectColumn(FadefcarordPeer::ID);

	}

	const COUNT = 'COUNT(fadefcarord.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fadefcarord.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FadefcarordPeer::doSelectRS($criteria, $con);
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
		$objects = FadefcarordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FadefcarordPeer::populateObjects(FadefcarordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FadefcarordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FadefcarordPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFadefprg(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);

		$rs = FadefcarordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFaconpagRelatedByConpagpreId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);

		$rs = FadefcarordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFaconpagRelatedByConpagpedId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);

		$rs = FadefcarordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFadefprg(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FadefprgPeer::addSelectColumns($c);

		$c->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FadefprgPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFadefprg(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadefcarord($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadefcarords();
				$obj2->addFadefcarord($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFaconpagRelatedByConpagpreId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaconpagPeer::addSelectColumns($c);

		$c->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaconpagRelatedByConpagpreId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadefcarordRelatedByConpagpreId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadefcarordsRelatedByConpagpreId();
				$obj2->addFadefcarordRelatedByConpagpreId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFaconpagRelatedByConpagpedId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaconpagPeer::addSelectColumns($c);

		$c->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaconpagRelatedByConpagpedId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFadefcarordRelatedByConpagpedId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFadefcarordsRelatedByConpagpedId();
				$obj2->addFadefcarordRelatedByConpagpedId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FadefcarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$criteria->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);
	
			$criteria->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);
	
		$rs = FadefcarordPeer::doSelectRS($criteria, $con);
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

		FadefcarordPeer::addSelectColumns($c);
		$startcol2 = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaconpagPeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + FaconpagPeer::NUM_COLUMNS;
	
			$c->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$c->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);
	
			$c->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FadefprgPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefprg(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadefcarord($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFadefcarords();
					$obj2->addFadefcarord($obj1);
				}
	

							
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaconpagRelatedByConpagpreId(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFadefcarordRelatedByConpagpreId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFadefcarordsRelatedByConpagpreId();
					$obj3->addFadefcarordRelatedByConpagpreId($obj1);
				}
	

							
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getFaconpagRelatedByConpagpedId(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addFadefcarordRelatedByConpagpedId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initFadefcarordsRelatedByConpagpedId();
					$obj4->addFadefcarordRelatedByConpagpedId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFadefprg(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);
		
				$criteria->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);
		
			$rs = FadefcarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaconpagRelatedByConpagpreId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
		
			$rs = FadefcarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaconpagRelatedByConpagpedId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FadefcarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
		
			$rs = FadefcarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFadefprg(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol2 = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaconpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaconpagPeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaconpagPeer::NUM_COLUMNS;
	
			$c->addJoin(FadefcarordPeer::CONPAGPRE_ID, FaconpagPeer::ID);
	
			$c->addJoin(FadefcarordPeer::CONPAGPED_ID, FaconpagPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaconpagRelatedByConpagpreId(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadefcarordRelatedByConpagpreId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFadefcarordsRelatedByConpagpreId();
					$obj2->addFadefcarordRelatedByConpagpreId($obj1);
				}
	
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaconpagRelatedByConpagpedId(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFadefcarordRelatedByConpagpedId($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFadefcarordsRelatedByConpagpedId();
					$obj3->addFadefcarordRelatedByConpagpedId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaconpagRelatedByConpagpreId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol2 = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			$c->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FadefprgPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefprg(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadefcarord($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFadefcarords();
					$obj2->addFadefcarord($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaconpagRelatedByConpagpedId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FadefcarordPeer::addSelectColumns($c);
		$startcol2 = (FadefcarordPeer::NUM_COLUMNS - FadefcarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			$c->addJoin(FadefcarordPeer::CODPRG, FadefprgPeer::CODPRG);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FadefcarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FadefprgPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadefprg(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFadefcarord($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFadefcarords();
					$obj2->addFadefcarord($obj1);
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
		return FadefcarordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FadefcarordPeer::ID); 

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
			$comparison = $criteria->getComparison(FadefcarordPeer::ID);
			$selectCriteria->add(FadefcarordPeer::ID, $criteria->remove(FadefcarordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FadefcarordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FadefcarordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fadefcarord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FadefcarordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fadefcarord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FadefcarordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FadefcarordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FadefcarordPeer::DATABASE_NAME, FadefcarordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FadefcarordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FadefcarordPeer::DATABASE_NAME);

		$criteria->add(FadefcarordPeer::ID, $pk);


		$v = FadefcarordPeer::doSelect($criteria, $con);

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
			$criteria->add(FadefcarordPeer::ID, $pks, Criteria::IN);
			$objs = FadefcarordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFadefcarordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FadefcarordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FadefcarordMapBuilder');
}
