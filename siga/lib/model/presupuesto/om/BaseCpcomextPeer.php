<?php


abstract class BaseCpcomextPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpcomext';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpcomext';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOMEXT = 'cpcomext.REFCOMEXT';

	
	const TIPCOM = 'cpcomext.TIPCOM';

	
	const FECCOM = 'cpcomext.FECCOM';

	
	const ANOCOM = 'cpcomext.ANOCOM';

	
	const REFCOM = 'cpcomext.REFCOM';

	
	const DESCOM = 'cpcomext.DESCOM';

	
	const DESANU = 'cpcomext.DESANU';

	
	const MONCOM = 'cpcomext.MONCOM';

	
	const STACOM = 'cpcomext.STACOM';

	
	const FECANU = 'cpcomext.FECANU';

	
	const CEDRIF = 'cpcomext.CEDRIF';

	
	const LOGUSE = 'cpcomext.LOGUSE';

	
	const FECREG = 'cpcomext.FECREG';

	
	const CODMON = 'cpcomext.CODMON';

	
	const VALMON = 'cpcomext.VALMON';

	
	const ID = 'cpcomext.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcomext', 'Tipcom', 'Feccom', 'Anocom', 'Refcom', 'Descom', 'Desanu', 'Moncom', 'Stacom', 'Fecanu', 'Cedrif', 'Loguse', 'Fecreg', 'Codmon', 'Valmon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpcomextPeer::REFCOMEXT, CpcomextPeer::TIPCOM, CpcomextPeer::FECCOM, CpcomextPeer::ANOCOM, CpcomextPeer::REFCOM, CpcomextPeer::DESCOM, CpcomextPeer::DESANU, CpcomextPeer::MONCOM, CpcomextPeer::STACOM, CpcomextPeer::FECANU, CpcomextPeer::CEDRIF, CpcomextPeer::LOGUSE, CpcomextPeer::FECREG, CpcomextPeer::CODMON, CpcomextPeer::VALMON, CpcomextPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcomext', 'tipcom', 'feccom', 'anocom', 'refcom', 'descom', 'desanu', 'moncom', 'stacom', 'fecanu', 'cedrif', 'loguse', 'fecreg', 'codmon', 'valmon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcomext' => 0, 'Tipcom' => 1, 'Feccom' => 2, 'Anocom' => 3, 'Refcom' => 4, 'Descom' => 5, 'Desanu' => 6, 'Moncom' => 7, 'Stacom' => 8, 'Fecanu' => 9, 'Cedrif' => 10, 'Loguse' => 11, 'Fecreg' => 12, 'Codmon' => 13, 'Valmon' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CpcomextPeer::REFCOMEXT => 0, CpcomextPeer::TIPCOM => 1, CpcomextPeer::FECCOM => 2, CpcomextPeer::ANOCOM => 3, CpcomextPeer::REFCOM => 4, CpcomextPeer::DESCOM => 5, CpcomextPeer::DESANU => 6, CpcomextPeer::MONCOM => 7, CpcomextPeer::STACOM => 8, CpcomextPeer::FECANU => 9, CpcomextPeer::CEDRIF => 10, CpcomextPeer::LOGUSE => 11, CpcomextPeer::FECREG => 12, CpcomextPeer::CODMON => 13, CpcomextPeer::VALMON => 14, CpcomextPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('refcomext' => 0, 'tipcom' => 1, 'feccom' => 2, 'anocom' => 3, 'refcom' => 4, 'descom' => 5, 'desanu' => 6, 'moncom' => 7, 'stacom' => 8, 'fecanu' => 9, 'cedrif' => 10, 'loguse' => 11, 'fecreg' => 12, 'codmon' => 13, 'valmon' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpcomextMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpcomextMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpcomextPeer::getTableMap();
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
		return str_replace(CpcomextPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpcomextPeer::REFCOMEXT);

		$criteria->addSelectColumn(CpcomextPeer::TIPCOM);

		$criteria->addSelectColumn(CpcomextPeer::FECCOM);

		$criteria->addSelectColumn(CpcomextPeer::ANOCOM);

		$criteria->addSelectColumn(CpcomextPeer::REFCOM);

		$criteria->addSelectColumn(CpcomextPeer::DESCOM);

		$criteria->addSelectColumn(CpcomextPeer::DESANU);

		$criteria->addSelectColumn(CpcomextPeer::MONCOM);

		$criteria->addSelectColumn(CpcomextPeer::STACOM);

		$criteria->addSelectColumn(CpcomextPeer::FECANU);

		$criteria->addSelectColumn(CpcomextPeer::CEDRIF);

		$criteria->addSelectColumn(CpcomextPeer::LOGUSE);

		$criteria->addSelectColumn(CpcomextPeer::FECREG);

		$criteria->addSelectColumn(CpcomextPeer::CODMON);

		$criteria->addSelectColumn(CpcomextPeer::VALMON);

		$criteria->addSelectColumn(CpcomextPeer::ID);

	}

	const COUNT = 'COUNT(cpcomext.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpcomext.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpcomextPeer::doSelectRS($criteria, $con);
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
		$objects = CpcomextPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpcomextPeer::populateObjects(CpcomextPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpcomextPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpcomextPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCpdoccom(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);

		$rs = CpcomextPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinOpbenefi(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);

		$rs = CpcomextPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTsdefmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);

		$rs = CpcomextPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CpdoccomPeer::addSelectColumns($c);

		$c->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CpdoccomPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCpdoccom(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpcomext($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcomexts();
				$obj2->addCpcomext($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OpbenefiPeer::addSelectColumns($c);

		$c->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OpbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOpbenefi(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpcomext($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcomexts();
				$obj2->addCpcomext($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTsdefmon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefmonPeer::addSelectColumns($c);

		$c->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdefmonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdefmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCpcomext($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCpcomexts();
				$obj2->addCpcomext($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpcomextPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$criteria->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$criteria->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = CpcomextPeer::doSelectRS($criteria, $con);
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

		CpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			TsdefmonPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + TsdefmonPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcomext($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcomexts();
					$obj2->addCpcomext($obj1);
				}
	

							
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcomext($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcomexts();
					$obj3->addCpcomext($obj1);
				}
	

							
				$omClass = TsdefmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getTsdefmon(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addCpcomext($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initCpcomexts();
					$obj4->addCpcomext($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCpdoccom(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomextPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
				$criteria->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
		
			$rs = CpcomextPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptOpbenefi(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomextPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
				$criteria->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
		
			$rs = CpcomextPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptTsdefmon(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CpcomextPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CpcomextPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
		
				$criteria->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
		
			$rs = CpcomextPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCpdoccom(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			OpbenefiPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + OpbenefiPeer::NUM_COLUMNS;
	
			TsdefmonPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsdefmonPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	
			$c->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getOpbenefi(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcomexts();
					$obj2->addCpcomext($obj1);
				}
	
				$omClass = TsdefmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsdefmon(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcomexts();
					$obj3->addCpcomext($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptOpbenefi(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			TsdefmonPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + TsdefmonPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomextPeer::CODMON, TsdefmonPeer::CODMON);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcomexts();
					$obj2->addCpcomext($obj1);
				}
	
				$omClass = TsdefmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getTsdefmon(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcomexts();
					$obj3->addCpcomext($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTsdefmon(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CpcomextPeer::addSelectColumns($c);
		$startcol2 = (CpcomextPeer::NUM_COLUMNS - CpcomextPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CpdoccomPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CpdoccomPeer::NUM_COLUMNS;
	
			OpbenefiPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + OpbenefiPeer::NUM_COLUMNS;
	
			$c->addJoin(CpcomextPeer::TIPCOM, CpdoccomPeer::TIPCOM);
	
			$c->addJoin(CpcomextPeer::CEDRIF, OpbenefiPeer::CEDRIF);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CpcomextPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = CpdoccomPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCpdoccom(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initCpcomexts();
					$obj2->addCpcomext($obj1);
				}
	
				$omClass = OpbenefiPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getOpbenefi(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCpcomext($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initCpcomexts();
					$obj3->addCpcomext($obj1);
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
		return CpcomextPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpcomextPeer::ID); 

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
			$comparison = $criteria->getComparison(CpcomextPeer::ID);
			$selectCriteria->add(CpcomextPeer::ID, $criteria->remove(CpcomextPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpcomextPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpcomextPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpcomext) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpcomextPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpcomext $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpcomextPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpcomextPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpcomextPeer::DATABASE_NAME, CpcomextPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpcomextPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpcomextPeer::DATABASE_NAME);

		$criteria->add(CpcomextPeer::ID, $pk);


		$v = CpcomextPeer::doSelect($criteria, $con);

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
			$criteria->add(CpcomextPeer::ID, $pks, Criteria::IN);
			$objs = CpcomextPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpcomextPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpcomextMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpcomextMapBuilder');
}
