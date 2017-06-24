<?php


abstract class BaseLicontratPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'licontrat';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Licontrat';

	
	const NUM_COLUMNS = 30;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCONT = 'licontrat.NUMCONT';

	
	const RESOLU = 'licontrat.RESOLU';

	
	const FECREL = 'licontrat.FECREL';

	
	const FECREG = 'licontrat.FECREG';

	
	const DIAS = 'licontrat.DIAS';

	
	const FECVEN = 'licontrat.FECVEN';

	
	const NUMPTOCUECON = 'licontrat.NUMPTOCUECON';

	
	const NUMEXP = 'licontrat.NUMEXP';

	
	const CODEMPADM = 'licontrat.CODEMPADM';

	
	const CODUNIADM = 'licontrat.CODUNIADM';

	
	const CODEMPEJE = 'licontrat.CODEMPEJE';

	
	const CODUNISTE = 'licontrat.CODUNISTE';

	
	const CODPRO = 'licontrat.CODPRO';

	
	const NUMOFE = 'licontrat.NUMOFE';

	
	const OBJCONT = 'licontrat.OBJCONT';

	
	const SANCIO = 'licontrat.SANCIO';

	
	const GARANT = 'licontrat.GARANT';

	
	const STATUS = 'licontrat.STATUS';

	
	const DOCANE1 = 'licontrat.DOCANE1';

	
	const DOCANE2 = 'licontrat.DOCANE2';

	
	const DOCANE3 = 'licontrat.DOCANE3';

	
	const PREPOR = 'licontrat.PREPOR';

	
	const PREPORCAR = 'licontrat.PREPORCAR';

	
	const LISICACT_ID = 'licontrat.LISICACT_ID';

	
	const FECDECLA = 'licontrat.FECDECLA';

	
	const DETDECMOD = 'licontrat.DETDECMOD';

	
	const ANAPOR = 'licontrat.ANAPOR';

	
	const ANAPORCAR = 'licontrat.ANAPORCAR';

	
	const TIPCONPUB = 'licontrat.TIPCONPUB';

	
	const ID = 'licontrat.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont', 'Resolu', 'Fecrel', 'Fecreg', 'Dias', 'Fecven', 'Numptocuecon', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Codpro', 'Numofe', 'Objcont', 'Sancio', 'Garant', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LicontratPeer::NUMCONT, LicontratPeer::RESOLU, LicontratPeer::FECREL, LicontratPeer::FECREG, LicontratPeer::DIAS, LicontratPeer::FECVEN, LicontratPeer::NUMPTOCUECON, LicontratPeer::NUMEXP, LicontratPeer::CODEMPADM, LicontratPeer::CODUNIADM, LicontratPeer::CODEMPEJE, LicontratPeer::CODUNISTE, LicontratPeer::CODPRO, LicontratPeer::NUMOFE, LicontratPeer::OBJCONT, LicontratPeer::SANCIO, LicontratPeer::GARANT, LicontratPeer::STATUS, LicontratPeer::DOCANE1, LicontratPeer::DOCANE2, LicontratPeer::DOCANE3, LicontratPeer::PREPOR, LicontratPeer::PREPORCAR, LicontratPeer::LISICACT_ID, LicontratPeer::FECDECLA, LicontratPeer::DETDECMOD, LicontratPeer::ANAPOR, LicontratPeer::ANAPORCAR, LicontratPeer::TIPCONPUB, LicontratPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont', 'resolu', 'fecrel', 'fecreg', 'dias', 'fecven', 'numptocuecon', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'codpro', 'numofe', 'objcont', 'sancio', 'garant', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcont' => 0, 'Resolu' => 1, 'Fecrel' => 2, 'Fecreg' => 3, 'Dias' => 4, 'Fecven' => 5, 'Numptocuecon' => 6, 'Numexp' => 7, 'Codempadm' => 8, 'Coduniadm' => 9, 'Codempeje' => 10, 'Coduniste' => 11, 'Codpro' => 12, 'Numofe' => 13, 'Objcont' => 14, 'Sancio' => 15, 'Garant' => 16, 'Status' => 17, 'Docane1' => 18, 'Docane2' => 19, 'Docane3' => 20, 'Prepor' => 21, 'Preporcar' => 22, 'LisicactId' => 23, 'Fecdecla' => 24, 'Detdecmod' => 25, 'Anapor' => 26, 'Anaporcar' => 27, 'Tipconpub' => 28, 'Id' => 29, ),
		BasePeer::TYPE_COLNAME => array (LicontratPeer::NUMCONT => 0, LicontratPeer::RESOLU => 1, LicontratPeer::FECREL => 2, LicontratPeer::FECREG => 3, LicontratPeer::DIAS => 4, LicontratPeer::FECVEN => 5, LicontratPeer::NUMPTOCUECON => 6, LicontratPeer::NUMEXP => 7, LicontratPeer::CODEMPADM => 8, LicontratPeer::CODUNIADM => 9, LicontratPeer::CODEMPEJE => 10, LicontratPeer::CODUNISTE => 11, LicontratPeer::CODPRO => 12, LicontratPeer::NUMOFE => 13, LicontratPeer::OBJCONT => 14, LicontratPeer::SANCIO => 15, LicontratPeer::GARANT => 16, LicontratPeer::STATUS => 17, LicontratPeer::DOCANE1 => 18, LicontratPeer::DOCANE2 => 19, LicontratPeer::DOCANE3 => 20, LicontratPeer::PREPOR => 21, LicontratPeer::PREPORCAR => 22, LicontratPeer::LISICACT_ID => 23, LicontratPeer::FECDECLA => 24, LicontratPeer::DETDECMOD => 25, LicontratPeer::ANAPOR => 26, LicontratPeer::ANAPORCAR => 27, LicontratPeer::TIPCONPUB => 28, LicontratPeer::ID => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('numcont' => 0, 'resolu' => 1, 'fecrel' => 2, 'fecreg' => 3, 'dias' => 4, 'fecven' => 5, 'numptocuecon' => 6, 'numexp' => 7, 'codempadm' => 8, 'coduniadm' => 9, 'codempeje' => 10, 'coduniste' => 11, 'codpro' => 12, 'numofe' => 13, 'objcont' => 14, 'sancio' => 15, 'garant' => 16, 'status' => 17, 'docane1' => 18, 'docane2' => 19, 'docane3' => 20, 'prepor' => 21, 'preporcar' => 22, 'lisicact_id' => 23, 'fecdecla' => 24, 'detdecmod' => 25, 'anapor' => 26, 'anaporcar' => 27, 'tipconpub' => 28, 'id' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LicontratMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LicontratMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LicontratPeer::getTableMap();
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
		return str_replace(LicontratPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LicontratPeer::NUMCONT);

		$criteria->addSelectColumn(LicontratPeer::RESOLU);

		$criteria->addSelectColumn(LicontratPeer::FECREL);

		$criteria->addSelectColumn(LicontratPeer::FECREG);

		$criteria->addSelectColumn(LicontratPeer::DIAS);

		$criteria->addSelectColumn(LicontratPeer::FECVEN);

		$criteria->addSelectColumn(LicontratPeer::NUMPTOCUECON);

		$criteria->addSelectColumn(LicontratPeer::NUMEXP);

		$criteria->addSelectColumn(LicontratPeer::CODEMPADM);

		$criteria->addSelectColumn(LicontratPeer::CODUNIADM);

		$criteria->addSelectColumn(LicontratPeer::CODEMPEJE);

		$criteria->addSelectColumn(LicontratPeer::CODUNISTE);

		$criteria->addSelectColumn(LicontratPeer::CODPRO);

		$criteria->addSelectColumn(LicontratPeer::NUMOFE);

		$criteria->addSelectColumn(LicontratPeer::OBJCONT);

		$criteria->addSelectColumn(LicontratPeer::SANCIO);

		$criteria->addSelectColumn(LicontratPeer::GARANT);

		$criteria->addSelectColumn(LicontratPeer::STATUS);

		$criteria->addSelectColumn(LicontratPeer::DOCANE1);

		$criteria->addSelectColumn(LicontratPeer::DOCANE2);

		$criteria->addSelectColumn(LicontratPeer::DOCANE3);

		$criteria->addSelectColumn(LicontratPeer::PREPOR);

		$criteria->addSelectColumn(LicontratPeer::PREPORCAR);

		$criteria->addSelectColumn(LicontratPeer::LISICACT_ID);

		$criteria->addSelectColumn(LicontratPeer::FECDECLA);

		$criteria->addSelectColumn(LicontratPeer::DETDECMOD);

		$criteria->addSelectColumn(LicontratPeer::ANAPOR);

		$criteria->addSelectColumn(LicontratPeer::ANAPORCAR);

		$criteria->addSelectColumn(LicontratPeer::TIPCONPUB);

		$criteria->addSelectColumn(LicontratPeer::ID);

	}

	const COUNT = 'COUNT(licontrat.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT licontrat.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicontratPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicontratPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LicontratPeer::doSelectRS($criteria, $con);
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
		$objects = LicontratPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LicontratPeer::populateObjects(LicontratPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LicontratPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LicontratPeer::getOMClass();
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
			$criteria->addSelectColumn(LicontratPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicontratPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LicontratPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LicontratPeer::doSelectRS($criteria, $con);
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

		LicontratPeer::addSelectColumns($c);
		$startcol = (LicontratPeer::NUM_COLUMNS - LicontratPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LicontratPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicontratPeer::getOMClass();

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
										$temp_obj2->addLicontrat($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLicontrats();
				$obj2->addLicontrat($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LicontratPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LicontratPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LicontratPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LicontratPeer::doSelectRS($criteria, $con);
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

		LicontratPeer::addSelectColumns($c);
		$startcol2 = (LicontratPeer::NUM_COLUMNS - LicontratPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LicontratPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LicontratPeer::getOMClass();


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
						$temp_obj2->addLicontrat($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLicontrats();
					$obj2->addLicontrat($obj1);
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
		return LicontratPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LicontratPeer::ID); 

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
			$comparison = $criteria->getComparison(LicontratPeer::ID);
			$selectCriteria->add(LicontratPeer::ID, $criteria->remove(LicontratPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LicontratPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LicontratPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Licontrat) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LicontratPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Licontrat $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LicontratPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LicontratPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LicontratPeer::DATABASE_NAME, LicontratPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LicontratPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LicontratPeer::DATABASE_NAME);

		$criteria->add(LicontratPeer::ID, $pk);


		$v = LicontratPeer::doSelect($criteria, $con);

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
			$criteria->add(LicontratPeer::ID, $pks, Criteria::IN);
			$objs = LicontratPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLicontratPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LicontratMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LicontratMapBuilder');
}
