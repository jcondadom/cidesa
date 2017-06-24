<?php


abstract class BasesfGuardUserProfilePeer {

	
	const DATABASE_NAME = 'sima_user';

	
	const TABLE_NAME = 'sf_guard_user_profile';

	
	const CLASS_DEFAULT = 'plugins.sfGuardPlugin.lib.model.sfGuardUserProfile';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const USER_ID = 'sf_guard_user_profile.USER_ID';

	
	const EMAIL = 'sf_guard_user_profile.EMAIL';

	
	const INFORMATION = 'sf_guard_user_profile.INFORMATION';

	
	const FULLNAME = 'sf_guard_user_profile.FULLNAME';

	
	const INSTITUTION = 'sf_guard_user_profile.INSTITUTION';

	
	const PAIS = 'sf_guard_user_profile.PAIS';

	
	const COMENTARIO = 'sf_guard_user_profile.COMENTARIO';

	
	const TIPO = 'sf_guard_user_profile.TIPO';

	
	const VALIDATE = 'sf_guard_user_profile.VALIDATE';

	
	const ID = 'sf_guard_user_profile.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('UserId', 'Email', 'Information', 'Fullname', 'Institution', 'Pais', 'Comentario', 'Tipo', 'Validate', 'Id', ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::USER_ID, sfGuardUserProfilePeer::EMAIL, sfGuardUserProfilePeer::INFORMATION, sfGuardUserProfilePeer::FULLNAME, sfGuardUserProfilePeer::INSTITUTION, sfGuardUserProfilePeer::PAIS, sfGuardUserProfilePeer::COMENTARIO, sfGuardUserProfilePeer::TIPO, sfGuardUserProfilePeer::VALIDATE, sfGuardUserProfilePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id', 'email', 'information', 'fullname', 'institution', 'pais', 'comentario', 'tipo', 'validate', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('UserId' => 0, 'Email' => 1, 'Information' => 2, 'Fullname' => 3, 'Institution' => 4, 'Pais' => 5, 'Comentario' => 6, 'Tipo' => 7, 'Validate' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserProfilePeer::USER_ID => 0, sfGuardUserProfilePeer::EMAIL => 1, sfGuardUserProfilePeer::INFORMATION => 2, sfGuardUserProfilePeer::FULLNAME => 3, sfGuardUserProfilePeer::INSTITUTION => 4, sfGuardUserProfilePeer::PAIS => 5, sfGuardUserProfilePeer::COMENTARIO => 6, sfGuardUserProfilePeer::TIPO => 7, sfGuardUserProfilePeer::VALIDATE => 8, sfGuardUserProfilePeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id' => 0, 'email' => 1, 'information' => 2, 'fullname' => 3, 'institution' => 4, 'pais' => 5, 'comentario' => 6, 'tipo' => 7, 'validate' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardUserProfileMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardUserProfileMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardUserProfilePeer::getTableMap();
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
		return str_replace(sfGuardUserProfilePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardUserProfilePeer::USER_ID);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::EMAIL);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::INFORMATION);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::FULLNAME);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::INSTITUTION);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::PAIS);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::COMENTARIO);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::TIPO);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::VALIDATE);

		$criteria->addSelectColumn(sfGuardUserProfilePeer::ID);

	}

	const COUNT = 'COUNT(sf_guard_user_profile.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user_profile.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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
		$objects = sfGuardUserProfilePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardUserProfilePeer::populateObjects(sfGuardUserProfilePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardUserProfilePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardUserProfilePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);

		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addsfGuardUserProfile($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUserProfiles();
				$obj2->addsfGuardUserProfile($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserProfilePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
	
		$rs = sfGuardUserProfilePeer::doSelectRS($criteria, $con);
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

		sfGuardUserProfilePeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserProfilePeer::NUM_COLUMNS - sfGuardUserProfilePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			sfGuardUserPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;
	
			$c->addJoin(sfGuardUserProfilePeer::USER_ID, sfGuardUserPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserProfilePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = sfGuardUserPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getsfGuardUser(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addsfGuardUserProfile($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initsfGuardUserProfiles();
					$obj2->addsfGuardUserProfile($obj1);
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
		return sfGuardUserProfilePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(sfGuardUserProfilePeer::ID); 

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
			$comparison = $criteria->getComparison(sfGuardUserProfilePeer::ID);
			$selectCriteria->add(sfGuardUserProfilePeer::ID, $criteria->remove(sfGuardUserProfilePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(sfGuardUserProfilePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardUserProfile) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardUserProfilePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfGuardUserProfile $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardUserProfilePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardUserProfilePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfGuardUserProfilePeer::DATABASE_NAME, sfGuardUserProfilePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardUserProfilePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $pk);


		$v = sfGuardUserProfilePeer::doSelect($criteria, $con);

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
			$criteria->add(sfGuardUserProfilePeer::ID, $pks, Criteria::IN);
			$objs = sfGuardUserProfilePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfGuardUserProfilePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardUserProfileMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardUserProfileMapBuilder');
}
