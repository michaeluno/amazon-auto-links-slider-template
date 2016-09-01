<?php
class AmazonAutoLinksSliderTemplate_ResourceLoader {
    
    protected $_aSliderOptions = array(
        'test' => 'this is a test',
    );
    
    public function __construct() {
        
        add_action( 'wp_enqueue_scripts', array( $this, 'replyToLoadJavaScript' ) );
        
    }
    
    /**
     * Enqueues styles and scripts.
     * @callback        action      wp_enqueue_scripts
     */
    public function replyToLoadJavaScript() {
        
        $_sDirName   = dirname( __FILE__ );
        $_sDirName   = str_replace(
            AmazonAutoLinksSliderTemplate_Registry::$sDirPath, // search
            '', // replace
            dirname( __FILE__ ) // subject
        );
        $_iDebugMode = ( integer ) ( defined( 'WP_DEBUG' ) && WP_DEBUG );
        $_aFiles     = array(
            0 => $_sDirName . '/asset/lightslider/css/lightslider.min.css',
            1 => $_sDirName . '/asset/lightslider/css/lightslider.css',
        );
        $_sPath      = $_aFiles[ $_iDebugMode ];
        wp_enqueue_style( 
            'lightslider-css',     // handle id
            AmazonAutoLinksSliderTemplate_Registry::getPluginURL( $_sPath ) // file url
        );        
        
        
        $_aFiles     = array(
            0 => $_sDirName . '/asset/lightslider/js/lightslider.min.js',
            1 => $_sDirName . '/asset/lightslider/js/lightslider.js',
        );
        $_sPath       = $_aFiles[ $_iDebugMode ];      
        wp_enqueue_script( 
            'lightslider',     // handle id
            AmazonAutoLinksSliderTemplate_Registry::getPluginURL( $_sPath ),  // file url
            array( 'jquery' ),   // dependencies
            '',     // version
            true    // in footer? yes
        );        
        
        $_aFiles     = array(
            0 => $_sDirName . '/asset/js/lightslider-enabler.js',
            1 => $_sDirName . '/asset/js/lightslider-enabler.js',
        );
        $_sPath       = $_aFiles[ $_iDebugMode ];          
        wp_enqueue_script( 
            'lightslider_enabler',     // handle id
            AmazonAutoLinksSliderTemplate_Registry::getPluginURL( $_sPath ), // script url
            array( 'lightslider' ),   // dependencies
            '',     // version
            true    // in footer? yes
        );
        wp_localize_script( 
            'lightslider_enabler',  // handle id - the above used enqueue handle id
            'lightslider_enabler',  // name of the data loaded in the script
            $this->_aSliderOptions // translation array
        );                 
        
        
    }    
    
}
new AmazonAutoLinksSliderTemplate_ResourceLoader;