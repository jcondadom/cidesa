<?php


abstract class BaseNpinctraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinctra';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npinctra';

	
	const NUM_COLUMNS = 27;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPREG = 'npinctra.TIPREG';

	
	const CODPRO = 'npinctra.CODPRO';

	
	const RIFEMP = 'npinctra.RIFEMP';

	
	const NOMEMP = 'npinctra.NOMEMP';

	
	const URBANI = 'npinctra.URBANI';

	
	const AVENID = 'npinctra.AVENID';

	
	const CONJUN = 'npinctra.CONJUN';

	
	const NUMERO = 'npinctra.NUMERO';

	
	const CIUDAD = 'npinctra.CIUDAD';

	
	const ESTADO = 'npinctra.ESTADO';

	
	const PAIS = 'npinctra.PAIS';

	
	const TELEFONO = 'npinctra.TELEFONO';

	
	const FAX = 'npinctra.FAX';

	
	const INTERNET = 'npinctra.INTERNET';

	
	const FRENOMOBR = 'npinctra.FRENOMOBR';

	
	const FACINGOBR = 'npinctra.FACINGOBR';

	
	const FRENOMEMP = 'npinctra.FRENOMEMP';

	
	const FACINGEMP = 'npinctra.FACINGEMP';

	
	const FRENOMEJE = 'npinctra.FRENOMEJE';

	
	const FACINGEJE = 'npinctra.FACINGEJE';

	
	const FRENOMCON = 'npinctra.FRENOMCON';

	
	const FACINGCON = 'npinctra.FACINGCON';

	
	const TIPCUEN = 'npinctra.TIPCUEN';

	
	const NUMCUE = 'npinctra.NUMCUE';

	
	const ZONPOS = 'npinctra.ZONPOS';

	
	const FILLER = 'npinctra.FILLER';

	
	const ID = 'npinctra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tipreg', 'Codpro', 'Rifemp', 'Nomemp', 'Urbani', 'Avenid', 'Conjun', 'Numero', 'Ciudad', 'Estado', 'Pais', 'Telefono', 'Fax', 'Internet', 'Frenomobr', 'Facingobr', 'Frenomemp', 'Facingemp', 'Frenomeje', 'Facingeje', 'Frenomcon', 'Facingcon', 'Tipcuen', 'Numcue', 'Zonpos', 'Filler', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinctraPeer::TIPREG, NpinctraPeer::CODPRO, NpinctraPeer::RIFEMP, NpinctraPeer::NOMEMP, NpinctraPeer::URBANI, NpinctraPeer::AVENID, NpinctraPeer::CONJUN, NpinctraPeer::NUMERO, NpinctraPeer::CIUDAD, NpinctraPeer::ESTADO, NpinctraPeer::PAIS, NpinctraPeer::TELEFONO, NpinctraPeer::FAX, NpinctraPeer::INTERNET, NpinctraPeer::FRENOMOBR, NpinctraPeer::FACINGOBR, NpinctraPeer::FRENOMEMP, NpinctraPeer::FACINGEMP, NpinctraPeer::FRENOMEJE, NpinctraPeer::FACINGEJE, NpinctraPeer::FRENOMCON, NpinctraPeer::FACINGCON, NpinctraPeer::TIPCUEN, NpinctraPeer::NUMCUE, NpinctraPeer::ZONPOS, NpinctraPeer::FILLER, NpinctraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tipreg', 'codpro', 'rifemp', 'nomemp', 'urbani', 'avenid', 'conjun', 'numero', 'ciudad', 'estado', 'pais', 'telefono', 'fax', 'internet', 'frenomobr', 'facingobr', 'frenomemp', 'facingemp', 'frenomeje', 'facingeje', 'frenomcon', 'facingcon', 'tipcuen', 'numcue', 'zonpos', 'filler', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tipreg' => 0, 'Codpro' => 1, 'Rifemp' => 2, 'Nomemp' => 3, 'Urbani' => 4, 'Avenid' => 5, 'Conjun' => 6, 'Numero' => 7, 'Ciudad' => 8, 'Estado' => 9, 'Pais' => 10, 'Telefono' => 11, 'Fax' => 12, 'Internet' => 13, 'Frenomobr' => 14, 'Facingobr' => 15, 'Frenomemp' => 16, 'Facingemp' => 17, 'Frenomeje' => 18, 'Facingeje' => 19, 'Frenomcon' => 20, 'Facingcon' => 21, 'Tipcuen' => 22, 'Numcue' => 23, 'Zonpos' => 24, 'Filler' => 25, 'Id' => 26, ),
		BasePeer::TYPE_COLNAME => array (NpinctraPeer::TIPREG => 0, NpinctraPeer::CODPRO => 1, NpinctraPeer::RIFEMP => 2, NpinctraPeer::NOMEMP => 3, NpinctraPeer::URBANI => 4, NpinctraPeer::AVENID => 5, NpinctraPeer::CONJUN => 6, NpinctraPeer::NUMERO => 7, NpinctraPeer::CIUDAD => 8, NpinctraPeer::ESTADO => 9, NpinctraPeer::PAIS => 10, NpinctraPeer::TELEFONO => 11, NpinctraPeer::FAX => 12, NpinctraPeer::INTERNET => 13, NpinctraPeer::FRENOMOBR => 14, NpinctraPeer::FACINGOBR => 15, NpinctraPeer::FRENOMEMP => 16, NpinctraPeer::FACINGEMP => 17, NpinctraPeer::FRENOMEJE => 18, NpinctraPeer::FACINGEJE => 19, NpinctraPeer::FRENOMCON => 20, NpinctraPeer::FACINGCON => 21, NpinctraPeer::TIPCUEN => 22, NpinctraPeer::NUMCUE => 23, NpinctraPeer::ZONPOS => 24, NpinctraPeer::FILLER => 25, NpinctraPeer::ID => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('tipreg' => 0, 'codpro' => 1, 'rifemp' => 2, 'nomemp' => 3, 'urbani' => 4, 'avenid' => 5, 'conjun' => 6, 'numero' => 7, 'ciudad' => 8, 'estado' => 9, 'pais' => 10, 'telefono' => 11, 'fax' => 12, 'internet' => 13, 'frenomobr' => 14, 'facingobr' => 15, 'frenomemp' => 16, 'facingemp' => 17, 'frenomeje' => 18, 'facingeje' => 19, 'frenomcon' => 20, 'facingcon' => 21, 'tipcuen' => 22, 'numcue' => 23, 'zonpos' => 24, 'filler' => 25, 'id' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinctraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinctraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinctraPeer::getTableMap();
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
		return str_replace(NpinctraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinctraPeer::TIPREG);

		$criteria->addSelectColumn(NpinctraPeer::CODPRO);

		$criteria->addSelectColumn(NpinctraPeer::RIFEMP);

		$criteria->addSelectColumn(NpinctraPeer::NOMEMP);

		$criteria->addSelectColumn(NpinctraPeer::URBANI);

		$criteria->addSelectColumn(NpinctraPeer::AVENID);

		$criteria->addSelectColumn(NpinctraPeer::CONJUN);

		$criteria->addSelectColumn(NpinctraPeer::NUMERO);

		$criteria->addSelectColumn(NpinctraPeer::CIUDAD);

		$criteria->addSelectColumn(NpinctraPeer::ESTADO);

		$criteria->addSelectColumn(NpinctraPeer::PAIS);

		$criteria->addSelectColumn(NpinctraPeer::TELEFONO);

		$criteria->addSelectColumn(NpinctraPeer::FAX);

		$criteria->addSelectColumn(NpinctraPeer::INTERNET);

		$criteria->addSelectColumn(NpinctraPeer::FRENOMOBR);

		$criteria->addSelectColumn(NpinctraPeer::FACINGOBR);

		$criteria->addSelectColumn(NpinctraPeer::FRENOMEMP);

		$criteria->addSelectColumn(NpinctraPeer::FACINGEMP);

		$criteria->addSelectColumn(NpinctraPeer::FRENOMEJE);

		$criteria->addSelectColumn(NpinctraPeer::FACINGEJE);

		$criteria->addSelectColumn(NpinctraPeer::FRENOMCON);

		$criteria->addSelectColumn(NpinctraPeer::FACINGCON);

		$criteria->addSelectColumn(NpinctraPeer::TIPCUEN);

		$criteria->addSelectColumn(NpinctraPeer::NUMCUE);

		$criteria->addSelectColumn(NpinctraPeer::ZONPOS);

		$criteria->addSelectColumn(NpinctraPeer::FILLER);

		$criteria->addSelectColumn(NpinctraPeer::ID);

	}

	const COUNT = 'COUNT(npinctra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinctra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinctraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinctraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinctraPeer::doSelectRS($criteria, $con);
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
		$objects = NpinctraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinctraPeer::populateObjects(NpinctraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinctraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinctraPeer::getOMClass();
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
		return NpinctraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinctraPeer::ID); 

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
			$comparison = $criteria->getComparison(NpinctraPeer::ID);
			$selectCriteria->add(NpinctraPeer::ID, $criteria->remove(NpinctraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinctraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinctraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinctra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinctraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinctra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinctraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinctraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinctraPeer::DATABASE_NAME, NpinctraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinctraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinctraPeer::DATABASE_NAME);

		$criteria->add(NpinctraPeer::ID, $pk);


		$v = NpinctraPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinctraPeer::ID, $pks, Criteria::IN);
			$objs = NpinctraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinctraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinctraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinctraMapBuilder');
}
