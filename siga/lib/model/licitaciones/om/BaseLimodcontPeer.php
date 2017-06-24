<?php


abstract class BaseLimodcontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'limodcont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Limodcont';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMMOD = 'limodcont.NUMMOD';

	
	const TIPMOD = 'limodcont.TIPMOD';

	
	const NUMCONT = 'limodcont.NUMCONT';

	
	const DETMOD = 'limodcont.DETMOD';

	
	const CODTIPMOD = 'limodcont.CODTIPMOD';

	
	const CODEMPADM = 'limodcont.CODEMPADM';

	
	const CODUNIADM = 'limodcont.CODUNIADM';

	
	const CODEMPEJE = 'limodcont.CODEMPEJE';

	
	const CODUNISTE = 'limodcont.CODUNISTE';

	
	const FECREG = 'limodcont.FECREG';

	
	const DIAS = 'limodcont.DIAS';

	
	const FECVEN = 'limodcont.FECVEN';

	
	const STATUS = 'limodcont.STATUS';

	
	const DOCANE1 = 'limodcont.DOCANE1';

	
	const DOCANE2 = 'limodcont.DOCANE2';

	
	const DOCANE3 = 'limodcont.DOCANE3';

	
	const PREPOR = 'limodcont.PREPOR';

	
	const PREPORCAR = 'limodcont.PREPORCAR';

	
	const LISICACT_ID = 'limodcont.LISICACT_ID';

	
	const FECDECLA = 'limodcont.FECDECLA';

	
	const DETDECMOD = 'limodcont.DETDECMOD';

	
	const ANAPOR = 'limodcont.ANAPOR';

	
	const ANAPORCAR = 'limodcont.ANAPORCAR';

	
	const ID = 'limodcont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod', 'Tipmod', 'Numcont', 'Detmod', 'Codtipmod', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LimodcontPeer::NUMMOD, LimodcontPeer::TIPMOD, LimodcontPeer::NUMCONT, LimodcontPeer::DETMOD, LimodcontPeer::CODTIPMOD, LimodcontPeer::CODEMPADM, LimodcontPeer::CODUNIADM, LimodcontPeer::CODEMPEJE, LimodcontPeer::CODUNISTE, LimodcontPeer::FECREG, LimodcontPeer::DIAS, LimodcontPeer::FECVEN, LimodcontPeer::STATUS, LimodcontPeer::DOCANE1, LimodcontPeer::DOCANE2, LimodcontPeer::DOCANE3, LimodcontPeer::PREPOR, LimodcontPeer::PREPORCAR, LimodcontPeer::LISICACT_ID, LimodcontPeer::FECDECLA, LimodcontPeer::DETDECMOD, LimodcontPeer::ANAPOR, LimodcontPeer::ANAPORCAR, LimodcontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod', 'tipmod', 'numcont', 'detmod', 'codtipmod', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nummod' => 0, 'Tipmod' => 1, 'Numcont' => 2, 'Detmod' => 3, 'Codtipmod' => 4, 'Codempadm' => 5, 'Coduniadm' => 6, 'Codempeje' => 7, 'Coduniste' => 8, 'Fecreg' => 9, 'Dias' => 10, 'Fecven' => 11, 'Status' => 12, 'Docane1' => 13, 'Docane2' => 14, 'Docane3' => 15, 'Prepor' => 16, 'Preporcar' => 17, 'LisicactId' => 18, 'Fecdecla' => 19, 'Detdecmod' => 20, 'Anapor' => 21, 'Anaporcar' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (LimodcontPeer::NUMMOD => 0, LimodcontPeer::TIPMOD => 1, LimodcontPeer::NUMCONT => 2, LimodcontPeer::DETMOD => 3, LimodcontPeer::CODTIPMOD => 4, LimodcontPeer::CODEMPADM => 5, LimodcontPeer::CODUNIADM => 6, LimodcontPeer::CODEMPEJE => 7, LimodcontPeer::CODUNISTE => 8, LimodcontPeer::FECREG => 9, LimodcontPeer::DIAS => 10, LimodcontPeer::FECVEN => 11, LimodcontPeer::STATUS => 12, LimodcontPeer::DOCANE1 => 13, LimodcontPeer::DOCANE2 => 14, LimodcontPeer::DOCANE3 => 15, LimodcontPeer::PREPOR => 16, LimodcontPeer::PREPORCAR => 17, LimodcontPeer::LISICACT_ID => 18, LimodcontPeer::FECDECLA => 19, LimodcontPeer::DETDECMOD => 20, LimodcontPeer::ANAPOR => 21, LimodcontPeer::ANAPORCAR => 22, LimodcontPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('nummod' => 0, 'tipmod' => 1, 'numcont' => 2, 'detmod' => 3, 'codtipmod' => 4, 'codempadm' => 5, 'coduniadm' => 6, 'codempeje' => 7, 'coduniste' => 8, 'fecreg' => 9, 'dias' => 10, 'fecven' => 11, 'status' => 12, 'docane1' => 13, 'docane2' => 14, 'docane3' => 15, 'prepor' => 16, 'preporcar' => 17, 'lisicact_id' => 18, 'fecdecla' => 19, 'detdecmod' => 20, 'anapor' => 21, 'anaporcar' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LimodcontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LimodcontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LimodcontPeer::getTableMap();
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
		return str_replace(LimodcontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LimodcontPeer::NUMMOD);

		$criteria->addSelectColumn(LimodcontPeer::TIPMOD);

		$criteria->addSelectColumn(LimodcontPeer::NUMCONT);

		$criteria->addSelectColumn(LimodcontPeer::DETMOD);

		$criteria->addSelectColumn(LimodcontPeer::CODTIPMOD);

		$criteria->addSelectColumn(LimodcontPeer::CODEMPADM);

		$criteria->addSelectColumn(LimodcontPeer::CODUNIADM);

		$criteria->addSelectColumn(LimodcontPeer::CODEMPEJE);

		$criteria->addSelectColumn(LimodcontPeer::CODUNISTE);

		$criteria->addSelectColumn(LimodcontPeer::FECREG);

		$criteria->addSelectColumn(LimodcontPeer::DIAS);

		$criteria->addSelectColumn(LimodcontPeer::FECVEN);

		$criteria->addSelectColumn(LimodcontPeer::STATUS);

		$criteria->addSelectColumn(LimodcontPeer::DOCANE1);

		$criteria->addSelectColumn(LimodcontPeer::DOCANE2);

		$criteria->addSelectColumn(LimodcontPeer::DOCANE3);

		$criteria->addSelectColumn(LimodcontPeer::PREPOR);

		$criteria->addSelectColumn(LimodcontPeer::PREPORCAR);

		$criteria->addSelectColumn(LimodcontPeer::LISICACT_ID);

		$criteria->addSelectColumn(LimodcontPeer::FECDECLA);

		$criteria->addSelectColumn(LimodcontPeer::DETDECMOD);

		$criteria->addSelectColumn(LimodcontPeer::ANAPOR);

		$criteria->addSelectColumn(LimodcontPeer::ANAPORCAR);

		$criteria->addSelectColumn(LimodcontPeer::ID);

	}

	const COUNT = 'COUNT(limodcont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT limodcont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
		$objects = LimodcontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LimodcontPeer::populateObjects(LimodcontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LimodcontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LimodcontPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLitipmodRelatedByTipmod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLitipmodRelatedByCodtipmod(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LimodcontPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLitipmodRelatedByTipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipmodPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipmodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLimodcontRelatedByTipmod($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodcontsRelatedByTipmod();
				$obj2->addLimodcontRelatedByTipmod($obj1); 			}
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

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
										$temp_obj2->addLimodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodconts();
				$obj2->addLimodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLitipmodRelatedByCodtipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipmodPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipmodPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLimodcontRelatedByCodtipmod($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodcontsRelatedByCodtipmod();
				$obj2->addLimodcontRelatedByCodtipmod($obj1); 			}
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

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
										$temp_obj2->addLimodcontRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodcontsRelatedByCodempadm();
				$obj2->addLimodcontRelatedByCodempadm($obj1); 			}
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

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
										$temp_obj2->addLimodcontRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodcontsRelatedByCodempeje();
				$obj2->addLimodcontRelatedByCodempeje($obj1); 			}
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

		LimodcontPeer::addSelectColumns($c);
		$startcol = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
										$temp_obj2->addLimodcont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimodconts();
				$obj2->addLimodcont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimodcontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LimodcontPeer::doSelectRS($criteria, $con);
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

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipmodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipmodPeer::NUM_COLUMNS;
	
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
	
			$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimodcontRelatedByTipmod($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodcontsRelatedByTipmod();
					$obj2->addLimodcontRelatedByTipmod($obj1);
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
						$temp_obj3->addLimodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodconts();
					$obj3->addLimodcont($obj1);
				}
	

							
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLimodcontRelatedByCodtipmod($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodtipmod();
					$obj4->addLimodcontRelatedByCodtipmod($obj1);
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
						$temp_obj5->addLimodcontRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodcontsRelatedByCodempadm();
					$obj5->addLimodcontRelatedByCodempadm($obj1);
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
						$temp_obj6->addLimodcontRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initLimodcontsRelatedByCodempeje();
					$obj6->addLimodcontRelatedByCodempeje($obj1);
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
						$temp_obj7->addLimodcont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj7->initLimodconts();
					$obj7->addLimodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptLitipmodRelatedByTipmod(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptLitipmodRelatedByCodtipmod(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LimodcontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LimodcontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
		
				$criteria->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LimodcontPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptLitipmodRelatedByTipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
						$temp_obj2->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodconts();
					$obj2->addLimodcont($obj1);
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
						$temp_obj3->addLimodcontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodcontsRelatedByCodempadm();
					$obj3->addLimodcontRelatedByCodempadm($obj1);
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
						$temp_obj4->addLimodcontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodempeje();
					$obj4->addLimodcontRelatedByCodempeje($obj1);
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
						$temp_obj5->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodconts();
					$obj5->addLimodcont($obj1);
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

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipmodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipmodPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimodcontRelatedByTipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodcontsRelatedByTipmod();
					$obj2->addLimodcontRelatedByTipmod($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addLimodcontRelatedByCodtipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodcontsRelatedByCodtipmod();
					$obj3->addLimodcontRelatedByCodtipmod($obj1);
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
						$temp_obj4->addLimodcontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodempadm();
					$obj4->addLimodcontRelatedByCodempadm($obj1);
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
						$temp_obj5->addLimodcontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodcontsRelatedByCodempeje();
					$obj5->addLimodcontRelatedByCodempeje($obj1);
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
						$temp_obj6->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLimodconts();
					$obj6->addLimodcont($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLitipmodRelatedByCodtipmod(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

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
						$temp_obj2->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodconts();
					$obj2->addLimodcont($obj1);
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
						$temp_obj3->addLimodcontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodcontsRelatedByCodempadm();
					$obj3->addLimodcontRelatedByCodempadm($obj1);
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
						$temp_obj4->addLimodcontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodempeje();
					$obj4->addLimodcontRelatedByCodempeje($obj1);
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
						$temp_obj5->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodconts();
					$obj5->addLimodcont($obj1);
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

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipmodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipmodPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimodcontRelatedByTipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodcontsRelatedByTipmod();
					$obj2->addLimodcontRelatedByTipmod($obj1);
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
						$temp_obj3->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodconts();
					$obj3->addLimodcont($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLimodcontRelatedByCodtipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodtipmod();
					$obj4->addLimodcontRelatedByCodtipmod($obj1);
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
						$temp_obj5->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodconts();
					$obj5->addLimodcont($obj1);
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

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipmodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipmodPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimodcontRelatedByTipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodcontsRelatedByTipmod();
					$obj2->addLimodcontRelatedByTipmod($obj1);
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
						$temp_obj3->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodconts();
					$obj3->addLimodcont($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLimodcontRelatedByCodtipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodtipmod();
					$obj4->addLimodcontRelatedByCodtipmod($obj1);
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
						$temp_obj5->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodconts();
					$obj5->addLimodcont($obj1);
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

		LimodcontPeer::addSelectColumns($c);
		$startcol2 = (LimodcontPeer::NUM_COLUMNS - LimodcontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LitipmodPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LitipmodPeer::NUM_COLUMNS;
	
			LicontratPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LicontratPeer::NUM_COLUMNS;
	
			LitipmodPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LitipmodPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LimodcontPeer::TIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LimodcontPeer::CODTIPMOD, LitipmodPeer::CODTIPMOD);
	
			$c->addJoin(LimodcontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LimodcontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimodcontPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLitipmodRelatedByTipmod(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimodcontRelatedByTipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLimodcontsRelatedByTipmod();
					$obj2->addLimodcontRelatedByTipmod($obj1);
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
						$temp_obj3->addLimodcont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLimodconts();
					$obj3->addLimodcont($obj1);
				}
	
				$omClass = LitipmodPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getLitipmodRelatedByCodtipmod(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addLimodcontRelatedByCodtipmod($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLimodcontsRelatedByCodtipmod();
					$obj4->addLimodcontRelatedByCodtipmod($obj1);
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
						$temp_obj5->addLimodcontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initLimodcontsRelatedByCodempadm();
					$obj5->addLimodcontRelatedByCodempadm($obj1);
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
						$temp_obj6->addLimodcontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj6->initLimodcontsRelatedByCodempeje();
					$obj6->addLimodcontRelatedByCodempeje($obj1);
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
		return LimodcontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LimodcontPeer::ID); 

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
			$comparison = $criteria->getComparison(LimodcontPeer::ID);
			$selectCriteria->add(LimodcontPeer::ID, $criteria->remove(LimodcontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LimodcontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LimodcontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Limodcont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LimodcontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Limodcont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LimodcontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LimodcontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LimodcontPeer::DATABASE_NAME, LimodcontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LimodcontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LimodcontPeer::DATABASE_NAME);

		$criteria->add(LimodcontPeer::ID, $pk);


		$v = LimodcontPeer::doSelect($criteria, $con);

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
			$criteria->add(LimodcontPeer::ID, $pks, Criteria::IN);
			$objs = LimodcontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLimodcontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LimodcontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LimodcontMapBuilder');
}
