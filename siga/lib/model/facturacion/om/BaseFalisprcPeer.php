<?php


abstract class BaseFalisprcPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'falisprc';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Falisprc';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRG = 'falisprc.CODPRG';

	
	const CODTIPCLI = 'falisprc.CODTIPCLI';

	
	const CONPAG_ID = 'falisprc.CONPAG_ID';

	
	const CODART = 'falisprc.CODART';

	
	const PRECIO = 'falisprc.PRECIO';

	
	const FECVIG = 'falisprc.FECVIG';

	
	const ID = 'falisprc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codprg', 'Codtipcli', 'ConpagId', 'Codart', 'Precio', 'Fecvig', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FalisprcPeer::CODPRG, FalisprcPeer::CODTIPCLI, FalisprcPeer::CONPAG_ID, FalisprcPeer::CODART, FalisprcPeer::PRECIO, FalisprcPeer::FECVIG, FalisprcPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codprg', 'codtipcli', 'conpag_id', 'codart', 'precio', 'fecvig', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codprg' => 0, 'Codtipcli' => 1, 'ConpagId' => 2, 'Codart' => 3, 'Precio' => 4, 'Fecvig' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (FalisprcPeer::CODPRG => 0, FalisprcPeer::CODTIPCLI => 1, FalisprcPeer::CONPAG_ID => 2, FalisprcPeer::CODART => 3, FalisprcPeer::PRECIO => 4, FalisprcPeer::FECVIG => 5, FalisprcPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codprg' => 0, 'codtipcli' => 1, 'conpag_id' => 2, 'codart' => 3, 'precio' => 4, 'fecvig' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FalisprcMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FalisprcMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FalisprcPeer::getTableMap();
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
		return str_replace(FalisprcPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FalisprcPeer::CODPRG);

		$criteria->addSelectColumn(FalisprcPeer::CODTIPCLI);

		$criteria->addSelectColumn(FalisprcPeer::CONPAG_ID);

		$criteria->addSelectColumn(FalisprcPeer::CODART);

		$criteria->addSelectColumn(FalisprcPeer::PRECIO);

		$criteria->addSelectColumn(FalisprcPeer::FECVIG);

		$criteria->addSelectColumn(FalisprcPeer::ID);

	}

	const COUNT = 'COUNT(falisprc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT falisprc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FalisprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FalisprcPeer::doSelectRS($criteria, $con);
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
		$objects = FalisprcPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FalisprcPeer::populateObjects(FalisprcPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FalisprcPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FalisprcPeer::getOMClass();
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
			$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FalisprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);

		$rs = FalisprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFatipcte(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FalisprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);

		$rs = FalisprcPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFaconpag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FalisprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);

		$rs = FalisprcPeer::doSelectRS($criteria, $con);
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

		FalisprcPeer::addSelectColumns($c);
		$startcol = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FadefprgPeer::addSelectColumns($c);

		$c->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

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
										$temp_obj2->addFalisprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFalisprcs();
				$obj2->addFalisprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFatipcte(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FalisprcPeer::addSelectColumns($c);
		$startcol = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FatipctePeer::addSelectColumns($c);

		$c->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FatipctePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFatipcte(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFalisprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFalisprcs();
				$obj2->addFalisprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFaconpag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FalisprcPeer::addSelectColumns($c);
		$startcol = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaconpagPeer::addSelectColumns($c);

		$c->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaconpagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaconpag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFalisprc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFalisprcs();
				$obj2->addFalisprc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FalisprcPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$criteria->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
	
			$criteria->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
	
		$rs = FalisprcPeer::doSelectRS($criteria, $con);
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

		FalisprcPeer::addSelectColumns($c);
		$startcol2 = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			FatipctePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FatipctePeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + FaconpagPeer::NUM_COLUMNS;
	
			$c->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$c->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
	
			$c->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();


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
						$temp_obj2->addFalisprc($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFalisprcs();
					$obj2->addFalisprc($obj1);
				}
	

							
				$omClass = FatipctePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFatipcte(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFalisprc($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFalisprcs();
					$obj3->addFalisprc($obj1);
				}
	

							
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getFaconpag(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addFalisprc($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initFalisprcs();
					$obj4->addFalisprc($obj1);
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
				$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FalisprcPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
		
				$criteria->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
		
			$rs = FalisprcPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFatipcte(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FalisprcPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
		
				$criteria->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
		
			$rs = FalisprcPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaconpag(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FalisprcPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FalisprcPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
		
				$criteria->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
		
			$rs = FalisprcPeer::doSelectRS($criteria, $con);
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

		FalisprcPeer::addSelectColumns($c);
		$startcol2 = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FatipctePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FatipctePeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaconpagPeer::NUM_COLUMNS;
	
			$c->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
	
			$c->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FatipctePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFatipcte(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFalisprcs();
					$obj2->addFalisprc($obj1);
				}
	
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaconpag(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFalisprcs();
					$obj3->addFalisprc($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFatipcte(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FalisprcPeer::addSelectColumns($c);
		$startcol2 = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			FaconpagPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaconpagPeer::NUM_COLUMNS;
	
			$c->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$c->addJoin(FalisprcPeer::CONPAG_ID, FaconpagPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

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
						$temp_obj2->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFalisprcs();
					$obj2->addFalisprc($obj1);
				}
	
				$omClass = FaconpagPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaconpag(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFalisprcs();
					$obj3->addFalisprc($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaconpag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FalisprcPeer::addSelectColumns($c);
		$startcol2 = (FalisprcPeer::NUM_COLUMNS - FalisprcPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadefprgPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadefprgPeer::NUM_COLUMNS;
	
			FatipctePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FatipctePeer::NUM_COLUMNS;
	
			$c->addJoin(FalisprcPeer::CODPRG, FadefprgPeer::CODPRG);
	
			$c->addJoin(FalisprcPeer::CODTIPCLI, FatipctePeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FalisprcPeer::getOMClass();

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
						$temp_obj2->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFalisprcs();
					$obj2->addFalisprc($obj1);
				}
	
				$omClass = FatipctePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFatipcte(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFalisprc($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFalisprcs();
					$obj3->addFalisprc($obj1);
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
		return FalisprcPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FalisprcPeer::ID); 

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
			$comparison = $criteria->getComparison(FalisprcPeer::ID);
			$selectCriteria->add(FalisprcPeer::ID, $criteria->remove(FalisprcPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FalisprcPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FalisprcPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Falisprc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FalisprcPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Falisprc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FalisprcPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FalisprcPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FalisprcPeer::DATABASE_NAME, FalisprcPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FalisprcPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FalisprcPeer::DATABASE_NAME);

		$criteria->add(FalisprcPeer::ID, $pk);


		$v = FalisprcPeer::doSelect($criteria, $con);

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
			$criteria->add(FalisprcPeer::ID, $pks, Criteria::IN);
			$objs = FalisprcPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFalisprcPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FalisprcMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FalisprcMapBuilder');
}
