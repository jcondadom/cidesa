<?php


abstract class BaseHcdefgenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hcdefgen';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hcdefgen';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const HCMCOB = 'hcdefgen.HCMCOB';

	
	const MATCOB = 'hcdefgen.MATCOB';

	
	const ODOCOB = 'hcdefgen.ODOCOB';

	
	const FUNCOB = 'hcdefgen.FUNCOB';

	
	const FECVIG = 'hcdefgen.FECVIG';

	
	const CODREEM = 'hcdefgen.CODREEM';

	
	const DURCARAVA = 'hcdefgen.DURCARAVA';

	
	const CODREEO = 'hcdefgen.CODREEO';

	
	const CODRAMHCM = 'hcdefgen.CODRAMHCM';

	
	const CODRAMGASFUN = 'hcdefgen.CODRAMGASFUN';

	
	const NOTDEF = 'hcdefgen.NOTDEF';

	
	const DURAUT = 'hcdefgen.DURAUT';

	
	const FIREMP1 = 'hcdefgen.FIREMP1';

	
	const FIREMP2 = 'hcdefgen.FIREMP2';

	
	const FECHA = 'hcdefgen.FECHA';

	
	const CODPRE = 'hcdefgen.CODPRE';

	
	const ID = 'hcdefgen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Hcmcob', 'Matcob', 'Odocob', 'Funcob', 'Fecvig', 'Codreem', 'Durcarava', 'Codreeo', 'Codramhcm', 'Codramgasfun', 'Notdef', 'Duraut', 'Firemp1', 'Firemp2', 'Fecha', 'Codpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HcdefgenPeer::HCMCOB, HcdefgenPeer::MATCOB, HcdefgenPeer::ODOCOB, HcdefgenPeer::FUNCOB, HcdefgenPeer::FECVIG, HcdefgenPeer::CODREEM, HcdefgenPeer::DURCARAVA, HcdefgenPeer::CODREEO, HcdefgenPeer::CODRAMHCM, HcdefgenPeer::CODRAMGASFUN, HcdefgenPeer::NOTDEF, HcdefgenPeer::DURAUT, HcdefgenPeer::FIREMP1, HcdefgenPeer::FIREMP2, HcdefgenPeer::FECHA, HcdefgenPeer::CODPRE, HcdefgenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('hcmcob', 'matcob', 'odocob', 'funcob', 'fecvig', 'codreem', 'durcarava', 'codreeo', 'codramhcm', 'codramgasfun', 'notdef', 'duraut', 'firemp1', 'firemp2', 'fecha', 'codpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Hcmcob' => 0, 'Matcob' => 1, 'Odocob' => 2, 'Funcob' => 3, 'Fecvig' => 4, 'Codreem' => 5, 'Durcarava' => 6, 'Codreeo' => 7, 'Codramhcm' => 8, 'Codramgasfun' => 9, 'Notdef' => 10, 'Duraut' => 11, 'Firemp1' => 12, 'Firemp2' => 13, 'Fecha' => 14, 'Codpre' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (HcdefgenPeer::HCMCOB => 0, HcdefgenPeer::MATCOB => 1, HcdefgenPeer::ODOCOB => 2, HcdefgenPeer::FUNCOB => 3, HcdefgenPeer::FECVIG => 4, HcdefgenPeer::CODREEM => 5, HcdefgenPeer::DURCARAVA => 6, HcdefgenPeer::CODREEO => 7, HcdefgenPeer::CODRAMHCM => 8, HcdefgenPeer::CODRAMGASFUN => 9, HcdefgenPeer::NOTDEF => 10, HcdefgenPeer::DURAUT => 11, HcdefgenPeer::FIREMP1 => 12, HcdefgenPeer::FIREMP2 => 13, HcdefgenPeer::FECHA => 14, HcdefgenPeer::CODPRE => 15, HcdefgenPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('hcmcob' => 0, 'matcob' => 1, 'odocob' => 2, 'funcob' => 3, 'fecvig' => 4, 'codreem' => 5, 'durcarava' => 6, 'codreeo' => 7, 'codramhcm' => 8, 'codramgasfun' => 9, 'notdef' => 10, 'duraut' => 11, 'firemp1' => 12, 'firemp2' => 13, 'fecha' => 14, 'codpre' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HcdefgenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HcdefgenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HcdefgenPeer::getTableMap();
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
		return str_replace(HcdefgenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HcdefgenPeer::HCMCOB);

		$criteria->addSelectColumn(HcdefgenPeer::MATCOB);

		$criteria->addSelectColumn(HcdefgenPeer::ODOCOB);

		$criteria->addSelectColumn(HcdefgenPeer::FUNCOB);

		$criteria->addSelectColumn(HcdefgenPeer::FECVIG);

		$criteria->addSelectColumn(HcdefgenPeer::CODREEM);

		$criteria->addSelectColumn(HcdefgenPeer::DURCARAVA);

		$criteria->addSelectColumn(HcdefgenPeer::CODREEO);

		$criteria->addSelectColumn(HcdefgenPeer::CODRAMHCM);

		$criteria->addSelectColumn(HcdefgenPeer::CODRAMGASFUN);

		$criteria->addSelectColumn(HcdefgenPeer::NOTDEF);

		$criteria->addSelectColumn(HcdefgenPeer::DURAUT);

		$criteria->addSelectColumn(HcdefgenPeer::FIREMP1);

		$criteria->addSelectColumn(HcdefgenPeer::FIREMP2);

		$criteria->addSelectColumn(HcdefgenPeer::FECHA);

		$criteria->addSelectColumn(HcdefgenPeer::CODPRE);

		$criteria->addSelectColumn(HcdefgenPeer::ID);

	}

	const COUNT = 'COUNT(hcdefgen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hcdefgen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HcdefgenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HcdefgenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HcdefgenPeer::doSelectRS($criteria, $con);
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
		$objects = HcdefgenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HcdefgenPeer::populateObjects(HcdefgenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HcdefgenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HcdefgenPeer::getOMClass();
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
		return HcdefgenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HcdefgenPeer::ID); 

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
			$comparison = $criteria->getComparison(HcdefgenPeer::ID);
			$selectCriteria->add(HcdefgenPeer::ID, $criteria->remove(HcdefgenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HcdefgenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HcdefgenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hcdefgen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HcdefgenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hcdefgen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HcdefgenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HcdefgenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HcdefgenPeer::DATABASE_NAME, HcdefgenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HcdefgenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HcdefgenPeer::DATABASE_NAME);

		$criteria->add(HcdefgenPeer::ID, $pk);


		$v = HcdefgenPeer::doSelect($criteria, $con);

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
			$criteria->add(HcdefgenPeer::ID, $pks, Criteria::IN);
			$objs = HcdefgenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHcdefgenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HcdefgenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HcdefgenMapBuilder');
}
