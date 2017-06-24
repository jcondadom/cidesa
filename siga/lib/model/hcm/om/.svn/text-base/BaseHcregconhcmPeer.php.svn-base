<?php


abstract class BaseHcregconhcmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'hcregconhcm';

	
	const CLASS_DEFAULT = 'lib.model.hcm.Hcregconhcm';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'hcregconhcm.CODEMP';

	
	const CEDFAM = 'hcregconhcm.CEDFAM';

	
	const TIPHCM = 'hcregconhcm.TIPHCM';

	
	const RIFPRO = 'hcregconhcm.RIFPRO';

	
	const FECCON = 'hcregconhcm.FECCON';

	
	const MONCON = 'hcregconhcm.MONCON';

	
	const GENEOP = 'hcregconhcm.GENEOP';

	
	const NROFAC = 'hcregconhcm.NROFAC';

	
	const FECFAC = 'hcregconhcm.FECFAC';

	
	const FECRECFAC = 'hcregconhcm.FECRECFAC';

	
	const GENOP = 'hcregconhcm.GENOP';

	
	const TITPRO = 'hcregconhcm.TITPRO';

	
	const STATOP = 'hcregconhcm.STATOP';

	
	const LOGUSE = 'hcregconhcm.LOGUSE';

	
	const NUMORD = 'hcregconhcm.NUMORD';

	
	const ID = 'hcregconhcm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Cedfam', 'Tiphcm', 'Rifpro', 'Feccon', 'Moncon', 'Geneop', 'Nrofac', 'Fecfac', 'Fecrecfac', 'Genop', 'Titpro', 'Statop', 'Loguse', 'Numord', 'Id', ),
		BasePeer::TYPE_COLNAME => array (HcregconhcmPeer::CODEMP, HcregconhcmPeer::CEDFAM, HcregconhcmPeer::TIPHCM, HcregconhcmPeer::RIFPRO, HcregconhcmPeer::FECCON, HcregconhcmPeer::MONCON, HcregconhcmPeer::GENEOP, HcregconhcmPeer::NROFAC, HcregconhcmPeer::FECFAC, HcregconhcmPeer::FECRECFAC, HcregconhcmPeer::GENOP, HcregconhcmPeer::TITPRO, HcregconhcmPeer::STATOP, HcregconhcmPeer::LOGUSE, HcregconhcmPeer::NUMORD, HcregconhcmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'cedfam', 'tiphcm', 'rifpro', 'feccon', 'moncon', 'geneop', 'nrofac', 'fecfac', 'fecrecfac', 'genop', 'titpro', 'statop', 'loguse', 'numord', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Cedfam' => 1, 'Tiphcm' => 2, 'Rifpro' => 3, 'Feccon' => 4, 'Moncon' => 5, 'Geneop' => 6, 'Nrofac' => 7, 'Fecfac' => 8, 'Fecrecfac' => 9, 'Genop' => 10, 'Titpro' => 11, 'Statop' => 12, 'Loguse' => 13, 'Numord' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (HcregconhcmPeer::CODEMP => 0, HcregconhcmPeer::CEDFAM => 1, HcregconhcmPeer::TIPHCM => 2, HcregconhcmPeer::RIFPRO => 3, HcregconhcmPeer::FECCON => 4, HcregconhcmPeer::MONCON => 5, HcregconhcmPeer::GENEOP => 6, HcregconhcmPeer::NROFAC => 7, HcregconhcmPeer::FECFAC => 8, HcregconhcmPeer::FECRECFAC => 9, HcregconhcmPeer::GENOP => 10, HcregconhcmPeer::TITPRO => 11, HcregconhcmPeer::STATOP => 12, HcregconhcmPeer::LOGUSE => 13, HcregconhcmPeer::NUMORD => 14, HcregconhcmPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'cedfam' => 1, 'tiphcm' => 2, 'rifpro' => 3, 'feccon' => 4, 'moncon' => 5, 'geneop' => 6, 'nrofac' => 7, 'fecfac' => 8, 'fecrecfac' => 9, 'genop' => 10, 'titpro' => 11, 'statop' => 12, 'loguse' => 13, 'numord' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hcm/map/HcregconhcmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hcm.map.HcregconhcmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = HcregconhcmPeer::getTableMap();
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
		return str_replace(HcregconhcmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(HcregconhcmPeer::CODEMP);

		$criteria->addSelectColumn(HcregconhcmPeer::CEDFAM);

		$criteria->addSelectColumn(HcregconhcmPeer::TIPHCM);

		$criteria->addSelectColumn(HcregconhcmPeer::RIFPRO);

		$criteria->addSelectColumn(HcregconhcmPeer::FECCON);

		$criteria->addSelectColumn(HcregconhcmPeer::MONCON);

		$criteria->addSelectColumn(HcregconhcmPeer::GENEOP);

		$criteria->addSelectColumn(HcregconhcmPeer::NROFAC);

		$criteria->addSelectColumn(HcregconhcmPeer::FECFAC);

		$criteria->addSelectColumn(HcregconhcmPeer::FECRECFAC);

		$criteria->addSelectColumn(HcregconhcmPeer::GENOP);

		$criteria->addSelectColumn(HcregconhcmPeer::TITPRO);

		$criteria->addSelectColumn(HcregconhcmPeer::STATOP);

		$criteria->addSelectColumn(HcregconhcmPeer::LOGUSE);

		$criteria->addSelectColumn(HcregconhcmPeer::NUMORD);

		$criteria->addSelectColumn(HcregconhcmPeer::ID);

	}

	const COUNT = 'COUNT(hcregconhcm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT hcregconhcm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(HcregconhcmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(HcregconhcmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = HcregconhcmPeer::doSelectRS($criteria, $con);
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
		$objects = HcregconhcmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return HcregconhcmPeer::populateObjects(HcregconhcmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			HcregconhcmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = HcregconhcmPeer::getOMClass();
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
		return HcregconhcmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(HcregconhcmPeer::ID); 

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
			$comparison = $criteria->getComparison(HcregconhcmPeer::ID);
			$selectCriteria->add(HcregconhcmPeer::ID, $criteria->remove(HcregconhcmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(HcregconhcmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(HcregconhcmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Hcregconhcm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(HcregconhcmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Hcregconhcm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(HcregconhcmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(HcregconhcmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(HcregconhcmPeer::DATABASE_NAME, HcregconhcmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = HcregconhcmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(HcregconhcmPeer::DATABASE_NAME);

		$criteria->add(HcregconhcmPeer::ID, $pk);


		$v = HcregconhcmPeer::doSelect($criteria, $con);

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
			$criteria->add(HcregconhcmPeer::ID, $pks, Criteria::IN);
			$objs = HcregconhcmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseHcregconhcmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hcm/map/HcregconhcmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hcm.map.HcregconhcmMapBuilder');
}
