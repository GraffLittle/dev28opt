<?php
	/* @var $CurrDivision Division */
	$DebugMode = false;
	$Warnings = array();
	// -------------------------INITIALIZATION-----------------------------//
	define('DIR_ROOT', str_replace("\\","/",'/var/www/28opt/data/www/28opt.ru/published/SC/html/scripts'));
	include(DIR_ROOT.'/includes/init.php');
	include_once DIR_CFG.'/connect.inc.wa.php';

	include_once(DIR_FUNC.'/db_functions.php' );
	include_once(DIR_FUNC.'/setting_functions.php' );

	if(isset($_GET['debug'])&&$_GET['debug']=='total_time'){

		$T = new Timer();
		$T->timerStart();
	}

	$DB_tree = new DataBase();
	db_connect(SystemSettings::get('DB_HOST'),SystemSettings::get('DB_USER'),SystemSettings::get('DB_PASS')) or die (db_error());
	db_select_db(SystemSettings::get('DB_NAME')) or die (db_error());
	$DB_tree->connect(SystemSettings::get('DB_HOST'), SystemSettings::get('DB_USER'), SystemSettings::get('DB_PASS'));
	$DB_tree->query("SET character_set_client='".MYSQL_CHARSET."'");
	$DB_tree->query("SET character_set_connection='".MYSQL_CHARSET."'");
	$DB_tree->query("SET character_set_results='".MYSQL_CHARSET."'");

	$DB_tree->selectDB(SystemSettings::get('DB_NAME'));
	define('VAR_DBHANDLER','DBHandler');

	$Register = &Register::getInstance();
	$Register->set(VAR_DBHANDLER, $DB_tree);

	settingDefineConstants();

	require_once(DIR_CFG.'/language_list.php');
	require_once(DIR_FUNC.'/category_functions.php');
	require_once(DIR_FUNC.'/product_functions.php');
	require_once(DIR_FUNC.'/statistic_functions.php');
	require_once(DIR_FUNC.'/country_functions.php' );
	require_once(DIR_FUNC.'/zone_functions.php' );
	require_once(DIR_FUNC.'/datetime_functions.php' );
	require_once(DIR_FUNC.'/picture_functions.php' );
	require_once(DIR_FUNC.'/configurator_functions.php' );
	require_once(DIR_FUNC.'/option_functions.php' );
	require_once(DIR_FUNC.'/discount_functions.php' );
	require_once(DIR_FUNC.'/custgroup_functions.php' );
	require_once(DIR_FUNC.'/currency_functions.php' );
	require_once(DIR_FUNC.'/module_function.php' );
	require_once(DIR_FUNC.'/registration_functions.php' );

	require_once(DIR_FUNC.'/order_amount_functions.php' );
	require_once(DIR_FUNC.'/catalog_import_functions.php');
	require_once(DIR_FUNC.'/cart_functions.php');
	require_once(DIR_FUNC.'/subscribers_functions.php' );
	require_once(DIR_FUNC.'/discussion_functions.php' );
	require_once(DIR_FUNC.'/order_status_functions.php' );
	require_once(DIR_FUNC.'/order_functions.php' );
	require_once(DIR_FUNC.'/shipping_functions.php' );
	require_once(DIR_FUNC.'/payment_functions.php' );
	require_once(DIR_FUNC.'/reg_fields_functions.php' );
	require_once(DIR_FUNC.'/tax_function.php' );
	require_once(DIR_CLASSES.'/class.virtual.shippingratecalculator.php');
//	require_once(DIR_CLASSES.'/class.virtual.paymentmodule.php');
//	require_once(DIR_ROOT.'/smarty/smarty.class.php');
//	require_once(DIR_CLASSES.'/class.view.php');
//	require_once(DIR_ROOT.'/smarty/resources/resource.rfile.php');
//	require_once(DIR_ROOT.'/smarty/resources/resource.register.php');




 $result1 = db_query("SELECT customerID, first_name, last_name FROM SC_customers");

            $user = array();$i=0;
            while ($row1 = db_fetch_row($result1)) {
            echo $row1['first_name'];
             exit;
             }


exit;

?>
