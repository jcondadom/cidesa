<?php


abstract class BaseLivaluacionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'livaluaciones';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Livaluaciones';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMVAL = 'livaluaciones.NUMVAL';

	
	const FECDES = 'livaluaciones.FECDES';

	
	const FECHAS = 'livaluaciones.FECHAS';

	
	const NUMCONT = 'livaluaciones.NUMCONT';

	
	const CODEMPADM = 'livaluaciones.CODEMPADM';

	
	const CODUNIADM = 'livaluaciones.CODUNIADM';

	
	const CODEMPEJE = 'livaluaciones.CODEMPEJE';

	
	const CODUNISTE = 'livaluaciones.CODUNISTE';

	
	const FECREG = 'livaluaciones.FECREG';

	
	const DIAS = 'livaluaciones.DIAS';

	
	const FECVEN = 'livaluaciones.FECVEN';

	
	const STATUS = 'livaluaciones.STATUS';

	
	const DOCANE1 = 'livaluaciones.DOCANE1';

	
	const DOCANE2 = 'livaluaciones.DOCANE2';

	
	const DOCANE3 = 'livaluaciones.DOCANE3';

	
	const PREPOR = 'livaluaciones.PREPOR';

	
	const PREPORCAR = 'livaluaciones.PREPORCAR';

	
	const LISICACT_ID = 'livaluaciones.LISICACT_ID';

	
	const FECDECLA = 'livaluaciones.FECDECLA';

	
	const DETDECMOD = 'livaluaciones.DETDECMOD';

	
	const ANAPOR = 'livaluaciones.ANAPOR';

	
	const ANAPORCAR = 'livaluaciones.ANAPORCAR';

	
	const ID = 'livaluaciones.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numval', 'Fecdes', 'Fechas', 'Numcont', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LivaluacionesPeer::NUMVAL, LivaluacionesPeer::FECDES, LivaluacionesPeer::FECHAS, LivaluacionesPeer::NUMCONT, LivaluacionesPeer::CODEMPADM, LivaluacionesPeer::CODUNIADM, LivaluacionesPeer::CODEMPEJE, LivaluacionesPeer::CODUNISTE, LivaluacionesPeer::FECREG, LivaluacionesPeer::DIAS, LivaluacionesPeer::FECVEN, LivaluacionesPeer::STATUS, LivaluacionesPeer::DOCANE1, LivaluacionesPeer::DOCANE2, LivaluacionesPeer::DOCANE3, LivaluacionesPeer::PREPOR, LivaluacionesPeer::PREPORCAR, LivaluacionesPeer::LISICACT_ID, LivaluacionesPeer::FECDECLA, LivaluacionesPeer::DETDECMOD, LivaluacionesPeer::ANAPOR, LivaluacionesPeer::ANAPORCAR, LivaluacionesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numval', 'fecdes', 'fechas', 'numcont', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numval' => 0, 'Fecdes' => 1, 'Fechas' => 2, 'Numcont' => 3, 'Codempadm' => 4, 'Coduniadm' => 5, 'Codempeje' => 6, 'Coduniste' => 7, 'Fecreg' => 8, 'Dias' => 9, 'Fecven' => 10, 'Status' => 11, 'Docane1' => 12, 'Docane2' => 13, 'Docane3' => 14, 'Prepor' => 15, 'Preporcar' => 16, 'LisicactId' => 17, 'Fecdecla' => 18, 'Detdecmod' => 19, 'Anapor' => 20, 'Anaporcar' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (LivaluacionesPeer::NUMVAL => 0, LivaluacionesPeer::FECDES => 1, LivaluacionesPeer::FECHAS => 2, LivaluacionesPeer::NUMCONT => 3, LivaluacionesPeer::CODEMPADM => 4, LivaluacionesPeer::CODUNIADM => 5, LivaluacionesPeer::CODEMPEJE => 6, LivaluacionesPeer::CODUNISTE => 7, LivaluacionesPeer::FECREG => 8, LivaluacionesPeer::DIAS => 9, LivaluacionesPeer::FECVEN => 10, LivaluacionesPeer::STATUS => 11, LivaluacionesPeer::DOCANE1 => 12, LivaluacionesPeer::DOCANE2 => 13, LivaluacionesPeer::DOCANE3 => 14, LivaluacionesPeer::PREPOR => 15, LivaluacionesPeer::PREPORCAR => 16, LivaluacionesPeer::LISICACT_ID => 17, LivaluacionesPeer::FECDECLA => 18, LivaluacionesPeer::DETDECMOD => 19, LivaluacionesPeer::ANAPOR => 20, LivaluacionesPeer::ANAPORCAR => 21, LivaluacionesPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numval' => 0, 'fecdes' => 1, 'fechas' => 2, 'numcont' => 3, 'codempadm' => 4, 'coduniadm' => 5, 'codempeje' => 6, 'coduniste' => 7, 'fecreg' => 8, 'dias' => 9, 'fecven' => 10, 'status' => 11, 'docane1' => 12, 'docane2' => 13, 'docane3' => 14, 'prepor' => 15, 'preporcar' => 16, 'lisicact_id' => 17, 'fecdecla' => 18, 'detdecmod' => 19, 'anapor' => 20, 'anaporcar' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LivaluacionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LivaluacionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LivaluacionesPeer::getTableMap();
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
		return str_replace(LivaluacionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LivaluacionesPeer::NUMVAL);

		$criteria->addSelectColumn(LivaluacionesPeer::FECDES);

		$criteria->addSelectColumn(LivaluacionesPeer::FECHAS);

		$criteria->addSelectColumn(LivaluacionesPeer::NUMCONT);

		$criteria->addSelectColumn(LivaluacionesPeer::CODEMPADM);

		$criteria->addSelectColumn(LivaluacionesPeer::CODUNIADM);

		$criteria->addSelectColumn(LivaluacionesPeer::CODEMPEJE);

		$criteria->addSelectColumn(LivaluacionesPeer::CODUNISTE);

		$criteria->addSelectColumn(LivaluacionesPeer::FECREG);

		$criteria->addSelectColumn(LivaluacionesPeer::DIAS);

		$criteria->addSelectColumn(LivaluacionesPeer::FECVEN);

		$criteria->addSelectColumn(LivaluacionesPeer::STATUS);

		$criteria->addSelectColumn(LivaluacionesPeer::DOCANE1);

		$criteria->addSelectColumn(LivaluacionesPeer::DOCANE2);

		$criteria->addSelectColumn(LivaluacionesPeer::DOCANE3);

		$criteria->addSelectColumn(LivaluacionesPeer::PREPOR);

		$criteria->addSelectColumn(LivaluacionesPeer::PREPORCAR);

		$criteria->addSelectColumn(LivaluacionesPeer::LISICACT_ID);

		$criteria->addSelectColumn(LivaluacionesPeer::FECDECLA);

		$criteria->addSelectColumn(LivaluacionesPeer::DETDECMOD);

		$criteria->addSelectColumn(LivaluacionesPeer::ANAPOR);

		$criteria->addSelectColumn(LivaluacionesPeer::ANAPORCAR);

		$criteria->addSelectColumn(LivaluacionesPeer::ID);

	}

	const COUNT = 'COUNT(livaluaciones.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT livaluaciones.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
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
		$objects = LivaluacionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LivaluacionesPeer::populateObjects(LivaluacionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LivaluacionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LivaluacionesPeer::getOMClass();
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
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLidatstedetRelatedByCodempadm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLidatstedetRelatedByCodempeje(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
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

		LivaluacionesPeer::addSelectColumns($c);
		$startcol = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

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
										$temp_obj2->addLivaluaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLivaluacioness();
				$obj2->addLivaluaciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLidatstedetRelatedByCodempadm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidatstedetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLivaluacionesRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLivaluacionessRelatedByCodempadm();
				$obj2->addLivaluacionesRelatedByCodempadm($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLidatstedetRelatedByCodempeje(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LidatstedetPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLivaluacionesRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLivaluacionessRelatedByCodempeje();
				$obj2->addLivaluacionesRelatedByCodempeje($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

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
										$temp_obj2->addLivaluaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLivaluacioness();
				$obj2->addLivaluaciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
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

		LivaluacionesPeer::addSelectColumns($c);
		$startcol2 = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();


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
						$temp_obj2->addLivaluaciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLivaluacioness();
					$obj2->addLivaluaciones($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLivaluacionesRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLivaluacionessRelatedByCodempadm();
					$obj3->addLivaluacionesRelatedByCodempadm($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLivaluacionesRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLivaluacionessRelatedByCodempeje();
					$obj4->addLivaluacionesRelatedByCodempeje($obj1);
				}
	

							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLisicact(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLivaluaciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLivaluacioness();
					$obj5->addLivaluaciones($obj1);
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
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLidatstedetRelatedByCodempadm(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLidatstedetRelatedByCodempeje(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLisicact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LivaluacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LivaluacionesPeer::doSelectRS($criteria, $con);
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

		LivaluacionesPeer::addSelectColumns($c);
		$startcol2 = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LidatstedetPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLivaluacionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLivaluacionessRelatedByCodempadm();
					$obj2->addLivaluacionesRelatedByCodempadm($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLivaluacionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLivaluacionessRelatedByCodempeje();
					$obj3->addLivaluacionesRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLisicact(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLivaluacioness();
					$obj4->addLivaluaciones($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLidatstedetRelatedByCodempadm(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol2 = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

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
						$temp_obj2->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLivaluacioness();
					$obj2->addLivaluaciones($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLisicact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLivaluacioness();
					$obj3->addLivaluaciones($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLidatstedetRelatedByCodempeje(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol2 = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LivaluacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

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
						$temp_obj2->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLivaluacioness();
					$obj2->addLivaluaciones($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLisicact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLivaluacioness();
					$obj3->addLivaluaciones($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LivaluacionesPeer::addSelectColumns($c);
		$startcol2 = (LivaluacionesPeer::NUM_COLUMNS - LivaluacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LivaluacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LivaluacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LivaluacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LivaluacionesPeer::getOMClass();

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
						$temp_obj2->addLivaluaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLivaluacioness();
					$obj2->addLivaluaciones($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLivaluacionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLivaluacionessRelatedByCodempadm();
					$obj3->addLivaluacionesRelatedByCodempadm($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLivaluacionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLivaluacionessRelatedByCodempeje();
					$obj4->addLivaluacionesRelatedByCodempeje($obj1);
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
		return LivaluacionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LivaluacionesPeer::ID); 

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
			$comparison = $criteria->getComparison(LivaluacionesPeer::ID);
			$selectCriteria->add(LivaluacionesPeer::ID, $criteria->remove(LivaluacionesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LivaluacionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LivaluacionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Livaluaciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LivaluacionesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Livaluaciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LivaluacionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LivaluacionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LivaluacionesPeer::DATABASE_NAME, LivaluacionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LivaluacionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LivaluacionesPeer::DATABASE_NAME);

		$criteria->add(LivaluacionesPeer::ID, $pk);


		$v = LivaluacionesPeer::doSelect($criteria, $con);

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
			$criteria->add(LivaluacionesPeer::ID, $pks, Criteria::IN);
			$objs = LivaluacionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLivaluacionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LivaluacionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LivaluacionesMapBuilder');
}
