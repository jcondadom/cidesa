<?php


abstract class BaseLiregfiacontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liregfiacont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liregfiacont';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCONT = 'liregfiacont.NUMCONT';

	
	const CODCOMRES = 'liregfiacont.CODCOMRES';

	
	const PORCEN = 'liregfiacont.PORCEN';

	
	const EMPRESA = 'liregfiacont.EMPRESA';

	
	const FECEMI = 'liregfiacont.FECEMI';

	
	const FECVEN = 'liregfiacont.FECVEN';

	
	const LIREGOFEFIA_ID = 'liregfiacont.LIREGOFEFIA_ID';

	
	const OBSERV = 'liregfiacont.OBSERV';

	
	const ESTATUS = 'liregfiacont.ESTATUS';

	
	const ID = 'liregfiacont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont', 'Codcomres', 'Porcen', 'Empresa', 'Fecemi', 'Fecven', 'LiregofefiaId', 'Observ', 'Estatus', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiregfiacontPeer::NUMCONT, LiregfiacontPeer::CODCOMRES, LiregfiacontPeer::PORCEN, LiregfiacontPeer::EMPRESA, LiregfiacontPeer::FECEMI, LiregfiacontPeer::FECVEN, LiregfiacontPeer::LIREGOFEFIA_ID, LiregfiacontPeer::OBSERV, LiregfiacontPeer::ESTATUS, LiregfiacontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont', 'codcomres', 'porcen', 'empresa', 'fecemi', 'fecven', 'liregofefia_id', 'observ', 'estatus', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont' => 0, 'Codcomres' => 1, 'Porcen' => 2, 'Empresa' => 3, 'Fecemi' => 4, 'Fecven' => 5, 'LiregofefiaId' => 6, 'Observ' => 7, 'Estatus' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (LiregfiacontPeer::NUMCONT => 0, LiregfiacontPeer::CODCOMRES => 1, LiregfiacontPeer::PORCEN => 2, LiregfiacontPeer::EMPRESA => 3, LiregfiacontPeer::FECEMI => 4, LiregfiacontPeer::FECVEN => 5, LiregfiacontPeer::LIREGOFEFIA_ID => 6, LiregfiacontPeer::OBSERV => 7, LiregfiacontPeer::ESTATUS => 8, LiregfiacontPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont' => 0, 'codcomres' => 1, 'porcen' => 2, 'empresa' => 3, 'fecemi' => 4, 'fecven' => 5, 'liregofefia_id' => 6, 'observ' => 7, 'estatus' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiregfiacontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiregfiacontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiregfiacontPeer::getTableMap();
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
		return str_replace(LiregfiacontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiregfiacontPeer::NUMCONT);

		$criteria->addSelectColumn(LiregfiacontPeer::CODCOMRES);

		$criteria->addSelectColumn(LiregfiacontPeer::PORCEN);

		$criteria->addSelectColumn(LiregfiacontPeer::EMPRESA);

		$criteria->addSelectColumn(LiregfiacontPeer::FECEMI);

		$criteria->addSelectColumn(LiregfiacontPeer::FECVEN);

		$criteria->addSelectColumn(LiregfiacontPeer::LIREGOFEFIA_ID);

		$criteria->addSelectColumn(LiregfiacontPeer::OBSERV);

		$criteria->addSelectColumn(LiregfiacontPeer::ESTATUS);

		$criteria->addSelectColumn(LiregfiacontPeer::ID);

	}

	const COUNT = 'COUNT(liregfiacont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liregfiacont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
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
		$objects = LiregfiacontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiregfiacontPeer::populateObjects(LiregfiacontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiregfiacontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiregfiacontPeer::getOMClass();
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
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiccomres(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);

		$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLiregofefia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);

		$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
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

		LiregfiacontPeer::addSelectColumns($c);
		$startcol = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

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
										$temp_obj2->addLiregfiacont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregfiaconts();
				$obj2->addLiregfiacont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiccomres(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregfiacontPeer::addSelectColumns($c);
		$startcol = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiccomresPeer::addSelectColumns($c);

		$c->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiccomresPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiccomres(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregfiacont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregfiaconts();
				$obj2->addLiregfiacont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLiregofefia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregfiacontPeer::addSelectColumns($c);
		$startcol = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LiregofefiaPeer::addSelectColumns($c);

		$c->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LiregofefiaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLiregofefia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiregfiacont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregfiaconts();
				$obj2->addLiregfiacont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
	
			$criteria->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
	
		$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
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

		LiregfiacontPeer::addSelectColumns($c);
		$startcol2 = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LiccomresPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiccomresPeer::NUM_COLUMNS;
	
			LiregofefiaPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LiregofefiaPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
	
			$c->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();


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
						$temp_obj2->addLiregfiacont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregfiaconts();
					$obj2->addLiregfiacont($obj1);
				}
	

							
				$omClass = LiccomresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiccomres(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregfiacont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregfiaconts();
					$obj3->addLiregfiacont($obj1);
				}
	

							
				$omClass = LiregofefiaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLiregofefia(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLiregfiacont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLiregfiaconts();
					$obj4->addLiregfiacont($obj1);
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
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
		
				$criteria->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
		
			$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLiccomres(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
		
			$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLiregofefia(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiregfiacontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
		
			$rs = LiregfiacontPeer::doSelectRS($criteria, $con);
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

		LiregfiacontPeer::addSelectColumns($c);
		$startcol2 = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LiccomresPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LiccomresPeer::NUM_COLUMNS;
	
			LiregofefiaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiregofefiaPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
	
			$c->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LiccomresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLiccomres(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregfiaconts();
					$obj2->addLiregfiacont($obj1);
				}
	
				$omClass = LiregofefiaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiregofefia(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregfiaconts();
					$obj3->addLiregfiacont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiccomres(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregfiacontPeer::addSelectColumns($c);
		$startcol2 = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LiregofefiaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiregofefiaPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiregfiacontPeer::LIREGOFEFIA_ID, LiregofefiaPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

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
						$temp_obj2->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregfiaconts();
					$obj2->addLiregfiacont($obj1);
				}
	
				$omClass = LiregofefiaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiregofefia(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregfiaconts();
					$obj3->addLiregfiacont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLiregofefia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiregfiacontPeer::addSelectColumns($c);
		$startcol2 = (LiregfiacontPeer::NUM_COLUMNS - LiregfiacontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LiccomresPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LiccomresPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregfiacontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiregfiacontPeer::CODCOMRES, LiccomresPeer::CODCOMRES);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregfiacontPeer::getOMClass();

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
						$temp_obj2->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregfiaconts();
					$obj2->addLiregfiacont($obj1);
				}
	
				$omClass = LiccomresPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLiccomres(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiregfiacont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiregfiaconts();
					$obj3->addLiregfiacont($obj1);
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
		return LiregfiacontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiregfiacontPeer::ID); 

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
			$comparison = $criteria->getComparison(LiregfiacontPeer::ID);
			$selectCriteria->add(LiregfiacontPeer::ID, $criteria->remove(LiregfiacontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiregfiacontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiregfiacontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liregfiacont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiregfiacontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liregfiacont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiregfiacontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiregfiacontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiregfiacontPeer::DATABASE_NAME, LiregfiacontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiregfiacontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiregfiacontPeer::DATABASE_NAME);

		$criteria->add(LiregfiacontPeer::ID, $pk);


		$v = LiregfiacontPeer::doSelect($criteria, $con);

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
			$criteria->add(LiregfiacontPeer::ID, $pks, Criteria::IN);
			$objs = LiregfiacontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiregfiacontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiregfiacontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiregfiacontMapBuilder');
}
