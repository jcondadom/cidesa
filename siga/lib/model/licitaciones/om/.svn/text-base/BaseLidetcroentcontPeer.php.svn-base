<?php


abstract class BaseLidetcroentcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidetcroentcont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lidetcroentcont';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMENT = 'lidetcroentcont.NUMENT';

	
	const CODART = 'lidetcroentcont.CODART';

	
	const CANTID = 'lidetcroentcont.CANTID';

	
	const CODUNIADM = 'lidetcroentcont.CODUNIADM';

	
	const FECENTCONT = 'lidetcroentcont.FECENTCONT';

	
	const FECENT = 'lidetcroentcont.FECENT';

	
	const CONDIC = 'lidetcroentcont.CONDIC';

	
	const CANTIDREC = 'lidetcroentcont.CANTIDREC';

	
	const FECREC = 'lidetcroentcont.FECREC';

	
	const OBSERVACION = 'lidetcroentcont.OBSERVACION';

	
	const TIPCONPUB = 'lidetcroentcont.TIPCONPUB';

	
	const LICROENT_ID = 'lidetcroentcont.LICROENT_ID';

	
	const ID = 'lidetcroentcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nument', 'Codart', 'Cantid', 'Coduniadm', 'Fecentcont', 'Fecent', 'Condic', 'Cantidrec', 'Fecrec', 'Observacion', 'Tipconpub', 'LicroentId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidetcroentcontPeer::NUMENT, LidetcroentcontPeer::CODART, LidetcroentcontPeer::CANTID, LidetcroentcontPeer::CODUNIADM, LidetcroentcontPeer::FECENTCONT, LidetcroentcontPeer::FECENT, LidetcroentcontPeer::CONDIC, LidetcroentcontPeer::CANTIDREC, LidetcroentcontPeer::FECREC, LidetcroentcontPeer::OBSERVACION, LidetcroentcontPeer::TIPCONPUB, LidetcroentcontPeer::LICROENT_ID, LidetcroentcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nument', 'codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'licroent_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nument' => 0, 'Codart' => 1, 'Cantid' => 2, 'Coduniadm' => 3, 'Fecentcont' => 4, 'Fecent' => 5, 'Condic' => 6, 'Cantidrec' => 7, 'Fecrec' => 8, 'Observacion' => 9, 'Tipconpub' => 10, 'LicroentId' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (LidetcroentcontPeer::NUMENT => 0, LidetcroentcontPeer::CODART => 1, LidetcroentcontPeer::CANTID => 2, LidetcroentcontPeer::CODUNIADM => 3, LidetcroentcontPeer::FECENTCONT => 4, LidetcroentcontPeer::FECENT => 5, LidetcroentcontPeer::CONDIC => 6, LidetcroentcontPeer::CANTIDREC => 7, LidetcroentcontPeer::FECREC => 8, LidetcroentcontPeer::OBSERVACION => 9, LidetcroentcontPeer::TIPCONPUB => 10, LidetcroentcontPeer::LICROENT_ID => 11, LidetcroentcontPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('nument' => 0, 'codart' => 1, 'cantid' => 2, 'coduniadm' => 3, 'fecentcont' => 4, 'fecent' => 5, 'condic' => 6, 'cantidrec' => 7, 'fecrec' => 8, 'observacion' => 9, 'tipconpub' => 10, 'licroent_id' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LidetcroentcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LidetcroentcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidetcroentcontPeer::getTableMap();
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
		return str_replace(LidetcroentcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidetcroentcontPeer::NUMENT);

		$criteria->addSelectColumn(LidetcroentcontPeer::CODART);

		$criteria->addSelectColumn(LidetcroentcontPeer::CANTID);

		$criteria->addSelectColumn(LidetcroentcontPeer::CODUNIADM);

		$criteria->addSelectColumn(LidetcroentcontPeer::FECENTCONT);

		$criteria->addSelectColumn(LidetcroentcontPeer::FECENT);

		$criteria->addSelectColumn(LidetcroentcontPeer::CONDIC);

		$criteria->addSelectColumn(LidetcroentcontPeer::CANTIDREC);

		$criteria->addSelectColumn(LidetcroentcontPeer::FECREC);

		$criteria->addSelectColumn(LidetcroentcontPeer::OBSERVACION);

		$criteria->addSelectColumn(LidetcroentcontPeer::TIPCONPUB);

		$criteria->addSelectColumn(LidetcroentcontPeer::LICROENT_ID);

		$criteria->addSelectColumn(LidetcroentcontPeer::ID);

	}

	const COUNT = 'COUNT(lidetcroentcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidetcroentcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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
		$objects = LidetcroentcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidetcroentcontPeer::populateObjects(LidetcroentcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidetcroentcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidetcroentcontPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLientregas(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);

		$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);

		$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);

		$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLientregas(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LientregasPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LientregasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLientregas(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidetcroentcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentconts();
				$obj2->addLidetcroentcont($obj1); 			}
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

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiuniadmPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

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
										$temp_obj2->addLidetcroentcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentconts();
				$obj2->addLidetcroentcont($obj1); 			}
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

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicroentPeer::addSelectColumns($c);

		$c->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

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
										$temp_obj2->addLidetcroentcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidetcroentconts();
				$obj2->addLidetcroentcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
	
			$criteria->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$criteria->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
	
		$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LientregasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LientregasPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
	
			$c->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LientregasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLientregas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentconts();
					$obj2->addLidetcroentcont($obj1);
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
						$temp_obj3->addLidetcroentcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentconts();
					$obj3->addLidetcroentcont($obj1);
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
						$temp_obj4->addLidetcroentcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLidetcroentconts();
					$obj4->addLidetcroentcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLientregas(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
				$criteria->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
		
			$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
		
				$criteria->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
		
			$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LidetcroentcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
		
				$criteria->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
		
			$rs = LidetcroentcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLientregas(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiuniadmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiuniadmPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	
			$c->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

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
						$temp_obj2->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentconts();
					$obj2->addLidetcroentcont($obj1);
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
						$temp_obj3->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentconts();
					$obj3->addLidetcroentcont($obj1);
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

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LientregasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LientregasPeer::NUM_COLUMNS;
	
			LicroentPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicroentPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
	
			$c->addJoin(LidetcroentcontPeer::LICROENT_ID, LicroentPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LientregasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLientregas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentconts();
					$obj2->addLidetcroentcont($obj1);
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
						$temp_obj3->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentconts();
					$obj3->addLidetcroentcont($obj1);
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

		LidetcroentcontPeer::addSelectColumns($c);
		$startcol2 = (LidetcroentcontPeer::NUM_COLUMNS - LidetcroentcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LientregasPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LientregasPeer::NUM_COLUMNS;
	
			LiuniadmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiuniadmPeer::NUM_COLUMNS;
	
			$c->addJoin(LidetcroentcontPeer::NUMENT, LientregasPeer::NUMENT);
	
			$c->addJoin(LidetcroentcontPeer::CODUNIADM, LiuniadmPeer::CODUNIADM);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidetcroentcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LientregasPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLientregas(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLidetcroentconts();
					$obj2->addLidetcroentcont($obj1);
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
						$temp_obj3->addLidetcroentcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLidetcroentconts();
					$obj3->addLidetcroentcont($obj1);
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
		return LidetcroentcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidetcroentcontPeer::ID); 

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
			$comparison = $criteria->getComparison(LidetcroentcontPeer::ID);
			$selectCriteria->add(LidetcroentcontPeer::ID, $criteria->remove(LidetcroentcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidetcroentcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidetcroentcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidetcroentcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidetcroentcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidetcroentcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidetcroentcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidetcroentcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidetcroentcontPeer::DATABASE_NAME, LidetcroentcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidetcroentcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidetcroentcontPeer::DATABASE_NAME);

		$criteria->add(LidetcroentcontPeer::ID, $pk);


		$v = LidetcroentcontPeer::doSelect($criteria, $con);

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
			$criteria->add(LidetcroentcontPeer::ID, $pks, Criteria::IN);
			$objs = LidetcroentcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidetcroentcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LidetcroentcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LidetcroentcontMapBuilder');
}
