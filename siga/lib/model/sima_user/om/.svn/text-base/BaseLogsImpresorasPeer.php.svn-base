<?php


abstract class BaseLogsImpresorasPeer {

	
	const DATABASE_NAME = 'sima_user';

	
	const TABLE_NAME = 'logs_impresoras';

	
	const CLASS_DEFAULT = 'lib.model.sima_user.LogsImpresoras';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FACTURA_ID = 'logs_impresoras.FACTURA_ID';

	
	const NUMERO_FACTURA = 'logs_impresoras.NUMERO_FACTURA';

	
	const NUMERO_DEVOLUCION = 'logs_impresoras.NUMERO_DEVOLUCION';

	
	const ERROR = 'logs_impresoras.ERROR';

	
	const SERIAL_IMPRESORA = 'logs_impresoras.SERIAL_IMPRESORA';

	
	const FECHA = 'logs_impresoras.FECHA';

	
	const HORA = 'logs_impresoras.HORA';

	
	const CREATED_AT = 'logs_impresoras.CREATED_AT';

	
	const UPDATED_AT = 'logs_impresoras.UPDATED_AT';

	
	const ID = 'logs_impresoras.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FacturaId', 'NumeroFactura', 'NumeroDevolucion', 'Error', 'SerialImpresora', 'Fecha', 'Hora', 'CreatedAt', 'UpdatedAt', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LogsImpresorasPeer::FACTURA_ID, LogsImpresorasPeer::NUMERO_FACTURA, LogsImpresorasPeer::NUMERO_DEVOLUCION, LogsImpresorasPeer::ERROR, LogsImpresorasPeer::SERIAL_IMPRESORA, LogsImpresorasPeer::FECHA, LogsImpresorasPeer::HORA, LogsImpresorasPeer::CREATED_AT, LogsImpresorasPeer::UPDATED_AT, LogsImpresorasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('factura_id', 'numero_factura', 'numero_devolucion', 'error', 'serial_impresora', 'fecha', 'hora', 'created_at', 'updated_at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FacturaId' => 0, 'NumeroFactura' => 1, 'NumeroDevolucion' => 2, 'Error' => 3, 'SerialImpresora' => 4, 'Fecha' => 5, 'Hora' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (LogsImpresorasPeer::FACTURA_ID => 0, LogsImpresorasPeer::NUMERO_FACTURA => 1, LogsImpresorasPeer::NUMERO_DEVOLUCION => 2, LogsImpresorasPeer::ERROR => 3, LogsImpresorasPeer::SERIAL_IMPRESORA => 4, LogsImpresorasPeer::FECHA => 5, LogsImpresorasPeer::HORA => 6, LogsImpresorasPeer::CREATED_AT => 7, LogsImpresorasPeer::UPDATED_AT => 8, LogsImpresorasPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('factura_id' => 0, 'numero_factura' => 1, 'numero_devolucion' => 2, 'error' => 3, 'serial_impresora' => 4, 'fecha' => 5, 'hora' => 6, 'created_at' => 7, 'updated_at' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/sima_user/map/LogsImpresorasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.sima_user.map.LogsImpresorasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LogsImpresorasPeer::getTableMap();
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
		return str_replace(LogsImpresorasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LogsImpresorasPeer::FACTURA_ID);

		$criteria->addSelectColumn(LogsImpresorasPeer::NUMERO_FACTURA);

		$criteria->addSelectColumn(LogsImpresorasPeer::NUMERO_DEVOLUCION);

		$criteria->addSelectColumn(LogsImpresorasPeer::ERROR);

		$criteria->addSelectColumn(LogsImpresorasPeer::SERIAL_IMPRESORA);

		$criteria->addSelectColumn(LogsImpresorasPeer::FECHA);

		$criteria->addSelectColumn(LogsImpresorasPeer::HORA);

		$criteria->addSelectColumn(LogsImpresorasPeer::CREATED_AT);

		$criteria->addSelectColumn(LogsImpresorasPeer::UPDATED_AT);

		$criteria->addSelectColumn(LogsImpresorasPeer::ID);

	}

	const COUNT = 'COUNT(logs_impresoras.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT logs_impresoras.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LogsImpresorasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LogsImpresorasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LogsImpresorasPeer::doSelectRS($criteria, $con);
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
		$objects = LogsImpresorasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LogsImpresorasPeer::populateObjects(LogsImpresorasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LogsImpresorasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LogsImpresorasPeer::getOMClass();
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
		return LogsImpresorasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LogsImpresorasPeer::ID); 

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
			$comparison = $criteria->getComparison(LogsImpresorasPeer::ID);
			$selectCriteria->add(LogsImpresorasPeer::ID, $criteria->remove(LogsImpresorasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LogsImpresorasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LogsImpresorasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LogsImpresoras) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LogsImpresorasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LogsImpresoras $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LogsImpresorasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LogsImpresorasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LogsImpresorasPeer::DATABASE_NAME, LogsImpresorasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LogsImpresorasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LogsImpresorasPeer::DATABASE_NAME);

		$criteria->add(LogsImpresorasPeer::ID, $pk);


		$v = LogsImpresorasPeer::doSelect($criteria, $con);

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
			$criteria->add(LogsImpresorasPeer::ID, $pks, Criteria::IN);
			$objs = LogsImpresorasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLogsImpresorasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/sima_user/map/LogsImpresorasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.sima_user.map.LogsImpresorasMapBuilder');
}
