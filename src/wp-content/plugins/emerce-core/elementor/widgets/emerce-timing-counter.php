<?php
/**
 * @author TeconceTheme
 * @since   1.0
 * @version 1.0
 */
 
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class emerce_timing_counter extends Widget_Base {

   public function get_name() {
      return 'emerce_timing_counter';
   }

   public function get_title() {
      return __( 'Timer Counter', 'emerce' );
   }
public function get_categories() {
		return [ 'emerce-ele-widgets-cat' ];
	}
   public function get_icon() { 
        return 'emerceo-semi-solid cs-orange';
   }

   protected function register_controls() {
       
       $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'due_date',
			[
				'label' => __( 'Due Date', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);

	$this->end_controls_section();
		
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Style', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align_time',
			[
				'label' => __( 'Alignment', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .weekly-offer-timeline' => 'justify-content: {{VALUE}}',
				],
				'toggle' => true,
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'time_typography',
				'label' => __( 'Counter Time Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-time h5',
			]
		);
		$this->add_control(
			'label_bg_color',
			[
				'label' => __( 'Counter Time Background Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-time h5' => 'background: {{VALUE}}',
				],
			]
		);
		
			$this->add_control(
			'label_color',
			[
				'label' => __( 'Counter Time Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-time h5' => 'color: {{VALUE}}',
				],
			]
		);
		
			$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'label' => __( 'Counter Label Typography', 'emerce' ),
				'selector' => '{{WRAPPER}} .offer-time p',
			]
		);
		
			$this->add_control(
			'label_color_span',
			[
				'label' => __( 'Counter Label Text Color', 'emerce' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-time p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
    
   }
   

   

   protected function render( $instance = [] ) {
       
       $settings = $this->get_settings_for_display();
       $time = $settings['due_date'];

		?>
		
		<div class="weekly-offer-timeline">
            <div class="offer-time">
                <h5 id="days">0</h5>
                <p>Days</p>
            </div>
            <div class="offer-time">
                <h5 id="hours">0</h5>
                <p>Hours</p>
            </div>
            <div class="offer-time">
                <h5 id="minutes">0</h5>
                <p>Mins</p>
            </div>
            <div class="offer-time">
                <h5 id="seconds">0</h5>
                <p>Secs</p>
            </div>
        </div>
		
		
	<script>
        jQuery(document).ready(function($){

            function makeTimer() {

                // var endTime = new Date();
                var endTime = new Date("<?php echo $time; ?>");
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") { hours = "0" + hours; }
                if (minutes < "10") { minutes = "0" + minutes; }
                if (seconds < "10") { seconds = "0" + seconds; }

                $("#days").html(days);
                $("#hours").html(hours);
                $("#minutes").html(minutes);
                $("#seconds").html(seconds);

            }
            
            // if (timeLeft < 0) {
            //     clearInterval(x);
            // }
            // if (timeLeft < 0) {
            //   $("#days").html(0);
            //     $("#hours").html(0);
            //     $("#minutes").html(0);
            //     $("#seconds").html(0);
            // }

            setInterval(function() { makeTimer() }, 1000);
            

        });
    </script>
		
		<?php
       
}  
protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new emerce_timing_counter );
?>