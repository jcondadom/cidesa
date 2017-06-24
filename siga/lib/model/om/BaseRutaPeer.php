<?php


abstract class BaseRutaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ruta';

	
	const CLASS_DEFAULT = 'lib.model.Ruta';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DESCRIPCION = 'ruta.DESCRIPCION';

	
	const ATESTADOS_ID = 'ruta.ATESTADOS_ID';

	
	const ATMUNICIPIOS_ID = 'ruta.ATMUNICIPIOS_ID';

	
	const ATPARROQUIAS_ID = 'ruta.ATPARROQUIAS_ID';

	
	const ZONA_LIMI_DESDE = 'ruta.ZONA_LIMI_DESDE';

	
	const ZONA_LIMI_HASTA = 'ruta.ZONA_LIMI_HASTA';

	
	const DIA_VISITA = 'ruta.DIA_VISITA';

	
	const DIA_DESPACHO = 'ruta.DIA_DESPACHO';

	
	const STATUS = 'ruta.STATUS';

	
	const ID = 'ruta.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Descripcion', 'AtestadosId', 'AtmunicipiosId', 'AtparroquiasId', 'ZonaLimiDesde', 'ZonaLimiHasta', 'DiaVisita', 'DiaDespacho', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RutaPeer::DESCRIPCION, RutaPeer::ATESTADOS_ID, RutaPeer::ATMUNICIPIOS_ID, RutaPeer::ATPARROQUIAS_ID, RutaPeer::ZONA_LIMI_DESDE, RutaPeer::ZONA_LIMI_HASTA, RutaPeer::DIA_VISITA, RutaPeer::DIA_DESPACHO, RutaPeer::STATUS, RutaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('descripcion', 'atestados_id', 'atmunicipios_id', 'atparroquias_id', 'zona_limi_desde', 'zona_limi_hasta', 'dia_visita', 'dia_despacho', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Descripcion' => 0, 'AtestadosId' => 1, 'AtmunicipiosId' => 2, 'AtparroquiasId' => 3, 'ZonaLimiDesde' => 4, 'ZonaLimiHasta' => 5, 'DiaVisita' => 6, 'DiaDespacho' => 7, 'Status' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (RutaPeer::DESCRIPCION => 0, RutaPeer::ATESTADOS_ID => 1, RutaPeer::ATMUNICIPIOS_ID => 2, RutaPeer::ATPARROQUIAS_ID => 3, RutaPeer::ZONA_LIMI_DESDE => 4, RutaPeer::ZONA_LIMI_HASTA => 5, RutaPeer::DIA_VISITA => 6, RutaPeer::DIA_DESPACHO => 7, RutaPeer::STATUS => 8, RutaPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('descripcion' => 0, 'atestados_id' => 1, 'atmunicipios_id' => 2, 'atparroquias_id' => 3, 'zona_limi_desde' => 4, 'zona_limi_hasta' => 5, 'dia_visita' => 6, 'dia_despacho' => 7, 'status' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RutaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RutaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RutaPeer::getTableMap();
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
		return str_replace(RutaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RutaPeer::DESCRIPCION);

		$criteria->addSelectColumn(RutaPeer::ATESTADOS_ID);

		$criteria->addSelectColumn(RutaPeer::ATMUNICIPIOS_ID);

		$criteria->addSelectColumn(RutaPeer::ATPARROQUIAS_ID);

		$criteria->addSelectColumn(RutaPeer::ZONA_LIMI_DESDE);

		$criteria->addSelectColumn(RutaPeer::ZONA_LIMI_HASTA);

		$criteria->addSelectColumn(RutaPeer::DIA_VISITA);

		$criteria->addSelectColumn(RutaPeer::DIA_DESPACHO);

		$criteria->addSelectColumn(RutaPeer::STATUS);

		$criteria->addSelectColumn(RutaPeer::ID);

	}

	const COUNT = 'COUNT(ruta.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ruta.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RutaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RutaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RutaPeer::doSelectRS($criteria, $con);
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
		$objects = RutaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RutaPeer::populateObjects(RutaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RutaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RutaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RutaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RutaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RutaPeer::doSelectRS($criteria, $con);
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

		RutaPeer::addSelectColumns($c);
		$startcol2 = (RutaPeer::NUM_COLUMNS - RutaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = RutaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return RutaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RutaPeer::ID); 

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
			$comparison = $criteria->getComparison(RutaPeer::ID);
			$selectCriteria->add(RutaPeer::ID, $criteria->remove(RutaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RutaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RutaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ruta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RutaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ruta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RutaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RutaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RutaPeer::DATABASE_NAME, RutaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RutaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RutaPeer::DATABASE_NAME);

		$criteria->add(RutaPeer::ID, $pk);


		$v = RutaPeer::doSelect($criteria, $con);

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
			$criteria->add(RutaPeer::ID, $pks, Criteria::IN);
			$objs = RutaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRutaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RutaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RutaMapBuilder');
}
