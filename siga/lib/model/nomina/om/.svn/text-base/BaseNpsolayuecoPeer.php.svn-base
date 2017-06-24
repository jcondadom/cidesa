<?php


abstract class BaseNpsolayuecoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npsolayueco';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npsolayueco';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOLAYU = 'npsolayueco.NUMSOLAYU';

	
	const FECSOLAYU = 'npsolayueco.FECSOLAYU';

	
	const DESSOLAYU = 'npsolayueco.DESSOLAYU';

	
	const TIPCOM = 'npsolayueco.TIPCOM';

	
	const ESNOEMP = 'npsolayueco.ESNOEMP';

	
	const CODEMPAYU = 'npsolayueco.CODEMPAYU';

	
	const CEDRIF = 'npsolayueco.CEDRIF';

	
	const NUMPUNCUE = 'npsolayueco.NUMPUNCUE';

	
	const CODTIPAYU = 'npsolayueco.CODTIPAYU';

	
	const CODCAT = 'npsolayueco.CODCAT';

	
	const CODEVE = 'npsolayueco.CODEVE';

	
	const CODNIV = 'npsolayueco.CODNIV';

	
	const MONAYU = 'npsolayueco.MONAYU';

	
	const REFCOM = 'npsolayueco.REFCOM';

	
	const ID = 'npsolayueco.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsolayu', 'Fecsolayu', 'Dessolayu', 'Tipcom', 'Esnoemp', 'Codempayu', 'Cedrif', 'Numpuncue', 'Codtipayu', 'Codcat', 'Codeve', 'Codniv', 'Monayu', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpsolayuecoPeer::NUMSOLAYU, NpsolayuecoPeer::FECSOLAYU, NpsolayuecoPeer::DESSOLAYU, NpsolayuecoPeer::TIPCOM, NpsolayuecoPeer::ESNOEMP, NpsolayuecoPeer::CODEMPAYU, NpsolayuecoPeer::CEDRIF, NpsolayuecoPeer::NUMPUNCUE, NpsolayuecoPeer::CODTIPAYU, NpsolayuecoPeer::CODCAT, NpsolayuecoPeer::CODEVE, NpsolayuecoPeer::CODNIV, NpsolayuecoPeer::MONAYU, NpsolayuecoPeer::REFCOM, NpsolayuecoPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsolayu', 'fecsolayu', 'dessolayu', 'tipcom', 'esnoemp', 'codempayu', 'cedrif', 'numpuncue', 'codtipayu', 'codcat', 'codeve', 'codniv', 'monayu', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsolayu' => 0, 'Fecsolayu' => 1, 'Dessolayu' => 2, 'Tipcom' => 3, 'Esnoemp' => 4, 'Codempayu' => 5, 'Cedrif' => 6, 'Numpuncue' => 7, 'Codtipayu' => 8, 'Codcat' => 9, 'Codeve' => 10, 'Codniv' => 11, 'Monayu' => 12, 'Refcom' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (NpsolayuecoPeer::NUMSOLAYU => 0, NpsolayuecoPeer::FECSOLAYU => 1, NpsolayuecoPeer::DESSOLAYU => 2, NpsolayuecoPeer::TIPCOM => 3, NpsolayuecoPeer::ESNOEMP => 4, NpsolayuecoPeer::CODEMPAYU => 5, NpsolayuecoPeer::CEDRIF => 6, NpsolayuecoPeer::NUMPUNCUE => 7, NpsolayuecoPeer::CODTIPAYU => 8, NpsolayuecoPeer::CODCAT => 9, NpsolayuecoPeer::CODEVE => 10, NpsolayuecoPeer::CODNIV => 11, NpsolayuecoPeer::MONAYU => 12, NpsolayuecoPeer::REFCOM => 13, NpsolayuecoPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('numsolayu' => 0, 'fecsolayu' => 1, 'dessolayu' => 2, 'tipcom' => 3, 'esnoemp' => 4, 'codempayu' => 5, 'cedrif' => 6, 'numpuncue' => 7, 'codtipayu' => 8, 'codcat' => 9, 'codeve' => 10, 'codniv' => 11, 'monayu' => 12, 'refcom' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpsolayuecoMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpsolayuecoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpsolayuecoPeer::getTableMap();
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
		return str_replace(NpsolayuecoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpsolayuecoPeer::NUMSOLAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::FECSOLAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::DESSOLAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::TIPCOM);

		$criteria->addSelectColumn(NpsolayuecoPeer::ESNOEMP);

		$criteria->addSelectColumn(NpsolayuecoPeer::CODEMPAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::CEDRIF);

		$criteria->addSelectColumn(NpsolayuecoPeer::NUMPUNCUE);

		$criteria->addSelectColumn(NpsolayuecoPeer::CODTIPAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::CODCAT);

		$criteria->addSelectColumn(NpsolayuecoPeer::CODEVE);

		$criteria->addSelectColumn(NpsolayuecoPeer::CODNIV);

		$criteria->addSelectColumn(NpsolayuecoPeer::MONAYU);

		$criteria->addSelectColumn(NpsolayuecoPeer::REFCOM);

		$criteria->addSelectColumn(NpsolayuecoPeer::ID);

	}

	const COUNT = 'COUNT(npsolayueco.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npsolayueco.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpsolayuecoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpsolayuecoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpsolayuecoPeer::doSelectRS($criteria, $con);
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
		$objects = NpsolayuecoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpsolayuecoPeer::populateObjects(NpsolayuecoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpsolayuecoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpsolayuecoPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return NpsolayuecoPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpsolayuecoPeer::ID); 

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
			$comparison = $criteria->getComparison(NpsolayuecoPeer::ID);
			$selectCriteria->add(NpsolayuecoPeer::ID, $criteria->remove(NpsolayuecoPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpsolayuecoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpsolayuecoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npsolayueco) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpsolayuecoPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npsolayueco $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpsolayuecoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpsolayuecoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpsolayuecoPeer::DATABASE_NAME, NpsolayuecoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpsolayuecoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpsolayuecoPeer::DATABASE_NAME);

		$criteria->add(NpsolayuecoPeer::ID, $pk);


		$v = NpsolayuecoPeer::doSelect($criteria, $con);

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
			$criteria->add(NpsolayuecoPeer::ID, $pks, Criteria::IN);
			$objs = NpsolayuecoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpsolayuecoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpsolayuecoMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpsolayuecoMapBuilder');
}
