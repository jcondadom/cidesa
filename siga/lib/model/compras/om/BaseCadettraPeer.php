<?php


abstract class BaseCadettraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cadettra';

	
	const CLASS_DEFAULT = 'lib.model.compras.Cadettra';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTRA = 'cadettra.CODTRA';

	
	const CODART = 'cadettra.CODART';

	
	const CANART = 'cadettra.CANART';

	
	const CANREC = 'cadettra.CANREC';

	
	const CANDEV = 'cadettra.CANDEV';

	
	const CANDIF = 'cadettra.CANDIF';

	
	const CODFAL = 'cadettra.CODFAL';

	
	const FECEST = 'cadettra.FECEST';

	
	const OBSTRA = 'cadettra.OBSTRA';

	
	const NUMLOTORI = 'cadettra.NUMLOTORI';

	
	const NUMLOTDES = 'cadettra.NUMLOTDES';

	
	const ALMORI = 'cadettra.ALMORI';

	
	const CODUBIORI = 'cadettra.CODUBIORI';

	
	const ALMDES = 'cadettra.ALMDES';

	
	const CODUBIDES = 'cadettra.CODUBIDES';

	
	const ID = 'cadettra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtra', 'Codart', 'Canart', 'Canrec', 'Candev', 'Candif', 'Codfal', 'Fecest', 'Obstra', 'Numlotori', 'Numlotdes', 'Almori', 'Codubiori', 'Almdes', 'Codubides', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CadettraPeer::CODTRA, CadettraPeer::CODART, CadettraPeer::CANART, CadettraPeer::CANREC, CadettraPeer::CANDEV, CadettraPeer::CANDIF, CadettraPeer::CODFAL, CadettraPeer::FECEST, CadettraPeer::OBSTRA, CadettraPeer::NUMLOTORI, CadettraPeer::NUMLOTDES, CadettraPeer::ALMORI, CadettraPeer::CODUBIORI, CadettraPeer::ALMDES, CadettraPeer::CODUBIDES, CadettraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtra', 'codart', 'canart', 'canrec', 'candev', 'candif', 'codfal', 'fecest', 'obstra', 'numlotori', 'numlotdes', 'almori', 'codubiori', 'almdes', 'codubides', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtra' => 0, 'Codart' => 1, 'Canart' => 2, 'Canrec' => 3, 'Candev' => 4, 'Candif' => 5, 'Codfal' => 6, 'Fecest' => 7, 'Obstra' => 8, 'Numlotori' => 9, 'Numlotdes' => 10, 'Almori' => 11, 'Codubiori' => 12, 'Almdes' => 13, 'Codubides' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CadettraPeer::CODTRA => 0, CadettraPeer::CODART => 1, CadettraPeer::CANART => 2, CadettraPeer::CANREC => 3, CadettraPeer::CANDEV => 4, CadettraPeer::CANDIF => 5, CadettraPeer::CODFAL => 6, CadettraPeer::FECEST => 7, CadettraPeer::OBSTRA => 8, CadettraPeer::NUMLOTORI => 9, CadettraPeer::NUMLOTDES => 10, CadettraPeer::ALMORI => 11, CadettraPeer::CODUBIORI => 12, CadettraPeer::ALMDES => 13, CadettraPeer::CODUBIDES => 14, CadettraPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codtra' => 0, 'codart' => 1, 'canart' => 2, 'canrec' => 3, 'candev' => 4, 'candif' => 5, 'codfal' => 6, 'fecest' => 7, 'obstra' => 8, 'numlotori' => 9, 'numlotdes' => 10, 'almori' => 11, 'codubiori' => 12, 'almdes' => 13, 'codubides' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CadettraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CadettraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CadettraPeer::getTableMap();
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
		return str_replace(CadettraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CadettraPeer::CODTRA);

		$criteria->addSelectColumn(CadettraPeer::CODART);

		$criteria->addSelectColumn(CadettraPeer::CANART);

		$criteria->addSelectColumn(CadettraPeer::CANREC);

		$criteria->addSelectColumn(CadettraPeer::CANDEV);

		$criteria->addSelectColumn(CadettraPeer::CANDIF);

		$criteria->addSelectColumn(CadettraPeer::CODFAL);

		$criteria->addSelectColumn(CadettraPeer::FECEST);

		$criteria->addSelectColumn(CadettraPeer::OBSTRA);

		$criteria->addSelectColumn(CadettraPeer::NUMLOTORI);

		$criteria->addSelectColumn(CadettraPeer::NUMLOTDES);

		$criteria->addSelectColumn(CadettraPeer::ALMORI);

		$criteria->addSelectColumn(CadettraPeer::CODUBIORI);

		$criteria->addSelectColumn(CadettraPeer::ALMDES);

		$criteria->addSelectColumn(CadettraPeer::CODUBIDES);

		$criteria->addSelectColumn(CadettraPeer::ID);

	}

	const COUNT = 'COUNT(cadettra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cadettra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadettraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadettraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CadettraPeer::doSelectRS($criteria, $con);
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
		$objects = CadettraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CadettraPeer::populateObjects(CadettraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CadettraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CadettraPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCamotfal(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadettraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadettraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CadettraPeer::CODFAL, CamotfalPeer::CODFAL);

		$rs = CadettraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCamotfal(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CadettraPeer::addSelectColumns($c);
		$startcol = (CadettraPeer::NUM_COLUMNS - CadettraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CamotfalPeer::addSelectColumns($c);

		$c->addJoin(CadettraPeer::CODFAL, CamotfalPeer::CODFAL);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadettraPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CamotfalPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCamotfal(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCadettra($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCadettras();
				$obj2->addCadettra($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CadettraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CadettraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CadettraPeer::CODFAL, CamotfalPeer::CODFAL);
	
		$rs = CadettraPeer::doSelectRS($criteria, $con);
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

		CadettraPeer::addSelectColumns($c);
		$startcol2 = (CadettraPeer::NUM_COLUMNS - CadettraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CamotfalPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CamotfalPeer::NUM_COLUMNS;
	
			$c->addJoin(CadettraPeer::CODFAL, CamotfalPeer::CODFAL);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CadettraPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CamotfalPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCamotfal(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCadettra($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCadettras();
					$obj2->addCadettra($obj1);
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
		return CadettraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CadettraPeer::ID); 

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
			$comparison = $criteria->getComparison(CadettraPeer::ID);
			$selectCriteria->add(CadettraPeer::ID, $criteria->remove(CadettraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CadettraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CadettraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cadettra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CadettraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cadettra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CadettraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CadettraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CadettraPeer::DATABASE_NAME, CadettraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CadettraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CadettraPeer::DATABASE_NAME);

		$criteria->add(CadettraPeer::ID, $pk);


		$v = CadettraPeer::doSelect($criteria, $con);

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
			$criteria->add(CadettraPeer::ID, $pks, Criteria::IN);
			$objs = CadettraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCadettraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CadettraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CadettraMapBuilder');
}
