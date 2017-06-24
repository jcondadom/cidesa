<?php


abstract class BaseCadefalmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadefalm';

	
	const CLASS_DEFAULT = 'lib.model.compras.Cadefalm';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODALM = 'cadefalm.CODALM';

	
	const NOMALM = 'cadefalm.NOMALM';

	
	const CODZON = 'cadefalm.CODZON';

	
	const CODCAT = 'cadefalm.CODCAT';

	
	const CODTIP = 'cadefalm.CODTIP';

	
	const CATIPALM_ID = 'cadefalm.CATIPALM_ID';

	
	const DIRALM = 'cadefalm.DIRALM';

	
	const CODALT = 'cadefalm.CODALT';

	
	const CODEDO = 'cadefalm.CODEDO';

	
	const ESPTOVEN = 'cadefalm.ESPTOVEN';

	
	const CODTIPPV = 'cadefalm.CODTIPPV';

	
	const CODCTA = 'cadefalm.CODCTA';

	
	const CODEMP = 'cadefalm.CODEMP';

	
	const TIPREG = 'cadefalm.TIPREG';

	
	const UNICOR = 'cadefalm.UNICOR';

	
	const CORFAC = 'cadefalm.CORFAC';

	
	const CORNUMCTR = 'cadefalm.CORNUMCTR';

	
	const ID = 'cadefalm.ID';

	
	const CODALMSAP = 'cadefalm.CODALMSAP';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm', 'Nomalm', 'Codzon', 'Codcat', 'Codtip', 'CatipalmId', 'Diralm', 'Codalt', 'Codedo', 'Esptoven', 'Codtippv', 'Codcta', 'Codemp', 'Tipreg', 'Unicor', 'Corfac', 'Cornumctr', 'Id', 'Codalmsap', ),
		BasePeer::TYPE_COLNAME => array (CadefalmPeer::CODALM, CadefalmPeer::NOMALM, CadefalmPeer::CODZON, CadefalmPeer::CODCAT, CadefalmPeer::CODTIP, CadefalmPeer::CATIPALM_ID, CadefalmPeer::DIRALM, CadefalmPeer::CODALT, CadefalmPeer::CODEDO, CadefalmPeer::ESPTOVEN, CadefalmPeer::CODTIPPV, CadefalmPeer::CODCTA, CadefalmPeer::CODEMP, CadefalmPeer::TIPREG, CadefalmPeer::UNICOR, CadefalmPeer::CORFAC, CadefalmPeer::CORNUMCTR, CadefalmPeer::ID, CadefalmPeer::CODALMSAP, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm', 'nomalm', 'codzon', 'codcat', 'codtip', 'catipalm_id', 'diralm', 'codalt', 'codedo', 'esptoven', 'codtippv', 'codcta', 'codemp', 'tipreg', 'unicor', 'corfac', 'cornumctr', 'id', 'codalmsap', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codalm' => 0, 'Nomalm' => 1, 'Codzon' => 2, 'Codcat' => 3, 'Codtip' => 4, 'CatipalmId' => 5, 'Diralm' => 6, 'Codalt' => 7, 'Codedo' => 8, 'Esptoven' => 9, 'Codtippv' => 10, 'Codcta' => 11, 'Codemp' => 12, 'Tipreg' => 13, 'Unicor' => 14, 'Corfac' => 15, 'Cornumctr' => 16, 'Id' => 17, 'Codalmsap' => 18, ),
		BasePeer::TYPE_COLNAME => array (CadefalmPeer::CODALM => 0, CadefalmPeer::NOMALM => 1, CadefalmPeer::CODZON => 2, CadefalmPeer::CODCAT => 3, CadefalmPeer::CODTIP => 4, CadefalmPeer::CATIPALM_ID => 5, CadefalmPeer::DIRALM => 6, CadefalmPeer::CODALT => 7, CadefalmPeer::CODEDO => 8, CadefalmPeer::ESPTOVEN => 9, CadefalmPeer::CODTIPPV => 10, CadefalmPeer::CODCTA => 11, CadefalmPeer::CODEMP => 12, CadefalmPeer::TIPREG => 13, CadefalmPeer::UNICOR => 14, CadefalmPeer::CORFAC => 15, CadefalmPeer::CORNUMCTR => 16, CadefalmPeer::ID => 17, CadefalmPeer::CODALMSAP => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codalm' => 0, 'nomalm' => 1, 'codzon' => 2, 'codcat' => 3, 'codtip' => 4, 'catipalm_id' => 5, 'diralm' => 6, 'codalt' => 7, 'codedo' => 8, 'esptoven' => 9, 'codtippv' => 10, 'codcta' => 11, 'codemp' => 12, 'tipreg' => 13, 'unicor' => 14, 'corfac' => 15, 'cornumctr' => 16, 'id' => 17, 'codalmsap' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CadefalmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CadefalmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadefalmPeer::getTableMap();
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
		return str_replace(CadefalmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadefalmPeer::CODALM);

		$criteria->addSelectColumn(CadefalmPeer::NOMALM);

		$criteria->addSelectColumn(CadefalmPeer::CODZON);

		$criteria->addSelectColumn(CadefalmPeer::CODCAT);

		$criteria->addSelectColumn(CadefalmPeer::CODTIP);

		$criteria->addSelectColumn(CadefalmPeer::CATIPALM_ID);

		$criteria->addSelectColumn(CadefalmPeer::DIRALM);

		$criteria->addSelectColumn(CadefalmPeer::CODALT);

		$criteria->addSelectColumn(CadefalmPeer::CODEDO);

		$criteria->addSelectColumn(CadefalmPeer::ESPTOVEN);

		$criteria->addSelectColumn(CadefalmPeer::CODTIPPV);

		$criteria->addSelectColumn(CadefalmPeer::CODCTA);

		$criteria->addSelectColumn(CadefalmPeer::CODEMP);

		$criteria->addSelectColumn(CadefalmPeer::TIPREG);

		$criteria->addSelectColumn(CadefalmPeer::UNICOR);

		$criteria->addSelectColumn(CadefalmPeer::CORFAC);

		$criteria->addSelectColumn(CadefalmPeer::CORNUMCTR);

		$criteria->addSelectColumn(CadefalmPeer::ID);

		$criteria->addSelectColumn(CadefalmPeer::CODALMSAP);

	}

	const COUNT = 'COUNT(cadefalm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadefalm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadefalmPeer::doSelectRS($criteria, $con);
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
		$objects = CadefalmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadefalmPeer::populateObjects(CadefalmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadefalmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadefalmPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCatipalmRelatedByCodtip(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefalmPeer::CODTIP, CatipalmPeer::ID);

		$rs = CadefalmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCatipalmRelatedByCatipalmId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadefalmPeer::CATIPALM_ID, CatipalmPeer::ID);

		$rs = CadefalmPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCatipalmRelatedByCodtip(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefalmPeer::addSelectColumns($c);
		$startcol = (CadefalmPeer::NUM_COLUMNS - CadefalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatipalmPeer::addSelectColumns($c);

		$c->addJoin(CadefalmPeer::CODTIP, CatipalmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatipalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatipalmRelatedByCodtip(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefalmRelatedByCodtip($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefalmsRelatedByCodtip();
				$obj2->addCadefalmRelatedByCodtip($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCatipalmRelatedByCatipalmId(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefalmPeer::addSelectColumns($c);
		$startcol = (CadefalmPeer::NUM_COLUMNS - CadefalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CatipalmPeer::addSelectColumns($c);

		$c->addJoin(CadefalmPeer::CATIPALM_ID, CatipalmPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CatipalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCatipalmRelatedByCatipalmId(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadefalmRelatedByCatipalmId($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadefalmsRelatedByCatipalmId();
				$obj2->addCadefalmRelatedByCatipalmId($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadefalmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CadefalmPeer::CODTIP, CatipalmPeer::ID);
	
			$criteria->addJoin(CadefalmPeer::CATIPALM_ID, CatipalmPeer::ID);
	
		$rs = CadefalmPeer::doSelectRS($criteria, $con);
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

		CadefalmPeer::addSelectColumns($c);
		$startcol2 = (CadefalmPeer::NUM_COLUMNS - CadefalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CatipalmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CatipalmPeer::NUM_COLUMNS;
	
			CatipalmPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + CatipalmPeer::NUM_COLUMNS;
	
			$c->addJoin(CadefalmPeer::CODTIP, CatipalmPeer::ID);
	
			$c->addJoin(CadefalmPeer::CATIPALM_ID, CatipalmPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefalmPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CatipalmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCatipalmRelatedByCodtip(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadefalmRelatedByCodtip($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCadefalmsRelatedByCodtip();
					$obj2->addCadefalmRelatedByCodtip($obj1);
				}
	

							
				$omClass = CatipalmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getCatipalmRelatedByCatipalmId(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addCadefalmRelatedByCatipalmId($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initCadefalmsRelatedByCatipalmId();
					$obj3->addCadefalmRelatedByCatipalmId($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptCatipalmRelatedByCodtip(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefalmPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
			$rs = CadefalmPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptCatipalmRelatedByCatipalmId(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(CadefalmPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(CadefalmPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
			$rs = CadefalmPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptCatipalmRelatedByCodtip(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefalmPeer::addSelectColumns($c);
		$startcol2 = (CadefalmPeer::NUM_COLUMNS - CadefalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCatipalmRelatedByCatipalmId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadefalmPeer::addSelectColumns($c);
		$startcol2 = (CadefalmPeer::NUM_COLUMNS - CadefalmPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadefalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return CadefalmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadefalmPeer::ID); 

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
			$comparison = $criteria->getComparison(CadefalmPeer::ID);
			$selectCriteria->add(CadefalmPeer::ID, $criteria->remove(CadefalmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadefalmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadefalm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadefalmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadefalm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadefalmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadefalmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadefalmPeer::DATABASE_NAME, CadefalmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadefalmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		$criteria->add(CadefalmPeer::ID, $pk);


		$v = CadefalmPeer::doSelect($criteria, $con);

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
			$criteria->add(CadefalmPeer::ID, $pks, Criteria::IN);
			$objs = CadefalmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadefalmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CadefalmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CadefalmMapBuilder');
}
