<?php


abstract class BaseLipenalizacionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lipenalizaciones';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lipenalizaciones';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPEN = 'lipenalizaciones.NUMPEN';

	
	const NUMCONT = 'lipenalizaciones.NUMCONT';

	
	const DETPEN = 'lipenalizaciones.DETPEN';

	
	const CODTIPPEN = 'lipenalizaciones.CODTIPPEN';

	
	const CODEMPADM = 'lipenalizaciones.CODEMPADM';

	
	const CODUNIADM = 'lipenalizaciones.CODUNIADM';

	
	const CODEMPEJE = 'lipenalizaciones.CODEMPEJE';

	
	const CODUNISTE = 'lipenalizaciones.CODUNISTE';

	
	const FECREG = 'lipenalizaciones.FECREG';

	
	const DIAS = 'lipenalizaciones.DIAS';

	
	const FECVEN = 'lipenalizaciones.FECVEN';

	
	const STATUS = 'lipenalizaciones.STATUS';

	
	const DOCANE1 = 'lipenalizaciones.DOCANE1';

	
	const DOCANE2 = 'lipenalizaciones.DOCANE2';

	
	const DOCANE3 = 'lipenalizaciones.DOCANE3';

	
	const PREPOR = 'lipenalizaciones.PREPOR';

	
	const PREPORCAR = 'lipenalizaciones.PREPORCAR';

	
	const LISICACT_ID = 'lipenalizaciones.LISICACT_ID';

	
	const FECDECLA = 'lipenalizaciones.FECDECLA';

	
	const DETDECMOD = 'lipenalizaciones.DETDECMOD';

	
	const ANAPOR = 'lipenalizaciones.ANAPOR';

	
	const ANAPORCAR = 'lipenalizaciones.ANAPORCAR';

	
	const ID = 'lipenalizaciones.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpen', 'Numcont', 'Detpen', 'Codtippen', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LipenalizacionesPeer::NUMPEN, LipenalizacionesPeer::NUMCONT, LipenalizacionesPeer::DETPEN, LipenalizacionesPeer::CODTIPPEN, LipenalizacionesPeer::CODEMPADM, LipenalizacionesPeer::CODUNIADM, LipenalizacionesPeer::CODEMPEJE, LipenalizacionesPeer::CODUNISTE, LipenalizacionesPeer::FECREG, LipenalizacionesPeer::DIAS, LipenalizacionesPeer::FECVEN, LipenalizacionesPeer::STATUS, LipenalizacionesPeer::DOCANE1, LipenalizacionesPeer::DOCANE2, LipenalizacionesPeer::DOCANE3, LipenalizacionesPeer::PREPOR, LipenalizacionesPeer::PREPORCAR, LipenalizacionesPeer::LISICACT_ID, LipenalizacionesPeer::FECDECLA, LipenalizacionesPeer::DETDECMOD, LipenalizacionesPeer::ANAPOR, LipenalizacionesPeer::ANAPORCAR, LipenalizacionesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpen', 'numcont', 'detpen', 'codtippen', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpen' => 0, 'Numcont' => 1, 'Detpen' => 2, 'Codtippen' => 3, 'Codempadm' => 4, 'Coduniadm' => 5, 'Codempeje' => 6, 'Coduniste' => 7, 'Fecreg' => 8, 'Dias' => 9, 'Fecven' => 10, 'Status' => 11, 'Docane1' => 12, 'Docane2' => 13, 'Docane3' => 14, 'Prepor' => 15, 'Preporcar' => 16, 'LisicactId' => 17, 'Fecdecla' => 18, 'Detdecmod' => 19, 'Anapor' => 20, 'Anaporcar' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (LipenalizacionesPeer::NUMPEN => 0, LipenalizacionesPeer::NUMCONT => 1, LipenalizacionesPeer::DETPEN => 2, LipenalizacionesPeer::CODTIPPEN => 3, LipenalizacionesPeer::CODEMPADM => 4, LipenalizacionesPeer::CODUNIADM => 5, LipenalizacionesPeer::CODEMPEJE => 6, LipenalizacionesPeer::CODUNISTE => 7, LipenalizacionesPeer::FECREG => 8, LipenalizacionesPeer::DIAS => 9, LipenalizacionesPeer::FECVEN => 10, LipenalizacionesPeer::STATUS => 11, LipenalizacionesPeer::DOCANE1 => 12, LipenalizacionesPeer::DOCANE2 => 13, LipenalizacionesPeer::DOCANE3 => 14, LipenalizacionesPeer::PREPOR => 15, LipenalizacionesPeer::PREPORCAR => 16, LipenalizacionesPeer::LISICACT_ID => 17, LipenalizacionesPeer::FECDECLA => 18, LipenalizacionesPeer::DETDECMOD => 19, LipenalizacionesPeer::ANAPOR => 20, LipenalizacionesPeer::ANAPORCAR => 21, LipenalizacionesPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numpen' => 0, 'numcont' => 1, 'detpen' => 2, 'codtippen' => 3, 'codempadm' => 4, 'coduniadm' => 5, 'codempeje' => 6, 'coduniste' => 7, 'fecreg' => 8, 'dias' => 9, 'fecven' => 10, 'status' => 11, 'docane1' => 12, 'docane2' => 13, 'docane3' => 14, 'prepor' => 15, 'preporcar' => 16, 'lisicact_id' => 17, 'fecdecla' => 18, 'detdecmod' => 19, 'anapor' => 20, 'anaporcar' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LipenalizacionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LipenalizacionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LipenalizacionesPeer::getTableMap();
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
		return str_replace(LipenalizacionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LipenalizacionesPeer::NUMPEN);

		$criteria->addSelectColumn(LipenalizacionesPeer::NUMCONT);

		$criteria->addSelectColumn(LipenalizacionesPeer::DETPEN);

		$criteria->addSelectColumn(LipenalizacionesPeer::CODTIPPEN);

		$criteria->addSelectColumn(LipenalizacionesPeer::CODEMPADM);

		$criteria->addSelectColumn(LipenalizacionesPeer::CODUNIADM);

		$criteria->addSelectColumn(LipenalizacionesPeer::CODEMPEJE);

		$criteria->addSelectColumn(LipenalizacionesPeer::CODUNISTE);

		$criteria->addSelectColumn(LipenalizacionesPeer::FECREG);

		$criteria->addSelectColumn(LipenalizacionesPeer::DIAS);

		$criteria->addSelectColumn(LipenalizacionesPeer::FECVEN);

		$criteria->addSelectColumn(LipenalizacionesPeer::STATUS);

		$criteria->addSelectColumn(LipenalizacionesPeer::DOCANE1);

		$criteria->addSelectColumn(LipenalizacionesPeer::DOCANE2);

		$criteria->addSelectColumn(LipenalizacionesPeer::DOCANE3);

		$criteria->addSelectColumn(LipenalizacionesPeer::PREPOR);

		$criteria->addSelectColumn(LipenalizacionesPeer::PREPORCAR);

		$criteria->addSelectColumn(LipenalizacionesPeer::LISICACT_ID);

		$criteria->addSelectColumn(LipenalizacionesPeer::FECDECLA);

		$criteria->addSelectColumn(LipenalizacionesPeer::DETDECMOD);

		$criteria->addSelectColumn(LipenalizacionesPeer::ANAPOR);

		$criteria->addSelectColumn(LipenalizacionesPeer::ANAPORCAR);

		$criteria->addSelectColumn(LipenalizacionesPeer::ID);

	}

	const COUNT = 'COUNT(lipenalizaciones.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lipenalizaciones.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
		$objects = LipenalizacionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LipenalizacionesPeer::populateObjects(LipenalizacionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LipenalizacionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LipenalizacionesPeer::getOMClass();
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
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLitippen(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
										$temp_obj2->addLipenalizaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLipenalizacioness();
				$obj2->addLipenalizaciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLitippen(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitippenPeer::addSelectColumns($c);

		$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitippenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitippen(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLipenalizaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLipenalizacioness();
				$obj2->addLipenalizaciones($obj1); 			}
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
										$temp_obj2->addLipenalizacionesRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLipenalizacionessRelatedByCodempadm();
				$obj2->addLipenalizacionesRelatedByCodempadm($obj1); 			}
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
										$temp_obj2->addLipenalizacionesRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLipenalizacionessRelatedByCodempeje();
				$obj2->addLipenalizacionesRelatedByCodempeje($obj1); 			}
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
										$temp_obj2->addLipenalizaciones($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLipenalizacioness();
				$obj2->addLipenalizaciones($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$criteria->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitippenPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitippenPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();


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
						$temp_obj2->addLipenalizaciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
				}
	

							
				$omClass = LitippenPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitippen(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLipenalizaciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacioness();
					$obj3->addLipenalizaciones($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLipenalizacionesRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacionessRelatedByCodempadm();
					$obj4->addLipenalizacionesRelatedByCodempadm($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLipenalizacionesRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLipenalizacionessRelatedByCodempeje();
					$obj5->addLipenalizacionesRelatedByCodempeje($obj1);
				}
	

							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLisicact(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLipenalizaciones($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initLipenalizacioness();
					$obj6->addLipenalizaciones($obj1);
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
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLitippen(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
		
				$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
		
				$criteria->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LipenalizacionesPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LipenalizacionesPeer::doSelectRS($criteria, $con);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitippenPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitippenPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitippenPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitippen(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
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
						$temp_obj3->addLipenalizacionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacionessRelatedByCodempadm();
					$obj3->addLipenalizacionesRelatedByCodempadm($obj1);
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
						$temp_obj4->addLipenalizacionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacionessRelatedByCodempeje();
					$obj4->addLipenalizacionesRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLisicact(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLipenalizacioness();
					$obj5->addLipenalizaciones($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLitippen(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
						$temp_obj2->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
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
						$temp_obj3->addLipenalizacionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacionessRelatedByCodempadm();
					$obj3->addLipenalizacionesRelatedByCodempadm($obj1);
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
						$temp_obj4->addLipenalizacionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacionessRelatedByCodempeje();
					$obj4->addLipenalizacionesRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLisicact(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLipenalizacioness();
					$obj5->addLipenalizaciones($obj1);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitippenPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitippenPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
						$temp_obj2->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
				}
	
				$omClass = LitippenPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitippen(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacioness();
					$obj3->addLipenalizaciones($obj1);
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
						$temp_obj4->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacioness();
					$obj4->addLipenalizaciones($obj1);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitippenPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitippenPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$c->addJoin(LipenalizacionesPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
						$temp_obj2->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
				}
	
				$omClass = LitippenPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitippen(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacioness();
					$obj3->addLipenalizaciones($obj1);
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
						$temp_obj4->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacioness();
					$obj4->addLipenalizaciones($obj1);
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

		LipenalizacionesPeer::addSelectColumns($c);
		$startcol2 = (LipenalizacionesPeer::NUM_COLUMNS - LipenalizacionesPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitippenPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitippenPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LipenalizacionesPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LipenalizacionesPeer::CODTIPPEN, LitippenPeer::CODTIPPEN);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LipenalizacionesPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LipenalizacionesPeer::getOMClass();

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
						$temp_obj2->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLipenalizacioness();
					$obj2->addLipenalizaciones($obj1);
				}
	
				$omClass = LitippenPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitippen(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLipenalizaciones($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLipenalizacioness();
					$obj3->addLipenalizaciones($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLipenalizacionesRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLipenalizacionessRelatedByCodempadm();
					$obj4->addLipenalizacionesRelatedByCodempadm($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLipenalizacionesRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLipenalizacionessRelatedByCodempeje();
					$obj5->addLipenalizacionesRelatedByCodempeje($obj1);
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
		return LipenalizacionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LipenalizacionesPeer::ID); 

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
			$comparison = $criteria->getComparison(LipenalizacionesPeer::ID);
			$selectCriteria->add(LipenalizacionesPeer::ID, $criteria->remove(LipenalizacionesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LipenalizacionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LipenalizacionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lipenalizaciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LipenalizacionesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lipenalizaciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LipenalizacionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LipenalizacionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LipenalizacionesPeer::DATABASE_NAME, LipenalizacionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LipenalizacionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LipenalizacionesPeer::DATABASE_NAME);

		$criteria->add(LipenalizacionesPeer::ID, $pk);


		$v = LipenalizacionesPeer::doSelect($criteria, $con);

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
			$criteria->add(LipenalizacionesPeer::ID, $pks, Criteria::IN);
			$objs = LipenalizacionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLipenalizacionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LipenalizacionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LipenalizacionesMapBuilder');
}
