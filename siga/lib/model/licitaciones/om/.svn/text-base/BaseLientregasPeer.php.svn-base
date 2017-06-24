<?php


abstract class BaseLientregasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lientregas';

	
	const CLASS_DEFAULT = 'lib.model.licitaciones.Lientregas';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMENT = 'lientregas.NUMENT';

	
	const NUMCONT = 'lientregas.NUMCONT';

	
	const DESENT = 'lientregas.DESENT';

	
	const CODEMPADM = 'lientregas.CODEMPADM';

	
	const CODUNIADM = 'lientregas.CODUNIADM';

	
	const CODEMPEJE = 'lientregas.CODEMPEJE';

	
	const CODUNISTE = 'lientregas.CODUNISTE';

	
	const FECREG = 'lientregas.FECREG';

	
	const DIAS = 'lientregas.DIAS';

	
	const FECVEN = 'lientregas.FECVEN';

	
	const STATUS = 'lientregas.STATUS';

	
	const DOCANE1 = 'lientregas.DOCANE1';

	
	const DOCANE2 = 'lientregas.DOCANE2';

	
	const DOCANE3 = 'lientregas.DOCANE3';

	
	const PREPOR = 'lientregas.PREPOR';

	
	const PREPORCAR = 'lientregas.PREPORCAR';

	
	const LISICACT_ID = 'lientregas.LISICACT_ID';

	
	const FECDECLA = 'lientregas.FECDECLA';

	
	const DETDECMOD = 'lientregas.DETDECMOD';

	
	const ANAPOR = 'lientregas.ANAPOR';

	
	const ANAPORCAR = 'lientregas.ANAPORCAR';

	
	const ID = 'lientregas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nument', 'Numcont', 'Desent', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Status', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Fecdecla', 'Detdecmod', 'Anapor', 'Anaporcar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LientregasPeer::NUMENT, LientregasPeer::NUMCONT, LientregasPeer::DESENT, LientregasPeer::CODEMPADM, LientregasPeer::CODUNIADM, LientregasPeer::CODEMPEJE, LientregasPeer::CODUNISTE, LientregasPeer::FECREG, LientregasPeer::DIAS, LientregasPeer::FECVEN, LientregasPeer::STATUS, LientregasPeer::DOCANE1, LientregasPeer::DOCANE2, LientregasPeer::DOCANE3, LientregasPeer::PREPOR, LientregasPeer::PREPORCAR, LientregasPeer::LISICACT_ID, LientregasPeer::FECDECLA, LientregasPeer::DETDECMOD, LientregasPeer::ANAPOR, LientregasPeer::ANAPORCAR, LientregasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nument', 'numcont', 'desent', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'status', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'fecdecla', 'detdecmod', 'anapor', 'anaporcar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nument' => 0, 'Numcont' => 1, 'Desent' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Status' => 10, 'Docane1' => 11, 'Docane2' => 12, 'Docane3' => 13, 'Prepor' => 14, 'Preporcar' => 15, 'LisicactId' => 16, 'Fecdecla' => 17, 'Detdecmod' => 18, 'Anapor' => 19, 'Anaporcar' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (LientregasPeer::NUMENT => 0, LientregasPeer::NUMCONT => 1, LientregasPeer::DESENT => 2, LientregasPeer::CODEMPADM => 3, LientregasPeer::CODUNIADM => 4, LientregasPeer::CODEMPEJE => 5, LientregasPeer::CODUNISTE => 6, LientregasPeer::FECREG => 7, LientregasPeer::DIAS => 8, LientregasPeer::FECVEN => 9, LientregasPeer::STATUS => 10, LientregasPeer::DOCANE1 => 11, LientregasPeer::DOCANE2 => 12, LientregasPeer::DOCANE3 => 13, LientregasPeer::PREPOR => 14, LientregasPeer::PREPORCAR => 15, LientregasPeer::LISICACT_ID => 16, LientregasPeer::FECDECLA => 17, LientregasPeer::DETDECMOD => 18, LientregasPeer::ANAPOR => 19, LientregasPeer::ANAPORCAR => 20, LientregasPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('nument' => 0, 'numcont' => 1, 'desent' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'status' => 10, 'docane1' => 11, 'docane2' => 12, 'docane3' => 13, 'prepor' => 14, 'preporcar' => 15, 'lisicact_id' => 16, 'fecdecla' => 17, 'detdecmod' => 18, 'anapor' => 19, 'anaporcar' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/licitaciones/map/LientregasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.licitaciones.map.LientregasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LientregasPeer::getTableMap();
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
		return str_replace(LientregasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LientregasPeer::NUMENT);

		$criteria->addSelectColumn(LientregasPeer::NUMCONT);

		$criteria->addSelectColumn(LientregasPeer::DESENT);

		$criteria->addSelectColumn(LientregasPeer::CODEMPADM);

		$criteria->addSelectColumn(LientregasPeer::CODUNIADM);

		$criteria->addSelectColumn(LientregasPeer::CODEMPEJE);

		$criteria->addSelectColumn(LientregasPeer::CODUNISTE);

		$criteria->addSelectColumn(LientregasPeer::FECREG);

		$criteria->addSelectColumn(LientregasPeer::DIAS);

		$criteria->addSelectColumn(LientregasPeer::FECVEN);

		$criteria->addSelectColumn(LientregasPeer::STATUS);

		$criteria->addSelectColumn(LientregasPeer::DOCANE1);

		$criteria->addSelectColumn(LientregasPeer::DOCANE2);

		$criteria->addSelectColumn(LientregasPeer::DOCANE3);

		$criteria->addSelectColumn(LientregasPeer::PREPOR);

		$criteria->addSelectColumn(LientregasPeer::PREPORCAR);

		$criteria->addSelectColumn(LientregasPeer::LISICACT_ID);

		$criteria->addSelectColumn(LientregasPeer::FECDECLA);

		$criteria->addSelectColumn(LientregasPeer::DETDECMOD);

		$criteria->addSelectColumn(LientregasPeer::ANAPOR);

		$criteria->addSelectColumn(LientregasPeer::ANAPORCAR);

		$criteria->addSelectColumn(LientregasPeer::ID);

	}

	const COUNT = 'COUNT(lientregas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lientregas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LientregasPeer::doSelectRS($criteria, $con);
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
		$objects = LientregasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LientregasPeer::populateObjects(LientregasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LientregasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LientregasPeer::getOMClass();
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
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);

		$rs = LientregasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);

		$rs = LientregasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);

		$rs = LientregasPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LientregasPeer::doSelectRS($criteria, $con);
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

		LientregasPeer::addSelectColumns($c);
		$startcol = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LicontratPeer::addSelectColumns($c);

		$c->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
										$temp_obj2->addLientregas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLientregass();
				$obj2->addLientregas($obj1); 			}
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

		LientregasPeer::addSelectColumns($c);
		$startcol = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
										$temp_obj2->addLientregasRelatedByCodempadm($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLientregassRelatedByCodempadm();
				$obj2->addLientregasRelatedByCodempadm($obj1); 			}
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

		LientregasPeer::addSelectColumns($c);
		$startcol = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LidatstedetPeer::addSelectColumns($c);

		$c->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
										$temp_obj2->addLientregasRelatedByCodempeje($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLientregassRelatedByCodempeje();
				$obj2->addLientregasRelatedByCodempeje($obj1); 			}
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

		LientregasPeer::addSelectColumns($c);
		$startcol = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
										$temp_obj2->addLientregas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLientregass();
				$obj2->addLientregas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LientregasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$criteria->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$criteria->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LientregasPeer::doSelectRS($criteria, $con);
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

		LientregasPeer::addSelectColumns($c);
		$startcol2 = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();


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
						$temp_obj2->addLientregas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLientregass();
					$obj2->addLientregas($obj1);
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
						$temp_obj3->addLientregasRelatedByCodempadm($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initLientregassRelatedByCodempadm();
					$obj3->addLientregasRelatedByCodempadm($obj1);
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
						$temp_obj4->addLientregasRelatedByCodempeje($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initLientregassRelatedByCodempeje();
					$obj4->addLientregasRelatedByCodempeje($obj1);
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
						$temp_obj5->addLientregas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initLientregass();
					$obj5->addLientregas($obj1);
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
				$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LientregasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LientregasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LientregasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LientregasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LientregasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
		
			$rs = LientregasPeer::doSelectRS($criteria, $con);
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
				$criteria->addSelectColumn(LientregasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(LientregasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
		
				$criteria->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
		
				$criteria->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
		
			$rs = LientregasPeer::doSelectRS($criteria, $con);
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

		LientregasPeer::addSelectColumns($c);
		$startcol2 = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LidatstedetPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
						$temp_obj2->addLientregasRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLientregassRelatedByCodempadm();
					$obj2->addLientregasRelatedByCodempadm($obj1);
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
						$temp_obj3->addLientregasRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLientregassRelatedByCodempeje();
					$obj3->addLientregasRelatedByCodempeje($obj1);
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
						$temp_obj4->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLientregass();
					$obj4->addLientregas($obj1);
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

		LientregasPeer::addSelectColumns($c);
		$startcol2 = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
						$temp_obj2->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLientregass();
					$obj2->addLientregas($obj1);
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
						$temp_obj3->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLientregass();
					$obj3->addLientregas($obj1);
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

		LientregasPeer::addSelectColumns($c);
		$startcol2 = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LisicactPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LientregasPeer::LISICACT_ID, LisicactPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
						$temp_obj2->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLientregass();
					$obj2->addLientregas($obj1);
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
						$temp_obj3->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLientregass();
					$obj3->addLientregas($obj1);
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

		LientregasPeer::addSelectColumns($c);
		$startcol2 = (LientregasPeer::NUM_COLUMNS - LientregasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LicontratPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LicontratPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + LidatstedetPeer::NUM_COLUMNS;
	
			LidatstedetPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + LidatstedetPeer::NUM_COLUMNS;
	
			$c->addJoin(LientregasPeer::NUMCONT, LicontratPeer::NUMCONT);
	
			$c->addJoin(LientregasPeer::CODEMPADM, LidatstedetPeer::CODEMP);
	
			$c->addJoin(LientregasPeer::CODEMPEJE, LidatstedetPeer::CODEMP);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LientregasPeer::getOMClass();

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
						$temp_obj2->addLientregas($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initLientregass();
					$obj2->addLientregas($obj1);
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
						$temp_obj3->addLientregasRelatedByCodempadm($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initLientregassRelatedByCodempadm();
					$obj3->addLientregasRelatedByCodempadm($obj1);
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
						$temp_obj4->addLientregasRelatedByCodempeje($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initLientregassRelatedByCodempeje();
					$obj4->addLientregasRelatedByCodempeje($obj1);
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
		return LientregasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LientregasPeer::ID); 

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
			$comparison = $criteria->getComparison(LientregasPeer::ID);
			$selectCriteria->add(LientregasPeer::ID, $criteria->remove(LientregasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LientregasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LientregasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lientregas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LientregasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lientregas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LientregasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LientregasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LientregasPeer::DATABASE_NAME, LientregasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LientregasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LientregasPeer::DATABASE_NAME);

		$criteria->add(LientregasPeer::ID, $pk);


		$v = LientregasPeer::doSelect($criteria, $con);

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
			$criteria->add(LientregasPeer::ID, $pks, Criteria::IN);
			$objs = LientregasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLientregasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/licitaciones/map/LientregasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.licitaciones.map.LientregasMapBuilder');
}
