<?php

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

if ( !class_exists( 'Emerce_Elementor_Addons_Assests' ) ) {

    class Emerce_Elementor_Addons_Assests{

        /**
         * [$_instance]
         * @var null
         */
        private static $_instance = null;

        /**
         * [instance] Initializes a singleton instance
         * @return [Emerce_Elementor_Addons_Assests]
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * [__construct] Class construcotr
         */
        public function __construct(){

            // Register Scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );


            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

        }

        /**
         * All available styles
         *
         * @return array
         */
        public function get_styles() {

            $style_list = [

                'emerce-main-css' => [
                    'src'     => EMERCE_PL_ASSETS . 'css/emerce-elementor.css',
                    'version' => 1.1
                ],
                
            ];
            return $style_list;

        }

        /**
         * All available scripts
         *
         * @return array
         */
        public function get_scripts(){


            $script_list = [

                'emerce-main-js' => [
                    'src'     => EMERCE_PL_ASSETS . 'js/emerce-elementor.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery','swiper' ]
                ],
                
                'emerce-flickcity-js' => [
                    'src'     => EMERCE_PL_ASSETS . 'js/emerce-editor-flickcity.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery' ]
                ],
                
                  'emerce-parallax-js' => [
                    'src'     => EMERCE_PL_ASSETS . 'js/emerce-parallax.js',
                    'version' => 1.1,
                    'deps'    => [ 'jquery' ]
                ],
                

            ];

        

            return $script_list;

        }

        /**
         * Register scripts and styles
         *
         * @return void
         */
        public function register_assets() {
            $scripts = $this->get_scripts();
            $styles  = $this->get_styles();

            // Register Scripts
            foreach ( $scripts as $handle => $script ) {
                $deps = ( isset( $script['deps'] ) ? $script['deps'] : false );
                wp_register_script( $handle, $script['src'], $deps, $script['version'], false );
            }

            // Register Styles
            foreach ( $styles as $handle => $style ) {
                $deps = ( isset( $style['deps'] ) ? $style['deps'] : false );
                wp_register_style( $handle, $style['src'], $deps, $style['version'] );
            }

            
            
        }


       

        /**
         * [enqueue_scripts]
         * @return [void] Frontend Scripts
         */
        public function enqueue_scripts(){

            // CSS
            wp_enqueue_style( 'emerce-main-css' );
            

            // JS
            wp_enqueue_script( 'emerce-main-js' );
            
            
              wp_enqueue_script( 'emerce-flickcity-js' );
              
               wp_enqueue_script( 'emerce-parallax-js' );
            
          

        }

    }

    Emerce_Elementor_Addons_Assests::instance();

}