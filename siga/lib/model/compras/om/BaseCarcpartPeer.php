<?php


abstract class BaseCarcpartPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'carcpart';

	
	const CLASS_DEFAULT = 'lib.model.compras.Carcpart';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const RCPART = 'carcpart.RCPART';

	
	const FECRCP = 'carcpart.FECRCP';

	
	const ORDCOM = 'carcpart.ORDCOM';

	
	const DESRCP = 'carcpart.DESRCP';

	
	const CODPRO = 'carcpart.CODPRO';

	
	const NUMFAC = 'carcpart.NUMFAC';

	
	const MONRCP = 'carcpart.MONRCP';

	
	const STARCP = 'carcpart.STARCP';

	
	const NUMCOM = 'carcpart.NUMCOM';

	
	const NUMORD = 'carcpart.NUMORD';

	
	const CODALM = 'carcpart.CODALM';

	
	const CTRPER = 'carcpart.CTRPER';

	
	const GENORD = 'carcpart.GENORD';

	
	const NROENT = 'carcpart.NROENT';

	
	const FECFAC = 'carcpart.FECFAC';

	
	const CODUBI = 'carcpart.CODUBI';

	
	const NOMCLI = 'carcpart.NOMCLI';

	
	const CANCAJ = 'carcpart.CANCAJ';

	
	const CANJAU = 'carcpart.CANJAU';

	
	const CODCEN = 'carcpart.CODCEN';

	
	const CODDIREC = 'carcpart.CODDIREC';

	
	const ID = 'carcpart.ID';

	
	const CODALMUSU = 'carcpart.CODALMUSU';

	
	const CREATED_AT = 'carcpart.CREATED_AT';

	
	const UPDATED_AT = 'carcpart.UPDATED_AT';

	
	const CREATED_BY_USER = 'carcpart.CREATED_BY_USER';

	
	const UPDATED_BY_USER = 'carcpart.UPDATED_BY_USER';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart', 'Fecrcp', 'Ordcom', 'Desrcp', 'Codpro', 'Numfac', 'Monrcp', 'Starcp', 'Numcom', 'Numord', 'Codalm', 'Ctrper', 'Genord', 'Nroent', 'Fecfac', 'Codubi', 'Nomcli', 'Cancaj', 'Canjau', 'Codcen', 'Coddirec', 'Id', 'Codalmusu', 'CreatedAt', 'UpdatedAt', 'CreatedByUser', 'UpdatedByUser', ),
		BasePeer::TYPE_COLNAME => array (CarcpartPeer::RCPART, CarcpartPeer::FECRCP, CarcpartPeer::ORDCOM, CarcpartPeer::DESRCP, CarcpartPeer::CODPRO, CarcpartPeer::NUMFAC, CarcpartPeer::MONRCP, CarcpartPeer::STARCP, CarcpartPeer::NUMCOM, CarcpartPeer::NUMORD, CarcpartPeer::CODALM, CarcpartPeer::CTRPER, CarcpartPeer::GENORD, CarcpartPeer::NROENT, CarcpartPeer::FECFAC, CarcpartPeer::CODUBI, CarcpartPeer::NOMCLI, CarcpartPeer::CANCAJ, CarcpartPeer::CANJAU, CarcpartPeer::CODCEN, CarcpartPeer::CODDIREC, CarcpartPeer::ID, CarcpartPeer::CODALMUSU, CarcpartPeer::CREATED_AT, CarcpartPeer::UPDATED_AT, CarcpartPeer::CREATED_BY_USER, CarcpartPeer::UPDATED_BY_USER, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart', 'fecrcp', 'ordcom', 'desrcp', 'codpro', 'numfac', 'monrcp', 'starcp', 'numcom', 'numord', 'codalm', 'ctrper', 'genord', 'nroent', 'fecfac', 'codubi', 'nomcli', 'cancaj', 'canjau', 'codcen', 'coddirec', 'id', 'codalmusu', 'created_at', 'updated_at', 'created_by_user', 'updated_by_user', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Rcpart' => 0, 'Fecrcp' => 1, 'Ordcom' => 2, 'Desrcp' => 3, 'Codpro' => 4, 'Numfac' => 5, 'Monrcp' => 6, 'Starcp' => 7, 'Numcom' => 8, 'Numord' => 9, 'Codalm' => 10, 'Ctrper' => 11, 'Genord' => 12, 'Nroent' => 13, 'Fecfac' => 14, 'Codubi' => 15, 'Nomcli' => 16, 'Cancaj' => 17, 'Canjau' => 18, 'Codcen' => 19, 'Coddirec' => 20, 'Id' => 21, 'Codalmusu' => 22, 'CreatedAt' => 23, 'UpdatedAt' => 24, 'CreatedByUser' => 25, 'UpdatedByUser' => 26, ),
		BasePeer::TYPE_COLNAME => array (CarcpartPeer::RCPART => 0, CarcpartPeer::FECRCP => 1, CarcpartPeer::ORDCOM => 2, CarcpartPeer::DESRCP => 3, CarcpartPeer::CODPRO => 4, CarcpartPeer::NUMFAC => 5, CarcpartPeer::MONRCP => 6, CarcpartPeer::STARCP => 7, CarcpartPeer::NUMCOM => 8, CarcpartPeer::NUMORD => 9, CarcpartPeer::CODALM => 10, CarcpartPeer::CTRPER => 11, CarcpartPeer::GENORD => 12, CarcpartPeer::NROENT => 13, CarcpartPeer::FECFAC => 14, CarcpartPeer::CODUBI => 15, CarcpartPeer::NOMCLI => 16, CarcpartPeer::CANCAJ => 17, CarcpartPeer::CANJAU => 18, CarcpartPeer::CODCEN => 19, CarcpartPeer::CODDIREC => 20, CarcpartPeer::ID => 21, CarcpartPeer::CODALMUSU => 22, CarcpartPeer::CREATED_AT => 23, CarcpartPeer::UPDATED_AT => 24, CarcpartPeer::CREATED_BY_USER => 25, CarcpartPeer::UPDATED_BY_USER => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('rcpart' => 0, 'fecrcp' => 1, 'ordcom' => 2, 'desrcp' => 3, 'codpro' => 4, 'numfac' => 5, 'monrcp' => 6, 'starcp' => 7, 'numcom' => 8, 'numord' => 9, 'codalm' => 10, 'ctrper' => 11, 'genord' => 12, 'nroent' => 13, 'fecfac' => 14, 'codubi' => 15, 'nomcli' => 16, 'cancaj' => 17, 'canjau' => 18, 'codcen' => 19, 'coddirec' => 20, 'id' => 21, 'codalmusu' => 22, 'created_at' => 23, 'updated_at' => 24, 'created_by_user' => 25, 'updated_by_user' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/compras/map/CarcpartMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.compras.map.CarcpartMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CarcpartPeer::getTableMap();
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
		return str_replace(CarcpartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CarcpartPeer::RCPART);

		$criteria->addSelectColumn(CarcpartPeer::FECRCP);

		$criteria->addSelectColumn(CarcpartPeer::ORDCOM);

		$criteria->addSelectColumn(CarcpartPeer::DESRCP);

		$criteria->addSelectColumn(CarcpartPeer::CODPRO);

		$criteria->addSelectColumn(CarcpartPeer::NUMFAC);

		$criteria->addSelectColumn(CarcpartPeer::MONRCP);

		$criteria->addSelectColumn(CarcpartPeer::STARCP);

		$criteria->addSelectColumn(CarcpartPeer::NUMCOM);

		$criteria->addSelectColumn(CarcpartPeer::NUMORD);

		$criteria->addSelectColumn(CarcpartPeer::CODALM);

		$criteria->addSelectColumn(CarcpartPeer::CTRPER);

		$criteria->addSelectColumn(CarcpartPeer::GENORD);

		$criteria->addSelectColumn(CarcpartPeer::NROENT);

		$criteria->addSelectColumn(CarcpartPeer::FECFAC);

		$criteria->addSelectColumn(CarcpartPeer::CODUBI);

		$criteria->addSelectColumn(CarcpartPeer::NOMCLI);

		$criteria->addSelectColumn(CarcpartPeer::CANCAJ);

		$criteria->addSelectColumn(CarcpartPeer::CANJAU);

		$criteria->addSelectColumn(CarcpartPeer::CODCEN);

		$criteria->addSelectColumn(CarcpartPeer::CODDIREC);

		$criteria->addSelectColumn(CarcpartPeer::ID);

		$criteria->addSelectColumn(CarcpartPeer::CODALMUSU);

		$criteria->addSelectColumn(CarcpartPeer::CREATED_AT);

		$criteria->addSelectColumn(CarcpartPeer::UPDATED_AT);

		$criteria->addSelectColumn(CarcpartPeer::CREATED_BY_USER);

		$criteria->addSelectColumn(CarcpartPeer::UPDATED_BY_USER);

	}

	const COUNT = 'COUNT(carcpart.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT carcpart.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarcpartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarcpartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CarcpartPeer::doSelectRS($criteria, $con);
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
		$objects = CarcpartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CarcpartPeer::populateObjects(CarcpartPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CarcpartPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CarcpartPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCadefalm(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarcpartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarcpartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CarcpartPeer::CODALMUSU, CadefalmPeer::CODALM);

		$rs = CarcpartPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCadefalm(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CarcpartPeer::addSelectColumns($c);
		$startcol = (CarcpartPeer::NUM_COLUMNS - CarcpartPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CadefalmPeer::addSelectColumns($c);

		$c->addJoin(CarcpartPeer::CODALMUSU, CadefalmPeer::CODALM);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CarcpartPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CadefalmPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCadefalm(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCarcpart($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCarcparts();
				$obj2->addCarcpart($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CarcpartPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CarcpartPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CarcpartPeer::CODALMUSU, CadefalmPeer::CODALM);
	
		$rs = CarcpartPeer::doSelectRS($criteria, $con);
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

		CarcpartPeer::addSelectColumns($c);
		$startcol2 = (CarcpartPeer::NUM_COLUMNS - CarcpartPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CadefalmPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CadefalmPeer::NUM_COLUMNS;
	
			$c->addJoin(CarcpartPeer::CODALMUSU, CadefalmPeer::CODALM);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CarcpartPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CadefalmPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCadefalm(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCarcpart($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCarcparts();
					$obj2->addCarcpart($obj1);
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
		return CarcpartPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CarcpartPeer::ID); 

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
			$comparison = $criteria->getComparison(CarcpartPeer::ID);
			$selectCriteria->add(CarcpartPeer::ID, $criteria->remove(CarcpartPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CarcpartPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CarcpartPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Carcpart) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CarcpartPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Carcpart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CarcpartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CarcpartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CarcpartPeer::DATABASE_NAME, CarcpartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CarcpartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CarcpartPeer::DATABASE_NAME);

		$criteria->add(CarcpartPeer::ID, $pk);


		$v = CarcpartPeer::doSelect($criteria, $con);

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
			$criteria->add(CarcpartPeer::ID, $pks, Criteria::IN);
			$objs = CarcpartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCarcpartPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/compras/map/CarcpartMapBuilder.php';
	Propel::registerMapBuilder('lib.model.compras.map.CarcpartMapBuilder');
}
