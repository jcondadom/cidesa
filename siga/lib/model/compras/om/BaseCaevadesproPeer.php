<?php


abstract class BaseCaevadesproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caevadespro';

	
	const CLASS_DEFAULT = 'lib.model.compras.Caevadespro';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEVA = 'caevadespro.CODEVA';

	
	const FECEVA = 'caevadespro.FECEVA';

	
	const CODPRO = 'caevadespro.CODPRO';

	
	const CLAPRO = 'caevadespro.CLAPRO';

	
	const OBSERV = 'caevadespro.OBSERV';

	
	const CODNIV = 'caevadespro.CODNIV';

	
	const LOGUSE = 'caevadespro.LOGUSE';

	
	const ID = 'caevadespro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codeva', 'Feceva', 'Codpro', 'Clapro', 'Observ', 'Codniv', 'Loguse', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaevadesproPeer::CODEVA, CaevadesproPeer::FECEVA, CaevadesproPeer::CODPRO, CaevadesproPeer::CLAPRO, CaevadesproPeer::OBSERV, CaevadesproPeer::CODNIV, CaevadesproPeer::LOGUSE, CaevadesproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codeva', 'feceva', 'codpro', 'clapro', 'observ', 'codniv', 'loguse', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codeva' => 0, 'Feceva' => 1, 'Codpro' => 2, 'Clapro' => 3, 'Observ' => 4, 'Codniv' => 5, 'Loguse' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CaevadesproPeer::CODEVA => 0, CaevadesproPeer::FECEVA => 1, CaevadesproPeer::CODPRO => 2, CaevadesproPeer::CLAPRO => 3, CaevadesproPeer::OBSERV => 4, CaevadesproPeer::CODNIV => 5, CaevadesproPeer::LOGUSE => 6, CaevadesproPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codeva' => 0, 'feceva' => 1, 'codpro' => 2, 'clapro' => 3, 'observ' => 4, 'codniv' => 5, 'loguse' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CaevadesproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CaevadesproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaevadesproPeer::getTableMap();
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
		return str_replace(CaevadesproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaevadesproPeer::CODEVA);

		$criteria->addSelectColumn(CaevadesproPeer::FECEVA);

		$criteria->addSelectColumn(CaevadesproPeer::CODPRO);

		$criteria->addSelectColumn(CaevadesproPeer::CLAPRO);

		$criteria->addSelectColumn(CaevadesproPeer::OBSERV);

		$criteria->addSelectColumn(CaevadesproPeer::CODNIV);

		$criteria->addSelectColumn(CaevadesproPeer::LOGUSE);

		$criteria->addSelectColumn(CaevadesproPeer::ID);

	}

	const COUNT = 'COUNT(caevadespro.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caevadespro.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaevadesproPeer::doSelectRS($criteria, $con);
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
		$objects = CaevadesproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaevadesproPeer::populateObjects(CaevadesproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaevadesproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaevadesproPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCaprovee(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CaevadesproPeer::CODPRO, CaproveePeer::CODPRO);

		$rs = CaevadesproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCaprovee(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CaevadesproPeer::addSelectColumns($c);
		$startcol = (CaevadesproPeer::NUM_COLUMNS - CaevadesproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CaproveePeer::addSelectColumns($c);

		$c->addJoin(CaevadesproPeer::CODPRO, CaproveePeer::CODPRO);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CaevadesproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CaproveePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCaprovee(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCaevadespro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCaevadespros();
				$obj2->addCaevadespro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaevadesproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CaevadesproPeer::CODPRO, CaproveePeer::CODPRO);
	
		$rs = CaevadesproPeer::doSelectRS($criteria, $con);
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

		CaevadesproPeer::addSelectColumns($c);
		$startcol2 = (CaevadesproPeer::NUM_COLUMNS - CaevadesproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CaproveePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CaproveePeer::NUM_COLUMNS;
	
			$c->addJoin(CaevadesproPeer::CODPRO, CaproveePeer::CODPRO);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CaevadesproPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CaproveePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCaprovee(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCaevadespro($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCaevadespros();
					$obj2->addCaevadespro($obj1);
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
		return CaevadesproPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CaevadesproPeer::ID); 

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
			$comparison = $criteria->getComparison(CaevadesproPeer::ID);
			$selectCriteria->add(CaevadesproPeer::ID, $criteria->remove(CaevadesproPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaevadesproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaevadesproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caevadespro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaevadesproPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caevadespro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaevadesproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaevadesproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaevadesproPeer::DATABASE_NAME, CaevadesproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaevadesproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaevadesproPeer::DATABASE_NAME);

		$criteria->add(CaevadesproPeer::ID, $pk);


		$v = CaevadesproPeer::doSelect($criteria, $con);

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
			$criteria->add(CaevadesproPeer::ID, $pks, Criteria::IN);
			$objs = CaevadesproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaevadesproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CaevadesproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CaevadesproMapBuilder');
}
