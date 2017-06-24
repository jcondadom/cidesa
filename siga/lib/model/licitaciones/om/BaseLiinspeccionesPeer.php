<?php


abstract class BaseLiinspeccionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liinspecciones';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liinspecciones';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMINS = 'liinspecciones.NUMINS';

	
	const FECDES = 'liinspecciones.FECDES';

	
	const FECHAS = 'liinspecciones.FECHAS';

	
	const NUMVAL = 'liinspecciones.NUMVAL';

	
	const DETINS = 'liinspecciones.DETINS';

	
	const CODEMPADM = 'liinspecciones.CODEMPADM';

	
	const CODUNIADM = 'liinspecciones.CODUNIADM';

	
	const CODEMPEJE = 'liinspecciones.CODEMPEJE';

	
	const CODUNISTE = 'liinspecciones.CODUNISTE';

	
	const FECREG = 'liinspecciones.FECREG';

	
	const DIAS = 'liinspecciones.DIAS';

	
	const FECVEN = 'liinspecciones.FECVEN';

	
	const STATUS = 'liinspecciones.STATUS';

	
	const DOCANE1 = 'liinspecciones.DOCANE1';

	
	const DOCANE2 = 'liinspecciones.DOCANE2';

	
	const DOCANE3 = 'liinspecciones.DOCANE3';

	
	const PREPOR = 'liinspecciones.PREPOR';

	
	const PREPORCAR = 'liinspecciones.PREPORCAR';

	
	const LISICACT_ID = 'liinspecciones.LISICACT_ID';

	
	const FECDECLA = 'liinspecciones.FECDECLA';

	
	const DETDECMOD = 'liinspecciones.DETDECMOD';

	
	const ANAPOR = 'liinspecciones.ANAPOR';

	
	const ANAPORCAR = 'liinspecciones.ANAPORCAR';

	
	const ID = 'liinspecciones.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numins', 'Fecdes', 'Fechas', 'Numval', 'Detins', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiinspeccionesPeer::NUMINS, LiinspeccionesPeer::FECDES, LiinspeccionesPeer::FECHAS, LiinspeccionesPeer::NUMVAL, LiinspeccionesPeer::DETINS, LiinspeccionesPeer::CODEMPADM, LiinspeccionesPeer::CODUNIADM, LiinspeccionesPeer::CODEMPEJE, LiinspeccionesPeer::CODUNISTE, LiinspeccionesPeer::FECREG, LiinspeccionesPeer::DIAS, LiinspeccionesPeer::FECVEN, LiinspeccionesPeer::STATUS, LiinspeccionesPeer::DOCANE1, LiinspeccionesPeer::DOCANE2, LiinspeccionesPeer::DOCANE3, LiinspeccionesPeer::PREPOR, LiinspeccionesPeer::PREPORCAR, LiinspeccionesPeer::LISICACT_ID, LiinspeccionesPeer::FECDECLA, LiinspeccionesPeer::DETDECMOD, LiinspeccionesPeer::ANAPOR, LiinspeccionesPeer::ANAPORCAR, LiinspeccionesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numins', 'fecdes', 'fechas', 'numval', 'detins', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numins' => 0, 'Fecdes' => 1, 'Fechas' => 2, 'Numval' => 3, 'Detins' => 4, 'Codempadm' => 5, 'Coduniadm' => 6, 'Codempeje' => 7, 'Coduniste' => 8, 'Fecreg' => 9, 'Dias' => 10, 'Fecven' => 11, 'Status' => 12, 'Docane1' => 13, 'Docane2' => 14, 'Docane3' => 15, 'Prepor' => 16, 'Preporcar' => 17, 'LisicactId' => 18, 'Fecdecla' => 19, 'Detdecmod' => 20, 'Anapor' => 21, 'Anaporcar' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (LiinspeccionesPeer::NUMINS => 0, LiinspeccionesPeer::FECDES => 1, LiinspeccionesPeer::FECHAS => 2, LiinspeccionesPeer::NUMVAL => 3, LiinspeccionesPeer::DETINS => 4, LiinspeccionesPeer::CODEMPADM => 5, LiinspeccionesPeer::CODUNIADM => 6, LiinspeccionesPeer::CODEMPEJE => 7, LiinspeccionesPeer::CODUNISTE => 8, LiinspeccionesPeer::FECREG => 9, LiinspeccionesPeer::DIAS => 10, LiinspeccionesPeer::FECVEN => 11, LiinspeccionesPeer::STATUS => 12, LiinspeccionesPeer::DOCANE1 => 13, LiinspeccionesPeer::DOCANE2 => 14, LiinspeccionesPeer::DOCANE3 => 15, LiinspeccionesPeer::PREPOR => 16, LiinspeccionesPeer::PREPORCAR => 17, LiinspeccionesPeer::LISICACT_ID => 18, LiinspeccionesPeer::FECDECLA => 19, LiinspeccionesPeer::DETDECMOD => 20, LiinspeccionesPeer::ANAPOR => 21, LiinspeccionesPeer::ANAPORCAR => 22, LiinspeccionesPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('numins' => 0, 'fecdes' => 1, 'fechas' => 2, 'numval' => 3, 'detins' => 4, 'codempadm' => 5, 'coduniadm' => 6, 'codempeje' => 7, 'coduniste' => 8, 'fecreg' => 9, 'dias' => 10, 'fecven' => 11, 'status' => 12, 'docane1' => 13, 'docane2' => 14, 'docane3' => 15, 'prepor' => 16, 'preporcar' => 17, 'lisicact_id' => 18, 'fecdecla' => 19, 'detdecmod' => 20, 'anapor' => 21, 'anaporcar' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiinspeccionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiinspeccionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiinspeccionesPeer::getTableMap();
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
		return str_replace(LiinspeccionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiinspeccionesPeer::NUMINS);

		$criteria->addSelectColumn(LiinspeccionesPeer::FECDES);

		$criteria->addSelectColumn(LiinspeccionesPeer::FECHAS);

		$criteria->addSelectColumn(LiinspeccionesPeer::NUMVAL);

		$criteria->addSelectColumn(LiinspeccionesPeer::DETINS);

		$criteria->addSelectColumn(LiinspeccionesPeer::CODEMPADM);

		$criteria->addSelectColumn(LiinspeccionesPeer::CODUNIADM);

		$criteria->addSelectColumn(LiinspeccionesPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiinspeccionesPeer::CODUNISTE);

		$criteria->addSelectColumn(LiinspeccionesPeer::FECREG);

		$criteria->addSelectColumn(LiinspeccionesPeer::DIAS);

		$criteria->addSelectColumn(LiinspeccionesPeer::FECVEN);

		$criteria->addSelectColumn(LiinspeccionesPeer::STATUS);

		$criteria->addSelectColumn(LiinspeccionesPeer::DOCANE1);

		$criteria->addSelectColumn(LiinspeccionesPeer::DOCANE2);

		$criteria->addSelectColumn(LiinspeccionesPeer::DOCANE3);

		$criteria->addSelectColumn(LiinspeccionesPeer::PREPOR);

		$criteria->addSelectColumn(LiinspeccionesPeer::PREPORCAR);

		$criteria->addSelectColumn(LiinspeccionesPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiinspeccionesPeer::FECDECLA);

		$criteria->addSelectColumn(LiinspeccionesPeer::DETDECMOD);

		$criteria->addSelectColumn(LiinspeccionesPeer::ANAPOR);

		$criteria->addSelectColumn(LiinspeccionesPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiinspeccionesPeer::ID);

	}

	const COUNT = 'COUNT(liinspecciones.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liinspecciones.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
		$objects = LiinspeccionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiinspeccionesPeer::populateObjects(LiinspeccionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiinspeccionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiinspeccionesPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLivaluaciones(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);

		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLivaluaciones(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LivaluacionesPeer::addSelectColumns($c);

		$c->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LivaluacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLivaluaciones(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiinspecciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiinspeccioness();
				$obj2->addLiinspecciones($obj1); 			}
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

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
										$temp_obj2->addLiinspeccionesRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiinspeccionessRelatedByCodempadm();
				$obj2->addLiinspeccionesRelatedByCodempadm($obj1); 			}
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

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
										$temp_obj2->addLiinspeccionesRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiinspeccionessRelatedByCodempeje();
				$obj2->addLiinspeccionesRelatedByCodempeje($obj1); 			}
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

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
										$temp_obj2->addLiinspecciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiinspeccioness();
				$obj2->addLiinspecciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
	
			$criteria->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol2 = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LivaluacionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LivaluacionesPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
	
			$c->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LivaluacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLivaluaciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiinspecciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiinspeccioness();
					$obj2->addLiinspecciones($obj1);
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
						$temp_obj3->addLiinspeccionesRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiinspeccionessRelatedByCodempadm();
					$obj3->addLiinspeccionesRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiinspeccionesRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLiinspeccionessRelatedByCodempeje();
					$obj4->addLiinspeccionesRelatedByCodempeje($obj1);
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
						$temp_obj5->addLiinspecciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLiinspeccioness();
					$obj5->addLiinspecciones($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLivaluaciones(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
		
				$criteria->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
		
				$criteria->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiinspeccionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
		
				$criteria->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LiinspeccionesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLivaluaciones(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol2 = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LidatstedetPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

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
						$temp_obj2->addLiinspeccionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiinspeccionessRelatedByCodempadm();
					$obj2->addLiinspeccionesRelatedByCodempadm($obj1);
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
						$temp_obj3->addLiinspeccionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiinspeccionessRelatedByCodempeje();
					$obj3->addLiinspeccionesRelatedByCodempeje($obj1);
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
						$temp_obj4->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiinspeccioness();
					$obj4->addLiinspecciones($obj1);
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol2 = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LivaluacionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LivaluacionesPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
	
			$c->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LivaluacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLivaluaciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiinspeccioness();
					$obj2->addLiinspecciones($obj1);
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
						$temp_obj3->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiinspeccioness();
					$obj3->addLiinspecciones($obj1);
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol2 = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LivaluacionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LivaluacionesPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
	
			$c->addJoin(LiinspeccionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LivaluacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLivaluaciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiinspeccioness();
					$obj2->addLiinspecciones($obj1);
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
						$temp_obj3->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiinspeccioness();
					$obj3->addLiinspecciones($obj1);
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

		LiinspeccionesPeer::addSelectColumns($c);
		$startcol2 = (LiinspeccionesPeer::NUM_COLUMNS - LiinspeccionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LivaluacionesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LivaluacionesPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiinspeccionesPeer::NUMVAL, LivaluacionesPeer::NUMVAL);
	
			$c->addJoin(LiinspeccionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiinspeccionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiinspeccionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LivaluacionesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLivaluaciones(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiinspecciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiinspeccioness();
					$obj2->addLiinspecciones($obj1);
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
						$temp_obj3->addLiinspeccionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiinspeccionessRelatedByCodempadm();
					$obj3->addLiinspeccionesRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiinspeccionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiinspeccionessRelatedByCodempeje();
					$obj4->addLiinspeccionesRelatedByCodempeje($obj1);
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
		return LiinspeccionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiinspeccionesPeer::ID); 

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
			$comparison = $criteria->getComparison(LiinspeccionesPeer::ID);
			$selectCriteria->add(LiinspeccionesPeer::ID, $criteria->remove(LiinspeccionesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiinspeccionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiinspeccionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liinspecciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiinspeccionesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liinspecciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiinspeccionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiinspeccionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiinspeccionesPeer::DATABASE_NAME, LiinspeccionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiinspeccionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiinspeccionesPeer::DATABASE_NAME);

		$criteria->add(LiinspeccionesPeer::ID, $pk);


		$v = LiinspeccionesPeer::doSelect($criteria, $con);

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
			$criteria->add(LiinspeccionesPeer::ID, $pks, Criteria::IN);
			$objs = LiinspeccionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiinspeccionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiinspeccionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiinspeccionesMapBuilder');
}
