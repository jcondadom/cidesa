<?php


abstract class BaseLiaddendumPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liaddendum';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liaddendum';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMADD = 'liaddendum.NUMADD';

	
	const TIPADD = 'liaddendum.TIPADD';

	
	const NUMCONT = 'liaddendum.NUMCONT';

	
	const DETMOD = 'liaddendum.DETMOD';

	
	const CODTIPMOD = 'liaddendum.CODTIPMOD';

	
	const CODEMPADM = 'liaddendum.CODEMPADM';

	
	const CODUNIADM = 'liaddendum.CODUNIADM';

	
	const CODEMPEJE = 'liaddendum.CODEMPEJE';

	
	const CODUNISTE = 'liaddendum.CODUNISTE';

	
	const FECREG = 'liaddendum.FECREG';

	
	const DIAS = 'liaddendum.DIAS';

	
	const FECVEN = 'liaddendum.FECVEN';

	
	const STATUS = 'liaddendum.STATUS';

	
	const DOCANE1 = 'liaddendum.DOCANE1';

	
	const DOCANE2 = 'liaddendum.DOCANE2';

	
	const DOCANE3 = 'liaddendum.DOCANE3';

	
	const PREPOR = 'liaddendum.PREPOR';

	
	const PREPORCAR = 'liaddendum.PREPORCAR';

	
	const LISICACT_ID = 'liaddendum.LISICACT_ID';

	
	const FECDECLA = 'liaddendum.FECDECLA';

	
	const DETDECMOD = 'liaddendum.DETDECMOD';

	
	const ANAPOR = 'liaddendum.ANAPOR';

	
	const ANAPORCAR = 'liaddendum.ANAPORCAR';

	
	const ID = 'liaddendum.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numadd', 'Tipadd', 'Numcont', 'Detmod', 'Codtipmod', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiaddendumPeer::NUMADD, LiaddendumPeer::TIPADD, LiaddendumPeer::NUMCONT, LiaddendumPeer::DETMOD, LiaddendumPeer::CODTIPMOD, LiaddendumPeer::CODEMPADM, LiaddendumPeer::CODUNIADM, LiaddendumPeer::CODEMPEJE, LiaddendumPeer::CODUNISTE, LiaddendumPeer::FECREG, LiaddendumPeer::DIAS, LiaddendumPeer::FECVEN, LiaddendumPeer::STATUS, LiaddendumPeer::DOCANE1, LiaddendumPeer::DOCANE2, LiaddendumPeer::DOCANE3, LiaddendumPeer::PREPOR, LiaddendumPeer::PREPORCAR, LiaddendumPeer::LISICACT_ID, LiaddendumPeer::FECDECLA, LiaddendumPeer::DETDECMOD, LiaddendumPeer::ANAPOR, LiaddendumPeer::ANAPORCAR, LiaddendumPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numadd', 'tipadd', 'numcont', 'detmod', 'codtipmod', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numadd' => 0, 'Tipadd' => 1, 'Numcont' => 2, 'Detmod' => 3, 'Codtipmod' => 4, 'Codempadm' => 5, 'Coduniadm' => 6, 'Codempeje' => 7, 'Coduniste' => 8, 'Fecreg' => 9, 'Dias' => 10, 'Fecven' => 11, 'Status' => 12, 'Docane1' => 13, 'Docane2' => 14, 'Docane3' => 15, 'Prepor' => 16, 'Preporcar' => 17, 'LisicactId' => 18, 'Fecdecla' => 19, 'Detdecmod' => 20, 'Anapor' => 21, 'Anaporcar' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (LiaddendumPeer::NUMADD => 0, LiaddendumPeer::TIPADD => 1, LiaddendumPeer::NUMCONT => 2, LiaddendumPeer::DETMOD => 3, LiaddendumPeer::CODTIPMOD => 4, LiaddendumPeer::CODEMPADM => 5, LiaddendumPeer::CODUNIADM => 6, LiaddendumPeer::CODEMPEJE => 7, LiaddendumPeer::CODUNISTE => 8, LiaddendumPeer::FECREG => 9, LiaddendumPeer::DIAS => 10, LiaddendumPeer::FECVEN => 11, LiaddendumPeer::STATUS => 12, LiaddendumPeer::DOCANE1 => 13, LiaddendumPeer::DOCANE2 => 14, LiaddendumPeer::DOCANE3 => 15, LiaddendumPeer::PREPOR => 16, LiaddendumPeer::PREPORCAR => 17, LiaddendumPeer::LISICACT_ID => 18, LiaddendumPeer::FECDECLA => 19, LiaddendumPeer::DETDECMOD => 20, LiaddendumPeer::ANAPOR => 21, LiaddendumPeer::ANAPORCAR => 22, LiaddendumPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('numadd' => 0, 'tipadd' => 1, 'numcont' => 2, 'detmod' => 3, 'codtipmod' => 4, 'codempadm' => 5, 'coduniadm' => 6, 'codempeje' => 7, 'coduniste' => 8, 'fecreg' => 9, 'dias' => 10, 'fecven' => 11, 'status' => 12, 'docane1' => 13, 'docane2' => 14, 'docane3' => 15, 'prepor' => 16, 'preporcar' => 17, 'lisicact_id' => 18, 'fecdecla' => 19, 'detdecmod' => 20, 'anapor' => 21, 'anaporcar' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiaddendumMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiaddendumMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiaddendumPeer::getTableMap();
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
		return str_replace(LiaddendumPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiaddendumPeer::NUMADD);

		$criteria->addSelectColumn(LiaddendumPeer::TIPADD);

		$criteria->addSelectColumn(LiaddendumPeer::NUMCONT);

		$criteria->addSelectColumn(LiaddendumPeer::DETMOD);

		$criteria->addSelectColumn(LiaddendumPeer::CODTIPMOD);

		$criteria->addSelectColumn(LiaddendumPeer::CODEMPADM);

		$criteria->addSelectColumn(LiaddendumPeer::CODUNIADM);

		$criteria->addSelectColumn(LiaddendumPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiaddendumPeer::CODUNISTE);

		$criteria->addSelectColumn(LiaddendumPeer::FECREG);

		$criteria->addSelectColumn(LiaddendumPeer::DIAS);

		$criteria->addSelectColumn(LiaddendumPeer::FECVEN);

		$criteria->addSelectColumn(LiaddendumPeer::STATUS);

		$criteria->addSelectColumn(LiaddendumPeer::DOCANE1);

		$criteria->addSelectColumn(LiaddendumPeer::DOCANE2);

		$criteria->addSelectColumn(LiaddendumPeer::DOCANE3);

		$criteria->addSelectColumn(LiaddendumPeer::PREPOR);

		$criteria->addSelectColumn(LiaddendumPeer::PREPORCAR);

		$criteria->addSelectColumn(LiaddendumPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiaddendumPeer::FECDECLA);

		$criteria->addSelectColumn(LiaddendumPeer::DETDECMOD);

		$criteria->addSelectColumn(LiaddendumPeer::ANAPOR);

		$criteria->addSelectColumn(LiaddendumPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiaddendumPeer::ID);

	}

	const COUNT = 'COUNT(liaddendum.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liaddendum.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
		$objects = LiaddendumPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiaddendumPeer::populateObjects(LiaddendumPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiaddendumPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiaddendumPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLitipadd(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLicontrat(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLitipmod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLitipadd(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipaddPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipaddPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipadd(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiaddendum($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendums();
				$obj2->addLiaddendum($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLicontrat(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

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
										$temp_obj2->addLiaddendum($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendums();
				$obj2->addLiaddendum($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLitipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipmodPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipmodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipmod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiaddendum($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendums();
				$obj2->addLiaddendum($obj1); 			}
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

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
										$temp_obj2->addLiaddendumRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendumsRelatedByCodempadm();
				$obj2->addLiaddendumRelatedByCodempadm($obj1); 			}
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

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
										$temp_obj2->addLiaddendumRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendumsRelatedByCodempeje();
				$obj2->addLiaddendumRelatedByCodempeje($obj1); 			}
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

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
										$temp_obj2->addLiaddendum($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiaddendums();
				$obj2->addLiaddendum($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaddendumPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol8 = $startcol7 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	

							
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicontrat(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
				}
	

							
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLiaddendum($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendums();
					$obj4->addLiaddendum($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLiaddendumRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendumsRelatedByCodempadm();
					$obj5->addLiaddendumRelatedByCodempadm($obj1);
				}
	

							
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLiaddendumRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initLiaddendumsRelatedByCodempeje();
					$obj6->addLiaddendumRelatedByCodempeje($obj1);
				}
	

							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj7 = new $cls();
				$obj7->hydrate($rs, $startcol7);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj7 = $temp_obj1->getLisicact(); 					if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
						$newObject = false;
						$temp_obj7->addLiaddendum($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initLiaddendums();
					$obj7->addLiaddendum($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLitipadd(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLicontrat(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		
				$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLitipmod(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		
				$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		
				$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		
				$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiaddendumPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiaddendumPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
		
				$criteria->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LiaddendumPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLitipadd(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

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
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipmod(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
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
						$temp_obj4->addLiaddendumRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendumsRelatedByCodempadm();
					$obj4->addLiaddendumRelatedByCodempadm($obj1);
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
						$temp_obj5->addLiaddendumRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendumsRelatedByCodempeje();
					$obj5->addLiaddendumRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLisicact(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLiaddendums();
					$obj6->addLiaddendum($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLicontrat(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipmod(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
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
						$temp_obj4->addLiaddendumRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendumsRelatedByCodempadm();
					$obj4->addLiaddendumRelatedByCodempadm($obj1);
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
						$temp_obj5->addLiaddendumRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendumsRelatedByCodempeje();
					$obj5->addLiaddendumRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLisicact(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLiaddendums();
					$obj6->addLiaddendum($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLitipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicontrat(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
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
						$temp_obj4->addLiaddendumRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendumsRelatedByCodempadm();
					$obj4->addLiaddendumRelatedByCodempadm($obj1);
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
						$temp_obj5->addLiaddendumRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendumsRelatedByCodempeje();
					$obj5->addLiaddendumRelatedByCodempeje($obj1);
				}
	
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLisicact(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLiaddendums();
					$obj6->addLiaddendum($obj1);
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicontrat(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendums();
					$obj4->addLiaddendum($obj1);
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
						$temp_obj5->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendums();
					$obj5->addLiaddendum($obj1);
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicontrat(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendums();
					$obj4->addLiaddendum($obj1);
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
						$temp_obj5->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendums();
					$obj5->addLiaddendum($obj1);
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

		LiaddendumPeer::addSelectColumns($c);
		$startcol2 = (LiaddendumPeer::NUM_COLUMNS - LiaddendumPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipaddPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipaddPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiaddendumPeer::TIPADD, LitipaddPeer::CODTIPADD);
	
			$c->addJoin(LiaddendumPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiaddendumPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LiaddendumPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiaddendumPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiaddendumPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipaddPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipadd(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiaddendums();
					$obj2->addLiaddendum($obj1);
				}
	
				$omClass = LicontratPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLicontrat(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiaddendums();
					$obj3->addLiaddendum($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLiaddendum($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiaddendums();
					$obj4->addLiaddendum($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getLidatstedetRelatedByCodempadm(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addLiaddendumRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiaddendumsRelatedByCodempadm();
					$obj5->addLiaddendumRelatedByCodempadm($obj1);
				}
	
				$omClass = LidatstedetPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6  = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getLidatstedetRelatedByCodempeje(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addLiaddendumRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLiaddendumsRelatedByCodempeje();
					$obj6->addLiaddendumRelatedByCodempeje($obj1);
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
		return LiaddendumPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiaddendumPeer::ID); 

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
			$comparison = $criteria->getComparison(LiaddendumPeer::ID);
			$selectCriteria->add(LiaddendumPeer::ID, $criteria->remove(LiaddendumPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiaddendumPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiaddendumPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liaddendum) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiaddendumPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liaddendum $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiaddendumPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiaddendumPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiaddendumPeer::DATABASE_NAME, LiaddendumPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiaddendumPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiaddendumPeer::DATABASE_NAME);

		$criteria->add(LiaddendumPeer::ID, $pk);


		$v = LiaddendumPeer::doSelect($criteria, $con);

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
			$criteria->add(LiaddendumPeer::ID, $pks, Criteria::IN);
			$objs = LiaddendumPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiaddendumPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiaddendumMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiaddendumMapBuilder');
}
