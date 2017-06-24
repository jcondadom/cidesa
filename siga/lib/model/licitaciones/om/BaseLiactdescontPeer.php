<?php


abstract class BaseLiactdescontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liactdescont';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Liactdescont';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMACTDES = 'liactdescont.NUMACTDES';

	
	const NUMCONT = 'liactdescont.NUMCONT';

	
	const DETACTDES = 'liactdescont.DETACTDES';

	
	const CODEMPADM = 'liactdescont.CODEMPADM';

	
	const CODUNIADM = 'liactdescont.CODUNIADM';

	
	const CODEMPEJE = 'liactdescont.CODEMPEJE';

	
	const CODUNISTE = 'liactdescont.CODUNISTE';

	
	const FECREG = 'liactdescont.FECREG';

	
	const DIAS = 'liactdescont.DIAS';

	
	const FECVEN = 'liactdescont.FECVEN';

	
	const STATUS = 'liactdescont.STATUS';

	
	const DOCANE1 = 'liactdescont.DOCANE1';

	
	const DOCANE2 = 'liactdescont.DOCANE2';

	
	const DOCANE3 = 'liactdescont.DOCANE3';

	
	const PREPOR = 'liactdescont.PREPOR';

	
	const PREPORCAR = 'liactdescont.PREPORCAR';

	
	const LISICACT_ID = 'liactdescont.LISICACT_ID';

	
	const FECDECLA = 'liactdescont.FECDECLA';

	
	const DETDECMOD = 'liactdescont.DETDECMOD';

	
	const ANAPOR = 'liactdescont.ANAPOR';

	
	const ANAPORCAR = 'liactdescont.ANAPORCAR';

	
	const ID = 'liactdescont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numactdes', 'Numcont', 'Detactdes', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiactdescontPeer::NUMACTDES, LiactdescontPeer::NUMCONT, LiactdescontPeer::DETACTDES, LiactdescontPeer::CODEMPADM, LiactdescontPeer::CODUNIADM, LiactdescontPeer::CODEMPEJE, LiactdescontPeer::CODUNISTE, LiactdescontPeer::FECREG, LiactdescontPeer::DIAS, LiactdescontPeer::FECVEN, LiactdescontPeer::STATUS, LiactdescontPeer::DOCANE1, LiactdescontPeer::DOCANE2, LiactdescontPeer::DOCANE3, LiactdescontPeer::PREPOR, LiactdescontPeer::PREPORCAR, LiactdescontPeer::LISICACT_ID, LiactdescontPeer::FECDECLA, LiactdescontPeer::DETDECMOD, LiactdescontPeer::ANAPOR, LiactdescontPeer::ANAPORCAR, LiactdescontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numactdes', 'numcont', 'detactdes', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numactdes' => 0, 'Numcont' => 1, 'Detactdes' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Status' => 10, 'Docane1' => 11, 'Docane2' => 12, 'Docane3' => 13, 'Prepor' => 14, 'Preporcar' => 15, 'LisicactId' => 16, 'Fecdecla' => 17, 'Detdecmod' => 18, 'Anapor' => 19, 'Anaporcar' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (LiactdescontPeer::NUMACTDES => 0, LiactdescontPeer::NUMCONT => 1, LiactdescontPeer::DETACTDES => 2, LiactdescontPeer::CODEMPADM => 3, LiactdescontPeer::CODUNIADM => 4, LiactdescontPeer::CODEMPEJE => 5, LiactdescontPeer::CODUNISTE => 6, LiactdescontPeer::FECREG => 7, LiactdescontPeer::DIAS => 8, LiactdescontPeer::FECVEN => 9, LiactdescontPeer::STATUS => 10, LiactdescontPeer::DOCANE1 => 11, LiactdescontPeer::DOCANE2 => 12, LiactdescontPeer::DOCANE3 => 13, LiactdescontPeer::PREPOR => 14, LiactdescontPeer::PREPORCAR => 15, LiactdescontPeer::LISICACT_ID => 16, LiactdescontPeer::FECDECLA => 17, LiactdescontPeer::DETDECMOD => 18, LiactdescontPeer::ANAPOR => 19, LiactdescontPeer::ANAPORCAR => 20, LiactdescontPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numactdes' => 0, 'numcont' => 1, 'detactdes' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'status' => 10, 'docane1' => 11, 'docane2' => 12, 'docane3' => 13, 'prepor' => 14, 'preporcar' => 15, 'lisicact_id' => 16, 'fecdecla' => 17, 'detdecmod' => 18, 'anapor' => 19, 'anaporcar' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LiactdescontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LiactdescontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiactdescontPeer::getTableMap();
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
		return str_replace(LiactdescontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiactdescontPeer::NUMACTDES);

		$criteria->addSelectColumn(LiactdescontPeer::NUMCONT);

		$criteria->addSelectColumn(LiactdescontPeer::DETACTDES);

		$criteria->addSelectColumn(LiactdescontPeer::CODEMPADM);

		$criteria->addSelectColumn(LiactdescontPeer::CODUNIADM);

		$criteria->addSelectColumn(LiactdescontPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiactdescontPeer::CODUNISTE);

		$criteria->addSelectColumn(LiactdescontPeer::FECREG);

		$criteria->addSelectColumn(LiactdescontPeer::DIAS);

		$criteria->addSelectColumn(LiactdescontPeer::FECVEN);

		$criteria->addSelectColumn(LiactdescontPeer::STATUS);

		$criteria->addSelectColumn(LiactdescontPeer::DOCANE1);

		$criteria->addSelectColumn(LiactdescontPeer::DOCANE2);

		$criteria->addSelectColumn(LiactdescontPeer::DOCANE3);

		$criteria->addSelectColumn(LiactdescontPeer::PREPOR);

		$criteria->addSelectColumn(LiactdescontPeer::PREPORCAR);

		$criteria->addSelectColumn(LiactdescontPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiactdescontPeer::FECDECLA);

		$criteria->addSelectColumn(LiactdescontPeer::DETDECMOD);

		$criteria->addSelectColumn(LiactdescontPeer::ANAPOR);

		$criteria->addSelectColumn(LiactdescontPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiactdescontPeer::ID);

	}

	const COUNT = 'COUNT(liactdescont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liactdescont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
		$objects = LiactdescontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiactdescontPeer::populateObjects(LiactdescontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiactdescontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiactdescontPeer::getOMClass();
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
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
										$temp_obj2->addLiactdescont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactdesconts();
				$obj2->addLiactdescont($obj1); 			}
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
										$temp_obj2->addLiactdescontRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactdescontsRelatedByCodempadm();
				$obj2->addLiactdescontRelatedByCodempadm($obj1); 			}
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
										$temp_obj2->addLiactdescontRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactdescontsRelatedByCodempeje();
				$obj2->addLiactdescontRelatedByCodempeje($obj1); 			}
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
										$temp_obj2->addLiactdescont($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiactdesconts();
				$obj2->addLiactdescont($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiactdescontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol2 = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();


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
						$temp_obj2->addLiactdescont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactdesconts();
					$obj2->addLiactdescont($obj1);
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
						$temp_obj3->addLiactdescontRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactdescontsRelatedByCodempadm();
					$obj3->addLiactdescontRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiactdescontRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactdescontsRelatedByCodempeje();
					$obj4->addLiactdescontRelatedByCodempeje($obj1);
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
						$temp_obj5->addLiactdescont($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLiactdesconts();
					$obj5->addLiactdescont($obj1);
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
				$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactdescontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactdescontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactdescontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LiactdescontPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LiactdescontPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LiactdescontPeer::doSelectRS($criteria, $con);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol2 = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LidatstedetPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
						$temp_obj2->addLiactdescontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactdescontsRelatedByCodempadm();
					$obj2->addLiactdescontRelatedByCodempadm($obj1);
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
						$temp_obj3->addLiactdescontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactdescontsRelatedByCodempeje();
					$obj3->addLiactdescontRelatedByCodempeje($obj1);
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
						$temp_obj4->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactdesconts();
					$obj4->addLiactdescont($obj1);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol2 = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
						$temp_obj2->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactdesconts();
					$obj2->addLiactdescont($obj1);
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
						$temp_obj3->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactdesconts();
					$obj3->addLiactdescont($obj1);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol2 = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactdescontPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
						$temp_obj2->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactdesconts();
					$obj2->addLiactdescont($obj1);
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
						$temp_obj3->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactdesconts();
					$obj3->addLiactdescont($obj1);
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

		LiactdescontPeer::addSelectColumns($c);
		$startcol2 = (LiactdescontPeer::NUM_COLUMNS - LiactdescontPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LiactdescontPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LiactdescontPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LiactdescontPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiactdescontPeer::getOMClass();

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
						$temp_obj2->addLiactdescont($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLiactdesconts();
					$obj2->addLiactdescont($obj1);
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
						$temp_obj3->addLiactdescontRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLiactdescontsRelatedByCodempadm();
					$obj3->addLiactdescontRelatedByCodempadm($obj1);
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
						$temp_obj4->addLiactdescontRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLiactdescontsRelatedByCodempeje();
					$obj4->addLiactdescontRelatedByCodempeje($obj1);
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
		return LiactdescontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiactdescontPeer::ID); 

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
			$comparison = $criteria->getComparison(LiactdescontPeer::ID);
			$selectCriteria->add(LiactdescontPeer::ID, $criteria->remove(LiactdescontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiactdescontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiactdescontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liactdescont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiactdescontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liactdescont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiactdescontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiactdescontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiactdescontPeer::DATABASE_NAME, LiactdescontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiactdescontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiactdescontPeer::DATABASE_NAME);

		$criteria->add(LiactdescontPeer::ID, $pk);


		$v = LiactdescontPeer::doSelect($criteria, $con);

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
			$criteria->add(LiactdescontPeer::ID, $pks, Criteria::IN);
			$objs = LiactdescontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiactdescontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LiactdescontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LiactdescontMapBuilder');
}
