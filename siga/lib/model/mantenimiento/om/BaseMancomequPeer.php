<?php


abstract class BaseMancomequPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mancomequ';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Mancomequ';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEQU = 'mancomequ.NUMEQU';

	
	const CODCOM = 'mancomequ.CODCOM';

	
	const DESCOM = 'mancomequ.DESCOM';

	
	const CODTCO = 'mancomequ.CODTCO';

	
	const NUMPAR = 'mancomequ.NUMPAR';

	
	const NUMSER = 'mancomequ.NUMSER';

	
	const POSICI = 'mancomequ.POSICI';

	
	const TIEACU = 'mancomequ.TIEACU';

	
	const INSPOR = 'mancomequ.INSPOR';

	
	const FECINS = 'mancomequ.FECINS';

	
	const VIDEST = 'mancomequ.VIDEST';

	
	const VIDACT = 'mancomequ.VIDACT';

	
	const FECREE = 'mancomequ.FECREE';

	
	const ID = 'mancomequ.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numequ', 'Codcom', 'Descom', 'Codtco', 'Numpar', 'Numser', 'Posici', 'Tieacu', 'Inspor', 'Fecins', 'Videst', 'Vidact', 'Fecree', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MancomequPeer::NUMEQU, MancomequPeer::CODCOM, MancomequPeer::DESCOM, MancomequPeer::CODTCO, MancomequPeer::NUMPAR, MancomequPeer::NUMSER, MancomequPeer::POSICI, MancomequPeer::TIEACU, MancomequPeer::INSPOR, MancomequPeer::FECINS, MancomequPeer::VIDEST, MancomequPeer::VIDACT, MancomequPeer::FECREE, MancomequPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numequ', 'codcom', 'descom', 'codtco', 'numpar', 'numser', 'posici', 'tieacu', 'inspor', 'fecins', 'videst', 'vidact', 'fecree', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numequ' => 0, 'Codcom' => 1, 'Descom' => 2, 'Codtco' => 3, 'Numpar' => 4, 'Numser' => 5, 'Posici' => 6, 'Tieacu' => 7, 'Inspor' => 8, 'Fecins' => 9, 'Videst' => 10, 'Vidact' => 11, 'Fecree' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (MancomequPeer::NUMEQU => 0, MancomequPeer::CODCOM => 1, MancomequPeer::DESCOM => 2, MancomequPeer::CODTCO => 3, MancomequPeer::NUMPAR => 4, MancomequPeer::NUMSER => 5, MancomequPeer::POSICI => 6, MancomequPeer::TIEACU => 7, MancomequPeer::INSPOR => 8, MancomequPeer::FECINS => 9, MancomequPeer::VIDEST => 10, MancomequPeer::VIDACT => 11, MancomequPeer::FECREE => 12, MancomequPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('numequ' => 0, 'codcom' => 1, 'descom' => 2, 'codtco' => 3, 'numpar' => 4, 'numser' => 5, 'posici' => 6, 'tieacu' => 7, 'inspor' => 8, 'fecins' => 9, 'videst' => 10, 'vidact' => 11, 'fecree' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/MancomequMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.MancomequMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MancomequPeer::getTableMap();
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
		return str_replace(MancomequPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MancomequPeer::NUMEQU);

		$criteria->addSelectColumn(MancomequPeer::CODCOM);

		$criteria->addSelectColumn(MancomequPeer::DESCOM);

		$criteria->addSelectColumn(MancomequPeer::CODTCO);

		$criteria->addSelectColumn(MancomequPeer::NUMPAR);

		$criteria->addSelectColumn(MancomequPeer::NUMSER);

		$criteria->addSelectColumn(MancomequPeer::POSICI);

		$criteria->addSelectColumn(MancomequPeer::TIEACU);

		$criteria->addSelectColumn(MancomequPeer::INSPOR);

		$criteria->addSelectColumn(MancomequPeer::FECINS);

		$criteria->addSelectColumn(MancomequPeer::VIDEST);

		$criteria->addSelectColumn(MancomequPeer::VIDACT);

		$criteria->addSelectColumn(MancomequPeer::FECREE);

		$criteria->addSelectColumn(MancomequPeer::ID);

	}

	const COUNT = 'COUNT(mancomequ.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mancomequ.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MancomequPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MancomequPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MancomequPeer::doSelectRS($criteria, $con);
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
		$objects = MancomequPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MancomequPeer::populateObjects(MancomequPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MancomequPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MancomequPeer::getOMClass();
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
		return MancomequPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MancomequPeer::ID); 

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
			$comparison = $criteria->getComparison(MancomequPeer::ID);
			$selectCriteria->add(MancomequPeer::ID, $criteria->remove(MancomequPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MancomequPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MancomequPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Mancomequ) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MancomequPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Mancomequ $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MancomequPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MancomequPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MancomequPeer::DATABASE_NAME, MancomequPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MancomequPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MancomequPeer::DATABASE_NAME);

		$criteria->add(MancomequPeer::ID, $pk);


		$v = MancomequPeer::doSelect($criteria, $con);

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
			$criteria->add(MancomequPeer::ID, $pks, Criteria::IN);
			$objs = MancomequPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMancomequPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/MancomequMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.MancomequMapBuilder');
}
