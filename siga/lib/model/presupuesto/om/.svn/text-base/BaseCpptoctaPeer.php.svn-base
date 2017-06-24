<?php


abstract class BaseCpptoctaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpptocta';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cpptocta';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPTA = 'cpptocta.NUMPTA';

	
	const FECPTA = 'cpptocta.FECPTA';

	
	const CODUBIORI = 'cpptocta.CODUBIORI';

	
	const CODUBIDES = 'cpptocta.CODUBIDES';

	
	const ASUNTO = 'cpptocta.ASUNTO';

	
	const MOTIVO = 'cpptocta.MOTIVO';

	
	const RECCON = 'cpptocta.RECCON';

	
	const LOGUSE = 'cpptocta.LOGUSE';

	
	const APRPTO = 'cpptocta.APRPTO';

	
	const USUAPR = 'cpptocta.USUAPR';

	
	const FECAPR = 'cpptocta.FECAPR';

	
	const CODDIREC = 'cpptocta.CODDIREC';

	
	const ID = 'cpptocta.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpta', 'Fecpta', 'Codubiori', 'Codubides', 'Asunto', 'Motivo', 'Reccon', 'Loguse', 'Aprpto', 'Usuapr', 'Fecapr', 'Coddirec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpptoctaPeer::NUMPTA, CpptoctaPeer::FECPTA, CpptoctaPeer::CODUBIORI, CpptoctaPeer::CODUBIDES, CpptoctaPeer::ASUNTO, CpptoctaPeer::MOTIVO, CpptoctaPeer::RECCON, CpptoctaPeer::LOGUSE, CpptoctaPeer::APRPTO, CpptoctaPeer::USUAPR, CpptoctaPeer::FECAPR, CpptoctaPeer::CODDIREC, CpptoctaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpta', 'fecpta', 'codubiori', 'codubides', 'asunto', 'motivo', 'reccon', 'loguse', 'aprpto', 'usuapr', 'fecapr', 'coddirec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpta' => 0, 'Fecpta' => 1, 'Codubiori' => 2, 'Codubides' => 3, 'Asunto' => 4, 'Motivo' => 5, 'Reccon' => 6, 'Loguse' => 7, 'Aprpto' => 8, 'Usuapr' => 9, 'Fecapr' => 10, 'Coddirec' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CpptoctaPeer::NUMPTA => 0, CpptoctaPeer::FECPTA => 1, CpptoctaPeer::CODUBIORI => 2, CpptoctaPeer::CODUBIDES => 3, CpptoctaPeer::ASUNTO => 4, CpptoctaPeer::MOTIVO => 5, CpptoctaPeer::RECCON => 6, CpptoctaPeer::LOGUSE => 7, CpptoctaPeer::APRPTO => 8, CpptoctaPeer::USUAPR => 9, CpptoctaPeer::FECAPR => 10, CpptoctaPeer::CODDIREC => 11, CpptoctaPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('numpta' => 0, 'fecpta' => 1, 'codubiori' => 2, 'codubides' => 3, 'asunto' => 4, 'motivo' => 5, 'reccon' => 6, 'loguse' => 7, 'aprpto' => 8, 'usuapr' => 9, 'fecapr' => 10, 'coddirec' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CpptoctaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CpptoctaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpptoctaPeer::getTableMap();
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
		return str_replace(CpptoctaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpptoctaPeer::NUMPTA);

		$criteria->addSelectColumn(CpptoctaPeer::FECPTA);

		$criteria->addSelectColumn(CpptoctaPeer::CODUBIORI);

		$criteria->addSelectColumn(CpptoctaPeer::CODUBIDES);

		$criteria->addSelectColumn(CpptoctaPeer::ASUNTO);

		$criteria->addSelectColumn(CpptoctaPeer::MOTIVO);

		$criteria->addSelectColumn(CpptoctaPeer::RECCON);

		$criteria->addSelectColumn(CpptoctaPeer::LOGUSE);

		$criteria->addSelectColumn(CpptoctaPeer::APRPTO);

		$criteria->addSelectColumn(CpptoctaPeer::USUAPR);

		$criteria->addSelectColumn(CpptoctaPeer::FECAPR);

		$criteria->addSelectColumn(CpptoctaPeer::CODDIREC);

		$criteria->addSelectColumn(CpptoctaPeer::ID);

	}

	const COUNT = 'COUNT(cpptocta.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpptocta.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpptoctaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpptoctaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpptoctaPeer::doSelectRS($criteria, $con);
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
		$objects = CpptoctaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpptoctaPeer::populateObjects(CpptoctaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpptoctaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpptoctaPeer::getOMClass();
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
		return CpptoctaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CpptoctaPeer::ID); 

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
			$comparison = $criteria->getComparison(CpptoctaPeer::ID);
			$selectCriteria->add(CpptoctaPeer::ID, $criteria->remove(CpptoctaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpptoctaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpptoctaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpptocta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpptoctaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpptocta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpptoctaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpptoctaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpptoctaPeer::DATABASE_NAME, CpptoctaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpptoctaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpptoctaPeer::DATABASE_NAME);

		$criteria->add(CpptoctaPeer::ID, $pk);


		$v = CpptoctaPeer::doSelect($criteria, $con);

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
			$criteria->add(CpptoctaPeer::ID, $pks, Criteria::IN);
			$objs = CpptoctaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpptoctaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CpptoctaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CpptoctaMapBuilder');
}
