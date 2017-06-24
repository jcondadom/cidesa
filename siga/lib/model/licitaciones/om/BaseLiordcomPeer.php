<?php


abstract class BaseLiordcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liordcom';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liordcom';

	
	const NUM_COLUMNS = 43;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'liordcom.NUMORD';

	
	const RESOLU = 'liordcom.RESOLU';

	
	const FECREL = 'liordcom.FECREL';

	
	const FECREG = 'liordcom.FECREG';

	
	const DIAS = 'liordcom.DIAS';

	
	const FECVEN = 'liordcom.FECVEN';

	
	const NUMPTOCUECON = 'liordcom.NUMPTOCUECON';

	
	const NUMEXP = 'liordcom.NUMEXP';

	
	const CODEMPADM = 'liordcom.CODEMPADM';

	
	const CODUNIADM = 'liordcom.CODUNIADM';

	
	const CODEMPEJE = 'liordcom.CODEMPEJE';

	
	const CODUNISTE = 'liordcom.CODUNISTE';

	
	const CODPRO = 'liordcom.CODPRO';

	
	const NUMOFE = 'liordcom.NUMOFE';

	
	const OBJCONT = 'liordcom.OBJCONT';

	
	const TIPDESC = 'liordcom.TIPDESC';

	
	const CONPAG = 'liordcom.CONPAG';

	
	const SANCIO = 'liordcom.SANCIO';

	
	const GARANT = 'liordcom.GARANT';

	
	const STATUS = 'liordcom.STATUS';

	
	const DOCANE1 = 'liordcom.DOCANE1';

	
	const DOCANE2 = 'liordcom.DOCANE2';

	
	const DOCANE3 = 'liordcom.DOCANE3';

	
	const PREPOR = 'liordcom.PREPOR';

	
	const PREPORCAR = 'liordcom.PREPORCAR';

	
	const LISICACT_ID = 'liordcom.LISICACT_ID';

	
	const FECDECLA = 'liordcom.FECDECLA';

	
	const DETDECMOD = 'liordcom.DETDECMOD';

	
	const ANAPOR = 'liordcom.ANAPOR';

	
	const ANAPORCAR = 'liordcom.ANAPORCAR';

	
	const CODMEDCOM = 'liordcom.CODMEDCOM';

	
	const CODPROCOM = 'liordcom.CODPROCOM';

	
	const NUMPRO = 'liordcom.NUMPRO';

	
	const CODPAI = 'liordcom.CODPAI';

	
	const CODEST = 'liordcom.CODEST';

	
	const CODMUN = 'liordcom.CODMUN';

	
	const DE4000 = 'liordcom.DE4000';

	
	const DE3798 = 'liordcom.DE3798';

	
	const NUMSIG = 'liordcom.NUMSIG';

	
	const FECSIG = 'liordcom.FECSIG';

	
	const EXPDIE = 'liordcom.EXPDIE';

	
	const MONPRO = 'liordcom.MONPRO';

	
	const ID = 'liordcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Resolu', 'Fecrel', 'Fecreg', 'Dias', 'Fecven', 'Numptocuecon', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Codpro', 'Numofe', 'Objcont', 'Tipdesc', 'Conpag', 'Sancio', 'Garant', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Codmedcom', 'Codprocom', 'Numpro', 'Codpai', 'Codest', 'Codmun', 'De4000', 'De3798', 'Numsig', 'Fecsig', 'Expdie', 'Monpro', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiordcomPeer::NUMORD, LiordcomPeer::RESOLU, LiordcomPeer::FECREL, LiordcomPeer::FECREG, LiordcomPeer::DIAS, LiordcomPeer::FECVEN, LiordcomPeer::NUMPTOCUECON, LiordcomPeer::NUMEXP, LiordcomPeer::CODEMPADM, LiordcomPeer::CODUNIADM, LiordcomPeer::CODEMPEJE, LiordcomPeer::CODUNISTE, LiordcomPeer::CODPRO, LiordcomPeer::NUMOFE, LiordcomPeer::OBJCONT, LiordcomPeer::TIPDESC, LiordcomPeer::CONPAG, LiordcomPeer::SANCIO, LiordcomPeer::GARANT, LiordcomPeer::STATUS, LiordcomPeer::DOCANE1, LiordcomPeer::DOCANE2, LiordcomPeer::DOCANE3, LiordcomPeer::PREPOR, LiordcomPeer::PREPORCAR, LiordcomPeer::LISICACT_ID, LiordcomPeer::FECDECLA, LiordcomPeer::DETDECMOD, LiordcomPeer::ANAPOR, LiordcomPeer::ANAPORCAR, LiordcomPeer::CODMEDCOM, LiordcomPeer::CODPROCOM, LiordcomPeer::NUMPRO, LiordcomPeer::CODPAI, LiordcomPeer::CODEST, LiordcomPeer::CODMUN, LiordcomPeer::DE4000, LiordcomPeer::DE3798, LiordcomPeer::NUMSIG, LiordcomPeer::FECSIG, LiordcomPeer::EXPDIE, LiordcomPeer::MONPRO, LiordcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'resolu', 'fecrel', 'fecreg', 'dias', 'fecven', 'numptocuecon', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'codpro', 'numofe', 'objcont', 'tipdesc', 'conpag', 'sancio', 'garant', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'codmedcom', 'codprocom', 'numpro', 'codpai', 'codest', 'codmun', 'de4000', 'de3798', 'numsig', 'fecsig', 'expdie', 'monpro', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Resolu' => 1, 'Fecrel' => 2, 'Fecreg' => 3, 'Dias' => 4, 'Fecven' => 5, 'Numptocuecon' => 6, 'Numexp' => 7, 'Codempadm' => 8, 'Coduniadm' => 9, 'Codempeje' => 10, 'Coduniste' => 11, 'Codpro' => 12, 'Numofe' => 13, 'Objcont' => 14, 'Tipdesc' => 15, 'Conpag' => 16, 'Sancio' => 17, 'Garant' => 18, 'Status' => 19, 'Docane1' => 20, 'Docane2' => 21, 'Docane3' => 22, 'Prepor' => 23, 'Preporcar' => 24, 'LisicactId' => 25, 'Fecdecla' => 26, 'Detdecmod' => 27, 'Anapor' => 28, 'Anaporcar' => 29, 'Codmedcom' => 30, 'Codprocom' => 31, 'Numpro' => 32, 'Codpai' => 33, 'Codest' => 34, 'Codmun' => 35, 'De4000' => 36, 'De3798' => 37, 'Numsig' => 38, 'Fecsig' => 39, 'Expdie' => 40, 'Monpro' => 41, 'Id' => 42, ),
		BasePeer::TYPE_COLNAME => array (LiordcomPeer::NUMORD => 0, LiordcomPeer::RESOLU => 1, LiordcomPeer::FECREL => 2, LiordcomPeer::FECREG => 3, LiordcomPeer::DIAS => 4, LiordcomPeer::FECVEN => 5, LiordcomPeer::NUMPTOCUECON => 6, LiordcomPeer::NUMEXP => 7, LiordcomPeer::CODEMPADM => 8, LiordcomPeer::CODUNIADM => 9, LiordcomPeer::CODEMPEJE => 10, LiordcomPeer::CODUNISTE => 11, LiordcomPeer::CODPRO => 12, LiordcomPeer::NUMOFE => 13, LiordcomPeer::OBJCONT => 14, LiordcomPeer::TIPDESC => 15, LiordcomPeer::CONPAG => 16, LiordcomPeer::SANCIO => 17, LiordcomPeer::GARANT => 18, LiordcomPeer::STATUS => 19, LiordcomPeer::DOCANE1 => 20, LiordcomPeer::DOCANE2 => 21, LiordcomPeer::DOCANE3 => 22, LiordcomPeer::PREPOR => 23, LiordcomPeer::PREPORCAR => 24, LiordcomPeer::LISICACT_ID => 25, LiordcomPeer::FECDECLA => 26, LiordcomPeer::DETDECMOD => 27, LiordcomPeer::ANAPOR => 28, LiordcomPeer::ANAPORCAR => 29, LiordcomPeer::CODMEDCOM => 30, LiordcomPeer::CODPROCOM => 31, LiordcomPeer::NUMPRO => 32, LiordcomPeer::CODPAI => 33, LiordcomPeer::CODEST => 34, LiordcomPeer::CODMUN => 35, LiordcomPeer::DE4000 => 36, LiordcomPeer::DE3798 => 37, LiordcomPeer::NUMSIG => 38, LiordcomPeer::FECSIG => 39, LiordcomPeer::EXPDIE => 40, LiordcomPeer::MONPRO => 41, LiordcomPeer::ID => 42, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'resolu' => 1, 'fecrel' => 2, 'fecreg' => 3, 'dias' => 4, 'fecven' => 5, 'numptocuecon' => 6, 'numexp' => 7, 'codempadm' => 8, 'coduniadm' => 9, 'codempeje' => 10, 'coduniste' => 11, 'codpro' => 12, 'numofe' => 13, 'objcont' => 14, 'tipdesc' => 15, 'conpag' => 16, 'sancio' => 17, 'garant' => 18, 'status' => 19, 'docane1' => 20, 'docane2' => 21, 'docane3' => 22, 'prepor' => 23, 'preporcar' => 24, 'lisicact_id' => 25, 'fecdecla' => 26, 'detdecmod' => 27, 'anapor' => 28, 'anaporcar' => 29, 'codmedcom' => 30, 'codprocom' => 31, 'numpro' => 32, 'codpai' => 33, 'codest' => 34, 'codmun' => 35, 'de4000' => 36, 'de3798' => 37, 'numsig' => 38, 'fecsig' => 39, 'expdie' => 40, 'monpro' => 41, 'id' => 42, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiordcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiordcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiordcomPeer::getTableMap();
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
		return str_replace(LiordcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiordcomPeer::NUMORD);

		$criteria->addSelectColumn(LiordcomPeer::RESOLU);

		$criteria->addSelectColumn(LiordcomPeer::FECREL);

		$criteria->addSelectColumn(LiordcomPeer::FECREG);

		$criteria->addSelectColumn(LiordcomPeer::DIAS);

		$criteria->addSelectColumn(LiordcomPeer::FECVEN);

		$criteria->addSelectColumn(LiordcomPeer::NUMPTOCUECON);

		$criteria->addSelectColumn(LiordcomPeer::NUMEXP);

		$criteria->addSelectColumn(LiordcomPeer::CODEMPADM);

		$criteria->addSelectColumn(LiordcomPeer::CODUNIADM);

		$criteria->addSelectColumn(LiordcomPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiordcomPeer::CODUNISTE);

		$criteria->addSelectColumn(LiordcomPeer::CODPRO);

		$criteria->addSelectColumn(LiordcomPeer::NUMOFE);

		$criteria->addSelectColumn(LiordcomPeer::OBJCONT);

		$criteria->addSelectColumn(LiordcomPeer::TIPDESC);

		$criteria->addSelectColumn(LiordcomPeer::CONPAG);

		$criteria->addSelectColumn(LiordcomPeer::SANCIO);

		$criteria->addSelectColumn(LiordcomPeer::GARANT);

		$criteria->addSelectColumn(LiordcomPeer::STATUS);

		$criteria->addSelectColumn(LiordcomPeer::DOCANE1);

		$criteria->addSelectColumn(LiordcomPeer::DOCANE2);

		$criteria->addSelectColumn(LiordcomPeer::DOCANE3);

		$criteria->addSelectColumn(LiordcomPeer::PREPOR);

		$criteria->addSelectColumn(LiordcomPeer::PREPORCAR);

		$criteria->addSelectColumn(LiordcomPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiordcomPeer::FECDECLA);

		$criteria->addSelectColumn(LiordcomPeer::DETDECMOD);

		$criteria->addSelectColumn(LiordcomPeer::ANAPOR);

		$criteria->addSelectColumn(LiordcomPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiordcomPeer::CODMEDCOM);

		$criteria->addSelectColumn(LiordcomPeer::CODPROCOM);

		$criteria->addSelectColumn(LiordcomPeer::NUMPRO);

		$criteria->addSelectColumn(LiordcomPeer::CODPAI);

		$criteria->addSelectColumn(LiordcomPeer::CODEST);

		$criteria->addSelectColumn(LiordcomPeer::CODMUN);

		$criteria->addSelectColumn(LiordcomPeer::DE4000);

		$criteria->addSelectColumn(LiordcomPeer::DE3798);

		$criteria->addSelectColumn(LiordcomPeer::NUMSIG);

		$criteria->addSelectColumn(LiordcomPeer::FECSIG);

		$criteria->addSelectColumn(LiordcomPeer::EXPDIE);

		$criteria->addSelectColumn(LiordcomPeer::MONPRO);

		$criteria->addSelectColumn(LiordcomPeer::ID);

	}

	const COUNT = 'COUNT(liordcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liordcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiordcomPeer::doSelectRS($criteria, $con);
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
		$objects = LiordcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiordcomPeer::populateObjects(LiordcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiordcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiordcomPeer::getOMClass();
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
			$criteria->addSelectColumn(LiordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiordcomPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiordcomPeer::doSelectRS($criteria, $con);
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

		LiordcomPeer::addSelectColumns($c);
		$startcol = (LiordcomPeer::NUM_COLUMNS - LiordcomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiordcomPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiordcomPeer::getOMClass();

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
										$temp_obj2->addLiordcom($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiordcoms();
				$obj2->addLiordcom($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiordcomPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiordcomPeer::doSelectRS($criteria, $con);
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

		LiordcomPeer::addSelectColumns($c);
		$startcol2 = (LiordcomPeer::NUM_COLUMNS - LiordcomPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiordcomPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiordcomPeer::getOMClass();


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
						$temp_obj2->addLiordcom($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiordcoms();
					$obj2->addLiordcom($obj1);
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
		return LiordcomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiordcomPeer::ID); 

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
			$comparison = $criteria->getComparison(LiordcomPeer::ID);
			$selectCriteria->add(LiordcomPeer::ID, $criteria->remove(LiordcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiordcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiordcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liordcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiordcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liordcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiordcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiordcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiordcomPeer::DATABASE_NAME, LiordcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiordcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiordcomPeer::DATABASE_NAME);

		$criteria->add(LiordcomPeer::ID, $pk);


		$v = LiordcomPeer::doSelect($criteria, $con);

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
			$criteria->add(LiordcomPeer::ID, $pks, Criteria::IN);
			$objs = LiordcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiordcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiordcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiordcomMapBuilder');
}
