<?php


abstract class BaseCuentaxcobrarClientesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cuentaxcobrar_clientes';

	
	const CLASS_DEFAULT = 'lib.model.CuentaxcobrarClientes';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCLIENTE = 'cuentaxcobrar_clientes.CODCLIENTE';

	
	const CLIENTE = 'cuentaxcobrar_clientes.CLIENTE';

	
	const CUENTAXCOBRAR = 'cuentaxcobrar_clientes.CUENTAXCOBRAR';

	
	const ID = 'cuentaxcobrar_clientes.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcliente', 'Cliente', 'Cuentaxcobrar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CuentaxcobrarClientesPeer::CODCLIENTE, CuentaxcobrarClientesPeer::CLIENTE, CuentaxcobrarClientesPeer::CUENTAXCOBRAR, CuentaxcobrarClientesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcliente', 'cliente', 'cuentaxcobrar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcliente' => 0, 'Cliente' => 1, 'Cuentaxcobrar' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (CuentaxcobrarClientesPeer::CODCLIENTE => 0, CuentaxcobrarClientesPeer::CLIENTE => 1, CuentaxcobrarClientesPeer::CUENTAXCOBRAR => 2, CuentaxcobrarClientesPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('codcliente' => 0, 'cliente' => 1, 'cuentaxcobrar' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CuentaxcobrarClientesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CuentaxcobrarClientesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CuentaxcobrarClientesPeer::getTableMap();
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
		return str_replace(CuentaxcobrarClientesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CuentaxcobrarClientesPeer::CODCLIENTE);

		$criteria->addSelectColumn(CuentaxcobrarClientesPeer::CLIENTE);

		$criteria->addSelectColumn(CuentaxcobrarClientesPeer::CUENTAXCOBRAR);

		$criteria->addSelectColumn(CuentaxcobrarClientesPeer::ID);

	}

	const COUNT = 'COUNT(cuentaxcobrar_clientes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cuentaxcobrar_clientes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaxcobrarClientesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaxcobrarClientesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CuentaxcobrarClientesPeer::doSelectRS($criteria, $con);
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
		$objects = CuentaxcobrarClientesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CuentaxcobrarClientesPeer::populateObjects(CuentaxcobrarClientesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CuentaxcobrarClientesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CuentaxcobrarClientesPeer::getOMClass();
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
		return CuentaxcobrarClientesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CuentaxcobrarClientesPeer::ID); 

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
			$comparison = $criteria->getComparison(CuentaxcobrarClientesPeer::ID);
			$selectCriteria->add(CuentaxcobrarClientesPeer::ID, $criteria->remove(CuentaxcobrarClientesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CuentaxcobrarClientesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CuentaxcobrarClientesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CuentaxcobrarClientes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CuentaxcobrarClientesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CuentaxcobrarClientes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CuentaxcobrarClientesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CuentaxcobrarClientesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CuentaxcobrarClientesPeer::DATABASE_NAME, CuentaxcobrarClientesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CuentaxcobrarClientesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CuentaxcobrarClientesPeer::DATABASE_NAME);

		$criteria->add(CuentaxcobrarClientesPeer::ID, $pk);


		$v = CuentaxcobrarClientesPeer::doSelect($criteria, $con);

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
			$criteria->add(CuentaxcobrarClientesPeer::ID, $pks, Criteria::IN);
			$objs = CuentaxcobrarClientesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCuentaxcobrarClientesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CuentaxcobrarClientesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CuentaxcobrarClientesMapBuilder');
}
