<?php


abstract class BaseLiregforpagmodcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liregforpagmodcont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liregforpagmodcont';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMMOD = 'liregforpagmodcont.NUMMOD';

	
	const DESANT = 'liregforpagmodcont.DESANT';

	
	const PORANT = 'liregforpagmodcont.PORANT';

	
	const MONTOT = 'liregforpagmodcont.MONTOT';

	
	const MONREC = 'liregforpagmodcont.MONREC';

	
	const SUBTOT = 'liregforpagmodcont.SUBTOT';

	
	const PORAMOANT = 'liregforpagmodcont.PORAMOANT';

	
	const NETPAG = 'liregforpagmodcont.NETPAG';

	
	const FECANT = 'liregforpagmodcont.FECANT';

	
	const CONDIC = 'liregforpagmodcont.CONDIC';

	
	const TIPCONPUB = 'liregforpagmodcont.TIPCONPUB';

	
	const NUMORD = 'liregforpagmodcont.NUMORD';

	
	const NUMCHE = 'liregforpagmodcont.NUMCHE';

	
	const FECCOM = 'liregforpagmodcont.FECCOM';

	
	const FECCAU = 'liregforpagmodcont.FECCAU';

	
	const FECPAG = 'liregforpagmodcont.FECPAG';

	
	const LIREGFORPAGCONT_ID = 'liregforpagmodcont.LIREGFORPAGCONT_ID';

	
	const NUMVAL = 'liregforpagmodcont.NUMVAL';

	
	const ID = 'liregforpagmodcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod', 'Desant', 'Porant', 'Montot', 'Monrec', 'Subtot', 'Poramoant', 'Netpag', 'Fecant', 'Condic', 'Tipconpub', 'Numord', 'Numche', 'Feccom', 'Feccau', 'Fecpag', 'LiregforpagcontId', 'Numval', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiregforpagmodcontPeer::NUMMOD, LiregforpagmodcontPeer::DESANT, LiregforpagmodcontPeer::PORANT, LiregforpagmodcontPeer::MONTOT, LiregforpagmodcontPeer::MONREC, LiregforpagmodcontPeer::SUBTOT, LiregforpagmodcontPeer::PORAMOANT, LiregforpagmodcontPeer::NETPAG, LiregforpagmodcontPeer::FECANT, LiregforpagmodcontPeer::CONDIC, LiregforpagmodcontPeer::TIPCONPUB, LiregforpagmodcontPeer::NUMORD, LiregforpagmodcontPeer::NUMCHE, LiregforpagmodcontPeer::FECCOM, LiregforpagmodcontPeer::FECCAU, LiregforpagmodcontPeer::FECPAG, LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagmodcontPeer::NUMVAL, LiregforpagmodcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod', 'desant', 'porant', 'montot', 'monrec', 'subtot', 'poramoant', 'netpag', 'fecant', 'condic', 'tipconpub', 'numord', 'numche', 'feccom', 'feccau', 'fecpag', 'liregforpagcont_id', 'numval', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod' => 0, 'Desant' => 1, 'Porant' => 2, 'Montot' => 3, 'Monrec' => 4, 'Subtot' => 5, 'Poramoant' => 6, 'Netpag' => 7, 'Fecant' => 8, 'Condic' => 9, 'Tipconpub' => 10, 'Numord' => 11, 'Numche' => 12, 'Feccom' => 13, 'Feccau' => 14, 'Fecpag' => 15, 'LiregforpagcontId' => 16, 'Numval' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (LiregforpagmodcontPeer::NUMMOD => 0, LiregforpagmodcontPeer::DESANT => 1, LiregforpagmodcontPeer::PORANT => 2, LiregforpagmodcontPeer::MONTOT => 3, LiregforpagmodcontPeer::MONREC => 4, LiregforpagmodcontPeer::SUBTOT => 5, LiregforpagmodcontPeer::PORAMOANT => 6, LiregforpagmodcontPeer::NETPAG => 7, LiregforpagmodcontPeer::FECANT => 8, LiregforpagmodcontPeer::CONDIC => 9, LiregforpagmodcontPeer::TIPCONPUB => 10, LiregforpagmodcontPeer::NUMORD => 11, LiregforpagmodcontPeer::NUMCHE => 12, LiregforpagmodcontPeer::FECCOM => 13, LiregforpagmodcontPeer::FECCAU => 14, LiregforpagmodcontPeer::FECPAG => 15, LiregforpagmodcontPeer::LIREGFORPAGCONT_ID => 16, LiregforpagmodcontPeer::NUMVAL => 17, LiregforpagmodcontPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod' => 0, 'desant' => 1, 'porant' => 2, 'montot' => 3, 'monrec' => 4, 'subtot' => 5, 'poramoant' => 6, 'netpag' => 7, 'fecant' => 8, 'condic' => 9, 'tipconpub' => 10, 'numord' => 11, 'numche' => 12, 'feccom' => 13, 'feccau' => 14, 'fecpag' => 15, 'liregforpagcont_id' => 16, 'numval' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiregforpagmodcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiregforpagmodcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiregforpagmodcontPeer::getTableMap();
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
		return str_replace(LiregforpagmodcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiregforpagmodcontPeer::NUMMOD);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::DESANT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::PORANT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::MONTOT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::MONREC);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::SUBTOT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::PORAMOANT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::NETPAG);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::FECANT);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::CONDIC);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::TIPCONPUB);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::NUMORD);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::NUMCHE);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::FECCOM);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::FECCAU);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::FECPAG);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::NUMVAL);

		$criteria->addSelectColumn(LiregforpagmodcontPeer::ID);

	}

	const COUNT = 'COUNT(liregforpagmodcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liregforpagmodcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
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
		$objects = LiregforpagmodcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiregforpagmodcontPeer::populateObjects(LiregforpagmodcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiregforpagmodcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiregforpagmodcontPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLimodcont(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);

		$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiregforpagcont(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);

		$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLimodcont(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregforpagmodcontPeer::addSelectColumns($c);
		$startcol = (LiregforpagmodcontPeer::NUM_COLUMNS - LiregforpagmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LimodcontPeer::addSelectColumns($c);

		$c->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregforpagmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLimodcont(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregforpagmodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregforpagmodconts();
				$obj2->addLiregforpagmodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiregforpagcont(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregforpagmodcontPeer::addSelectColumns($c);
		$startcol = (LiregforpagmodcontPeer::NUM_COLUMNS - LiregforpagmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiregforpagcontPeer::addSelectColumns($c);

		$c->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregforpagmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiregforpagcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiregforpagcont(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregforpagmodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregforpagmodconts();
				$obj2->addLiregforpagmodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$criteria->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);
	
		$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
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

		LiregforpagmodcontPeer::addSelectColumns($c);
		$startcol2 = (LiregforpagmodcontPeer::NUM_COLUMNS - LiregforpagmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			LiregforpagcontPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiregforpagcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$c->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregforpagmodcontPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LimodcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLimodcont(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiregforpagmodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregforpagmodconts();
					$obj2->addLiregforpagmodcont($obj1);
				}
	

							
				$omClass = LiregforpagcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiregforpagcont(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregforpagmodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregforpagmodconts();
					$obj3->addLiregforpagmodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLimodcont(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);
		
			$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLiregforpagcont(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregforpagmodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
		
			$rs = LiregforpagmodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLimodcont(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregforpagmodcontPeer::addSelectColumns($c);
		$startcol2 = (LiregforpagmodcontPeer::NUM_COLUMNS - LiregforpagmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiregforpagcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiregforpagcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, LiregforpagcontPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregforpagmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiregforpagcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiregforpagcont(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiregforpagmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregforpagmodconts();
					$obj2->addLiregforpagmodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiregforpagcont(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregforpagmodcontPeer::addSelectColumns($c);
		$startcol2 = (LiregforpagmodcontPeer::NUM_COLUMNS - LiregforpagmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregforpagmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregforpagmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LimodcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLimodcont(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiregforpagmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregforpagmodconts();
					$obj2->addLiregforpagmodcont($obj1);
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
		return LiregforpagmodcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiregforpagmodcontPeer::ID); 

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
			$comparison = $criteria->getComparison(LiregforpagmodcontPeer::ID);
			$selectCriteria->add(LiregforpagmodcontPeer::ID, $criteria->remove(LiregforpagmodcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiregforpagmodcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiregforpagmodcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liregforpagmodcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiregforpagmodcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liregforpagmodcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiregforpagmodcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiregforpagmodcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiregforpagmodcontPeer::DATABASE_NAME, LiregforpagmodcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiregforpagmodcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiregforpagmodcontPeer::DATABASE_NAME);

		$criteria->add(LiregforpagmodcontPeer::ID, $pk);


		$v = LiregforpagmodcontPeer::doSelect($criteria, $con);

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
			$criteria->add(LiregforpagmodcontPeer::ID, $pks, Criteria::IN);
			$objs = LiregforpagmodcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiregforpagmodcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiregforpagmodcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiregforpagmodcontMapBuilder');
}
