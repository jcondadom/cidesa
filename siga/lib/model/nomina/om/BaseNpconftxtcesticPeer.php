<?php


abstract class BaseNpconftxtcesticPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npconftxtcestic';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npconftxtcestic';

	
	const NUM_COLUMNS = 110;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const TIPTXT = 'npconftxtcestic.TIPTXT';

	
	const INITIPRE1 = 'npconftxtcestic.INITIPRE1';

	
	const LONTIPRE1 = 'npconftxtcestic.LONTIPRE1';

	
	const INITIPDO1 = 'npconftxtcestic.INITIPDO1';

	
	const LONTIPDO1 = 'npconftxtcestic.LONTIPDO1';

	
	const INIIDEEMP = 'npconftxtcestic.INIIDEEMP';

	
	const LONIDEEMP = 'npconftxtcestic.LONIDEEMP';

	
	const ININUMLO1 = 'npconftxtcestic.ININUMLO1';

	
	const FINNUMLO1 = 'npconftxtcestic.FINNUMLO1';

	
	const ININOMEMP = 'npconftxtcestic.ININOMEMP';

	
	const FINNOMEMP = 'npconftxtcestic.FINNOMEMP';

	
	const INICANREG = 'npconftxtcestic.INICANREG';

	
	const FINCANREG = 'npconftxtcestic.FINCANREG';

	
	const INICODPLA = 'npconftxtcestic.INICODPLA';

	
	const FINCODPLA = 'npconftxtcestic.FINCODPLA';

	
	const INIFECGEN = 'npconftxtcestic.INIFECGEN';

	
	const FINFECGEN = 'npconftxtcestic.FINFECGEN';

	
	const INIHORGEN = 'npconftxtcestic.INIHORGEN';

	
	const FINHORGEN = 'npconftxtcestic.FINHORGEN';

	
	const INICODRE1 = 'npconftxtcestic.INICODRE1';

	
	const FINCODRE1 = 'npconftxtcestic.FINCODRE1';

	
	const ININOMARC = 'npconftxtcestic.ININOMARC';

	
	const FINNOMARC = 'npconftxtcestic.FINNOMARC';

	
	const INIFILLE1 = 'npconftxtcestic.INIFILLE1';

	
	const FINFILLE1 = 'npconftxtcestic.FINFILLE1';

	
	const INIIDERE1 = 'npconftxtcestic.INIIDERE1';

	
	const LONIDERE1 = 'npconftxtcestic.LONIDERE1';

	
	const ININROCON = 'npconftxtcestic.ININROCON';

	
	const FINNROCON = 'npconftxtcestic.FINNROCON';

	
	const INIFECEFE = 'npconftxtcestic.INIFECEFE';

	
	const FINFECEFE = 'npconftxtcestic.FINFECEFE';

	
	const INIMONTOT = 'npconftxtcestic.INIMONTOT';

	
	const FINMONTOT = 'npconftxtcestic.FINMONTOT';

	
	const INICENTR1 = 'npconftxtcestic.INICENTR1';

	
	const LONCENTR1 = 'npconftxtcestic.LONCENTR1';

	
	const INIESPBLA = 'npconftxtcestic.INIESPBLA';

	
	const LONESPBLA = 'npconftxtcestic.LONESPBLA';

	
	const INICODBA1 = 'npconftxtcestic.INICODBA1';

	
	const LONCODBA1 = 'npconftxtcestic.LONCODBA1';

	
	const INIRIFEM1 = 'npconftxtcestic.INIRIFEM1';

	
	const LONRIFEM1 = 'npconftxtcestic.LONRIFEM1';

	
	const INITIPNOM = 'npconftxtcestic.INITIPNOM';

	
	const LONTIPNOM = 'npconftxtcestic.LONTIPNOM';

	
	const INITIPRE2 = 'npconftxtcestic.INITIPRE2';

	
	const LONTIPRE2 = 'npconftxtcestic.LONTIPRE2';

	
	const INITIPDO2 = 'npconftxtcestic.INITIPDO2';

	
	const LONTIPDO2 = 'npconftxtcestic.LONTIPDO2';

	
	const ININROCED = 'npconftxtcestic.ININROCED';

	
	const LONNROCED = 'npconftxtcestic.LONNROCED';

	
	const INIPRIAPE = 'npconftxtcestic.INIPRIAPE';

	
	const LONPRIAPE = 'npconftxtcestic.LONPRIAPE';

	
	const INIFILLE2 = 'npconftxtcestic.INIFILLE2';

	
	const LONFILLE2 = 'npconftxtcestic.LONFILLE2';

	
	const INISEGAPE = 'npconftxtcestic.INISEGAPE';

	
	const LONSEGAPE = 'npconftxtcestic.LONSEGAPE';

	
	const INIFILLE3 = 'npconftxtcestic.INIFILLE3';

	
	const LONFILLE3 = 'npconftxtcestic.LONFILLE3';

	
	const INIPRINOM = 'npconftxtcestic.INIPRINOM';

	
	const LONPRINOM = 'npconftxtcestic.LONPRINOM';

	
	const INIFILLE4 = 'npconftxtcestic.INIFILLE4';

	
	const LONFILLE4 = 'npconftxtcestic.LONFILLE4';

	
	const INICIUDAD = 'npconftxtcestic.INICIUDAD';

	
	const LONCIUDAD = 'npconftxtcestic.LONCIUDAD';

	
	const INIESTADO = 'npconftxtcestic.INIESTADO';

	
	const LONESTADO = 'npconftxtcestic.LONESTADO';

	
	const INICODOFI = 'npconftxtcestic.INICODOFI';

	
	const LONCODOFI = 'npconftxtcestic.LONCODOFI';

	
	const INISEXO = 'npconftxtcestic.INISEXO';

	
	const LONSEXO = 'npconftxtcestic.LONSEXO';

	
	const INICODARE = 'npconftxtcestic.INICODARE';

	
	const LONCODARE = 'npconftxtcestic.LONCODARE';

	
	const ININUMTEL = 'npconftxtcestic.ININUMTEL';

	
	const LONNUMTEL = 'npconftxtcestic.LONNUMTEL';

	
	const INIDESTEL = 'npconftxtcestic.INIDESTEL';

	
	const LONDESTEL = 'npconftxtcestic.LONDESTEL';

	
	const INIFECNAC = 'npconftxtcestic.INIFECNAC';

	
	const LONFECNAC = 'npconftxtcestic.LONFECNAC';

	
	const INICODRE2 = 'npconftxtcestic.INICODRE2';

	
	const FINCODRE2 = 'npconftxtcestic.FINCODRE2';

	
	const INIFILLE5 = 'npconftxtcestic.INIFILLE5';

	
	const LONFILLE5 = 'npconftxtcestic.LONFILLE5';

	
	const INIPAN = 'npconftxtcestic.INIPAN';

	
	const LONPAN = 'npconftxtcestic.LONPAN';

	
	const INIMOTIVO = 'npconftxtcestic.INIMOTIVO';

	
	const LONMOTIVO = 'npconftxtcestic.LONMOTIVO';

	
	const INILIBRE = 'npconftxtcestic.INILIBRE';

	
	const LONLIBRE = 'npconftxtcestic.LONLIBRE';

	
	const INIPANNUE = 'npconftxtcestic.INIPANNUE';

	
	const LONPANNUE = 'npconftxtcestic.LONPANNUE';

	
	const INIOTRDAT = 'npconftxtcestic.INIOTRDAT';

	
	const LONOTRDAT = 'npconftxtcestic.LONOTRDAT';

	
	const INIIDERE2 = 'npconftxtcestic.INIIDERE2';

	
	const LONIDERE2 = 'npconftxtcestic.LONIDERE2';

	
	const ININUMTAR = 'npconftxtcestic.ININUMTAR';

	
	const LONNUMTAR = 'npconftxtcestic.LONNUMTAR';

	
	const INIMONTRA = 'npconftxtcestic.INIMONTRA';

	
	const LONMONTRA = 'npconftxtcestic.LONMONTRA';

	
	const ININOMBEN = 'npconftxtcestic.ININOMBEN';

	
	const LONNOMBEN = 'npconftxtcestic.LONNOMBEN';

	
	const INICENTR2 = 'npconftxtcestic.INICENTR2';

	
	const LONCENTR2 = 'npconftxtcestic.LONCENTR2';

	
	const INICODBA2 = 'npconftxtcestic.INICODBA2';

	
	const LONCODBA2 = 'npconftxtcestic.LONCODBA2';

	
	const ININUMLO2 = 'npconftxtcestic.ININUMLO2';

	
	const FINNUMLO2 = 'npconftxtcestic.FINNUMLO2';

	
	const INIRIFEM2 = 'npconftxtcestic.INIRIFEM2';

	
	const LONRIFEM2 = 'npconftxtcestic.LONRIFEM2';

	
	const INIFILLE6 = 'npconftxtcestic.INIFILLE6';

	
	const LONFILLE6 = 'npconftxtcestic.LONFILLE6';

	
	const ID = 'npconftxtcestic.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Tiptxt', 'Initipre1', 'Lontipre1', 'Initipdo1', 'Lontipdo1', 'Iniideemp', 'Lonideemp', 'Ininumlo1', 'Finnumlo1', 'Ininomemp', 'Finnomemp', 'Inicanreg', 'Fincanreg', 'Inicodpla', 'Fincodpla', 'Inifecgen', 'Finfecgen', 'Inihorgen', 'Finhorgen', 'Inicodre1', 'Fincodre1', 'Ininomarc', 'Finnomarc', 'Inifille1', 'Finfille1', 'Iniidere1', 'Lonidere1', 'Ininrocon', 'Finnrocon', 'Inifecefe', 'Finfecefe', 'Inimontot', 'Finmontot', 'Inicentr1', 'Loncentr1', 'Iniespbla', 'Lonespbla', 'Inicodba1', 'Loncodba1', 'Inirifem1', 'Lonrifem1', 'Initipnom', 'Lontipnom', 'Initipre2', 'Lontipre2', 'Initipdo2', 'Lontipdo2', 'Ininroced', 'Lonnroced', 'Inipriape', 'Lonpriape', 'Inifille2', 'Lonfille2', 'Inisegape', 'Lonsegape', 'Inifille3', 'Lonfille3', 'Iniprinom', 'Lonprinom', 'Inifille4', 'Lonfille4', 'Iniciudad', 'Lonciudad', 'Iniestado', 'Lonestado', 'Inicodofi', 'Loncodofi', 'Inisexo', 'Lonsexo', 'Inicodare', 'Loncodare', 'Ininumtel', 'Lonnumtel', 'Inidestel', 'Londestel', 'Inifecnac', 'Lonfecnac', 'Inicodre2', 'Fincodre2', 'Inifille5', 'Lonfille5', 'Inipan', 'Lonpan', 'Inimotivo', 'Lonmotivo', 'Inilibre', 'Lonlibre', 'Inipannue', 'Lonpannue', 'Iniotrdat', 'Lonotrdat', 'Iniidere2', 'Lonidere2', 'Ininumtar', 'Lonnumtar', 'Inimontra', 'Lonmontra', 'Ininomben', 'Lonnomben', 'Inicentr2', 'Loncentr2', 'Inicodba2', 'Loncodba2', 'Ininumlo2', 'Finnumlo2', 'Inirifem2', 'Lonrifem2', 'Inifille6', 'Lonfille6', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpconftxtcesticPeer::TIPTXT, NpconftxtcesticPeer::INITIPRE1, NpconftxtcesticPeer::LONTIPRE1, NpconftxtcesticPeer::INITIPDO1, NpconftxtcesticPeer::LONTIPDO1, NpconftxtcesticPeer::INIIDEEMP, NpconftxtcesticPeer::LONIDEEMP, NpconftxtcesticPeer::ININUMLO1, NpconftxtcesticPeer::FINNUMLO1, NpconftxtcesticPeer::ININOMEMP, NpconftxtcesticPeer::FINNOMEMP, NpconftxtcesticPeer::INICANREG, NpconftxtcesticPeer::FINCANREG, NpconftxtcesticPeer::INICODPLA, NpconftxtcesticPeer::FINCODPLA, NpconftxtcesticPeer::INIFECGEN, NpconftxtcesticPeer::FINFECGEN, NpconftxtcesticPeer::INIHORGEN, NpconftxtcesticPeer::FINHORGEN, NpconftxtcesticPeer::INICODRE1, NpconftxtcesticPeer::FINCODRE1, NpconftxtcesticPeer::ININOMARC, NpconftxtcesticPeer::FINNOMARC, NpconftxtcesticPeer::INIFILLE1, NpconftxtcesticPeer::FINFILLE1, NpconftxtcesticPeer::INIIDERE1, NpconftxtcesticPeer::LONIDERE1, NpconftxtcesticPeer::ININROCON, NpconftxtcesticPeer::FINNROCON, NpconftxtcesticPeer::INIFECEFE, NpconftxtcesticPeer::FINFECEFE, NpconftxtcesticPeer::INIMONTOT, NpconftxtcesticPeer::FINMONTOT, NpconftxtcesticPeer::INICENTR1, NpconftxtcesticPeer::LONCENTR1, NpconftxtcesticPeer::INIESPBLA, NpconftxtcesticPeer::LONESPBLA, NpconftxtcesticPeer::INICODBA1, NpconftxtcesticPeer::LONCODBA1, NpconftxtcesticPeer::INIRIFEM1, NpconftxtcesticPeer::LONRIFEM1, NpconftxtcesticPeer::INITIPNOM, NpconftxtcesticPeer::LONTIPNOM, NpconftxtcesticPeer::INITIPRE2, NpconftxtcesticPeer::LONTIPRE2, NpconftxtcesticPeer::INITIPDO2, NpconftxtcesticPeer::LONTIPDO2, NpconftxtcesticPeer::ININROCED, NpconftxtcesticPeer::LONNROCED, NpconftxtcesticPeer::INIPRIAPE, NpconftxtcesticPeer::LONPRIAPE, NpconftxtcesticPeer::INIFILLE2, NpconftxtcesticPeer::LONFILLE2, NpconftxtcesticPeer::INISEGAPE, NpconftxtcesticPeer::LONSEGAPE, NpconftxtcesticPeer::INIFILLE3, NpconftxtcesticPeer::LONFILLE3, NpconftxtcesticPeer::INIPRINOM, NpconftxtcesticPeer::LONPRINOM, NpconftxtcesticPeer::INIFILLE4, NpconftxtcesticPeer::LONFILLE4, NpconftxtcesticPeer::INICIUDAD, NpconftxtcesticPeer::LONCIUDAD, NpconftxtcesticPeer::INIESTADO, NpconftxtcesticPeer::LONESTADO, NpconftxtcesticPeer::INICODOFI, NpconftxtcesticPeer::LONCODOFI, NpconftxtcesticPeer::INISEXO, NpconftxtcesticPeer::LONSEXO, NpconftxtcesticPeer::INICODARE, NpconftxtcesticPeer::LONCODARE, NpconftxtcesticPeer::ININUMTEL, NpconftxtcesticPeer::LONNUMTEL, NpconftxtcesticPeer::INIDESTEL, NpconftxtcesticPeer::LONDESTEL, NpconftxtcesticPeer::INIFECNAC, NpconftxtcesticPeer::LONFECNAC, NpconftxtcesticPeer::INICODRE2, NpconftxtcesticPeer::FINCODRE2, NpconftxtcesticPeer::INIFILLE5, NpconftxtcesticPeer::LONFILLE5, NpconftxtcesticPeer::INIPAN, NpconftxtcesticPeer::LONPAN, NpconftxtcesticPeer::INIMOTIVO, NpconftxtcesticPeer::LONMOTIVO, NpconftxtcesticPeer::INILIBRE, NpconftxtcesticPeer::LONLIBRE, NpconftxtcesticPeer::INIPANNUE, NpconftxtcesticPeer::LONPANNUE, NpconftxtcesticPeer::INIOTRDAT, NpconftxtcesticPeer::LONOTRDAT, NpconftxtcesticPeer::INIIDERE2, NpconftxtcesticPeer::LONIDERE2, NpconftxtcesticPeer::ININUMTAR, NpconftxtcesticPeer::LONNUMTAR, NpconftxtcesticPeer::INIMONTRA, NpconftxtcesticPeer::LONMONTRA, NpconftxtcesticPeer::ININOMBEN, NpconftxtcesticPeer::LONNOMBEN, NpconftxtcesticPeer::INICENTR2, NpconftxtcesticPeer::LONCENTR2, NpconftxtcesticPeer::INICODBA2, NpconftxtcesticPeer::LONCODBA2, NpconftxtcesticPeer::ININUMLO2, NpconftxtcesticPeer::FINNUMLO2, NpconftxtcesticPeer::INIRIFEM2, NpconftxtcesticPeer::LONRIFEM2, NpconftxtcesticPeer::INIFILLE6, NpconftxtcesticPeer::LONFILLE6, NpconftxtcesticPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('tiptxt', 'initipre1', 'lontipre1', 'initipdo1', 'lontipdo1', 'iniideemp', 'lonideemp', 'ininumlo1', 'finnumlo1', 'ininomemp', 'finnomemp', 'inicanreg', 'fincanreg', 'inicodpla', 'fincodpla', 'inifecgen', 'finfecgen', 'inihorgen', 'finhorgen', 'inicodre1', 'fincodre1', 'ininomarc', 'finnomarc', 'inifille1', 'finfille1', 'iniidere1', 'lonidere1', 'ininrocon', 'finnrocon', 'inifecefe', 'finfecefe', 'inimontot', 'finmontot', 'inicentr1', 'loncentr1', 'iniespbla', 'lonespbla', 'inicodba1', 'loncodba1', 'inirifem1', 'lonrifem1', 'initipnom', 'lontipnom', 'initipre2', 'lontipre2', 'initipdo2', 'lontipdo2', 'ininroced', 'lonnroced', 'inipriape', 'lonpriape', 'inifille2', 'lonfille2', 'inisegape', 'lonsegape', 'inifille3', 'lonfille3', 'iniprinom', 'lonprinom', 'inifille4', 'lonfille4', 'iniciudad', 'lonciudad', 'iniestado', 'lonestado', 'inicodofi', 'loncodofi', 'inisexo', 'lonsexo', 'inicodare', 'loncodare', 'ininumtel', 'lonnumtel', 'inidestel', 'londestel', 'inifecnac', 'lonfecnac', 'inicodre2', 'fincodre2', 'inifille5', 'lonfille5', 'inipan', 'lonpan', 'inimotivo', 'lonmotivo', 'inilibre', 'lonlibre', 'inipannue', 'lonpannue', 'iniotrdat', 'lonotrdat', 'iniidere2', 'lonidere2', 'ininumtar', 'lonnumtar', 'inimontra', 'lonmontra', 'ininomben', 'lonnomben', 'inicentr2', 'loncentr2', 'inicodba2', 'loncodba2', 'ininumlo2', 'finnumlo2', 'inirifem2', 'lonrifem2', 'inifille6', 'lonfille6', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Tiptxt' => 0, 'Initipre1' => 1, 'Lontipre1' => 2, 'Initipdo1' => 3, 'Lontipdo1' => 4, 'Iniideemp' => 5, 'Lonideemp' => 6, 'Ininumlo1' => 7, 'Finnumlo1' => 8, 'Ininomemp' => 9, 'Finnomemp' => 10, 'Inicanreg' => 11, 'Fincanreg' => 12, 'Inicodpla' => 13, 'Fincodpla' => 14, 'Inifecgen' => 15, 'Finfecgen' => 16, 'Inihorgen' => 17, 'Finhorgen' => 18, 'Inicodre1' => 19, 'Fincodre1' => 20, 'Ininomarc' => 21, 'Finnomarc' => 22, 'Inifille1' => 23, 'Finfille1' => 24, 'Iniidere1' => 25, 'Lonidere1' => 26, 'Ininrocon' => 27, 'Finnrocon' => 28, 'Inifecefe' => 29, 'Finfecefe' => 30, 'Inimontot' => 31, 'Finmontot' => 32, 'Inicentr1' => 33, 'Loncentr1' => 34, 'Iniespbla' => 35, 'Lonespbla' => 36, 'Inicodba1' => 37, 'Loncodba1' => 38, 'Inirifem1' => 39, 'Lonrifem1' => 40, 'Initipnom' => 41, 'Lontipnom' => 42, 'Initipre2' => 43, 'Lontipre2' => 44, 'Initipdo2' => 45, 'Lontipdo2' => 46, 'Ininroced' => 47, 'Lonnroced' => 48, 'Inipriape' => 49, 'Lonpriape' => 50, 'Inifille2' => 51, 'Lonfille2' => 52, 'Inisegape' => 53, 'Lonsegape' => 54, 'Inifille3' => 55, 'Lonfille3' => 56, 'Iniprinom' => 57, 'Lonprinom' => 58, 'Inifille4' => 59, 'Lonfille4' => 60, 'Iniciudad' => 61, 'Lonciudad' => 62, 'Iniestado' => 63, 'Lonestado' => 64, 'Inicodofi' => 65, 'Loncodofi' => 66, 'Inisexo' => 67, 'Lonsexo' => 68, 'Inicodare' => 69, 'Loncodare' => 70, 'Ininumtel' => 71, 'Lonnumtel' => 72, 'Inidestel' => 73, 'Londestel' => 74, 'Inifecnac' => 75, 'Lonfecnac' => 76, 'Inicodre2' => 77, 'Fincodre2' => 78, 'Inifille5' => 79, 'Lonfille5' => 80, 'Inipan' => 81, 'Lonpan' => 82, 'Inimotivo' => 83, 'Lonmotivo' => 84, 'Inilibre' => 85, 'Lonlibre' => 86, 'Inipannue' => 87, 'Lonpannue' => 88, 'Iniotrdat' => 89, 'Lonotrdat' => 90, 'Iniidere2' => 91, 'Lonidere2' => 92, 'Ininumtar' => 93, 'Lonnumtar' => 94, 'Inimontra' => 95, 'Lonmontra' => 96, 'Ininomben' => 97, 'Lonnomben' => 98, 'Inicentr2' => 99, 'Loncentr2' => 100, 'Inicodba2' => 101, 'Loncodba2' => 102, 'Ininumlo2' => 103, 'Finnumlo2' => 104, 'Inirifem2' => 105, 'Lonrifem2' => 106, 'Inifille6' => 107, 'Lonfille6' => 108, 'Id' => 109, ),
		BasePeer::TYPE_COLNAME => array (NpconftxtcesticPeer::TIPTXT => 0, NpconftxtcesticPeer::INITIPRE1 => 1, NpconftxtcesticPeer::LONTIPRE1 => 2, NpconftxtcesticPeer::INITIPDO1 => 3, NpconftxtcesticPeer::LONTIPDO1 => 4, NpconftxtcesticPeer::INIIDEEMP => 5, NpconftxtcesticPeer::LONIDEEMP => 6, NpconftxtcesticPeer::ININUMLO1 => 7, NpconftxtcesticPeer::FINNUMLO1 => 8, NpconftxtcesticPeer::ININOMEMP => 9, NpconftxtcesticPeer::FINNOMEMP => 10, NpconftxtcesticPeer::INICANREG => 11, NpconftxtcesticPeer::FINCANREG => 12, NpconftxtcesticPeer::INICODPLA => 13, NpconftxtcesticPeer::FINCODPLA => 14, NpconftxtcesticPeer::INIFECGEN => 15, NpconftxtcesticPeer::FINFECGEN => 16, NpconftxtcesticPeer::INIHORGEN => 17, NpconftxtcesticPeer::FINHORGEN => 18, NpconftxtcesticPeer::INICODRE1 => 19, NpconftxtcesticPeer::FINCODRE1 => 20, NpconftxtcesticPeer::ININOMARC => 21, NpconftxtcesticPeer::FINNOMARC => 22, NpconftxtcesticPeer::INIFILLE1 => 23, NpconftxtcesticPeer::FINFILLE1 => 24, NpconftxtcesticPeer::INIIDERE1 => 25, NpconftxtcesticPeer::LONIDERE1 => 26, NpconftxtcesticPeer::ININROCON => 27, NpconftxtcesticPeer::FINNROCON => 28, NpconftxtcesticPeer::INIFECEFE => 29, NpconftxtcesticPeer::FINFECEFE => 30, NpconftxtcesticPeer::INIMONTOT => 31, NpconftxtcesticPeer::FINMONTOT => 32, NpconftxtcesticPeer::INICENTR1 => 33, NpconftxtcesticPeer::LONCENTR1 => 34, NpconftxtcesticPeer::INIESPBLA => 35, NpconftxtcesticPeer::LONESPBLA => 36, NpconftxtcesticPeer::INICODBA1 => 37, NpconftxtcesticPeer::LONCODBA1 => 38, NpconftxtcesticPeer::INIRIFEM1 => 39, NpconftxtcesticPeer::LONRIFEM1 => 40, NpconftxtcesticPeer::INITIPNOM => 41, NpconftxtcesticPeer::LONTIPNOM => 42, NpconftxtcesticPeer::INITIPRE2 => 43, NpconftxtcesticPeer::LONTIPRE2 => 44, NpconftxtcesticPeer::INITIPDO2 => 45, NpconftxtcesticPeer::LONTIPDO2 => 46, NpconftxtcesticPeer::ININROCED => 47, NpconftxtcesticPeer::LONNROCED => 48, NpconftxtcesticPeer::INIPRIAPE => 49, NpconftxtcesticPeer::LONPRIAPE => 50, NpconftxtcesticPeer::INIFILLE2 => 51, NpconftxtcesticPeer::LONFILLE2 => 52, NpconftxtcesticPeer::INISEGAPE => 53, NpconftxtcesticPeer::LONSEGAPE => 54, NpconftxtcesticPeer::INIFILLE3 => 55, NpconftxtcesticPeer::LONFILLE3 => 56, NpconftxtcesticPeer::INIPRINOM => 57, NpconftxtcesticPeer::LONPRINOM => 58, NpconftxtcesticPeer::INIFILLE4 => 59, NpconftxtcesticPeer::LONFILLE4 => 60, NpconftxtcesticPeer::INICIUDAD => 61, NpconftxtcesticPeer::LONCIUDAD => 62, NpconftxtcesticPeer::INIESTADO => 63, NpconftxtcesticPeer::LONESTADO => 64, NpconftxtcesticPeer::INICODOFI => 65, NpconftxtcesticPeer::LONCODOFI => 66, NpconftxtcesticPeer::INISEXO => 67, NpconftxtcesticPeer::LONSEXO => 68, NpconftxtcesticPeer::INICODARE => 69, NpconftxtcesticPeer::LONCODARE => 70, NpconftxtcesticPeer::ININUMTEL => 71, NpconftxtcesticPeer::LONNUMTEL => 72, NpconftxtcesticPeer::INIDESTEL => 73, NpconftxtcesticPeer::LONDESTEL => 74, NpconftxtcesticPeer::INIFECNAC => 75, NpconftxtcesticPeer::LONFECNAC => 76, NpconftxtcesticPeer::INICODRE2 => 77, NpconftxtcesticPeer::FINCODRE2 => 78, NpconftxtcesticPeer::INIFILLE5 => 79, NpconftxtcesticPeer::LONFILLE5 => 80, NpconftxtcesticPeer::INIPAN => 81, NpconftxtcesticPeer::LONPAN => 82, NpconftxtcesticPeer::INIMOTIVO => 83, NpconftxtcesticPeer::LONMOTIVO => 84, NpconftxtcesticPeer::INILIBRE => 85, NpconftxtcesticPeer::LONLIBRE => 86, NpconftxtcesticPeer::INIPANNUE => 87, NpconftxtcesticPeer::LONPANNUE => 88, NpconftxtcesticPeer::INIOTRDAT => 89, NpconftxtcesticPeer::LONOTRDAT => 90, NpconftxtcesticPeer::INIIDERE2 => 91, NpconftxtcesticPeer::LONIDERE2 => 92, NpconftxtcesticPeer::ININUMTAR => 93, NpconftxtcesticPeer::LONNUMTAR => 94, NpconftxtcesticPeer::INIMONTRA => 95, NpconftxtcesticPeer::LONMONTRA => 96, NpconftxtcesticPeer::ININOMBEN => 97, NpconftxtcesticPeer::LONNOMBEN => 98, NpconftxtcesticPeer::INICENTR2 => 99, NpconftxtcesticPeer::LONCENTR2 => 100, NpconftxtcesticPeer::INICODBA2 => 101, NpconftxtcesticPeer::LONCODBA2 => 102, NpconftxtcesticPeer::ININUMLO2 => 103, NpconftxtcesticPeer::FINNUMLO2 => 104, NpconftxtcesticPeer::INIRIFEM2 => 105, NpconftxtcesticPeer::LONRIFEM2 => 106, NpconftxtcesticPeer::INIFILLE6 => 107, NpconftxtcesticPeer::LONFILLE6 => 108, NpconftxtcesticPeer::ID => 109, ),
		BasePeer::TYPE_FIELDNAME => array ('tiptxt' => 0, 'initipre1' => 1, 'lontipre1' => 2, 'initipdo1' => 3, 'lontipdo1' => 4, 'iniideemp' => 5, 'lonideemp' => 6, 'ininumlo1' => 7, 'finnumlo1' => 8, 'ininomemp' => 9, 'finnomemp' => 10, 'inicanreg' => 11, 'fincanreg' => 12, 'inicodpla' => 13, 'fincodpla' => 14, 'inifecgen' => 15, 'finfecgen' => 16, 'inihorgen' => 17, 'finhorgen' => 18, 'inicodre1' => 19, 'fincodre1' => 20, 'ininomarc' => 21, 'finnomarc' => 22, 'inifille1' => 23, 'finfille1' => 24, 'iniidere1' => 25, 'lonidere1' => 26, 'ininrocon' => 27, 'finnrocon' => 28, 'inifecefe' => 29, 'finfecefe' => 30, 'inimontot' => 31, 'finmontot' => 32, 'inicentr1' => 33, 'loncentr1' => 34, 'iniespbla' => 35, 'lonespbla' => 36, 'inicodba1' => 37, 'loncodba1' => 38, 'inirifem1' => 39, 'lonrifem1' => 40, 'initipnom' => 41, 'lontipnom' => 42, 'initipre2' => 43, 'lontipre2' => 44, 'initipdo2' => 45, 'lontipdo2' => 46, 'ininroced' => 47, 'lonnroced' => 48, 'inipriape' => 49, 'lonpriape' => 50, 'inifille2' => 51, 'lonfille2' => 52, 'inisegape' => 53, 'lonsegape' => 54, 'inifille3' => 55, 'lonfille3' => 56, 'iniprinom' => 57, 'lonprinom' => 58, 'inifille4' => 59, 'lonfille4' => 60, 'iniciudad' => 61, 'lonciudad' => 62, 'iniestado' => 63, 'lonestado' => 64, 'inicodofi' => 65, 'loncodofi' => 66, 'inisexo' => 67, 'lonsexo' => 68, 'inicodare' => 69, 'loncodare' => 70, 'ininumtel' => 71, 'lonnumtel' => 72, 'inidestel' => 73, 'londestel' => 74, 'inifecnac' => 75, 'lonfecnac' => 76, 'inicodre2' => 77, 'fincodre2' => 78, 'inifille5' => 79, 'lonfille5' => 80, 'inipan' => 81, 'lonpan' => 82, 'inimotivo' => 83, 'lonmotivo' => 84, 'inilibre' => 85, 'lonlibre' => 86, 'inipannue' => 87, 'lonpannue' => 88, 'iniotrdat' => 89, 'lonotrdat' => 90, 'iniidere2' => 91, 'lonidere2' => 92, 'ininumtar' => 93, 'lonnumtar' => 94, 'inimontra' => 95, 'lonmontra' => 96, 'ininomben' => 97, 'lonnomben' => 98, 'inicentr2' => 99, 'loncentr2' => 100, 'inicodba2' => 101, 'loncodba2' => 102, 'ininumlo2' => 103, 'finnumlo2' => 104, 'inirifem2' => 105, 'lonrifem2' => 106, 'inifille6' => 107, 'lonfille6' => 108, 'id' => 109, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpconftxtcesticMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpconftxtcesticMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpconftxtcesticPeer::getTableMap();
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
		return str_replace(NpconftxtcesticPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpconftxtcesticPeer::TIPTXT);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INITIPRE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONTIPRE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INITIPDO1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONTIPDO1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIIDEEMP);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONIDEEMP);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININUMLO1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINNUMLO1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININOMEMP);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINNOMEMP);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICANREG);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINCANREG);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODPLA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINCODPLA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFECGEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINFECGEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIHORGEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINHORGEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODRE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINCODRE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININOMARC);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINNOMARC);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINFILLE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIIDERE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONIDERE1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININROCON);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINNROCON);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFECEFE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINFECEFE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIMONTOT);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINMONTOT);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICENTR1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCENTR1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIESPBLA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONESPBLA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODBA1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCODBA1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIRIFEM1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONRIFEM1);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INITIPNOM);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONTIPNOM);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INITIPRE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONTIPRE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INITIPDO2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONTIPDO2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININROCED);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONNROCED);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIPRIAPE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONPRIAPE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFILLE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INISEGAPE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONSEGAPE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE3);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFILLE3);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIPRINOM);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONPRINOM);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE4);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFILLE4);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICIUDAD);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCIUDAD);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIESTADO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONESTADO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODOFI);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCODOFI);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INISEXO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONSEXO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODARE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCODARE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININUMTEL);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONNUMTEL);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIDESTEL);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONDESTEL);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFECNAC);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFECNAC);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODRE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINCODRE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE5);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFILLE5);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIPAN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONPAN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIMOTIVO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONMOTIVO);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INILIBRE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONLIBRE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIPANNUE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONPANNUE);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIOTRDAT);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONOTRDAT);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIIDERE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONIDERE2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININUMTAR);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONNUMTAR);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIMONTRA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONMONTRA);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININOMBEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONNOMBEN);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICENTR2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCENTR2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INICODBA2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONCODBA2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ININUMLO2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::FINNUMLO2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIRIFEM2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONRIFEM2);

		$criteria->addSelectColumn(NpconftxtcesticPeer::INIFILLE6);

		$criteria->addSelectColumn(NpconftxtcesticPeer::LONFILLE6);

		$criteria->addSelectColumn(NpconftxtcesticPeer::ID);

	}

	const COUNT = 'COUNT(npconftxtcestic.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npconftxtcestic.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpconftxtcesticPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpconftxtcesticPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpconftxtcesticPeer::doSelectRS($criteria, $con);
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
		$objects = NpconftxtcesticPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpconftxtcesticPeer::populateObjects(NpconftxtcesticPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpconftxtcesticPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpconftxtcesticPeer::getOMClass();
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
		return NpconftxtcesticPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpconftxtcesticPeer::ID); 

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
			$comparison = $criteria->getComparison(NpconftxtcesticPeer::ID);
			$selectCriteria->add(NpconftxtcesticPeer::ID, $criteria->remove(NpconftxtcesticPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpconftxtcesticPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpconftxtcesticPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npconftxtcestic) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpconftxtcesticPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npconftxtcestic $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpconftxtcesticPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpconftxtcesticPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpconftxtcesticPeer::DATABASE_NAME, NpconftxtcesticPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpconftxtcesticPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpconftxtcesticPeer::DATABASE_NAME);

		$criteria->add(NpconftxtcesticPeer::ID, $pk);


		$v = NpconftxtcesticPeer::doSelect($criteria, $con);

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
			$criteria->add(NpconftxtcesticPeer::ID, $pks, Criteria::IN);
			$objs = NpconftxtcesticPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpconftxtcesticPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpconftxtcesticMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpconftxtcesticMapBuilder');
}
