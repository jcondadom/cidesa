<?php


abstract class BaseLiplieesphisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liplieesphis';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liplieesphis';

	
	const NUM_COLUMNS = 40;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'liplieesphis.NUMPLIE';

	
	const NUMCOMINT = 'liplieesphis.NUMCOMINT';

	
	const NUMEXP = 'liplieesphis.NUMEXP';

	
	const CODEMPADM = 'liplieesphis.CODEMPADM';

	
	const CODUNIADM = 'liplieesphis.CODUNIADM';

	
	const CODEMPEJE = 'liplieesphis.CODEMPEJE';

	
	const CODUNISTE = 'liplieesphis.CODUNISTE';

	
	const FECREG = 'liplieesphis.FECREG';

	
	const DIAS = 'liplieesphis.DIAS';

	
	const FECVEN = 'liplieesphis.FECVEN';

	
	const IDIOMA = 'liplieesphis.IDIOMA';

	
	const COSPLIE = 'liplieesphis.COSPLIE';

	
	const RESOLU = 'liplieesphis.RESOLU';

	
	const FECREL = 'liplieesphis.FECREL';

	
	const DECRET = 'liplieesphis.DECRET';

	
	const FECDEC = 'liplieesphis.FECDEC';

	
	const DESCRIP = 'liplieesphis.DESCRIP';

	
	const DOCANE1 = 'liplieesphis.DOCANE1';

	
	const DOCANE2 = 'liplieesphis.DOCANE2';

	
	const DOCANE3 = 'liplieesphis.DOCANE3';

	
	const PREPOR = 'liplieesphis.PREPOR';

	
	const PREPORCAR = 'liplieesphis.PREPORCAR';

	
	const LISICACT_ID = 'liplieesphis.LISICACT_ID';

	
	const DETDECMOD = 'liplieesphis.DETDECMOD';

	
	const ANAPOR = 'liplieesphis.ANAPOR';

	
	const ANAPORCAR = 'liplieesphis.ANAPORCAR';

	
	const STATUS = 'liplieesphis.STATUS';

	
	const FECDECLA = 'liplieesphis.FECDECLA';

	
	const PORLEG = 'liplieesphis.PORLEG';

	
	const MINLEG = 'liplieesphis.MINLEG';

	
	const PORTEC = 'liplieesphis.PORTEC';

	
	const MINTEC = 'liplieesphis.MINTEC';

	
	const PORFIN = 'liplieesphis.PORFIN';

	
	const MINFIN = 'liplieesphis.MINFIN';

	
	const PORFIA = 'liplieesphis.PORFIA';

	
	const MINFIA = 'liplieesphis.MINFIA';

	
	const PORTIPEMP = 'liplieesphis.PORTIPEMP';

	
	const MINTIPEMP = 'liplieesphis.MINTIPEMP';

	
	const TIPCONPUB = 'liplieesphis.TIPCONPUB';

	
	const ID = 'liplieesphis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numcomint', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Idioma', 'Cosplie', 'Resolu', 'Fecrel', 'Decret', 'Fecdec', 'Descrip', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Detdecmod', 'Anapor', 'Anaporcar', 'Status', 'Fecdecla', 'Porleg', 'Minleg', 'Portec', 'Mintec', 'Porfin', 'Minfin', 'Porfia', 'Minfia', 'Portipemp', 'Mintipemp', 'Tipconpub', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiplieesphisPeer::NUMPLIE, LiplieesphisPeer::NUMCOMINT, LiplieesphisPeer::NUMEXP, LiplieesphisPeer::CODEMPADM, LiplieesphisPeer::CODUNIADM, LiplieesphisPeer::CODEMPEJE, LiplieesphisPeer::CODUNISTE, LiplieesphisPeer::FECREG, LiplieesphisPeer::DIAS, LiplieesphisPeer::FECVEN, LiplieesphisPeer::IDIOMA, LiplieesphisPeer::COSPLIE, LiplieesphisPeer::RESOLU, LiplieesphisPeer::FECREL, LiplieesphisPeer::DECRET, LiplieesphisPeer::FECDEC, LiplieesphisPeer::DESCRIP, LiplieesphisPeer::DOCANE1, LiplieesphisPeer::DOCANE2, LiplieesphisPeer::DOCANE3, LiplieesphisPeer::PREPOR, LiplieesphisPeer::PREPORCAR, LiplieesphisPeer::LISICACT_ID, LiplieesphisPeer::DETDECMOD, LiplieesphisPeer::ANAPOR, LiplieesphisPeer::ANAPORCAR, LiplieesphisPeer::STATUS, LiplieesphisPeer::FECDECLA, LiplieesphisPeer::PORLEG, LiplieesphisPeer::MINLEG, LiplieesphisPeer::PORTEC, LiplieesphisPeer::MINTEC, LiplieesphisPeer::PORFIN, LiplieesphisPeer::MINFIN, LiplieesphisPeer::PORFIA, LiplieesphisPeer::MINFIA, LiplieesphisPeer::PORTIPEMP, LiplieesphisPeer::MINTIPEMP, LiplieesphisPeer::TIPCONPUB, LiplieesphisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numcomint', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'idioma', 'cosplie', 'resolu', 'fecrel', 'decret', 'fecdec', 'descrip', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'detdecmod', 'anapor', 'anaporcar', 'status', 'fecdecla', 'porleg', 'minleg', 'portec', 'mintec', 'porfin', 'minfin', 'porfia', 'minfia', 'portipemp', 'mintipemp', 'tipconpub', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numcomint' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Idioma' => 10, 'Cosplie' => 11, 'Resolu' => 12, 'Fecrel' => 13, 'Decret' => 14, 'Fecdec' => 15, 'Descrip' => 16, 'Docane1' => 17, 'Docane2' => 18, 'Docane3' => 19, 'Prepor' => 20, 'Preporcar' => 21, 'LisicactId' => 22, 'Detdecmod' => 23, 'Anapor' => 24, 'Anaporcar' => 25, 'Status' => 26, 'Fecdecla' => 27, 'Porleg' => 28, 'Minleg' => 29, 'Portec' => 30, 'Mintec' => 31, 'Porfin' => 32, 'Minfin' => 33, 'Porfia' => 34, 'Minfia' => 35, 'Portipemp' => 36, 'Mintipemp' => 37, 'Tipconpub' => 38, 'Id' => 39, ),
		BasePeer::TYPE_COLNAME => array (LiplieesphisPeer::NUMPLIE => 0, LiplieesphisPeer::NUMCOMINT => 1, LiplieesphisPeer::NUMEXP => 2, LiplieesphisPeer::CODEMPADM => 3, LiplieesphisPeer::CODUNIADM => 4, LiplieesphisPeer::CODEMPEJE => 5, LiplieesphisPeer::CODUNISTE => 6, LiplieesphisPeer::FECREG => 7, LiplieesphisPeer::DIAS => 8, LiplieesphisPeer::FECVEN => 9, LiplieesphisPeer::IDIOMA => 10, LiplieesphisPeer::COSPLIE => 11, LiplieesphisPeer::RESOLU => 12, LiplieesphisPeer::FECREL => 13, LiplieesphisPeer::DECRET => 14, LiplieesphisPeer::FECDEC => 15, LiplieesphisPeer::DESCRIP => 16, LiplieesphisPeer::DOCANE1 => 17, LiplieesphisPeer::DOCANE2 => 18, LiplieesphisPeer::DOCANE3 => 19, LiplieesphisPeer::PREPOR => 20, LiplieesphisPeer::PREPORCAR => 21, LiplieesphisPeer::LISICACT_ID => 22, LiplieesphisPeer::DETDECMOD => 23, LiplieesphisPeer::ANAPOR => 24, LiplieesphisPeer::ANAPORCAR => 25, LiplieesphisPeer::STATUS => 26, LiplieesphisPeer::FECDECLA => 27, LiplieesphisPeer::PORLEG => 28, LiplieesphisPeer::MINLEG => 29, LiplieesphisPeer::PORTEC => 30, LiplieesphisPeer::MINTEC => 31, LiplieesphisPeer::PORFIN => 32, LiplieesphisPeer::MINFIN => 33, LiplieesphisPeer::PORFIA => 34, LiplieesphisPeer::MINFIA => 35, LiplieesphisPeer::PORTIPEMP => 36, LiplieesphisPeer::MINTIPEMP => 37, LiplieesphisPeer::TIPCONPUB => 38, LiplieesphisPeer::ID => 39, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numcomint' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'idioma' => 10, 'cosplie' => 11, 'resolu' => 12, 'fecrel' => 13, 'decret' => 14, 'fecdec' => 15, 'descrip' => 16, 'docane1' => 17, 'docane2' => 18, 'docane3' => 19, 'prepor' => 20, 'preporcar' => 21, 'lisicact_id' => 22, 'detdecmod' => 23, 'anapor' => 24, 'anaporcar' => 25, 'status' => 26, 'fecdecla' => 27, 'porleg' => 28, 'minleg' => 29, 'portec' => 30, 'mintec' => 31, 'porfin' => 32, 'minfin' => 33, 'porfia' => 34, 'minfia' => 35, 'portipemp' => 36, 'mintipemp' => 37, 'tipconpub' => 38, 'id' => 39, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiplieesphisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiplieesphisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiplieesphisPeer::getTableMap();
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
		return str_replace(LiplieesphisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiplieesphisPeer::NUMPLIE);

		$criteria->addSelectColumn(LiplieesphisPeer::NUMCOMINT);

		$criteria->addSelectColumn(LiplieesphisPeer::NUMEXP);

		$criteria->addSelectColumn(LiplieesphisPeer::CODEMPADM);

		$criteria->addSelectColumn(LiplieesphisPeer::CODUNIADM);

		$criteria->addSelectColumn(LiplieesphisPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiplieesphisPeer::CODUNISTE);

		$criteria->addSelectColumn(LiplieesphisPeer::FECREG);

		$criteria->addSelectColumn(LiplieesphisPeer::DIAS);

		$criteria->addSelectColumn(LiplieesphisPeer::FECVEN);

		$criteria->addSelectColumn(LiplieesphisPeer::IDIOMA);

		$criteria->addSelectColumn(LiplieesphisPeer::COSPLIE);

		$criteria->addSelectColumn(LiplieesphisPeer::RESOLU);

		$criteria->addSelectColumn(LiplieesphisPeer::FECREL);

		$criteria->addSelectColumn(LiplieesphisPeer::DECRET);

		$criteria->addSelectColumn(LiplieesphisPeer::FECDEC);

		$criteria->addSelectColumn(LiplieesphisPeer::DESCRIP);

		$criteria->addSelectColumn(LiplieesphisPeer::DOCANE1);

		$criteria->addSelectColumn(LiplieesphisPeer::DOCANE2);

		$criteria->addSelectColumn(LiplieesphisPeer::DOCANE3);

		$criteria->addSelectColumn(LiplieesphisPeer::PREPOR);

		$criteria->addSelectColumn(LiplieesphisPeer::PREPORCAR);

		$criteria->addSelectColumn(LiplieesphisPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiplieesphisPeer::DETDECMOD);

		$criteria->addSelectColumn(LiplieesphisPeer::ANAPOR);

		$criteria->addSelectColumn(LiplieesphisPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiplieesphisPeer::STATUS);

		$criteria->addSelectColumn(LiplieesphisPeer::FECDECLA);

		$criteria->addSelectColumn(LiplieesphisPeer::PORLEG);

		$criteria->addSelectColumn(LiplieesphisPeer::MINLEG);

		$criteria->addSelectColumn(LiplieesphisPeer::PORTEC);

		$criteria->addSelectColumn(LiplieesphisPeer::MINTEC);

		$criteria->addSelectColumn(LiplieesphisPeer::PORFIN);

		$criteria->addSelectColumn(LiplieesphisPeer::MINFIN);

		$criteria->addSelectColumn(LiplieesphisPeer::PORFIA);

		$criteria->addSelectColumn(LiplieesphisPeer::MINFIA);

		$criteria->addSelectColumn(LiplieesphisPeer::PORTIPEMP);

		$criteria->addSelectColumn(LiplieesphisPeer::MINTIPEMP);

		$criteria->addSelectColumn(LiplieesphisPeer::TIPCONPUB);

		$criteria->addSelectColumn(LiplieesphisPeer::ID);

	}

	const COUNT = 'COUNT(liplieesphis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liplieesphis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiplieesphisPeer::doSelectRS($criteria, $con);
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
		$objects = LiplieesphisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiplieesphisPeer::populateObjects(LiplieesphisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiplieesphisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiplieesphisPeer::getOMClass();
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
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiplieesphisPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiplieesphisPeer::doSelectRS($criteria, $con);
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

		LiplieesphisPeer::addSelectColumns($c);
		$startcol = (LiplieesphisPeer::NUM_COLUMNS - LiplieesphisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiplieesphisPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiplieesphisPeer::getOMClass();

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
										$temp_obj2->addLiplieesphis($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiplieesphiss();
				$obj2->addLiplieesphis($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieesphisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiplieesphisPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiplieesphisPeer::doSelectRS($criteria, $con);
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

		LiplieesphisPeer::addSelectColumns($c);
		$startcol2 = (LiplieesphisPeer::NUM_COLUMNS - LiplieesphisPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiplieesphisPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiplieesphisPeer::getOMClass();


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
						$temp_obj2->addLiplieesphis($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiplieesphiss();
					$obj2->addLiplieesphis($obj1);
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
		return LiplieesphisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiplieesphisPeer::ID); 

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
			$comparison = $criteria->getComparison(LiplieesphisPeer::ID);
			$selectCriteria->add(LiplieesphisPeer::ID, $criteria->remove(LiplieesphisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiplieesphisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiplieesphisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liplieesphis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiplieesphisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liplieesphis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiplieesphisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiplieesphisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiplieesphisPeer::DATABASE_NAME, LiplieesphisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiplieesphisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiplieesphisPeer::DATABASE_NAME);

		$criteria->add(LiplieesphisPeer::ID, $pk);


		$v = LiplieesphisPeer::doSelect($criteria, $con);

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
			$criteria->add(LiplieesphisPeer::ID, $pks, Criteria::IN);
			$objs = LiplieesphisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiplieesphisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiplieesphisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiplieesphisMapBuilder');
}
