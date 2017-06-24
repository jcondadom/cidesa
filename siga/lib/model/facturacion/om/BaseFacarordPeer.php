<?php


abstract class BaseFacarordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'facarord';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Facarord';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCAR = 'facarord.NUMCAR';

	
	const FECCAR = 'facarord.FECCAR';

	
	const FECVEN = 'facarord.FECVEN';

	
	const CODENTCRE = 'facarord.CODENTCRE';

	
	const CODPRO = 'facarord.CODPRO';

	
	const RAMART = 'facarord.RAMART';

	
	const DESCAR = 'facarord.DESCAR';

	
	const CODBAN = 'facarord.CODBAN';

	
	const MONCAR = 'facarord.MONCAR';

	
	const STACAR = 'facarord.STACAR';

	
	const CODALMUSU = 'facarord.CODALMUSU';

	
	const CREATED_AT = 'facarord.CREATED_AT';

	
	const UPDATED_AT = 'facarord.UPDATED_AT';

	
	const CREATED_BY_USER = 'facarord.CREATED_BY_USER';

	
	const UPDATED_BY_USER = 'facarord.UPDATED_BY_USER';

	
	const ID = 'facarord.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcar', 'Feccar', 'Fecven', 'Codentcre', 'Codpro', 'Ramart', 'Descar', 'Codban', 'Moncar', 'Stacar', 'Codalmusu', 'CreatedAt', 'UpdatedAt', 'CreatedByUser', 'UpdatedByUser', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FacarordPeer::NUMCAR, FacarordPeer::FECCAR, FacarordPeer::FECVEN, FacarordPeer::CODENTCRE, FacarordPeer::CODPRO, FacarordPeer::RAMART, FacarordPeer::DESCAR, FacarordPeer::CODBAN, FacarordPeer::MONCAR, FacarordPeer::STACAR, FacarordPeer::CODALMUSU, FacarordPeer::CREATED_AT, FacarordPeer::UPDATED_AT, FacarordPeer::CREATED_BY_USER, FacarordPeer::UPDATED_BY_USER, FacarordPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcar', 'feccar', 'fecven', 'codentcre', 'codpro', 'ramart', 'descar', 'codban', 'moncar', 'stacar', 'codalmusu', 'created_at', 'updated_at', 'created_by_user', 'updated_by_user', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcar' => 0, 'Feccar' => 1, 'Fecven' => 2, 'Codentcre' => 3, 'Codpro' => 4, 'Ramart' => 5, 'Descar' => 6, 'Codban' => 7, 'Moncar' => 8, 'Stacar' => 9, 'Codalmusu' => 10, 'CreatedAt' => 11, 'UpdatedAt' => 12, 'CreatedByUser' => 13, 'UpdatedByUser' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (FacarordPeer::NUMCAR => 0, FacarordPeer::FECCAR => 1, FacarordPeer::FECVEN => 2, FacarordPeer::CODENTCRE => 3, FacarordPeer::CODPRO => 4, FacarordPeer::RAMART => 5, FacarordPeer::DESCAR => 6, FacarordPeer::CODBAN => 7, FacarordPeer::MONCAR => 8, FacarordPeer::STACAR => 9, FacarordPeer::CODALMUSU => 10, FacarordPeer::CREATED_AT => 11, FacarordPeer::UPDATED_AT => 12, FacarordPeer::CREATED_BY_USER => 13, FacarordPeer::UPDATED_BY_USER => 14, FacarordPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('numcar' => 0, 'feccar' => 1, 'fecven' => 2, 'codentcre' => 3, 'codpro' => 4, 'ramart' => 5, 'descar' => 6, 'codban' => 7, 'moncar' => 8, 'stacar' => 9, 'codalmusu' => 10, 'created_at' => 11, 'updated_at' => 12, 'created_by_user' => 13, 'updated_by_user' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FacarordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FacarordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FacarordPeer::getTableMap();
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
		return str_replace(FacarordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FacarordPeer::NUMCAR);

		$criteria->addSelectColumn(FacarordPeer::FECCAR);

		$criteria->addSelectColumn(FacarordPeer::FECVEN);

		$criteria->addSelectColumn(FacarordPeer::CODENTCRE);

		$criteria->addSelectColumn(FacarordPeer::CODPRO);

		$criteria->addSelectColumn(FacarordPeer::RAMART);

		$criteria->addSelectColumn(FacarordPeer::DESCAR);

		$criteria->addSelectColumn(FacarordPeer::CODBAN);

		$criteria->addSelectColumn(FacarordPeer::MONCAR);

		$criteria->addSelectColumn(FacarordPeer::STACAR);

		$criteria->addSelectColumn(FacarordPeer::CODALMUSU);

		$criteria->addSelectColumn(FacarordPeer::CREATED_AT);

		$criteria->addSelectColumn(FacarordPeer::UPDATED_AT);

		$criteria->addSelectColumn(FacarordPeer::CREATED_BY_USER);

		$criteria->addSelectColumn(FacarordPeer::UPDATED_BY_USER);

		$criteria->addSelectColumn(FacarordPeer::ID);

	}

	const COUNT = 'COUNT(facarord.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT facarord.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FacarordPeer::doSelectRS($criteria, $con);
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
		$objects = FacarordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FacarordPeer::populateObjects(FacarordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FacarordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FacarordPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFaentcre(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);

		$rs = FacarordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFaclienteRelatedByCodpro(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);

		$rs = FacarordPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFaentcre(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FacarordPeer::addSelectColumns($c);
		$startcol = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaentcrePeer::addSelectColumns($c);

		$c->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaentcrePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaentcre(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFacarord($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFacarords();
				$obj2->addFacarord($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFaclienteRelatedByCodpro(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FacarordPeer::addSelectColumns($c);
		$startcol = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FaclientePeer::addSelectColumns($c);

		$c->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FaclientePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFaclienteRelatedByCodpro(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFacarordRelatedByCodpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFacarordsRelatedByCodpro();
				$obj2->addFacarordRelatedByCodpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacarordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
	
			$criteria->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);
	
			$criteria->addJoin(FacarordPeer::CODBAN, FaclientePeer::CODPRO);
	
		$rs = FacarordPeer::doSelectRS($criteria, $con);
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

		FacarordPeer::addSelectColumns($c);
		$startcol2 = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaentcrePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaentcrePeer::NUM_COLUMNS;
	
			FaclientePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaclientePeer::NUM_COLUMNS;
	
			FaclientePeer::addSelectColumns($c);
			$startcol5 = $startcol4 + FaclientePeer::NUM_COLUMNS;
	
			$c->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
	
			$c->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);
	
			$c->addJoin(FacarordPeer::CODBAN, FaclientePeer::CODPRO);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FaentcrePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaentcre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFacarord($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFacarords();
					$obj2->addFacarord($obj1);
				}
	

							
				$omClass = FaclientePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaclienteRelatedByCodpro(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFacarordRelatedByCodpro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFacarordsRelatedByCodpro();
					$obj3->addFacarordRelatedByCodpro($obj1);
				}
	

							
				$omClass = FaclientePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getFaclienteRelatedByCodban(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addFacarordRelatedByCodban($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initFacarordsRelatedByCodban();
					$obj4->addFacarordRelatedByCodban($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFaentcre(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FacarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);
		
				$criteria->addJoin(FacarordPeer::CODBAN, FaclientePeer::CODPRO);
		
			$rs = FacarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaclienteRelatedByCodpro(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FacarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
		
			$rs = FacarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFaclienteRelatedByCodban(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FacarordPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FacarordPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
		
			$rs = FacarordPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFaentcre(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FacarordPeer::addSelectColumns($c);
		$startcol2 = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaclientePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaclientePeer::NUM_COLUMNS;
	
			FaclientePeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FaclientePeer::NUM_COLUMNS;
	
			$c->addJoin(FacarordPeer::CODPRO, FaclientePeer::CODPRO);
	
			$c->addJoin(FacarordPeer::CODBAN, FaclientePeer::CODPRO);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FaclientePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaclienteRelatedByCodpro(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFacarordRelatedByCodpro($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFacarordsRelatedByCodpro();
					$obj2->addFacarordRelatedByCodpro($obj1);
				}
	
				$omClass = FaclientePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFaclienteRelatedByCodban(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFacarordRelatedByCodban($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initFacarordsRelatedByCodban();
					$obj3->addFacarordRelatedByCodban($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaclienteRelatedByCodpro(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FacarordPeer::addSelectColumns($c);
		$startcol2 = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaentcrePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaentcrePeer::NUM_COLUMNS;
	
			$c->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FaentcrePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaentcre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFacarord($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFacarords();
					$obj2->addFacarord($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFaclienteRelatedByCodban(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FacarordPeer::addSelectColumns($c);
		$startcol2 = (FacarordPeer::NUM_COLUMNS - FacarordPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FaentcrePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FaentcrePeer::NUM_COLUMNS;
	
			$c->addJoin(FacarordPeer::CODENTCRE, FaentcrePeer::CODENTCRE);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FacarordPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FaentcrePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFaentcre(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFacarord($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFacarords();
					$obj2->addFacarord($obj1);
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
		return FacarordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FacarordPeer::ID); 

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
			$comparison = $criteria->getComparison(FacarordPeer::ID);
			$selectCriteria->add(FacarordPeer::ID, $criteria->remove(FacarordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FacarordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FacarordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Facarord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FacarordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Facarord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FacarordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FacarordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FacarordPeer::DATABASE_NAME, FacarordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FacarordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FacarordPeer::DATABASE_NAME);

		$criteria->add(FacarordPeer::ID, $pk);


		$v = FacarordPeer::doSelect($criteria, $con);

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
			$criteria->add(FacarordPeer::ID, $pks, Criteria::IN);
			$objs = FacarordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFacarordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FacarordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FacarordMapBuilder');
}
