<?php


abstract class BaseTscheemiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tscheemi';

	
	const CLASS_DEFAULT = 'lib.model.Tscheemi';

	
	const NUM_COLUMNS = 48;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCHE = 'tscheemi.NUMCHE';

	
	const NUMCUE = 'tscheemi.NUMCUE';

	
	const CEDRIF = 'tscheemi.CEDRIF';

	
	const FECEMI = 'tscheemi.FECEMI';

	
	const MONCHE = 'tscheemi.MONCHE';

	
	const STATUS = 'tscheemi.STATUS';

	
	const CODEMI = 'tscheemi.CODEMI';

	
	const FECENT = 'tscheemi.FECENT';

	
	const CODENT = 'tscheemi.CODENT';

	
	const OBSENT = 'tscheemi.OBSENT';

	
	const FECANU = 'tscheemi.FECANU';

	
	const CEDREC = 'tscheemi.CEDREC';

	
	const NOMREC = 'tscheemi.NOMREC';

	
	const TIPDOC = 'tscheemi.TIPDOC';

	
	const FECING = 'tscheemi.FECING';

	
	const TEMPORAL = 'tscheemi.TEMPORAL';

	
	const TEMPORAL2 = 'tscheemi.TEMPORAL2';

	
	const NOMBENSUS = 'tscheemi.NOMBENSUS';

	
	const ANOPRE = 'tscheemi.ANOPRE';

	
	const NUMTIQ = 'tscheemi.NUMTIQ';

	
	const CEDAUT = 'tscheemi.CEDAUT';

	
	const PERAUT = 'tscheemi.PERAUT';

	
	const NUMCOMEGR = 'tscheemi.NUMCOMEGR';

	
	const MOTDEV = 'tscheemi.MOTDEV';

	
	const FECDEV = 'tscheemi.FECDEV';

	
	const CODMON = 'tscheemi.CODMON';

	
	const VALMON = 'tscheemi.VALMON';

	
	const CODCONCEPTO = 'tscheemi.CODCONCEPTO';

	
	const LOGUSE = 'tscheemi.LOGUSE';

	
	const CONFORMADO = 'tscheemi.CONFORMADO';

	
	const NOMFUNCON = 'tscheemi.NOMFUNCON';

	
	const AGENBAN = 'tscheemi.AGENBAN';

	
	const FECCONFOR = 'tscheemi.FECCONFOR';

	
	const HORCONFOR = 'tscheemi.HORCONFOR';

	
	const FOTPER = 'tscheemi.FOTPER';

	
	const FOTCED = 'tscheemi.FOTCED';

	
	const FOTCHE = 'tscheemi.FOTCHE';

	
	const COMENTCON = 'tscheemi.COMENTCON';

	
	const CODDIREC = 'tscheemi.CODDIREC';

	
	const FECREG = 'tscheemi.FECREG';

	
	const CHEIMP = 'tscheemi.CHEIMP';

	
	const FECIMP = 'tscheemi.FECIMP';

	
	const FECENTCON = 'tscheemi.FECENTCON';

	
	const CODPRO = 'tscheemi.CODPRO';

	
	const CODSEG = 'tscheemi.CODSEG';

	
	const CODCON = 'tscheemi.CODCON';

	
	const CEDRIFSUS = 'tscheemi.CEDRIFSUS';

	
	const ID = 'tscheemi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numche', 'Numcue', 'Cedrif', 'Fecemi', 'Monche', 'Status', 'Codemi', 'Fecent', 'Codent', 'Obsent', 'Fecanu', 'Cedrec', 'Nomrec', 'Tipdoc', 'Fecing', 'Temporal', 'Temporal2', 'Nombensus', 'Anopre', 'Numtiq', 'Cedaut', 'Peraut', 'Numcomegr', 'Motdev', 'Fecdev', 'Codmon', 'Valmon', 'Codconcepto', 'Loguse', 'Conformado', 'Nomfuncon', 'Agenban', 'Fecconfor', 'Horconfor', 'Fotper', 'Fotced', 'Fotche', 'Comentcon', 'Coddirec', 'Fecreg', 'Cheimp', 'Fecimp', 'Fecentcon', 'Codpro', 'Codseg', 'Codcon', 'Cedrifsus', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TscheemiPeer::NUMCHE, TscheemiPeer::NUMCUE, TscheemiPeer::CEDRIF, TscheemiPeer::FECEMI, TscheemiPeer::MONCHE, TscheemiPeer::STATUS, TscheemiPeer::CODEMI, TscheemiPeer::FECENT, TscheemiPeer::CODENT, TscheemiPeer::OBSENT, TscheemiPeer::FECANU, TscheemiPeer::CEDREC, TscheemiPeer::NOMREC, TscheemiPeer::TIPDOC, TscheemiPeer::FECING, TscheemiPeer::TEMPORAL, TscheemiPeer::TEMPORAL2, TscheemiPeer::NOMBENSUS, TscheemiPeer::ANOPRE, TscheemiPeer::NUMTIQ, TscheemiPeer::CEDAUT, TscheemiPeer::PERAUT, TscheemiPeer::NUMCOMEGR, TscheemiPeer::MOTDEV, TscheemiPeer::FECDEV, TscheemiPeer::CODMON, TscheemiPeer::VALMON, TscheemiPeer::CODCONCEPTO, TscheemiPeer::LOGUSE, TscheemiPeer::CONFORMADO, TscheemiPeer::NOMFUNCON, TscheemiPeer::AGENBAN, TscheemiPeer::FECCONFOR, TscheemiPeer::HORCONFOR, TscheemiPeer::FOTPER, TscheemiPeer::FOTCED, TscheemiPeer::FOTCHE, TscheemiPeer::COMENTCON, TscheemiPeer::CODDIREC, TscheemiPeer::FECREG, TscheemiPeer::CHEIMP, TscheemiPeer::FECIMP, TscheemiPeer::FECENTCON, TscheemiPeer::CODPRO, TscheemiPeer::CODSEG, TscheemiPeer::CODCON, TscheemiPeer::CEDRIFSUS, TscheemiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numche', 'numcue', 'cedrif', 'fecemi', 'monche', 'status', 'codemi', 'fecent', 'codent', 'obsent', 'fecanu', 'cedrec', 'nomrec', 'tipdoc', 'fecing', 'temporal', 'temporal2', 'nombensus', 'anopre', 'numtiq', 'cedaut', 'peraut', 'numcomegr', 'motdev', 'fecdev', 'codmon', 'valmon', 'codconcepto', 'loguse', 'conformado', 'nomfuncon', 'agenban', 'fecconfor', 'horconfor', 'fotper', 'fotced', 'fotche', 'comentcon', 'coddirec', 'fecreg', 'cheimp', 'fecimp', 'fecentcon', 'codpro', 'codseg', 'codcon', 'cedrifsus', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numche' => 0, 'Numcue' => 1, 'Cedrif' => 2, 'Fecemi' => 3, 'Monche' => 4, 'Status' => 5, 'Codemi' => 6, 'Fecent' => 7, 'Codent' => 8, 'Obsent' => 9, 'Fecanu' => 10, 'Cedrec' => 11, 'Nomrec' => 12, 'Tipdoc' => 13, 'Fecing' => 14, 'Temporal' => 15, 'Temporal2' => 16, 'Nombensus' => 17, 'Anopre' => 18, 'Numtiq' => 19, 'Cedaut' => 20, 'Peraut' => 21, 'Numcomegr' => 22, 'Motdev' => 23, 'Fecdev' => 24, 'Codmon' => 25, 'Valmon' => 26, 'Codconcepto' => 27, 'Loguse' => 28, 'Conformado' => 29, 'Nomfuncon' => 30, 'Agenban' => 31, 'Fecconfor' => 32, 'Horconfor' => 33, 'Fotper' => 34, 'Fotced' => 35, 'Fotche' => 36, 'Comentcon' => 37, 'Coddirec' => 38, 'Fecreg' => 39, 'Cheimp' => 40, 'Fecimp' => 41, 'Fecentcon' => 42, 'Codpro' => 43, 'Codseg' => 44, 'Codcon' => 45, 'Cedrifsus' => 46, 'Id' => 47, ),
		BasePeer::TYPE_COLNAME => array (TscheemiPeer::NUMCHE => 0, TscheemiPeer::NUMCUE => 1, TscheemiPeer::CEDRIF => 2, TscheemiPeer::FECEMI => 3, TscheemiPeer::MONCHE => 4, TscheemiPeer::STATUS => 5, TscheemiPeer::CODEMI => 6, TscheemiPeer::FECENT => 7, TscheemiPeer::CODENT => 8, TscheemiPeer::OBSENT => 9, TscheemiPeer::FECANU => 10, TscheemiPeer::CEDREC => 11, TscheemiPeer::NOMREC => 12, TscheemiPeer::TIPDOC => 13, TscheemiPeer::FECING => 14, TscheemiPeer::TEMPORAL => 15, TscheemiPeer::TEMPORAL2 => 16, TscheemiPeer::NOMBENSUS => 17, TscheemiPeer::ANOPRE => 18, TscheemiPeer::NUMTIQ => 19, TscheemiPeer::CEDAUT => 20, TscheemiPeer::PERAUT => 21, TscheemiPeer::NUMCOMEGR => 22, TscheemiPeer::MOTDEV => 23, TscheemiPeer::FECDEV => 24, TscheemiPeer::CODMON => 25, TscheemiPeer::VALMON => 26, TscheemiPeer::CODCONCEPTO => 27, TscheemiPeer::LOGUSE => 28, TscheemiPeer::CONFORMADO => 29, TscheemiPeer::NOMFUNCON => 30, TscheemiPeer::AGENBAN => 31, TscheemiPeer::FECCONFOR => 32, TscheemiPeer::HORCONFOR => 33, TscheemiPeer::FOTPER => 34, TscheemiPeer::FOTCED => 35, TscheemiPeer::FOTCHE => 36, TscheemiPeer::COMENTCON => 37, TscheemiPeer::CODDIREC => 38, TscheemiPeer::FECREG => 39, TscheemiPeer::CHEIMP => 40, TscheemiPeer::FECIMP => 41, TscheemiPeer::FECENTCON => 42, TscheemiPeer::CODPRO => 43, TscheemiPeer::CODSEG => 44, TscheemiPeer::CODCON => 45, TscheemiPeer::CEDRIFSUS => 46, TscheemiPeer::ID => 47, ),
		BasePeer::TYPE_FIELDNAME => array ('numche' => 0, 'numcue' => 1, 'cedrif' => 2, 'fecemi' => 3, 'monche' => 4, 'status' => 5, 'codemi' => 6, 'fecent' => 7, 'codent' => 8, 'obsent' => 9, 'fecanu' => 10, 'cedrec' => 11, 'nomrec' => 12, 'tipdoc' => 13, 'fecing' => 14, 'temporal' => 15, 'temporal2' => 16, 'nombensus' => 17, 'anopre' => 18, 'numtiq' => 19, 'cedaut' => 20, 'peraut' => 21, 'numcomegr' => 22, 'motdev' => 23, 'fecdev' => 24, 'codmon' => 25, 'valmon' => 26, 'codconcepto' => 27, 'loguse' => 28, 'conformado' => 29, 'nomfuncon' => 30, 'agenban' => 31, 'fecconfor' => 32, 'horconfor' => 33, 'fotper' => 34, 'fotced' => 35, 'fotche' => 36, 'comentcon' => 37, 'coddirec' => 38, 'fecreg' => 39, 'cheimp' => 40, 'fecimp' => 41, 'fecentcon' => 42, 'codpro' => 43, 'codseg' => 44, 'codcon' => 45, 'cedrifsus' => 46, 'id' => 47, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TscheemiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TscheemiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TscheemiPeer::getTableMap();
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
		return str_replace(TscheemiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TscheemiPeer::NUMCHE);

		$criteria->addSelectColumn(TscheemiPeer::NUMCUE);

		$criteria->addSelectColumn(TscheemiPeer::CEDRIF);

		$criteria->addSelectColumn(TscheemiPeer::FECEMI);

		$criteria->addSelectColumn(TscheemiPeer::MONCHE);

		$criteria->addSelectColumn(TscheemiPeer::STATUS);

		$criteria->addSelectColumn(TscheemiPeer::CODEMI);

		$criteria->addSelectColumn(TscheemiPeer::FECENT);

		$criteria->addSelectColumn(TscheemiPeer::CODENT);

		$criteria->addSelectColumn(TscheemiPeer::OBSENT);

		$criteria->addSelectColumn(TscheemiPeer::FECANU);

		$criteria->addSelectColumn(TscheemiPeer::CEDREC);

		$criteria->addSelectColumn(TscheemiPeer::NOMREC);

		$criteria->addSelectColumn(TscheemiPeer::TIPDOC);

		$criteria->addSelectColumn(TscheemiPeer::FECING);

		$criteria->addSelectColumn(TscheemiPeer::TEMPORAL);

		$criteria->addSelectColumn(TscheemiPeer::TEMPORAL2);

		$criteria->addSelectColumn(TscheemiPeer::NOMBENSUS);

		$criteria->addSelectColumn(TscheemiPeer::ANOPRE);

		$criteria->addSelectColumn(TscheemiPeer::NUMTIQ);

		$criteria->addSelectColumn(TscheemiPeer::CEDAUT);

		$criteria->addSelectColumn(TscheemiPeer::PERAUT);

		$criteria->addSelectColumn(TscheemiPeer::NUMCOMEGR);

		$criteria->addSelectColumn(TscheemiPeer::MOTDEV);

		$criteria->addSelectColumn(TscheemiPeer::FECDEV);

		$criteria->addSelectColumn(TscheemiPeer::CODMON);

		$criteria->addSelectColumn(TscheemiPeer::VALMON);

		$criteria->addSelectColumn(TscheemiPeer::CODCONCEPTO);

		$criteria->addSelectColumn(TscheemiPeer::LOGUSE);

		$criteria->addSelectColumn(TscheemiPeer::CONFORMADO);

		$criteria->addSelectColumn(TscheemiPeer::NOMFUNCON);

		$criteria->addSelectColumn(TscheemiPeer::AGENBAN);

		$criteria->addSelectColumn(TscheemiPeer::FECCONFOR);

		$criteria->addSelectColumn(TscheemiPeer::HORCONFOR);

		$criteria->addSelectColumn(TscheemiPeer::FOTPER);

		$criteria->addSelectColumn(TscheemiPeer::FOTCED);

		$criteria->addSelectColumn(TscheemiPeer::FOTCHE);

		$criteria->addSelectColumn(TscheemiPeer::COMENTCON);

		$criteria->addSelectColumn(TscheemiPeer::CODDIREC);

		$criteria->addSelectColumn(TscheemiPeer::FECREG);

		$criteria->addSelectColumn(TscheemiPeer::CHEIMP);

		$criteria->addSelectColumn(TscheemiPeer::FECIMP);

		$criteria->addSelectColumn(TscheemiPeer::FECENTCON);

		$criteria->addSelectColumn(TscheemiPeer::CODPRO);

		$criteria->addSelectColumn(TscheemiPeer::CODSEG);

		$criteria->addSelectColumn(TscheemiPeer::CODCON);

		$criteria->addSelectColumn(TscheemiPeer::CEDRIFSUS);

		$criteria->addSelectColumn(TscheemiPeer::ID);

	}

	const COUNT = 'COUNT(tscheemi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tscheemi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TscheemiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TscheemiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TscheemiPeer::doSelectRS($criteria, $con);
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
		$objects = TscheemiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TscheemiPeer::populateObjects(TscheemiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TscheemiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TscheemiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTsdefmon(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TscheemiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TscheemiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TscheemiPeer::CODMON, TsdefmonPeer::CODMON);

		$rs = TscheemiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTsdefmon(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TscheemiPeer::addSelectColumns($c);
		$startcol = (TscheemiPeer::NUM_COLUMNS - TscheemiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TsdefmonPeer::addSelectColumns($c);

		$c->addJoin(TscheemiPeer::CODMON, TsdefmonPeer::CODMON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TscheemiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TsdefmonPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTsdefmon(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTscheemi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTscheemis();
				$obj2->addTscheemi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TscheemiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TscheemiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(TscheemiPeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = TscheemiPeer::doSelectRS($criteria, $con);
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

		TscheemiPeer::addSelectColumns($c);
		$startcol2 = (TscheemiPeer::NUM_COLUMNS - TscheemiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			TsdefmonPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + TsdefmonPeer::NUM_COLUMNS;
	
			$c->addJoin(TscheemiPeer::CODMON, TsdefmonPeer::CODMON);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TscheemiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = TsdefmonPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getTsdefmon(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addTscheemi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initTscheemis();
					$obj2->addTscheemi($obj1);
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
		return TscheemiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TscheemiPeer::ID); 

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
			$comparison = $criteria->getComparison(TscheemiPeer::ID);
			$selectCriteria->add(TscheemiPeer::ID, $criteria->remove(TscheemiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TscheemiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TscheemiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tscheemi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TscheemiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tscheemi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TscheemiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TscheemiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TscheemiPeer::DATABASE_NAME, TscheemiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TscheemiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TscheemiPeer::DATABASE_NAME);

		$criteria->add(TscheemiPeer::ID, $pk);


		$v = TscheemiPeer::doSelect($criteria, $con);

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
			$criteria->add(TscheemiPeer::ID, $pks, Criteria::IN);
			$objs = TscheemiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTscheemiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TscheemiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TscheemiMapBuilder');
}
