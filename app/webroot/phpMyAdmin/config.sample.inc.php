<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * phpMyAdmin sample configuration, you can use it as base for
 * manual configuration. For easier setup you can use setup/
 *
 * All directives are explained in Documentation.html and on phpMyAdmin
 * wiki <http://wiki.phpmyadmin.net>.
 *
 * @package PhpMyAdmin
 */

/*
 * This is needed for cookie based authentication to encrypt password in
 * cookie
 */
//$cfg['blowfish_secret'] = 'a8b7c6d'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

/*
 * Servers configuration
 */
//$i = 0;

/*
 * First server
 */
// $i++;
// /* Authentication type */
// $cfg['Servers'][$i]['auth_type'] = 'cookie';
// /* Server parameters */
// $cfg['Servers'][$i]['host'] = 'localhost';
// $cfg['Servers'][$i]['connect_type'] = 'tcp';
// $cfg['Servers'][$i]['compress'] = false;
// /* Select mysql if your server does not have mysqli */
// $cfg['Servers'][$i]['extension'] = 'mysqli';
// $cfg['Servers'][$i]['AllowNoPassword'] = false;



/*
 * phpMyAdmin configuration storage settings.
 */

/* Configure according to dbconfig-common if enabled */
if (!empty($dbname)) {
    /* Authentication type */
    $cfg['Servers'][$i]['auth_type'] = 'config';
    $cfg['Servers'][$i]['user'] = 'root';
    $cfg['Servers'][$i]['password'] = 'changeme';
    $cfg['Servers'][$i]['hide_db'] = '(mysql|information_schema|phpmyadmin)';
    /* Server parameters */
    if (empty($dbserver)) $dbserver = 'localhost';
    $cfg['Servers'][$i]['host'] = $dbserver;

    if (!empty($dbport)) {
        $cfg['Servers'][$i]['connect_type'] = 'tcp';
        $cfg['Servers'][$i]['port'] = $dbport;
    }
    //$cfg['Servers'][$i]['compress'] = false;
    /* Select mysqli if your server has it */
    $cfg['Servers'][$i]['extension'] = 'mysqli';
    /* Optional: User for advanced features */
    //$cfg['Servers'][$i]['controluser'] = $dbuser;
    //$cfg['Servers'][$i]['controlpass'] = $dbpass;
    /* Optional: Advanced phpMyAdmin features */
    $cfg['Servers'][$i]['pmadb'] = $dbname;
    $cfg['Servers'][$i]['bookmarktable'] = 'pma_bookmark';
    $cfg['Servers'][$i]['relation'] = 'pma_relation';
    $cfg['Servers'][$i]['table_info'] = 'pma_table_info';
    $cfg['Servers'][$i]['table_coords'] = 'pma_table_coords';
    $cfg['Servers'][$i]['pdf_pages'] = 'pma_pdf_pages';
    $cfg['Servers'][$i]['column_info'] = 'pma_column_info';
    $cfg['Servers'][$i]['history'] = 'pma_history';
    $cfg['Servers'][$i]['designer_coords'] = 'pma_designer_coords';

    /* Uncomment the following to enable logging in to passwordless accounts,
     * after taking note of the associated security risks. */
    // $cfg['Servers'][$i]['AllowNoPassword'] = TRUE;

    /* Advance to next server for rest of config */
    $i++;
}

$cfg['Servers'][$i]['auth_type'] = 'HTTP';
    $cfg['Servers'][$i]['hide_db'] = '(mysql|information_schema|phpmyadmin)';
    /* Server parameters */
    $cfg['Servers'][$i]['host'] = 'parkydb.cxvspg9mta6c.us-east-1.rds.amazonaws.com';

/* User used to manipulate with storage */
// $cfg['Servers'][$i]['controlhost'] = '';
// $cfg['Servers'][$i]['controluser'] = 'pma';
// $cfg['Servers'][$i]['controlpass'] = 'pmapass';

/* Storage database and tables */
// $cfg['Servers'][$i]['pmadb'] = 'phpmyadmin';
// $cfg['Servers'][$i]['bookmarktable'] = 'pma_bookmark';
// $cfg['Servers'][$i]['relation'] = 'pma_relation';
// $cfg['Servers'][$i]['table_info'] = 'pma_table_info';
// $cfg['Servers'][$i]['table_coords'] = 'pma_table_coords';
// $cfg['Servers'][$i]['pdf_pages'] = 'pma_pdf_pages';
// $cfg['Servers'][$i]['column_info'] = 'pma_column_info';
// $cfg['Servers'][$i]['history'] = 'pma_history';
// $cfg['Servers'][$i]['table_uiprefs'] = 'pma_table_uiprefs';
// $cfg['Servers'][$i]['tracking'] = 'pma_tracking';
// $cfg['Servers'][$i]['designer_coords'] = 'pma_designer_coords';
// $cfg['Servers'][$i]['userconfig'] = 'pma_userconfig';
// $cfg['Servers'][$i]['recent'] = 'pma_recent';
/* Contrib / Swekey authentication */
// $cfg['Servers'][$i]['auth_swekey_config'] = '/etc/swekey-pma.conf';

/*
 * End of servers configuration
 */

/*
 * Directories for saving/loading files from server
 */
// $cfg['UploadDir'] = '';
// $cfg['SaveDir'] = '';

/**
 * Defines whether a user should be displayed a "show all (records)"
 * button in browse mode or not.
 * default = false
 */
//$cfg['ShowAll'] = true;

/**
 * Number of rows displayed when browsing a result set. If the result
 * set contains more rows, "Previous" and "Next".
 * default = 30
 */
//$cfg['MaxRows'] = 50;

/**
 * Use graphically less intense menu tabs
 * default = false
 */
//$cfg['LightTabs'] = true;

/**
 * disallow editing of binary fields
 * valid values are:
 *   false  allow editing
 *   'blob' allow editing except for BLOB fields
 *   'all'  disallow editing
 * default = blob
 */
//$cfg['ProtectBinary'] = 'false';

/**
 * Default language to use, if not browser-defined or user-defined
 * (you find all languages in the locale folder)
 * uncomment the desired line:
 * default = 'en'
 */
//$cfg['DefaultLang'] = 'en';
//$cfg['DefaultLang'] = 'de';

/**
 * default display direction (horizontal|vertical|horizontalflipped)
 */
//$cfg['DefaultDisplay'] = 'vertical';


/**
 * How many columns should be used for table display of a database?
 * (a value larger than 1 results in some information being hidden)
 * default = 1
 */
//$cfg['PropertiesNumColumns'] = 2;

/**
 * Set to true if you want DB-based query history.If false, this utilizes
 * JS-routines to display query history (lost by window close)
 *
 * This requires configuration storage enabled, see above.
 * default = false
 */
//$cfg['QueryHistoryDB'] = true;

/**
 * When using DB-based query history, how many entries should be kept?
 *
 * default = 25
 */
//$cfg['QueryHistoryMax'] = 100;

/*
 * You can find more configuration options in Documentation.html
 * or here: http://wiki.phpmyadmin.net/pma/Config
 */
?>
