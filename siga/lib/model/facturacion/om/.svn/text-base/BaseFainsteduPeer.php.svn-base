<?php


abstract class BaseFainsteduPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fainstedu';

	
	const CLASS_DEFAULT = 'lib.model.facturacion.Fainstedu';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODINST = 'fainstedu.CODINST';

	
	const NOMINST = 'fainstedu.NOMINST';

	
	const DIRINST = 'fainstedu.DIRINST';

	
	const TELINST = 'fainstedu.TELINST';

	
	const FAXINST = 'fainstedu.FAXINST';

	
	const EMAILINST = 'fainstedu.EMAILINST';

	
	const CODEDO = 'fainstedu.CODEDO';

	
	const CODCIU = 'fainstedu.CODCIU';

	
	const CODMUN = 'fainstedu.CODMUN';

	
	const CODPAR = 'fainstedu.CODPAR';

	
	const INGESTA = 'fainstedu.INGESTA';

	
	const MATINST = 'fainstedu.MATINST';

	
	const CODDEP = 'fainstedu.CODDEP';

	
	const CODSUB = 'fainstedu.CODSUB';

	
	const PERSONA = 'fainstedu.PERSONA';

	
	const ID = 'fainstedu.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codinst', 'Nominst', 'Dirinst', 'Telinst', 'Faxinst', 'Emailinst', 'Codedo', 'Codciu', 'Codmun', 'Codpar', 'Ingesta', 'Matinst', 'Coddep', 'Codsub', 'Persona', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FainsteduPeer::CODINST, FainsteduPeer::NOMINST, FainsteduPeer::DIRINST, FainsteduPeer::TELINST, FainsteduPeer::FAXINST, FainsteduPeer::EMAILINST, FainsteduPeer::CODEDO, FainsteduPeer::CODCIU, FainsteduPeer::CODMUN, FainsteduPeer::CODPAR, FainsteduPeer::INGESTA, FainsteduPeer::MATINST, FainsteduPeer::CODDEP, FainsteduPeer::CODSUB, FainsteduPeer::PERSONA, FainsteduPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codinst', 'nominst', 'dirinst', 'telinst', 'faxinst', 'emailinst', 'codedo', 'codciu', 'codmun', 'codpar', 'ingesta', 'matinst', 'coddep', 'codsub', 'persona', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codinst' => 0, 'Nominst' => 1, 'Dirinst' => 2, 'Telinst' => 3, 'Faxinst' => 4, 'Emailinst' => 5, 'Codedo' => 6, 'Codciu' => 7, 'Codmun' => 8, 'Codpar' => 9, 'Ingesta' => 10, 'Matinst' => 11, 'Coddep' => 12, 'Codsub' => 13, 'Persona' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (FainsteduPeer::CODINST => 0, FainsteduPeer::NOMINST => 1, FainsteduPeer::DIRINST => 2, FainsteduPeer::TELINST => 3, FainsteduPeer::FAXINST => 4, FainsteduPeer::EMAILINST => 5, FainsteduPeer::CODEDO => 6, FainsteduPeer::CODCIU => 7, FainsteduPeer::CODMUN => 8, FainsteduPeer::CODPAR => 9, FainsteduPeer::INGESTA => 10, FainsteduPeer::MATINST => 11, FainsteduPeer::CODDEP => 12, FainsteduPeer::CODSUB => 13, FainsteduPeer::PERSONA => 14, FainsteduPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codinst' => 0, 'nominst' => 1, 'dirinst' => 2, 'telinst' => 3, 'faxinst' => 4, 'emailinst' => 5, 'codedo' => 6, 'codciu' => 7, 'codmun' => 8, 'codpar' => 9, 'ingesta' => 10, 'matinst' => 11, 'coddep' => 12, 'codsub' => 13, 'persona' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/facturacion/map/FainsteduMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.facturacion.map.FainsteduMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FainsteduPeer::getTableMap();
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
		return str_replace(FainsteduPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FainsteduPeer::CODINST);

		$criteria->addSelectColumn(FainsteduPeer::NOMINST);

		$criteria->addSelectColumn(FainsteduPeer::DIRINST);

		$criteria->addSelectColumn(FainsteduPeer::TELINST);

		$criteria->addSelectColumn(FainsteduPeer::FAXINST);

		$criteria->addSelectColumn(FainsteduPeer::EMAILINST);

		$criteria->addSelectColumn(FainsteduPeer::CODEDO);

		$criteria->addSelectColumn(FainsteduPeer::CODCIU);

		$criteria->addSelectColumn(FainsteduPeer::CODMUN);

		$criteria->addSelectColumn(FainsteduPeer::CODPAR);

		$criteria->addSelectColumn(FainsteduPeer::INGESTA);

		$criteria->addSelectColumn(FainsteduPeer::MATINST);

		$criteria->addSelectColumn(FainsteduPeer::CODDEP);

		$criteria->addSelectColumn(FainsteduPeer::CODSUB);

		$criteria->addSelectColumn(FainsteduPeer::PERSONA);

		$criteria->addSelectColumn(FainsteduPeer::ID);

	}

	const COUNT = 'COUNT(fainstedu.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fainstedu.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FainsteduPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FainsteduPeer::doSelectRS($criteria, $con);
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
		$objects = FainsteduPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FainsteduPeer::populateObjects(FainsteduPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FainsteduPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FainsteduPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFadependencia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FainsteduPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);

		$rs = FainsteduPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFasubsistema(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FainsteduPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);

		$rs = FainsteduPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFadependencia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FainsteduPeer::addSelectColumns($c);
		$startcol = (FainsteduPeer::NUM_COLUMNS - FainsteduPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FadependenciaPeer::addSelectColumns($c);

		$c->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FainsteduPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FadependenciaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFadependencia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFainstedu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFainstedus();
				$obj2->addFainstedu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFasubsistema(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FainsteduPeer::addSelectColumns($c);
		$startcol = (FainsteduPeer::NUM_COLUMNS - FainsteduPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FasubsistemaPeer::addSelectColumns($c);

		$c->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FainsteduPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FasubsistemaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFasubsistema(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFainstedu($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFainstedus();
				$obj2->addFainstedu($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FainsteduPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);
	
			$criteria->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);
	
		$rs = FainsteduPeer::doSelectRS($criteria, $con);
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

		FainsteduPeer::addSelectColumns($c);
		$startcol2 = (FainsteduPeer::NUM_COLUMNS - FainsteduPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadependenciaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadependenciaPeer::NUM_COLUMNS;
	
			FasubsistemaPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + FasubsistemaPeer::NUM_COLUMNS;
	
			$c->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);
	
			$c->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FainsteduPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FadependenciaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadependencia(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFainstedu($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFainstedus();
					$obj2->addFainstedu($obj1);
				}
	

							
				$omClass = FasubsistemaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getFasubsistema(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addFainstedu($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initFainstedus();
					$obj3->addFainstedu($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptFadependencia(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FainsteduPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);
		
			$rs = FainsteduPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptFasubsistema(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(FainsteduPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(FainsteduPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);
		
			$rs = FainsteduPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptFadependencia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FainsteduPeer::addSelectColumns($c);
		$startcol2 = (FainsteduPeer::NUM_COLUMNS - FainsteduPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FasubsistemaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FasubsistemaPeer::NUM_COLUMNS;
	
			$c->addJoin(FainsteduPeer::CODSUB, FasubsistemaPeer::CODSUB);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FainsteduPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FasubsistemaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFasubsistema(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFainstedu($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFainstedus();
					$obj2->addFainstedu($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFasubsistema(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FainsteduPeer::addSelectColumns($c);
		$startcol2 = (FainsteduPeer::NUM_COLUMNS - FainsteduPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FadependenciaPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FadependenciaPeer::NUM_COLUMNS;
	
			$c->addJoin(FainsteduPeer::CODDEP, FadependenciaPeer::CODDEP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FainsteduPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = FadependenciaPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFadependencia(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFainstedu($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initFainstedus();
					$obj2->addFainstedu($obj1);
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
		return FainsteduPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FainsteduPeer::ID); 

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
			$comparison = $criteria->getComparison(FainsteduPeer::ID);
			$selectCriteria->add(FainsteduPeer::ID, $criteria->remove(FainsteduPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FainsteduPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FainsteduPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fainstedu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FainsteduPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fainstedu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FainsteduPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FainsteduPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FainsteduPeer::DATABASE_NAME, FainsteduPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FainsteduPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FainsteduPeer::DATABASE_NAME);

		$criteria->add(FainsteduPeer::ID, $pk);


		$v = FainsteduPeer::doSelect($criteria, $con);

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
			$criteria->add(FainsteduPeer::ID, $pks, Criteria::IN);
			$objs = FainsteduPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFainsteduPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/facturacion/map/FainsteduMapBuilder.php';
	Propel::registerMapBuilder('lib.model.facturacion.map.FainsteduMapBuilder');
}
