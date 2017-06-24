<?php


abstract class BaseLidetcroentmodcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidetcroentmodcont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lidetcroentmodcont';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMMOD = 'lidetcroentmodcont.NUMMOD';

	
	const CODART = 'lidetcroentmodcont.CODART';

	
	const CANTID = 'lidetcroentmodcont.CANTID';

	
	const CODUNIADM = 'lidetcroentmodcont.CODUNIADM';

	
	const FECENTCONT = 'lidetcroentmodcont.FECENTCONT';

	
	const FECENT = 'lidetcroentmodcont.FECENT';

	
	const CONDIC = 'lidetcroentmodcont.CONDIC';

	
	const CANTIDREC = 'lidetcroentmodcont.CANTIDREC';

	
	const FECREC = 'lidetcroentmodcont.FECREC';

	
	const OBSERVACION = 'lidetcroentmodcont.OBSERVACION';

	
	const TIPCONPUB = 'lidetcroentmodcont.TIPCONPUB';

	
	const LIDETCROENTCONTOB_ID = 'lidetcroentmodcont.LIDETCROENTCONTOB_ID';

	
	const NUMVAL = 'lidetcroentmodcont.NUMVAL';

	
	const ID = 'lidetcroentmodcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod', 'Codart', 'Cantid', 'Coduniadm', 'Fecentcont', 'Fecent', 'Condic', 'Cantidrec', 'Fecrec', 'Observacion', 'Tipconpub', 'LidetcroentcontobId', 'Numval', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidetcroentmodcontPeer::NUMMOD, LidetcroentmodcontPeer::CODART, LidetcroentmodcontPeer::CANTID, LidetcroentmodcontPeer::CODUNIADM, LidetcroentmodcontPeer::FECENTCONT, LidetcroentmodcontPeer::FECENT, LidetcroentmodcontPeer::CONDIC, LidetcroentmodcontPeer::CANTIDREC, LidetcroentmodcontPeer::FECREC, LidetcroentmodcontPeer::OBSERVACION, LidetcroentmodcontPeer::TIPCONPUB, LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentmodcontPeer::NUMVAL, LidetcroentmodcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod', 'codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'lidetcroentcontob_id', 'numval', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod' => 0, 'Codart' => 1, 'Cantid' => 2, 'Coduniadm' => 3, 'Fecentcont' => 4, 'Fecent' => 5, 'Condic' => 6, 'Cantidrec' => 7, 'Fecrec' => 8, 'Observacion' => 9, 'Tipconpub' => 10, 'LidetcroentcontobId' => 11, 'Numval' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (LidetcroentmodcontPeer::NUMMOD => 0, LidetcroentmodcontPeer::CODART => 1, LidetcroentmodcontPeer::CANTID => 2, LidetcroentmodcontPeer::CODUNIADM => 3, LidetcroentmodcontPeer::FECENTCONT => 4, LidetcroentmodcontPeer::FECENT => 5, LidetcroentmodcontPeer::CONDIC => 6, LidetcroentmodcontPeer::CANTIDREC => 7, LidetcroentmodcontPeer::FECREC => 8, LidetcroentmodcontPeer::OBSERVACION => 9, LidetcroentmodcontPeer::TIPCONPUB => 10, LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID => 11, LidetcroentmodcontPeer::NUMVAL => 12, LidetcroentmodcontPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod' => 0, 'codart' => 1, 'cantid' => 2, 'coduniadm' => 3, 'fecentcont' => 4, 'fecent' => 5, 'condic' => 6, 'cantidrec' => 7, 'fecrec' => 8, 'observacion' => 9, 'tipconpub' => 10, 'lidetcroentcontob_id' => 11, 'numval' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LidetcroentmodcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LidetcroentmodcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidetcroentmodcontPeer::getTableMap();
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
		return str_replace(LidetcroentmodcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidetcroentmodcontPeer::NUMMOD);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::CODART);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::CANTID);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::CODUNIADM);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::FECENTCONT);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::FECENT);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::CONDIC);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::CANTIDREC);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::FECREC);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::OBSERVACION);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::TIPCONPUB);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::NUMVAL);

		$criteria->addSelectColumn(LidetcroentmodcontPeer::ID);

	}

	const COUNT = 'COUNT(lidetcroentmodcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidetcroentmodcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
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
		$objects = LidetcroentmodcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidetcroentmodcontPeer::populateObjects(LidetcroentmodcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidetcroentmodcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidetcroentmodcontPeer::getOMClass();
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
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);

		$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiuniadm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);

		$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLidetcroentcontob(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);

		$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
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

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LimodcontPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

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
										$temp_obj2->addLidetcroentmodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentmodconts();
				$obj2->addLidetcroentmodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiuniadm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiuniadmPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiuniadmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiuniadm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentmodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentmodconts();
				$obj2->addLidetcroentmodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLidetcroentcontob(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidetcroentcontobPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidetcroentcontobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidetcroentcontob(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentmodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentmodconts();
				$obj2->addLidetcroentmodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$criteria->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$criteria->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
	
		$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
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

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			LidetcroentcontobPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidetcroentcontobPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$c->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();


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
						$temp_obj2->addLidetcroentmodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentmodconts();
					$obj2->addLidetcroentmodcont($obj1);
				}
	

							
				$omClass = LiuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentmodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentmodconts();
					$obj3->addLidetcroentmodcont($obj1);
				}
	

							
				$omClass = LidetcroentcontobPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidetcroentcontob(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLidetcroentmodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLidetcroentmodconts();
					$obj4->addLidetcroentmodcont($obj1);
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
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
		
			$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLiuniadm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
		
				$criteria->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
		
			$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLidetcroentcontob(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentmodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
		
				$criteria->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
			$rs = LidetcroentmodcontPeer::doSelectRS($criteria, $con);
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

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiuniadmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiuniadmPeer::NUM_COLUMNS;
	
			LidetcroentcontobPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidetcroentcontobPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiuniadm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentmodconts();
					$obj2->addLidetcroentmodcont($obj1);
				}
	
				$omClass = LidetcroentcontobPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidetcroentcontob(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentmodconts();
					$obj3->addLidetcroentmodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiuniadm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			LidetcroentcontobPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidetcroentcontobPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$c->addJoin(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, LidetcroentcontobPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

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
						$temp_obj2->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentmodconts();
					$obj2->addLidetcroentmodcont($obj1);
				}
	
				$omClass = LidetcroentcontobPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidetcroentcontob(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentmodconts();
					$obj3->addLidetcroentmodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLidetcroentcontob(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentmodcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentmodcontPeer::NUM_COLUMNS - LidetcroentmodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentmodcontPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$c->addJoin(LidetcroentmodcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentmodcontPeer::getOMClass();

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
						$temp_obj2->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentmodconts();
					$obj2->addLidetcroentmodcont($obj1);
				}
	
				$omClass = LiuniadmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiuniadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentmodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentmodconts();
					$obj3->addLidetcroentmodcont($obj1);
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
		return LidetcroentmodcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidetcroentmodcontPeer::ID); 

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
			$comparison = $criteria->getComparison(LidetcroentmodcontPeer::ID);
			$selectCriteria->add(LidetcroentmodcontPeer::ID, $criteria->remove(LidetcroentmodcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidetcroentmodcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidetcroentmodcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidetcroentmodcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidetcroentmodcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidetcroentmodcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidetcroentmodcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidetcroentmodcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidetcroentmodcontPeer::DATABASE_NAME, LidetcroentmodcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidetcroentmodcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidetcroentmodcontPeer::DATABASE_NAME);

		$criteria->add(LidetcroentmodcontPeer::ID, $pk);


		$v = LidetcroentmodcontPeer::doSelect($criteria, $con);

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
			$criteria->add(LidetcroentmodcontPeer::ID, $pks, Criteria::IN);
			$objs = LidetcroentmodcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidetcroentmodcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LidetcroentmodcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LidetcroentmodcontMapBuilder');
}
