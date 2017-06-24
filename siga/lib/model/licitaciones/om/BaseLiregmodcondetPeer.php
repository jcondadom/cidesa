<?php


abstract class BaseLiregmodcondetPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liregmodcondet';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liregmodcondet';

	
	const NUM_COLUMNS = 20;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMMOD = 'liregmodcondet.NUMMOD';

	
	const CODART = 'liregmodcondet.CODART';

	
	const UNIMED = 'liregmodcondet.UNIMED';

	
	const CANTID = 'liregmodcondet.CANTID';

	
	const PREUNI = 'liregmodcondet.PREUNI';

	
	const MONREC = 'liregmodcondet.MONREC';

	
	const CANTIDAUM = 'liregmodcondet.CANTIDAUM';

	
	const CANTIDDIS = 'liregmodcondet.CANTIDDIS';

	
	const PREUNIREC = 'liregmodcondet.PREUNIREC';

	
	const MONRECREC = 'liregmodcondet.MONRECREC';

	
	const CANTIDADD = 'liregmodcondet.CANTIDADD';

	
	const PREUNIADD = 'liregmodcondet.PREUNIADD';

	
	const MONRECADD = 'liregmodcondet.MONRECADD';

	
	const CANTIDTOT = 'liregmodcondet.CANTIDTOT';

	
	const SUBTOT = 'liregmodcondet.SUBTOT';

	
	const TIPCONPUB = 'liregmodcondet.TIPCONPUB';

	
	const TIPO = 'liregmodcondet.TIPO';

	
	const ELIMINADA = 'liregmodcondet.ELIMINADA';

	
	const LIREGCONDET_ID = 'liregmodcondet.LIREGCONDET_ID';

	
	const ID = 'liregmodcondet.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod', 'Codart', 'Unimed', 'Cantid', 'Preuni', 'Monrec', 'Cantidaum', 'Cantiddis', 'Preunirec', 'Monrecrec', 'Cantidadd', 'Preuniadd', 'Monrecadd', 'Cantidtot', 'Subtot', 'Tipconpub', 'Tipo', 'Eliminada', 'LiregcondetId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiregmodcondetPeer::NUMMOD, LiregmodcondetPeer::CODART, LiregmodcondetPeer::UNIMED, LiregmodcondetPeer::CANTID, LiregmodcondetPeer::PREUNI, LiregmodcondetPeer::MONREC, LiregmodcondetPeer::CANTIDAUM, LiregmodcondetPeer::CANTIDDIS, LiregmodcondetPeer::PREUNIREC, LiregmodcondetPeer::MONRECREC, LiregmodcondetPeer::CANTIDADD, LiregmodcondetPeer::PREUNIADD, LiregmodcondetPeer::MONRECADD, LiregmodcondetPeer::CANTIDTOT, LiregmodcondetPeer::SUBTOT, LiregmodcondetPeer::TIPCONPUB, LiregmodcondetPeer::TIPO, LiregmodcondetPeer::ELIMINADA, LiregmodcondetPeer::LIREGCONDET_ID, LiregmodcondetPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod', 'codart', 'unimed', 'cantid', 'preuni', 'monrec', 'cantidaum', 'cantiddis', 'preunirec', 'monrecrec', 'cantidadd', 'preuniadd', 'monrecadd', 'cantidtot', 'subtot', 'tipconpub', 'tipo', 'eliminada', 'liregcondet_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod' => 0, 'Codart' => 1, 'Unimed' => 2, 'Cantid' => 3, 'Preuni' => 4, 'Monrec' => 5, 'Cantidaum' => 6, 'Cantiddis' => 7, 'Preunirec' => 8, 'Monrecrec' => 9, 'Cantidadd' => 10, 'Preuniadd' => 11, 'Monrecadd' => 12, 'Cantidtot' => 13, 'Subtot' => 14, 'Tipconpub' => 15, 'Tipo' => 16, 'Eliminada' => 17, 'LiregcondetId' => 18, 'Id' => 19, ),
		BasePeer::TYPE_COLNAME => array (LiregmodcondetPeer::NUMMOD => 0, LiregmodcondetPeer::CODART => 1, LiregmodcondetPeer::UNIMED => 2, LiregmodcondetPeer::CANTID => 3, LiregmodcondetPeer::PREUNI => 4, LiregmodcondetPeer::MONREC => 5, LiregmodcondetPeer::CANTIDAUM => 6, LiregmodcondetPeer::CANTIDDIS => 7, LiregmodcondetPeer::PREUNIREC => 8, LiregmodcondetPeer::MONRECREC => 9, LiregmodcondetPeer::CANTIDADD => 10, LiregmodcondetPeer::PREUNIADD => 11, LiregmodcondetPeer::MONRECADD => 12, LiregmodcondetPeer::CANTIDTOT => 13, LiregmodcondetPeer::SUBTOT => 14, LiregmodcondetPeer::TIPCONPUB => 15, LiregmodcondetPeer::TIPO => 16, LiregmodcondetPeer::ELIMINADA => 17, LiregmodcondetPeer::LIREGCONDET_ID => 18, LiregmodcondetPeer::ID => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod' => 0, 'codart' => 1, 'unimed' => 2, 'cantid' => 3, 'preuni' => 4, 'monrec' => 5, 'cantidaum' => 6, 'cantiddis' => 7, 'preunirec' => 8, 'monrecrec' => 9, 'cantidadd' => 10, 'preuniadd' => 11, 'monrecadd' => 12, 'cantidtot' => 13, 'subtot' => 14, 'tipconpub' => 15, 'tipo' => 16, 'eliminada' => 17, 'liregcondet_id' => 18, 'id' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiregmodcondetMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiregmodcondetMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiregmodcondetPeer::getTableMap();
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
		return str_replace(LiregmodcondetPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiregmodcondetPeer::NUMMOD);

		$criteria->addSelectColumn(LiregmodcondetPeer::CODART);

		$criteria->addSelectColumn(LiregmodcondetPeer::UNIMED);

		$criteria->addSelectColumn(LiregmodcondetPeer::CANTID);

		$criteria->addSelectColumn(LiregmodcondetPeer::PREUNI);

		$criteria->addSelectColumn(LiregmodcondetPeer::MONREC);

		$criteria->addSelectColumn(LiregmodcondetPeer::CANTIDAUM);

		$criteria->addSelectColumn(LiregmodcondetPeer::CANTIDDIS);

		$criteria->addSelectColumn(LiregmodcondetPeer::PREUNIREC);

		$criteria->addSelectColumn(LiregmodcondetPeer::MONRECREC);

		$criteria->addSelectColumn(LiregmodcondetPeer::CANTIDADD);

		$criteria->addSelectColumn(LiregmodcondetPeer::PREUNIADD);

		$criteria->addSelectColumn(LiregmodcondetPeer::MONRECADD);

		$criteria->addSelectColumn(LiregmodcondetPeer::CANTIDTOT);

		$criteria->addSelectColumn(LiregmodcondetPeer::SUBTOT);

		$criteria->addSelectColumn(LiregmodcondetPeer::TIPCONPUB);

		$criteria->addSelectColumn(LiregmodcondetPeer::TIPO);

		$criteria->addSelectColumn(LiregmodcondetPeer::ELIMINADA);

		$criteria->addSelectColumn(LiregmodcondetPeer::LIREGCONDET_ID);

		$criteria->addSelectColumn(LiregmodcondetPeer::ID);

	}

	const COUNT = 'COUNT(liregmodcondet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liregmodcondet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
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
		$objects = LiregmodcondetPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiregmodcondetPeer::populateObjects(LiregmodcondetPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiregmodcondetPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiregmodcondetPeer::getOMClass();
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
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);

		$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiregcondet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);

		$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
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

		LiregmodcondetPeer::addSelectColumns($c);
		$startcol = (LiregmodcondetPeer::NUM_COLUMNS - LiregmodcondetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LimodcontPeer::addSelectColumns($c);

		$c->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregmodcondetPeer::getOMClass();

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
										$temp_obj2->addLiregmodcondet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregmodcondets();
				$obj2->addLiregmodcondet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiregcondet(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregmodcondetPeer::addSelectColumns($c);
		$startcol = (LiregmodcondetPeer::NUM_COLUMNS - LiregmodcondetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiregcondetPeer::addSelectColumns($c);

		$c->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregmodcondetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiregcondetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiregcondet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregmodcondet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregmodcondets();
				$obj2->addLiregmodcondet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$criteria->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);
	
		$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
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

		LiregmodcondetPeer::addSelectColumns($c);
		$startcol2 = (LiregmodcondetPeer::NUM_COLUMNS - LiregmodcondetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			LiregcondetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiregcondetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);
	
			$c->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregmodcondetPeer::getOMClass();


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
						$temp_obj2->addLiregmodcondet($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregmodcondets();
					$obj2->addLiregmodcondet($obj1);
				}
	

							
				$omClass = LiregcondetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiregcondet(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregmodcondet($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregmodcondets();
					$obj3->addLiregmodcondet($obj1);
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
				$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);
		
			$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLiregcondet(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiregmodcondetPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregmodcondetPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);
		
			$rs = LiregmodcondetPeer::doSelectRS($criteria, $con);
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

		LiregmodcondetPeer::addSelectColumns($c);
		$startcol2 = (LiregmodcondetPeer::NUM_COLUMNS - LiregmodcondetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiregcondetPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiregcondetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregmodcondetPeer::LIREGCONDET_ID, LiregcondetPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregmodcondetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiregcondetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiregcondet(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiregmodcondet($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregmodcondets();
					$obj2->addLiregmodcondet($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiregcondet(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregmodcondetPeer::addSelectColumns($c);
		$startcol2 = (LiregmodcondetPeer::NUM_COLUMNS - LiregmodcondetPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LimodcontPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LimodcontPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregmodcondetPeer::NUMMOD, LimodcontPeer::NUMMOD);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregmodcondetPeer::getOMClass();

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
						$temp_obj2->addLiregmodcondet($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregmodcondets();
					$obj2->addLiregmodcondet($obj1);
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
		return LiregmodcondetPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiregmodcondetPeer::ID); 

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
			$comparison = $criteria->getComparison(LiregmodcondetPeer::ID);
			$selectCriteria->add(LiregmodcondetPeer::ID, $criteria->remove(LiregmodcondetPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiregmodcondetPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiregmodcondetPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liregmodcondet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiregmodcondetPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liregmodcondet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiregmodcondetPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiregmodcondetPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiregmodcondetPeer::DATABASE_NAME, LiregmodcondetPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiregmodcondetPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiregmodcondetPeer::DATABASE_NAME);

		$criteria->add(LiregmodcondetPeer::ID, $pk);


		$v = LiregmodcondetPeer::doSelect($criteria, $con);

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
			$criteria->add(LiregmodcondetPeer::ID, $pks, Criteria::IN);
			$objs = LiregmodcondetPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiregmodcondetPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiregmodcondetMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiregmodcondetMapBuilder');
}
