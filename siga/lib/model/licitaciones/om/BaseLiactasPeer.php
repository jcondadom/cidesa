<?php


abstract class BaseLiactasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liactas';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liactas';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMACT = 'liactas.NUMACT';

	
	const NUMCONT = 'liactas.NUMCONT';

	
	const CODTIPACT = 'liactas.CODTIPACT';

	
	const DETACT = 'liactas.DETACT';

	
	const CODEMPADM = 'liactas.CODEMPADM';

	
	const CODUNIADM = 'liactas.CODUNIADM';

	
	const CODEMPEJE = 'liactas.CODEMPEJE';

	
	const CODUNISTE = 'liactas.CODUNISTE';

	
	const FECREG = 'liactas.FECREG';

	
	const DIAS = 'liactas.DIAS';

	
	const FECVEN = 'liactas.FECVEN';

	
	const STATUS = 'liactas.STATUS';

	
	const DOCANE1 = 'liactas.DOCANE1';

	
	const DOCANE2 = 'liactas.DOCANE2';

	
	const DOCANE3 = 'liactas.DOCANE3';

	
	const PREPOR = 'liactas.PREPOR';

	
	const PREPORCAR = 'liactas.PREPORCAR';

	
	const LISICACT_ID = 'liactas.LISICACT_ID';

	
	const FECDECLA = 'liactas.FECDECLA';

	
	const DETDECMOD = 'liactas.DETDECMOD';

	
	const ANAPOR = 'liactas.ANAPOR';

	
	const ANAPORCAR = 'liactas.ANAPORCAR';

	
	const ID = 'liactas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numact', 'Numcont', 'Codtipact', 'Detact', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiactasPeer::NUMACT, LiactasPeer::NUMCONT, LiactasPeer::CODTIPACT, LiactasPeer::DETACT, LiactasPeer::CODEMPADM, LiactasPeer::CODUNIADM, LiactasPeer::CODEMPEJE, LiactasPeer::CODUNISTE, LiactasPeer::FECREG, LiactasPeer::DIAS, LiactasPeer::FECVEN, LiactasPeer::STATUS, LiactasPeer::DOCANE1, LiactasPeer::DOCANE2, LiactasPeer::DOCANE3, LiactasPeer::PREPOR, LiactasPeer::PREPORCAR, LiactasPeer::LISICACT_ID, LiactasPeer::FECDECLA, LiactasPeer::DETDECMOD, LiactasPeer::ANAPOR, LiactasPeer::ANAPORCAR, LiactasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numact', 'numcont', 'codtipact', 'detact', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numact' => 0, 'Numcont' => 1, 'Codtipact' => 2, 'Detact' => 3, 'Codempadm' => 4, 'Coduniadm' => 5, 'Codempeje' => 6, 'Coduniste' => 7, 'Fecreg' => 8, 'Dias' => 9, 'Fecven' => 10, 'Status' => 11, 'Docane1' => 12, 'Docane2' => 13, 'Docane3' => 14, 'Prepor' => 15, 'Preporcar' => 16, 'LisicactId' => 17, 'Fecdecla' => 18, 'Detdecmod' => 19, 'Anapor' => 20, 'Anaporcar' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (LiactasPeer::NUMACT => 0, LiactasPeer::NUMCONT => 1, LiactasPeer::CODTIPACT => 2, LiactasPeer::DETACT => 3, LiactasPeer::CODEMPADM => 4, LiactasPeer::CODUNIADM => 5, LiactasPeer::CODEMPEJE => 6, LiactasPeer::CODUNISTE => 7, LiactasPeer::FECREG => 8, LiactasPeer::DIAS => 9, LiactasPeer::FECVEN => 10, LiactasPeer::STATUS => 11, LiactasPeer::DOCANE1 => 12, LiactasPeer::DOCANE2 => 13, LiactasPeer::DOCANE3 => 14, LiactasPeer::PREPOR => 15, LiactasPeer::PREPORCAR => 16, LiactasPeer::LISICACT_ID => 17, LiactasPeer::FECDECLA => 18, LiactasPeer::DETDECMOD => 19, LiactasPeer::ANAPOR => 20, LiactasPeer::ANAPORCAR => 21, LiactasPeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numact' => 0, 'numcont' => 1, 'codtipact' => 2, 'detact' => 3, 'codempadm' => 4, 'coduniadm' => 5, 'codempeje' => 6, 'coduniste' => 7, 'fecreg' => 8, 'dias' => 9, 'fecven' => 10, 'status' => 11, 'docane1' => 12, 'docane2' => 13, 'docane3' => 14, 'prepor' => 15, 'preporcar' => 16, 'lisicact_id' => 17, 'fecdecla' => 18, 'detdecmod' => 19, 'anapor' => 20, 'anaporcar' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiactasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiactasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiactasPeer::getTableMap();
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
		return str_replace(LiactasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiactasPeer::NUMACT);

		$criteria->addSelectColumn(LiactasPeer::NUMCONT);

		$criteria->addSelectColumn(LiactasPeer::CODTIPACT);

		$criteria->addSelectColumn(LiactasPeer::DETACT);

		$criteria->addSelectColumn(LiactasPeer::CODEMPADM);

		$criteria->addSelectColumn(LiactasPeer::CODUNIADM);

		$criteria->addSelectColumn(LiactasPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiactasPeer::CODUNISTE);

		$criteria->addSelectColumn(LiactasPeer::FECREG);

		$criteria->addSelectColumn(LiactasPeer::DIAS);

		$criteria->addSelectColumn(LiactasPeer::FECVEN);

		$criteria->addSelectColumn(LiactasPeer::STATUS);

		$criteria->addSelectColumn(LiactasPeer::DOCANE1);

		$criteria->addSelectColumn(LiactasPeer::DOCANE2);

		$criteria->addSelectColumn(LiactasPeer::DOCANE3);

		$criteria->addSelectColumn(LiactasPeer::PREPOR);

		$criteria->addSelectColumn(LiactasPeer::PREPORCAR);

		$criteria->addSelectColumn(LiactasPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiactasPeer::FECDECLA);

		$criteria->addSelectColumn(LiactasPeer::DETDECMOD);

		$criteria->addSelectColumn(LiactasPeer::ANAPOR);

		$criteria->addSelectColumn(LiactasPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiactasPeer::ID);

	}

	const COUNT = 'COUNT(liactas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liactas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiactasPeer::doSelectRS($criteria, $con);
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
		$objects = LiactasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiactasPeer::populateObjects(LiactasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiactasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiactasPeer::getOMClass();
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
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LiactasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLitipact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);

		$rs = LiactasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LiactasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LiactasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiactasPeer::doSelectRS($criteria, $con);
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

		LiactasPeer::addSelectColumns($c);
		$startcol = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
										$temp_obj2->addLiactas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactass();
				$obj2->addLiactas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLitipact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiactasPeer::addSelectColumns($c);
		$startcol = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipactPeer::addSelectColumns($c);

		$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLiactas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactass();
				$obj2->addLiactas($obj1); 			}
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

		LiactasPeer::addSelectColumns($c);
		$startcol = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
										$temp_obj2->addLiactasRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactassRelatedByCodempadm();
				$obj2->addLiactasRelatedByCodempadm($obj1); 			}
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

		LiactasPeer::addSelectColumns($c);
		$startcol = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
										$temp_obj2->addLiactasRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactassRelatedByCodempeje();
				$obj2->addLiactasRelatedByCodempeje($obj1); 			}
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

		LiactasPeer::addSelectColumns($c);
		$startcol = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
										$temp_obj2->addLiactas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactass();
				$obj2->addLiactas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$criteria->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiactasPeer::doSelectRS($criteria, $con);
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

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitipactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipactPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$c->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();


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
						$temp_obj2->addLiactas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
				}
	

							
				$omClass = LitipactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiactas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactass();
					$obj3->addLiactas($obj1);
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
						$temp_obj4->addLiactasRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactassRelatedByCodempadm();
					$obj4->addLiactasRelatedByCodempadm($obj1);
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
						$temp_obj5->addLiactasRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLiactassRelatedByCodempeje();
					$obj5->addLiactasRelatedByCodempeje($obj1);
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
						$temp_obj6->addLiactas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initLiactass();
					$obj6->addLiactas($obj1);
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
				$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
		
				$criteria->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLitipact(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
		
				$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
		
				$criteria->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
		
				$criteria->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LiactasPeer::doSelectRS($criteria, $con);
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

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipactPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$c->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
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
						$temp_obj3->addLiactasRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactassRelatedByCodempadm();
					$obj3->addLiactasRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiactasRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactassRelatedByCodempeje();
					$obj4->addLiactasRelatedByCodempeje($obj1);
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
						$temp_obj5->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiactass();
					$obj5->addLiactas($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLitipact(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
						$temp_obj2->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
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
						$temp_obj3->addLiactasRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactassRelatedByCodempadm();
					$obj3->addLiactasRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiactasRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactassRelatedByCodempeje();
					$obj4->addLiactasRelatedByCodempeje($obj1);
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
						$temp_obj5->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiactass();
					$obj5->addLiactas($obj1);
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

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitipactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipactPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
						$temp_obj2->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
				}
	
				$omClass = LitipactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactass();
					$obj3->addLiactas($obj1);
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
						$temp_obj4->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactass();
					$obj4->addLiactas($obj1);
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

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitipactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipactPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$c->addJoin(LiactasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
						$temp_obj2->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
				}
	
				$omClass = LitipactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactass();
					$obj3->addLiactas($obj1);
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
						$temp_obj4->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactass();
					$obj4->addLiactas($obj1);
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

		LiactasPeer::addSelectColumns($c);
		$startcol2 = (LiactasPeer::NUM_COLUMNS - LiactasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LitipactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipactPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactasPeer::CODTIPACT, LitipactPeer::CODTIPACT);
	
			$c->addJoin(LiactasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactasPeer::getOMClass();

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
						$temp_obj2->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactass();
					$obj2->addLiactas($obj1);
				}
	
				$omClass = LitipactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipact(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLiactas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactass();
					$obj3->addLiactas($obj1);
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
						$temp_obj4->addLiactasRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactassRelatedByCodempadm();
					$obj4->addLiactasRelatedByCodempadm($obj1);
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
						$temp_obj5->addLiactasRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLiactassRelatedByCodempeje();
					$obj5->addLiactasRelatedByCodempeje($obj1);
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
		return LiactasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiactasPeer::ID); 

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
			$comparison = $criteria->getComparison(LiactasPeer::ID);
			$selectCriteria->add(LiactasPeer::ID, $criteria->remove(LiactasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiactasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiactasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liactas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiactasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liactas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiactasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiactasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiactasPeer::DATABASE_NAME, LiactasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiactasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiactasPeer::DATABASE_NAME);

		$criteria->add(LiactasPeer::ID, $pk);


		$v = LiactasPeer::doSelect($criteria, $con);

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
			$criteria->add(LiactasPeer::ID, $pks, Criteria::IN);
			$objs = LiactasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiactasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiactasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiactasMapBuilder');
}
