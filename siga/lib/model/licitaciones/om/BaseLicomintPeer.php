<?php


abstract class BaseLicomintPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'licomint';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Licomint';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCOMINT = 'licomint.NUMCOMINT';

	
	const CODEMPADM = 'licomint.CODEMPADM';

	
	const CODUNIADM = 'licomint.CODUNIADM';

	
	const CODEMPEJE = 'licomint.CODEMPEJE';

	
	const CODUNISTE = 'licomint.CODUNISTE';

	
	const TIPCON = 'licomint.TIPCON';

	
	const FECREG = 'licomint.FECREG';

	
	const DIAS = 'licomint.DIAS';

	
	const FECVEN = 'licomint.FECVEN';

	
	const CODCLACOMP = 'licomint.CODCLACOMP';

	
	const MONCOM = 'licomint.MONCOM';

	
	const CODTIPLIC = 'licomint.CODTIPLIC';

	
	const CODMON = 'licomint.CODMON';

	
	const TIPCOM = 'licomint.TIPCOM';

	
	const STATUS = 'licomint.STATUS';

	
	const LISICACT_ID = 'licomint.LISICACT_ID';

	
	const DETDECMOD = 'licomint.DETDECMOD';

	
	const PREPOR = 'licomint.PREPOR';

	
	const CARGOPRE = 'licomint.CARGOPRE';

	
	const APRPOR = 'licomint.APRPOR';

	
	const CARGOAPR = 'licomint.CARGOAPR';

	
	const FECDECLA = 'licomint.FECDECLA';

	
	const ID = 'licomint.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcomint', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Tipcon', 'Fecreg', 'Dias', 'Fecven', 'Codclacomp', 'Moncom', 'Codtiplic', 'Codmon', 'Tipcom', 'Status', 'LisicactId', 'Detdecmod', 'Prepor', 'Cargopre', 'Aprpor', 'Cargoapr', 'Fecdecla', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LicomintPeer::NUMCOMINT, LicomintPeer::CODEMPADM, LicomintPeer::CODUNIADM, LicomintPeer::CODEMPEJE, LicomintPeer::CODUNISTE, LicomintPeer::TIPCON, LicomintPeer::FECREG, LicomintPeer::DIAS, LicomintPeer::FECVEN, LicomintPeer::CODCLACOMP, LicomintPeer::MONCOM, LicomintPeer::CODTIPLIC, LicomintPeer::CODMON, LicomintPeer::TIPCOM, LicomintPeer::STATUS, LicomintPeer::LISICACT_ID, LicomintPeer::DETDECMOD, LicomintPeer::PREPOR, LicomintPeer::CARGOPRE, LicomintPeer::APRPOR, LicomintPeer::CARGOAPR, LicomintPeer::FECDECLA, LicomintPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcomint', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'tipcon', 'fecreg', 'dias', 'fecven', 'codclacomp', 'moncom', 'codtiplic', 'codmon', 'tipcom', 'status', 'lisicact_id', 'detdecmod', 'prepor', 'cargopre', 'aprpor', 'cargoapr', 'fecdecla', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcomint' => 0, 'Codempadm' => 1, 'Coduniadm' => 2, 'Codempeje' => 3, 'Coduniste' => 4, 'Tipcon' => 5, 'Fecreg' => 6, 'Dias' => 7, 'Fecven' => 8, 'Codclacomp' => 9, 'Moncom' => 10, 'Codtiplic' => 11, 'Codmon' => 12, 'Tipcom' => 13, 'Status' => 14, 'LisicactId' => 15, 'Detdecmod' => 16, 'Prepor' => 17, 'Cargopre' => 18, 'Aprpor' => 19, 'Cargoapr' => 20, 'Fecdecla' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (LicomintPeer::NUMCOMINT => 0, LicomintPeer::CODEMPADM => 1, LicomintPeer::CODUNIADM => 2, LicomintPeer::CODEMPEJE => 3, LicomintPeer::CODUNISTE => 4, LicomintPeer::TIPCON => 5, LicomintPeer::FECREG => 6, LicomintPeer::DIAS => 7, LicomintPeer::FECVEN => 8, LicomintPeer::CODCLACOMP => 9, LicomintPeer::MONCOM => 10, LicomintPeer::CODTIPLIC => 11, LicomintPeer::CODMON => 12, LicomintPeer::TIPCOM => 13, LicomintPeer::STATUS => 14, LicomintPeer::LISICACT_ID => 15, LicomintPeer::DETDECMOD => 16, LicomintPeer::PREPOR => 17, LicomintPeer::CARGOPRE => 18, LicomintPeer::APRPOR => 19, LicomintPeer::CARGOAPR => 20, LicomintPeer::FECDECLA => 21, LicomintPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numcomint' => 0, 'codempadm' => 1, 'coduniadm' => 2, 'codempeje' => 3, 'coduniste' => 4, 'tipcon' => 5, 'fecreg' => 6, 'dias' => 7, 'fecven' => 8, 'codclacomp' => 9, 'moncom' => 10, 'codtiplic' => 11, 'codmon' => 12, 'tipcom' => 13, 'status' => 14, 'lisicact_id' => 15, 'detdecmod' => 16, 'prepor' => 17, 'cargopre' => 18, 'aprpor' => 19, 'cargoapr' => 20, 'fecdecla' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LicomintMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LicomintMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LicomintPeer::getTableMap();
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
		return str_replace(LicomintPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LicomintPeer::NUMCOMINT);

		$criteria->addSelectColumn(LicomintPeer::CODEMPADM);

		$criteria->addSelectColumn(LicomintPeer::CODUNIADM);

		$criteria->addSelectColumn(LicomintPeer::CODEMPEJE);

		$criteria->addSelectColumn(LicomintPeer::CODUNISTE);

		$criteria->addSelectColumn(LicomintPeer::TIPCON);

		$criteria->addSelectColumn(LicomintPeer::FECREG);

		$criteria->addSelectColumn(LicomintPeer::DIAS);

		$criteria->addSelectColumn(LicomintPeer::FECVEN);

		$criteria->addSelectColumn(LicomintPeer::CODCLACOMP);

		$criteria->addSelectColumn(LicomintPeer::MONCOM);

		$criteria->addSelectColumn(LicomintPeer::CODTIPLIC);

		$criteria->addSelectColumn(LicomintPeer::CODMON);

		$criteria->addSelectColumn(LicomintPeer::TIPCOM);

		$criteria->addSelectColumn(LicomintPeer::STATUS);

		$criteria->addSelectColumn(LicomintPeer::LISICACT_ID);

		$criteria->addSelectColumn(LicomintPeer::DETDECMOD);

		$criteria->addSelectColumn(LicomintPeer::PREPOR);

		$criteria->addSelectColumn(LicomintPeer::CARGOPRE);

		$criteria->addSelectColumn(LicomintPeer::APRPOR);

		$criteria->addSelectColumn(LicomintPeer::CARGOAPR);

		$criteria->addSelectColumn(LicomintPeer::FECDECLA);

		$criteria->addSelectColumn(LicomintPeer::ID);

	}

	const COUNT = 'COUNT(licomint.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT licomint.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicomintPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicomintPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LicomintPeer::doSelectRS($criteria, $con);
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
		$objects = LicomintPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LicomintPeer::populateObjects(LicomintPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LicomintPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LicomintPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicomintPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicomintPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LicomintPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LicomintPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LicomintPeer::addSelectColumns($c);
		$startcol = (LicomintPeer::NUM_COLUMNS - LicomintPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LicomintPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicomintPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LisicactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLisicact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLicomint($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLicomints();
				$obj2->addLicomint($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicomintPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicomintPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LicomintPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LicomintPeer::doSelectRS($criteria, $con);
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

		LicomintPeer::addSelectColumns($c);
		$startcol2 = (LicomintPeer::NUM_COLUMNS - LicomintPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LicomintPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicomintPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLisicact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLicomint($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLicomints();
					$obj2->addLicomint($obj1);
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
		return LicomintPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LicomintPeer::ID); 

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
			$comparison = $criteria->getComparison(LicomintPeer::ID);
			$selectCriteria->add(LicomintPeer::ID, $criteria->remove(LicomintPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LicomintPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LicomintPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Licomint) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LicomintPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Licomint $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LicomintPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LicomintPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LicomintPeer::DATABASE_NAME, LicomintPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LicomintPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LicomintPeer::DATABASE_NAME);

		$criteria->add(LicomintPeer::ID, $pk);


		$v = LicomintPeer::doSelect($criteria, $con);

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
			$criteria->add(LicomintPeer::ID, $pks, Criteria::IN);
			$objs = LicomintPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLicomintPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LicomintMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LicomintMapBuilder');
}
