<?php


abstract class BaseNpptoctaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npptocta';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npptocta';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPTA = 'npptocta.NUMPTA';

	
	const FECPTA = 'npptocta.FECPTA';

	
	const CODEMPA = 'npptocta.CODEMPA';

	
	const CODEMPP = 'npptocta.CODEMPP';

	
	const TIPPTO = 'npptocta.TIPPTO';

	
	const LOGUSE = 'npptocta.LOGUSE';

	
	const CODEMP = 'npptocta.CODEMP';

	
	const CODNOM = 'npptocta.CODNOM';

	
	const CODCAR = 'npptocta.CODCAR';

	
	const APRPTO = 'npptocta.APRPTO';

	
	const USUAPR = 'npptocta.USUAPR';

	
	const FECAPR = 'npptocta.FECAPR';

	
	const PTOUSA = 'npptocta.PTOUSA';

	
	const ID = 'npptocta.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpta', 'Fecpta', 'Codempa', 'Codempp', 'Tippto', 'Loguse', 'Codemp', 'Codnom', 'Codcar', 'Aprpto', 'Usuapr', 'Fecapr', 'Ptousa', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpptoctaPeer::NUMPTA, NpptoctaPeer::FECPTA, NpptoctaPeer::CODEMPA, NpptoctaPeer::CODEMPP, NpptoctaPeer::TIPPTO, NpptoctaPeer::LOGUSE, NpptoctaPeer::CODEMP, NpptoctaPeer::CODNOM, NpptoctaPeer::CODCAR, NpptoctaPeer::APRPTO, NpptoctaPeer::USUAPR, NpptoctaPeer::FECAPR, NpptoctaPeer::PTOUSA, NpptoctaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpta', 'fecpta', 'codempa', 'codempp', 'tippto', 'loguse', 'codemp', 'codnom', 'codcar', 'aprpto', 'usuapr', 'fecapr', 'ptousa', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpta' => 0, 'Fecpta' => 1, 'Codempa' => 2, 'Codempp' => 3, 'Tippto' => 4, 'Loguse' => 5, 'Codemp' => 6, 'Codnom' => 7, 'Codcar' => 8, 'Aprpto' => 9, 'Usuapr' => 10, 'Fecapr' => 11, 'Ptousa' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (NpptoctaPeer::NUMPTA => 0, NpptoctaPeer::FECPTA => 1, NpptoctaPeer::CODEMPA => 2, NpptoctaPeer::CODEMPP => 3, NpptoctaPeer::TIPPTO => 4, NpptoctaPeer::LOGUSE => 5, NpptoctaPeer::CODEMP => 6, NpptoctaPeer::CODNOM => 7, NpptoctaPeer::CODCAR => 8, NpptoctaPeer::APRPTO => 9, NpptoctaPeer::USUAPR => 10, NpptoctaPeer::FECAPR => 11, NpptoctaPeer::PTOUSA => 12, NpptoctaPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numpta' => 0, 'fecpta' => 1, 'codempa' => 2, 'codempp' => 3, 'tippto' => 4, 'loguse' => 5, 'codemp' => 6, 'codnom' => 7, 'codcar' => 8, 'aprpto' => 9, 'usuapr' => 10, 'fecapr' => 11, 'ptousa' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpptoctaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpptoctaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpptoctaPeer::getTableMap();
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
		return str_replace(NpptoctaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpptoctaPeer::NUMPTA);

		$criteria->addSelectColumn(NpptoctaPeer::FECPTA);

		$criteria->addSelectColumn(NpptoctaPeer::CODEMPA);

		$criteria->addSelectColumn(NpptoctaPeer::CODEMPP);

		$criteria->addSelectColumn(NpptoctaPeer::TIPPTO);

		$criteria->addSelectColumn(NpptoctaPeer::LOGUSE);

		$criteria->addSelectColumn(NpptoctaPeer::CODEMP);

		$criteria->addSelectColumn(NpptoctaPeer::CODNOM);

		$criteria->addSelectColumn(NpptoctaPeer::CODCAR);

		$criteria->addSelectColumn(NpptoctaPeer::APRPTO);

		$criteria->addSelectColumn(NpptoctaPeer::USUAPR);

		$criteria->addSelectColumn(NpptoctaPeer::FECAPR);

		$criteria->addSelectColumn(NpptoctaPeer::PTOUSA);

		$criteria->addSelectColumn(NpptoctaPeer::ID);

	}

	const COUNT = 'COUNT(npptocta.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npptocta.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpptoctaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpptoctaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpptoctaPeer::doSelectRS($criteria, $con);
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
		$objects = NpptoctaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpptoctaPeer::populateObjects(NpptoctaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpptoctaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpptoctaPeer::getOMClass();
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
		return NpptoctaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpptoctaPeer::ID); 

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
			$comparison = $criteria->getComparison(NpptoctaPeer::ID);
			$selectCriteria->add(NpptoctaPeer::ID, $criteria->remove(NpptoctaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpptoctaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpptoctaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npptocta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpptoctaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npptocta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpptoctaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpptoctaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpptoctaPeer::DATABASE_NAME, NpptoctaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpptoctaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpptoctaPeer::DATABASE_NAME);

		$criteria->add(NpptoctaPeer::ID, $pk);


		$v = NpptoctaPeer::doSelect($criteria, $con);

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
			$criteria->add(NpptoctaPeer::ID, $pks, Criteria::IN);
			$objs = NpptoctaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpptoctaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpptoctaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpptoctaMapBuilder');
}
