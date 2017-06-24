<?php


abstract class BaseMancomordPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mancomord';

	
	const CLASS_DEFAULT = 'lib.model.mantenimiento.Mancomord';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'mancomord.NUMORD';

	
	const NUMEQU = 'mancomord.NUMEQU';

	
	const CODCOM = 'mancomord.CODCOM';

	
	const DESCOM = 'mancomord.DESCOM';

	
	const CODTCO = 'mancomord.CODTCO';

	
	const NUMPAR = 'mancomord.NUMPAR';

	
	const NUMSER = 'mancomord.NUMSER';

	
	const POSICI = 'mancomord.POSICI';

	
	const TIEACU = 'mancomord.TIEACU';

	
	const INSPOR = 'mancomord.INSPOR';

	
	const FECINS = 'mancomord.FECINS';

	
	const VIDEST = 'mancomord.VIDEST';

	
	const VIDACT = 'mancomord.VIDACT';

	
	const FECREE = 'mancomord.FECREE';

	
	const ID = 'mancomord.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Numequ', 'Codcom', 'Descom', 'Codtco', 'Numpar', 'Numser', 'Posici', 'Tieacu', 'Inspor', 'Fecins', 'Videst', 'Vidact', 'Fecree', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MancomordPeer::NUMORD, MancomordPeer::NUMEQU, MancomordPeer::CODCOM, MancomordPeer::DESCOM, MancomordPeer::CODTCO, MancomordPeer::NUMPAR, MancomordPeer::NUMSER, MancomordPeer::POSICI, MancomordPeer::TIEACU, MancomordPeer::INSPOR, MancomordPeer::FECINS, MancomordPeer::VIDEST, MancomordPeer::VIDACT, MancomordPeer::FECREE, MancomordPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'numequ', 'codcom', 'descom', 'codtco', 'numpar', 'numser', 'posici', 'tieacu', 'inspor', 'fecins', 'videst', 'vidact', 'fecree', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Numequ' => 1, 'Codcom' => 2, 'Descom' => 3, 'Codtco' => 4, 'Numpar' => 5, 'Numser' => 6, 'Posici' => 7, 'Tieacu' => 8, 'Inspor' => 9, 'Fecins' => 10, 'Videst' => 11, 'Vidact' => 12, 'Fecree' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (MancomordPeer::NUMORD => 0, MancomordPeer::NUMEQU => 1, MancomordPeer::CODCOM => 2, MancomordPeer::DESCOM => 3, MancomordPeer::CODTCO => 4, MancomordPeer::NUMPAR => 5, MancomordPeer::NUMSER => 6, MancomordPeer::POSICI => 7, MancomordPeer::TIEACU => 8, MancomordPeer::INSPOR => 9, MancomordPeer::FECINS => 10, MancomordPeer::VIDEST => 11, MancomordPeer::VIDACT => 12, MancomordPeer::FECREE => 13, MancomordPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'numequ' => 1, 'codcom' => 2, 'descom' => 3, 'codtco' => 4, 'numpar' => 5, 'numser' => 6, 'posici' => 7, 'tieacu' => 8, 'inspor' => 9, 'fecins' => 10, 'videst' => 11, 'vidact' => 12, 'fecree' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/mantenimiento/map/MancomordMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.mantenimiento.map.MancomordMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MancomordPeer::getTableMap();
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
		return str_replace(MancomordPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MancomordPeer::NUMORD);

		$criteria->addSelectColumn(MancomordPeer::NUMEQU);

		$criteria->addSelectColumn(MancomordPeer::CODCOM);

		$criteria->addSelectColumn(MancomordPeer::DESCOM);

		$criteria->addSelectColumn(MancomordPeer::CODTCO);

		$criteria->addSelectColumn(MancomordPeer::NUMPAR);

		$criteria->addSelectColumn(MancomordPeer::NUMSER);

		$criteria->addSelectColumn(MancomordPeer::POSICI);

		$criteria->addSelectColumn(MancomordPeer::TIEACU);

		$criteria->addSelectColumn(MancomordPeer::INSPOR);

		$criteria->addSelectColumn(MancomordPeer::FECINS);

		$criteria->addSelectColumn(MancomordPeer::VIDEST);

		$criteria->addSelectColumn(MancomordPeer::VIDACT);

		$criteria->addSelectColumn(MancomordPeer::FECREE);

		$criteria->addSelectColumn(MancomordPeer::ID);

	}

	const COUNT = 'COUNT(mancomord.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mancomord.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MancomordPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MancomordPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MancomordPeer::doSelectRS($criteria, $con);
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
		$objects = MancomordPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MancomordPeer::populateObjects(MancomordPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MancomordPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MancomordPeer::getOMClass();
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
		return MancomordPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(MancomordPeer::ID); 

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
			$comparison = $criteria->getComparison(MancomordPeer::ID);
			$selectCriteria->add(MancomordPeer::ID, $criteria->remove(MancomordPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(MancomordPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MancomordPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Mancomord) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MancomordPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Mancomord $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MancomordPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MancomordPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MancomordPeer::DATABASE_NAME, MancomordPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MancomordPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MancomordPeer::DATABASE_NAME);

		$criteria->add(MancomordPeer::ID, $pk);


		$v = MancomordPeer::doSelect($criteria, $con);

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
			$criteria->add(MancomordPeer::ID, $pks, Criteria::IN);
			$objs = MancomordPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMancomordPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/mantenimiento/map/MancomordMapBuilder.php';
	Propel::registerMapBuilder('lib.model.mantenimiento.map.MancomordMapBuilder');
}
