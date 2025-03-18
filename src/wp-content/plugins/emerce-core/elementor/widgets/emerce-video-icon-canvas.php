<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Video_Icon_Canvas extends Widget_Base {

    public function get_name() {
        return 'video_icon_canvas';
    }
    
    public function get_title() {
        return __( 'Video Icon Canvas', 'emerce' );
    }

    public function get_icon() {
        return 'emerceo-semi-solid cs-orange';
    }

    public function get_categories() {
        return [ 'emerce-ele-widgets-cat' ];
    }



    protected function register_controls() {

        $this->start_controls_section(
            'canvas_content',
            [
                'label' => __( 'Content', 'emerce' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'canvas_url',
            [
                'label' => __( 'Video Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'canvas_image',
            [
                'label' => __( 'Choose Image', 'emerce' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'canvas_icon',
            [
                'label' => __( 'Icon', 'emerce' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->end_controls_section();


        // Style Tab

        $this->start_controls_section(
            'canvas_icon_style',
            [
                'label' => __( 'Icon Style', 'emerce' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .canvas-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Icon Background Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .canvas-icon' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_animation_color',
            [
                'label' => __( 'Background Animation Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .canvas-icon:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .canvas-icon:after' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'canvas_icon_hover_style',
            [
                'label' => __( 'Icon Hover Style', 'emerce' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .canvas-icon:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_hove_bg_color',
            [
                'label' => __( 'Icon Hover Background Color', 'emerce' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .canvas-icon:hover' => 'background: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();



    }

        



    protected function render() {
        $settings = $this->get_settings_for_display();

        // echo '<pre>';

        // print_r($settings['canvas_icon']);

        ?>

        <div class="video-icon-canvas">
          <?php if($settings['canvas_image']['url']){?>
            <img src="<?php echo $settings['canvas_image']['url']; ?>" alt="">
          <?php } ?>
            <?php if ($settings['canvas_icon']['value']) { ?>
            <a href="<?php echo $settings['canvas_url']['url']; ?>" data-lity>
                <div class="canvas-icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['canvas_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
            </a>
            <?php } ?>
        </div>

            
            

        <?php


    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Video_Icon_Canvas );


?>


<style>
.video-icon-canvas img {
    width: 100%;
}
.video-icon-canvas {
  position: relative;
}
.canvas-icon {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
    width: 80px;
    height: 80px;
    background: #FA6C2D;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
  transition: all 0.3s;
}
.canvas-icon:hover {
    background: #fff;
    color: #222;
    transition: all 0.3s;
}

.canvas-icon::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  background: #FA6C2DAB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ringa 1.5s infinite;
}
.canvas-icon::before {
content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  background: #FA6C2DAB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ringb 1.5s infinite;
}

.canvas-icon:hover::after, .canvas-icon:hover::before {
  animation: none;
  display: none;
  transition: all 0.3s;
}

@keyframes ringa {
  0% {
    width: 80px;
    height: 80px;
    opacity: 1;
  }
  100% {
    width: 120px;
    height: 120px;
    opacity: 0;
  }
}
@keyframes ringb {
  0% {
    width: 80px;
    height: 80px;
    opacity: 1;
  }
  100% {
    width: 160px;
    height: 160px;
    opacity: 0;
  }
}


</style>
