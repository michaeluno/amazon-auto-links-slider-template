<?php
/**
 *	Plugin Name:    Slider Template for Amazon Auto Links
 *	Plugin URI:     http://en.michaeluno.jp/amazon-auto-links
 *	Description:    An Amazon Auto Links template that displays Amazon products in a slider.
 *	Author:         Michael Uno (miunosoft)
 *	Author URI:     http://michaeluno.jp
 *	Version:        0.0.1
 */

/**
 * Provides the basic information about the plugin.
 * 
 * @since       0.0.1
 */
class AmazonAutoLinksSliderTemplate_Registry_Base {
 
	const VERSION        = '0.0.1';    // <--- DON'T FORGET TO CHANGE THIS AS WELL!!
	const NAME           = 'Slider Template for Amazon Auto Links';
	const DESCRIPTION    = 'An Amazon Auto Links template that displays Amazon products in a slider.';
	const URI            = 'http://en.michaeluno.jp/amazon-auto-links';
	const AUTHOR         = 'miunosoft (Michael Uno)';
	const AUTHOR_URI     = 'http://en.michaeluno.jp/';
	const PLUGIN_URI     = 'http://en.michaeluno.jp/amazon-auto-links';
	const COPYRIGHT      = 'Copyright (c) 2013-2016, Michael Uno';
	const LICENSE        = 'GPL v2 or later';
	const CONTRIBUTORS   = '';
 
}

// Do not load if accessed directly
if ( ! defined( 'ABSPATH' ) ) { 
    return; 
}

/**
 * Provides the common data shared among plugin files.
 * 
 * To use the class, first call the setUp() method, which sets up the necessary properties.
 * 
 * @package     Amazon Auto Links
 * @copyright   Copyright (c) 2013-2016, Michael Uno
 * @authorurl	http://michaeluno.jp
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since		2.0.0
 * @since       3           Changed the name from `AmazonAutoLinksSliderTemplate_Commons`.
*/
final class AmazonAutoLinksSliderTemplate_Registry extends AmazonAutoLinksSliderTemplate_Registry_Base {
    
	const TEXT_DOMAIN               = 'amazon-auto-links-slider-template';
	const TEXT_DOMAIN_PATH          = '/language';
    
    /**
     * The hook slug used for the prefix of action and filter hook names.
     * 
     * @remark      The ending underscore is not necessary.
     */    
	const HOOK_SLUG                 = 'aalst';    // without trailing underscore
    
    /**
     * The transient prefix. 
     * 
     * @remark      This is also accessed from uninstall.php so do not remove.
     * @remark      Up to 8 characters as transient name allows 45 characters or less ( 40 for site transients ) so that md5 (32 characters) can be added
     */    
	const TRANSIENT_PREFIX          = 'AALST';
    
          
    /**
     * 
     * @since       0.0.1
     */
    static public $sFilePath;  
    
    /**
     * 
     * @since       0.0.1
     */    
    static public $sDirPath;    
    
    /**
     * @since       3
     */
    static public $aOptionKeys = array(
    
        'main'                  => 'amazon_auto_links_slider_template', // used to be const AdminOptionKey          
     
        
    );
        
    /**
     * Used admin pages.
     * @since       0.01
     */
    static public $aAdminPages = array(
        // key => 'page slug'        
    );
    
    /**
     * Used post types.
     */
    static public $aPostTypes = array(	
    );
    
    /**
     * Used post types by meta boxes.
     */
    static public $aMetaBoxPostTypes = array(
        // 'page'      => 'page',
        // 'post'      => 'post',
    );
    
    /**
     * Used taxonomies.
     * @remark      
     */
    static public $aTaxonomies = array(
    );
    
    /**
     * Used shortcode slugs
     */
    static public $aShortcodes = array(
    );
    
    /**
     * Stores custom database table names.
     * @remark      slug (part of class file name) => table name
     * @since       3
     */
    static public $aDatabaseTables = array(
    );
    /**
     * Stores the database table versions.
     * @since       3
     */
    static public $aDatabaseTableVersions = array(
    );
    
    /**
     * Sets up class properties.
     * @return      void
     */
	static function setUp( $sPluginFilePath ) {
		
        self::$sFilePath = $sPluginFilePath; 
        self::$sDirPath  = dirname( self::$sFilePath );  
        
	}	
	
    /**
     * @return      string
     */
	public static function getPluginURL( $sRelativePath='' ) {
		return plugins_url( $sRelativePath, self::$sFilePath );
	}

    /**
     * Requirements.
     * @since           3
     */    
    static public $aRequirements = array(
        'php' => array(
            'version'   => '5.2.4',
            'error'     => 'The plugin requires the PHP version %1$s or higher.',
        ),
        'wordpress'         => array(
            'version'   => '3.4',   // uses $wpdb->delete()
            'error'     => 'The plugin requires the WordPress version %1$s or higher.',
        ),
        'mysql'             => array(
            'version'   => '5.0.3', // uses VARCHAR(2083) 
            'error'     => 'The plugin requires the MySQL version %1$s or higher.',
        ),
        'functions'     => '', // disabled
        // array(
            // e.g. 'mblang' => 'The plugin requires the mbstring extension.',
        // ),
        'classes'       => array(
            'DOMDocument' => 'The plugin requires the DOMXML extension.',
        ),
        'constants'     => '', // disabled
        // array(
            // e.g. 'THEADDONFILE' => 'The plugin requires the ... addon to be installed.',
            // e.g. 'APSPATH' => 'The script cannot be loaded directly.',
        // ),
        'files'         => '', // disabled
        // array(
            // e.g. 'home/my_user_name/my_dir/scripts/my_scripts.php' => 'The required script could not be found.',
        // ),
    );        
	
}
AmazonAutoLinksSliderTemplate_Registry::setUp( __FILE__ );


class AmazonAutoLinksSliderTemplate_Bootstrap {
    
    public function __construct() {
        add_filter( 
            'aal_filter_template_directories', 
            array( $this, 'replyToAddTemplateDirectory' ) 
        );
    }

        /**
         * Add the template directory to the passed array.
         * @callback    filter      aal_filter_template_directories
         * @return      array
         */
        public function replyToAddTemplateDirectory( $aDirPaths ) {
 
            $aDirPaths[] = AmazonAutoLinksSliderTemplate_Registry::$sDirPath
                . DIRECTORY_SEPARATOR . 'template' 
                . DIRECTORY_SEPARATOR . 'slider';                
            return $aDirPaths;

        }            
    
}
new AmazonAutoLinksSliderTemplate_Bootstrap;
