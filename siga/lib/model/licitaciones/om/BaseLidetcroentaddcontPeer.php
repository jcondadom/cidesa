<?php


abstract class BaseLidetcroentaddcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidetcroentaddcont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lidetcroentaddcont';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMADD = 'lidetcroentaddcont.NUMADD';

	
	const CODART = 'lidetcroentaddcont.CODART';

	
	const CANTID = 'lidetcroentaddcont.CANTID';

	
	const CODUNIADM = 'lidetcroentaddcont.CODUNIADM';

	
	const FECENTCONT = 'lidetcroentaddcont.FECENTCONT';

	
	const FECENT = 'lidetcroentaddcont.FECENT';

	
	const CONDIC = 'lidetcroentaddcont.CONDIC';

	
	const CANTIDREC = 'lidetcroentaddcont.CANTIDREC';

	
	const FECREC = 'lidetcroentaddcont.FECREC';

	
	const OBSERVACION = 'lidetcroentaddcont.OBSERVACION';

	
	const TIPCONPUB = 'lidetcroentaddcont.TIPCONPUB';

	
	const LIDETCROENTCONT_ID = 'lidetcroentaddcont.LIDETCROENTCONT_ID';

	
	const NUMVAL = 'lidetcroentaddcont.NUMVAL';

	
	const ID = 'lidetcroentaddcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numadd', 'Codart', 'Cantid', 'Coduniadm', 'Fecentcont', 'Fecent', 'Condic', 'Cantidrec', 'Fecrec', 'Observacion', 'Tipconpub', 'LidetcroentcontId', 'Numval', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidetcroentaddcontPeer::NUMADD, LidetcroentaddcontPeer::CODART, LidetcroentaddcontPeer::CANTID, LidetcroentaddcontPeer::CODUNIADM, LidetcroentaddcontPeer::FECENTCONT, LidetcroentaddcontPeer::FECENT, LidetcroentaddcontPeer::CONDIC, LidetcroentaddcontPeer::CANTIDREC, LidetcroentaddcontPeer::FECREC, LidetcroentaddcontPeer::OBSERVACION, LidetcroentaddcontPeer::TIPCONPUB, LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentaddcontPeer::NUMVAL, LidetcroentaddcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numadd', 'codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'lidetcroentcont_id', 'numval', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numadd' => 0, 'Codart' => 1, 'Cantid' => 2, 'Coduniadm' => 3, 'Fecentcont' => 4, 'Fecent' => 5, 'Condic' => 6, 'Cantidrec' => 7, 'Fecrec' => 8, 'Observacion' => 9, 'Tipconpub' => 10, 'LidetcroentcontId' => 11, 'Numval' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (LidetcroentaddcontPeer::NUMADD => 0, LidetcroentaddcontPeer::CODART => 1, LidetcroentaddcontPeer::CANTID => 2, LidetcroentaddcontPeer::CODUNIADM => 3, LidetcroentaddcontPeer::FECENTCONT => 4, LidetcroentaddcontPeer::FECENT => 5, LidetcroentaddcontPeer::CONDIC => 6, LidetcroentaddcontPeer::CANTIDREC => 7, LidetcroentaddcontPeer::FECREC => 8, LidetcroentaddcontPeer::OBSERVACION => 9, LidetcroentaddcontPeer::TIPCONPUB => 10, LidetcroentaddcontPeer::LIDETCROENTCONT_ID => 11, LidetcroentaddcontPeer::NUMVAL => 12, LidetcroentaddcontPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numadd' => 0, 'codart' => 1, 'cantid' => 2, 'coduniadm' => 3, 'fecentcont' => 4, 'fecent' => 5, 'condic' => 6, 'cantidrec' => 7, 'fecrec' => 8, 'observacion' => 9, 'tipconpub' => 10, 'lidetcroentcont_id' => 11, 'numval' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LidetcroentaddcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LidetcroentaddcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidetcroentaddcontPeer::getTableMap();
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
		return str_replace(LidetcroentaddcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidetcroentaddcontPeer::NUMADD);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::CODART);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::CANTID);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::CODUNIADM);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::FECENTCONT);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::FECENT);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::CONDIC);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::CANTIDREC);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::FECREC);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::OBSERVACION);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::TIPCONPUB);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::LIDETCROENTCONT_ID);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::NUMVAL);

		$criteria->addSelectColumn(LidetcroentaddcontPeer::ID);

	}

	const COUNT = 'COUNT(lidetcroentaddcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidetcroentaddcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
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
		$objects = LidetcroentaddcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidetcroentaddcontPeer::populateObjects(LidetcroentaddcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidetcroentaddcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidetcroentaddcontPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLiaddendum(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);

		$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);

		$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLidetcroentcont(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);

		$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLiaddendum(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiaddendumPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiaddendum(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentaddcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentaddconts();
				$obj2->addLidetcroentaddcont($obj1); 			}
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

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiuniadmPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

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
										$temp_obj2->addLidetcroentaddcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentaddconts();
				$obj2->addLidetcroentaddcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLidetcroentcont(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidetcroentcontPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidetcroentcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidetcroentcont(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentaddcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentaddconts();
				$obj2->addLidetcroentaddcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
	
			$criteria->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$criteria->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
	
		$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
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

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiaddendumPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiaddendumPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			LidetcroentcontPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidetcroentcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
	
			$c->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LiaddendumPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiaddendum(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentaddcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentaddconts();
					$obj2->addLidetcroentaddcont($obj1);
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
						$temp_obj3->addLidetcroentaddcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentaddconts();
					$obj3->addLidetcroentaddcont($obj1);
				}
	

							
				$omClass = LidetcroentcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidetcroentcont(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLidetcroentaddcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLidetcroentaddconts();
					$obj4->addLidetcroentaddcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLiaddendum(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
		
			$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
		
				$criteria->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
		
			$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLidetcroentcont(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentaddcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
		
				$criteria->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
			$rs = LidetcroentaddcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLiaddendum(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiuniadmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiuniadmPeer::NUM_COLUMNS;
	
			LidetcroentcontPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidetcroentcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

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
						$temp_obj2->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentaddconts();
					$obj2->addLidetcroentaddcont($obj1);
				}
	
				$omClass = LidetcroentcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidetcroentcont(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentaddconts();
					$obj3->addLidetcroentaddcont($obj1);
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

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiaddendumPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiaddendumPeer::NUM_COLUMNS;
	
			LidetcroentcontPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidetcroentcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
	
			$c->addJoin(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, LidetcroentcontPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiaddendumPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiaddendum(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentaddconts();
					$obj2->addLidetcroentaddcont($obj1);
				}
	
				$omClass = LidetcroentcontPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidetcroentcont(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentaddconts();
					$obj3->addLidetcroentaddcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLidetcroentcont(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentaddcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentaddcontPeer::NUM_COLUMNS - LidetcroentaddcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiaddendumPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiaddendumPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentaddcontPeer::NUMADD, LiaddendumPeer::NUMADD);
	
			$c->addJoin(LidetcroentaddcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentaddcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiaddendumPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiaddendum(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentaddconts();
					$obj2->addLidetcroentaddcont($obj1);
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
						$temp_obj3->addLidetcroentaddcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentaddconts();
					$obj3->addLidetcroentaddcont($obj1);
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
		return LidetcroentaddcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidetcroentaddcontPeer::ID); 

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
			$comparison = $criteria->getComparison(LidetcroentaddcontPeer::ID);
			$selectCriteria->add(LidetcroentaddcontPeer::ID, $criteria->remove(LidetcroentaddcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidetcroentaddcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidetcroentaddcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidetcroentaddcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidetcroentaddcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidetcroentaddcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidetcroentaddcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidetcroentaddcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidetcroentaddcontPeer::DATABASE_NAME, LidetcroentaddcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidetcroentaddcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidetcroentaddcontPeer::DATABASE_NAME);

		$criteria->add(LidetcroentaddcontPeer::ID, $pk);


		$v = LidetcroentaddcontPeer::doSelect($criteria, $con);

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
			$criteria->add(LidetcroentaddcontPeer::ID, $pks, Criteria::IN);
			$objs = LidetcroentaddcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidetcroentaddcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LidetcroentaddcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LidetcroentaddcontMapBuilder');
}
