<?php


abstract class BaseAtdenunciasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'atdenuncias';

	
	const CLASS_DEFAULT = 'lib.model.ciudadanos.Atdenuncias';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROEXP = 'atdenuncias.NROEXP';

	
	const ATCIUDADANO_ID = 'atdenuncias.ATCIUDADANO_ID';

	
	const ATSOLICI = 'atdenuncias.ATSOLICI';

	
	const DESDEN = 'atdenuncias.DESDEN';

	
	const TELEFONO = 'atdenuncias.TELEFONO';

	
	const ATUNIDADES_ID = 'atdenuncias.ATUNIDADES_ID';

	
	const PERSONA = 'atdenuncias.PERSONA';

	
	const STATUS = 'atdenuncias.STATUS';

	
	const RESPUESTA = 'atdenuncias.RESPUESTA';

	
	const FECHAA = 'atdenuncias.FECHAA';

	
	const FECHAR = 'atdenuncias.FECHAR';

	
	const ATTIPSOL_ID = 'atdenuncias.ATTIPSOL_ID';

	
	const ATINSREFIER_ID = 'atdenuncias.ATINSREFIER_ID';

	
	const ATESTAYU_ID = 'atdenuncias.ATESTAYU_ID';

	
	const USUCRE = 'atdenuncias.USUCRE';

	
	const USUMOD = 'atdenuncias.USUMOD';

	
	const ID = 'atdenuncias.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroexp', 'AtciudadanoId', 'Atsolici', 'Desden', 'Telefono', 'AtunidadesId', 'Persona', 'Status', 'Respuesta', 'Fechaa', 'Fechar', 'AttipsolId', 'AtinsrefierId', 'AtestayuId', 'Usucre', 'Usumod', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AtdenunciasPeer::NROEXP, AtdenunciasPeer::ATCIUDADANO_ID, AtdenunciasPeer::ATSOLICI, AtdenunciasPeer::DESDEN, AtdenunciasPeer::TELEFONO, AtdenunciasPeer::ATUNIDADES_ID, AtdenunciasPeer::PERSONA, AtdenunciasPeer::STATUS, AtdenunciasPeer::RESPUESTA, AtdenunciasPeer::FECHAA, AtdenunciasPeer::FECHAR, AtdenunciasPeer::ATTIPSOL_ID, AtdenunciasPeer::ATINSREFIER_ID, AtdenunciasPeer::ATESTAYU_ID, AtdenunciasPeer::USUCRE, AtdenunciasPeer::USUMOD, AtdenunciasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroexp', 'atciudadano_id', 'atsolici', 'desden', 'telefono', 'atunidades_id', 'persona', 'status', 'respuesta', 'fechaa', 'fechar', 'attipsol_id', 'atinsrefier_id', 'atestayu_id', 'usucre', 'usumod', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroexp' => 0, 'AtciudadanoId' => 1, 'Atsolici' => 2, 'Desden' => 3, 'Telefono' => 4, 'AtunidadesId' => 5, 'Persona' => 6, 'Status' => 7, 'Respuesta' => 8, 'Fechaa' => 9, 'Fechar' => 10, 'AttipsolId' => 11, 'AtinsrefierId' => 12, 'AtestayuId' => 13, 'Usucre' => 14, 'Usumod' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (AtdenunciasPeer::NROEXP => 0, AtdenunciasPeer::ATCIUDADANO_ID => 1, AtdenunciasPeer::ATSOLICI => 2, AtdenunciasPeer::DESDEN => 3, AtdenunciasPeer::TELEFONO => 4, AtdenunciasPeer::ATUNIDADES_ID => 5, AtdenunciasPeer::PERSONA => 6, AtdenunciasPeer::STATUS => 7, AtdenunciasPeer::RESPUESTA => 8, AtdenunciasPeer::FECHAA => 9, AtdenunciasPeer::FECHAR => 10, AtdenunciasPeer::ATTIPSOL_ID => 11, AtdenunciasPeer::ATINSREFIER_ID => 12, AtdenunciasPeer::ATESTAYU_ID => 13, AtdenunciasPeer::USUCRE => 14, AtdenunciasPeer::USUMOD => 15, AtdenunciasPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('nroexp' => 0, 'atciudadano_id' => 1, 'atsolici' => 2, 'desden' => 3, 'telefono' => 4, 'atunidades_id' => 5, 'persona' => 6, 'status' => 7, 'respuesta' => 8, 'fechaa' => 9, 'fechar' => 10, 'attipsol_id' => 11, 'atinsrefier_id' => 12, 'atestayu_id' => 13, 'usucre' => 14, 'usumod' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ciudadanos/map/AtdenunciasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ciudadanos.map.AtdenunciasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AtdenunciasPeer::getTableMap();
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
		return str_replace(AtdenunciasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AtdenunciasPeer::NROEXP);

		$criteria->addSelectColumn(AtdenunciasPeer::ATCIUDADANO_ID);

		$criteria->addSelectColumn(AtdenunciasPeer::ATSOLICI);

		$criteria->addSelectColumn(AtdenunciasPeer::DESDEN);

		$criteria->addSelectColumn(AtdenunciasPeer::TELEFONO);

		$criteria->addSelectColumn(AtdenunciasPeer::ATUNIDADES_ID);

		$criteria->addSelectColumn(AtdenunciasPeer::PERSONA);

		$criteria->addSelectColumn(AtdenunciasPeer::STATUS);

		$criteria->addSelectColumn(AtdenunciasPeer::RESPUESTA);

		$criteria->addSelectColumn(AtdenunciasPeer::FECHAA);

		$criteria->addSelectColumn(AtdenunciasPeer::FECHAR);

		$criteria->addSelectColumn(AtdenunciasPeer::ATTIPSOL_ID);

		$criteria->addSelectColumn(AtdenunciasPeer::ATINSREFIER_ID);

		$criteria->addSelectColumn(AtdenunciasPeer::ATESTAYU_ID);

		$criteria->addSelectColumn(AtdenunciasPeer::USUCRE);

		$criteria->addSelectColumn(AtdenunciasPeer::USUMOD);

		$criteria->addSelectColumn(AtdenunciasPeer::ID);

	}

	const COUNT = 'COUNT(atdenuncias.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT atdenuncias.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
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
		$objects = AtdenunciasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AtdenunciasPeer::populateObjects(AtdenunciasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AtdenunciasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AtdenunciasPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAtciudadano(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtunidades(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAttipsol(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtinsrefier(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAtestayu(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);

		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtciudadanoPeer::addSelectColumns($c);

		$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtciudadanoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtciudadano(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdenuncias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdenunciass();
				$obj2->addAtdenuncias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtunidades(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtunidadesPeer::addSelectColumns($c);

		$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtunidadesPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtunidades(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdenuncias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdenunciass();
				$obj2->addAtdenuncias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAttipsol(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AttipsolPeer::addSelectColumns($c);

		$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AttipsolPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAttipsol(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdenuncias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdenunciass();
				$obj2->addAtdenuncias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtinsrefier(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtinsrefierPeer::addSelectColumns($c);

		$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtinsrefierPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtinsrefier(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdenuncias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdenunciass();
				$obj2->addAtdenuncias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAtestayu(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AtestayuPeer::addSelectColumns($c);

		$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AtestayuPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAtestayu(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAtdenuncias($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAtdenunciass();
				$obj2->addAtdenuncias($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	
			$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	
		$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
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

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AtunidadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtunidadesPeer::NUM_COLUMNS;
	
			AttipsolPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipsolPeer::NUM_COLUMNS;
	
			AtinsrefierPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol7 = $startcol6 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	

							
				$omClass = AtunidadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3 = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtunidades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	

							
				$omClass = AttipsolPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4 = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipsol(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	

							
				$omClass = AtinsrefierPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5 = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtinsrefier(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
				}
	

							
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj6 = new $cls();
				$obj6->hydrate($rs, $startcol6);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj6 = $temp_obj1->getAtestayu(); 					if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
						$newObject = false;
						$temp_obj6->addAtdenuncias($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj6->initAtdenunciass();
					$obj6->addAtdenuncias($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


		
		public static function doCountJoinAllExceptAtciudadano(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		
			$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtunidades(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		
			$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAttipsol(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		
			$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtinsrefier(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
		
			$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

		
		public static function doCountJoinAllExceptAtestayu(Criteria $criteria, $distinct = false, $con = null)
		{
						$criteria = clone $criteria;

						$criteria->clearSelectColumns()->clearOrderByColumns();
			if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT_DISTINCT);
			} else {
				$criteria->addSelectColumn(AtdenunciasPeer::COUNT);
			}

						foreach($criteria->getGroupByColumns() as $column)
			{
				$criteria->addSelectColumn($column);
			}
	
				$criteria->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
		
				$criteria->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
		
			$rs = AtdenunciasPeer::doSelectRS($criteria, $con);
			if ($rs->next()) {
				return $rs->getInt(1);
			} else {
								return 0;
			}
		}
	

	
	public static function doSelectJoinAllExceptAtciudadano(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtunidadesPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtunidadesPeer::NUM_COLUMNS;
	
			AttipsolPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AttipsolPeer::NUM_COLUMNS;
	
			AtinsrefierPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtinsrefierPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtunidadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtunidades(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	
				$omClass = AttipsolPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAttipsol(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	
				$omClass = AtinsrefierPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtinsrefier(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtestayu(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtunidades(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AttipsolPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AttipsolPeer::NUM_COLUMNS;
	
			AtinsrefierPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtinsrefierPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	
				$omClass = AttipsolPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAttipsol(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	
				$omClass = AtinsrefierPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtinsrefier(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtestayu(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAttipsol(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AtunidadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtunidadesPeer::NUM_COLUMNS;
	
			AtinsrefierPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AtinsrefierPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	
				$omClass = AtunidadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtunidades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	
				$omClass = AtinsrefierPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAtinsrefier(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtestayu(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtinsrefier(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AtunidadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtunidadesPeer::NUM_COLUMNS;
	
			AttipsolPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipsolPeer::NUM_COLUMNS;
	
			AtestayuPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtestayuPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATESTAYU_ID, AtestayuPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	
				$omClass = AtunidadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtunidades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	
				$omClass = AttipsolPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipsol(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	
				$omClass = AtestayuPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtestayu(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
				}
	
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAtestayu(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AtdenunciasPeer::addSelectColumns($c);
		$startcol2 = (AtdenunciasPeer::NUM_COLUMNS - AtdenunciasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			AtciudadanoPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + AtciudadanoPeer::NUM_COLUMNS;
	
			AtunidadesPeer::addSelectColumns($c);
			$startcol4 = $startcol3 + AtunidadesPeer::NUM_COLUMNS;
	
			AttipsolPeer::addSelectColumns($c);
			$startcol5 = $startcol4 + AttipsolPeer::NUM_COLUMNS;
	
			AtinsrefierPeer::addSelectColumns($c);
			$startcol6 = $startcol5 + AtinsrefierPeer::NUM_COLUMNS;
	
			$c->addJoin(AtdenunciasPeer::ATCIUDADANO_ID, AtciudadanoPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATUNIDADES_ID, AtunidadesPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATTIPSOL_ID, AttipsolPeer::ID);
	
			$c->addJoin(AtdenunciasPeer::ATINSREFIER_ID, AtinsrefierPeer::ID);
	

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AtdenunciasPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				$omClass = AtciudadanoPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2  = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getAtciudadano(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj2->initAtdenunciass();
					$obj2->addAtdenuncias($obj1);
				}
	
				$omClass = AtunidadesPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj3  = new $cls();
				$obj3->hydrate($rs, $startcol3);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj3 = $temp_obj1->getAtunidades(); 					if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
						$newObject = false;
						$temp_obj3->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj3->initAtdenunciass();
					$obj3->addAtdenuncias($obj1);
				}
	
				$omClass = AttipsolPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj4  = new $cls();
				$obj4->hydrate($rs, $startcol4);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj4 = $temp_obj1->getAttipsol(); 					if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
						$newObject = false;
						$temp_obj4->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj4->initAtdenunciass();
					$obj4->addAtdenuncias($obj1);
				}
	
				$omClass = AtinsrefierPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj5  = new $cls();
				$obj5->hydrate($rs, $startcol5);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj5 = $temp_obj1->getAtinsrefier(); 					if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
						$newObject = false;
						$temp_obj5->addAtdenuncias($obj1);
						break;
					}
				}

				if ($newObject) {
					$obj5->initAtdenunciass();
					$obj5->addAtdenuncias($obj1);
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
		return AtdenunciasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AtdenunciasPeer::ID); 

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
			$comparison = $criteria->getComparison(AtdenunciasPeer::ID);
			$selectCriteria->add(AtdenunciasPeer::ID, $criteria->remove(AtdenunciasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AtdenunciasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AtdenunciasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Atdenuncias) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AtdenunciasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Atdenuncias $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AtdenunciasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AtdenunciasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AtdenunciasPeer::DATABASE_NAME, AtdenunciasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AtdenunciasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AtdenunciasPeer::DATABASE_NAME);

		$criteria->add(AtdenunciasPeer::ID, $pk);


		$v = AtdenunciasPeer::doSelect($criteria, $con);

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
			$criteria->add(AtdenunciasPeer::ID, $pks, Criteria::IN);
			$objs = AtdenunciasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAtdenunciasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ciudadanos/map/AtdenunciasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ciudadanos.map.AtdenunciasMapBuilder');
}
