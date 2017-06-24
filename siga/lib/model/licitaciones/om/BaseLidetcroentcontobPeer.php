<?php


abstract class BaseLidetcroentcontobPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidetcroentcontob';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lidetcroentcontob';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCONT = 'lidetcroentcontob.NUMCONT';

	
	const CODART = 'lidetcroentcontob.CODART';

	
	const CANTID = 'lidetcroentcontob.CANTID';

	
	const CODUNIADM = 'lidetcroentcontob.CODUNIADM';

	
	const FECENTCONT = 'lidetcroentcontob.FECENTCONT';

	
	const FECENT = 'lidetcroentcontob.FECENT';

	
	const CONDIC = 'lidetcroentcontob.CONDIC';

	
	const CANTIDREC = 'lidetcroentcontob.CANTIDREC';

	
	const FECREC = 'lidetcroentcontob.FECREC';

	
	const OBSERVACION = 'lidetcroentcontob.OBSERVACION';

	
	const TIPCONPUB = 'lidetcroentcontob.TIPCONPUB';

	
	const NUMVAL = 'lidetcroentcontob.NUMVAL';

	
	const LICROENT_ID = 'lidetcroentcontob.LICROENT_ID';

	
	const ID = 'lidetcroentcontob.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont', 'Codart', 'Cantid', 'Coduniadm', 'Fecentcont', 'Fecent', 'Condic', 'Cantidrec', 'Fecrec', 'Observacion', 'Tipconpub', 'Numval', 'LicroentId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidetcroentcontobPeer::NUMCONT, LidetcroentcontobPeer::CODART, LidetcroentcontobPeer::CANTID, LidetcroentcontobPeer::CODUNIADM, LidetcroentcontobPeer::FECENTCONT, LidetcroentcontobPeer::FECENT, LidetcroentcontobPeer::CONDIC, LidetcroentcontobPeer::CANTIDREC, LidetcroentcontobPeer::FECREC, LidetcroentcontobPeer::OBSERVACION, LidetcroentcontobPeer::TIPCONPUB, LidetcroentcontobPeer::NUMVAL, LidetcroentcontobPeer::LICROENT_ID, LidetcroentcontobPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont', 'codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'numval', 'licroent_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont' => 0, 'Codart' => 1, 'Cantid' => 2, 'Coduniadm' => 3, 'Fecentcont' => 4, 'Fecent' => 5, 'Condic' => 6, 'Cantidrec' => 7, 'Fecrec' => 8, 'Observacion' => 9, 'Tipconpub' => 10, 'Numval' => 11, 'LicroentId' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (LidetcroentcontobPeer::NUMCONT => 0, LidetcroentcontobPeer::CODART => 1, LidetcroentcontobPeer::CANTID => 2, LidetcroentcontobPeer::CODUNIADM => 3, LidetcroentcontobPeer::FECENTCONT => 4, LidetcroentcontobPeer::FECENT => 5, LidetcroentcontobPeer::CONDIC => 6, LidetcroentcontobPeer::CANTIDREC => 7, LidetcroentcontobPeer::FECREC => 8, LidetcroentcontobPeer::OBSERVACION => 9, LidetcroentcontobPeer::TIPCONPUB => 10, LidetcroentcontobPeer::NUMVAL => 11, LidetcroentcontobPeer::LICROENT_ID => 12, LidetcroentcontobPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont' => 0, 'codart' => 1, 'cantid' => 2, 'coduniadm' => 3, 'fecentcont' => 4, 'fecent' => 5, 'condic' => 6, 'cantidrec' => 7, 'fecrec' => 8, 'observacion' => 9, 'tipconpub' => 10, 'numval' => 11, 'licroent_id' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LidetcroentcontobMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LidetcroentcontobMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidetcroentcontobPeer::getTableMap();
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
		return str_replace(LidetcroentcontobPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidetcroentcontobPeer::NUMCONT);

		$criteria->addSelectColumn(LidetcroentcontobPeer::CODART);

		$criteria->addSelectColumn(LidetcroentcontobPeer::CANTID);

		$criteria->addSelectColumn(LidetcroentcontobPeer::CODUNIADM);

		$criteria->addSelectColumn(LidetcroentcontobPeer::FECENTCONT);

		$criteria->addSelectColumn(LidetcroentcontobPeer::FECENT);

		$criteria->addSelectColumn(LidetcroentcontobPeer::CONDIC);

		$criteria->addSelectColumn(LidetcroentcontobPeer::CANTIDREC);

		$criteria->addSelectColumn(LidetcroentcontobPeer::FECREC);

		$criteria->addSelectColumn(LidetcroentcontobPeer::OBSERVACION);

		$criteria->addSelectColumn(LidetcroentcontobPeer::TIPCONPUB);

		$criteria->addSelectColumn(LidetcroentcontobPeer::NUMVAL);

		$criteria->addSelectColumn(LidetcroentcontobPeer::LICROENT_ID);

		$criteria->addSelectColumn(LidetcroentcontobPeer::ID);

	}

	const COUNT = 'COUNT(lidetcroentcontob.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidetcroentcontob.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
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
		$objects = LidetcroentcontobPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidetcroentcontobPeer::populateObjects(LidetcroentcontobPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidetcroentcontobPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidetcroentcontobPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLicontrat(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);

		$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLicroent(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);

		$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLicontrat(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LicontratPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLicontrat(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentcontob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentcontobs();
				$obj2->addLidetcroentcontob($obj1); 			}
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

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiuniadmPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

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
										$temp_obj2->addLidetcroentcontob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentcontobs();
				$obj2->addLidetcroentcontob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLicroent(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicroentPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LicroentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLicroent(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentcontob($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentcontobs();
				$obj2->addLidetcroentcontob($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$criteria->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
	
		$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
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

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLicontrat(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcontob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentcontobs();
					$obj2->addLidetcroentcontob($obj1);
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
						$temp_obj3->addLidetcroentcontob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentcontobs();
					$obj3->addLidetcroentcontob($obj1);
				}
	

							
				$omClass = LicroentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLicroent(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLidetcroentcontob($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLidetcroentcontobs();
					$obj4->addLidetcroentcontob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLicontrat(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
		
			$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
		
			$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLicroent(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontobPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
			$rs = LidetcroentcontobPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLicontrat(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiuniadmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiuniadmPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

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
						$temp_obj2->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentcontobs();
					$obj2->addLidetcroentcontob($obj1);
				}
	
				$omClass = LicroentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicroent(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentcontobs();
					$obj3->addLidetcroentcontob($obj1);
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

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LidetcroentcontobPeer::LICROENT_ID, LicroentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLicontrat(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentcontobs();
					$obj2->addLidetcroentcontob($obj1);
				}
	
				$omClass = LicroentPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicroent(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentcontobs();
					$obj3->addLidetcroentcontob($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLicroent(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontobPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontobPeer::NUM_COLUMNS - LidetcroentcontobPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontobPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LidetcroentcontobPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontobPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLicontrat(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentcontobs();
					$obj2->addLidetcroentcontob($obj1);
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
						$temp_obj3->addLidetcroentcontob($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentcontobs();
					$obj3->addLidetcroentcontob($obj1);
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
		return LidetcroentcontobPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidetcroentcontobPeer::ID); 

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
			$comparison = $criteria->getComparison(LidetcroentcontobPeer::ID);
			$selectCriteria->add(LidetcroentcontobPeer::ID, $criteria->remove(LidetcroentcontobPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidetcroentcontobPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidetcroentcontobPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidetcroentcontob) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidetcroentcontobPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidetcroentcontob $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidetcroentcontobPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidetcroentcontobPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidetcroentcontobPeer::DATABASE_NAME, LidetcroentcontobPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidetcroentcontobPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidetcroentcontobPeer::DATABASE_NAME);

		$criteria->add(LidetcroentcontobPeer::ID, $pk);


		$v = LidetcroentcontobPeer::doSelect($criteria, $con);

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
			$criteria->add(LidetcroentcontobPeer::ID, $pks, Criteria::IN);
			$objs = LidetcroentcontobPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidetcroentcontobPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LidetcroentcontobMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LidetcroentcontobMapBuilder');
}
