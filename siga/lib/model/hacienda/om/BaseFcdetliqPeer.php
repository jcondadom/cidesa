<?php


abstract class BaseFcdetliqPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdetliq';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcdetliq';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMLIQ = 'fcdetliq.NUMLIQ';

	
	const NUMPAG = 'fcdetliq.NUMPAG';

	
	const FECPAG = 'fcdetliq.FECPAG';

	
	const RIFCON = 'fcdetliq.RIFCON';

	
	const NOMCON = 'fcdetliq.NOMCON';

	
	const DESPAG = 'fcdetliq.DESPAG';

	
	const MONPAG = 'fcdetliq.MONPAG';

	
	const ID = 'fcdetliq.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numliq', 'Numpag', 'Fecpag', 'Rifcon', 'Nomcon', 'Despag', 'Monpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdetliqPeer::NUMLIQ, FcdetliqPeer::NUMPAG, FcdetliqPeer::FECPAG, FcdetliqPeer::RIFCON, FcdetliqPeer::NOMCON, FcdetliqPeer::DESPAG, FcdetliqPeer::MONPAG, FcdetliqPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numliq', 'numpag', 'fecpag', 'rifcon', 'nomcon', 'despag', 'monpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numliq' => 0, 'Numpag' => 1, 'Fecpag' => 2, 'Rifcon' => 3, 'Nomcon' => 4, 'Despag' => 5, 'Monpag' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FcdetliqPeer::NUMLIQ => 0, FcdetliqPeer::NUMPAG => 1, FcdetliqPeer::FECPAG => 2, FcdetliqPeer::RIFCON => 3, FcdetliqPeer::NOMCON => 4, FcdetliqPeer::DESPAG => 5, FcdetliqPeer::MONPAG => 6, FcdetliqPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('numliq' => 0, 'numpag' => 1, 'fecpag' => 2, 'rifcon' => 3, 'nomcon' => 4, 'despag' => 5, 'monpag' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcdetliqMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcdetliqMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdetliqPeer::getTableMap();
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
		return str_replace(FcdetliqPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdetliqPeer::NUMLIQ);

		$criteria->addSelectColumn(FcdetliqPeer::NUMPAG);

		$criteria->addSelectColumn(FcdetliqPeer::FECPAG);

		$criteria->addSelectColumn(FcdetliqPeer::RIFCON);

		$criteria->addSelectColumn(FcdetliqPeer::NOMCON);

		$criteria->addSelectColumn(FcdetliqPeer::DESPAG);

		$criteria->addSelectColumn(FcdetliqPeer::MONPAG);

		$criteria->addSelectColumn(FcdetliqPeer::ID);

	}

	const COUNT = 'COUNT(fcdetliq.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdetliq.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdetliqPeer::doSelectRS($criteria, $con);
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
		$objects = FcdetliqPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdetliqPeer::populateObjects(FcdetliqPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdetliqPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdetliqPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFcliqpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);

		$rs = FcdetliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcpagos(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);

		$rs = FcdetliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFcconrep(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);

		$rs = FcdetliqPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFcliqpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcliqpagPeer::addSelectColumns($c);

		$c->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcliqpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcliqpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcdetliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcdetliqs();
				$obj2->addFcdetliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcpagos(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcpagosPeer::addSelectColumns($c);

		$c->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcpagosPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcpagos(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcdetliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcdetliqs();
				$obj2->addFcdetliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFcconrep(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcconrepPeer::addSelectColumns($c);

		$c->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcconrepPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcconrep(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcdetliq($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcdetliqs();
				$obj2->addFcdetliq($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetliqPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
	
			$criteria->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
	
			$criteria->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
	
		$rs = FcdetliqPeer::doSelectRS($criteria, $con);
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

		FcdetliqPeer::addSelectColumns($c);
		$startcol2 = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FcliqpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FcliqpagPeer::NUM_COLUMNS;
	
			FcpagosPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FcpagosPeer::NUM_COLUMNS;
	
			FcconrepPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + FcconrepPeer::NUM_COLUMNS;
	
			$c->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
	
			$c->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
	
			$c->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FcliqpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFcliqpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFcdetliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFcdetliqs();
					$obj2->addFcdetliq($obj1);
				}
	

							
				$omClass = FcpagosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFcpagos(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFcdetliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFcdetliqs();
					$obj3->addFcdetliq($obj1);
				}
	

							
				$omClass = FcconrepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getFcconrep(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addFcdetliq($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initFcdetliqs();
					$obj4->addFcdetliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFcliqpag(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
		
				$criteria->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
		
			$rs = FcdetliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFcpagos(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
		
				$criteria->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
		
			$rs = FcdetliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFcconrep(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FcdetliqPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
		
				$criteria->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
		
			$rs = FcdetliqPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFcliqpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol2 = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FcpagosPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FcpagosPeer::NUM_COLUMNS;
	
			FcconrepPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FcconrepPeer::NUM_COLUMNS;
	
			$c->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
	
			$c->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FcpagosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFcpagos(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFcdetliqs();
					$obj2->addFcdetliq($obj1);
				}
	
				$omClass = FcconrepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFcconrep(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFcdetliqs();
					$obj3->addFcdetliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcpagos(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol2 = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FcliqpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FcliqpagPeer::NUM_COLUMNS;
	
			FcconrepPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FcconrepPeer::NUM_COLUMNS;
	
			$c->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
	
			$c->addJoin(FcdetliqPeer::RIFCON, FcconrepPeer::RIFCON);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FcliqpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFcliqpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFcdetliqs();
					$obj2->addFcdetliq($obj1);
				}
	
				$omClass = FcconrepPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFcconrep(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFcdetliqs();
					$obj3->addFcdetliq($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFcconrep(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcdetliqPeer::addSelectColumns($c);
		$startcol2 = (FcdetliqPeer::NUM_COLUMNS - FcdetliqPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FcliqpagPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FcliqpagPeer::NUM_COLUMNS;
	
			FcpagosPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FcpagosPeer::NUM_COLUMNS;
	
			$c->addJoin(FcdetliqPeer::NUMLIQ, FcliqpagPeer::NUMLIQ);
	
			$c->addJoin(FcdetliqPeer::NUMPAG, FcpagosPeer::NUMPAG);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcdetliqPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FcliqpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFcliqpag(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFcdetliqs();
					$obj2->addFcdetliq($obj1);
				}
	
				$omClass = FcpagosPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFcpagos(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFcdetliq($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFcdetliqs();
					$obj3->addFcdetliq($obj1);
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
		return FcdetliqPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcdetliqPeer::ID); 

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
			$comparison = $criteria->getComparison(FcdetliqPeer::ID);
			$selectCriteria->add(FcdetliqPeer::ID, $criteria->remove(FcdetliqPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdetliqPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdetliqPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdetliq) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdetliqPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdetliq $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdetliqPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdetliqPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdetliqPeer::DATABASE_NAME, FcdetliqPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdetliqPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdetliqPeer::DATABASE_NAME);

		$criteria->add(FcdetliqPeer::ID, $pk);


		$v = FcdetliqPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdetliqPeer::ID, $pks, Criteria::IN);
			$objs = FcdetliqPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdetliqPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcdetliqMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcdetliqMapBuilder');
}
