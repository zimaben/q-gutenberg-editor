<?php

namespace q\editor\common;

use q\editor\core\helper as helper;

// load it up ##
#\q\editor\common\render::run();

class render extends \q_gutenberg_editor {

	public static function render_class(){
		return get_class();
	}

	public static function content_accordion( $block ){
		$acf_fieldgroup_name = 'content_accordion';
		$adminExtraClass = false;
		if(!empty($block['className'])) {
		 	$adminExtraClass = ' ' . $block['className'];
		 }
		 if(!empty($block['align'])) {
		 	$adminExtraClass ? $adminExtraClass .= 'text-'.$block['align'] : $adminExtraClass = 'text-'.$block['align'];
		 }
		//NOTE - the Align blocks functionality is translated to Bootstrap 4 align classes. Accordions are already dependent on BS to function but this specifically makes them BS4 dependent

		if( \have_rows($acf_fieldgroup_name) ): ?>

		<div class="panel-group panel-group-default<?php echo $adminExtraClass ? $adminExtraClass : ''?>">
		<?php
		while( \have_rows($acf_fieldgroup_name)) : \the_row();
			$this_title = \get_sub_field('title');
			$this_id = str_replace(' ','_', strtolower( preg_replace("/[^A-Za-z ]/", "", $this_title) ) );
			?>
			<div data-toggle="collapse" data-target="#<?php echo $this_id ?>" class="panel panel-default">
				<h5 class="panel-heading"><?php echo $this_title ?></h5>
				<div id="<?php echo $this_id ?>" class="panel-collapse collapse">
		        	<div class="wysiwyg panel-body">
		        		<?php \the_sub_field('panel_content'); ?>
		        	</div>
		        </div>
		    </div>
		<?php 
		endwhile;
	echo '</div>';
	endif;
	}

	public static function linked_cards( $block ){
		$acf_fieldgroup_name = 'linked_cards';
		$adminExtraClass = false;

		if(!empty($block['className'])) {
		 	$adminExtraClass = ' ' . $block['className'];
		 }
		 if(!empty($block['align'])) {
		 	$adminExtraClass ? $adminExtraClass .= 'text-'.$block['align'] : $adminExtraClass = 'text-'.$block['align'];
		 }
		//NOTE - the Align blocks functionality is translated to Bootstrap 4 align classes. Accordions are already dependent on BS to function but this specifically makes them BS4 dependent

		$count = 0;
		$cards = \get_field($acf_fieldgroup_name);
		if (is_array($cards)) {
		  $count = count($cards);
		  //PHP meets bootstrap
			if ($count % 4 === 0)
				{
				  // 4 per row
					$class = 'class="col item col-md-3 col-sm-6 col-xs-12"';
				} else if ($count % 3 === 0)
					{ //3 per row
						$class = 'class="col item col-md-4 col-sm-6 col-xs-12"';
					}
					else if ($count > 4)
						{// 3 per row for large lists
							$class = 'class="col item col-md-4 col-sm-6 col-xs-12"';
						}
						else if ($count === 2)
							{// 2 per row
								$class = 'class="col item col-sm-6 col-xs-12"';
							}
							else { $class = 'class="col item col-sm-6 col-xs-12"'; }
		}

		if( \have_rows($acf_fieldgroup_name) ): ?>
		<div class="sly sly-mobile">
		<div class="frontpage-outreach slidee row<?php echo $adminExtraClass ? $adminExtraClass : ''?>">
		<?php
			while( \have_rows($acf_fieldgroup_name)) : \the_row();
				$this_title = \get_sub_field('title');
				$this_description = \get_sub_field('description');
				$this_image = \get_sub_field('image');
				$this_url = \get_sub_field('link');
				?>
			<div <?php echo $class ?>>
			    <a href="<?php echo $this_url ?>">
			        <div class="outreach-container rounded" style="display: block; background-image: url('<?php echo $this_image['url']; ?>');">
			            <div class="outreach-cover rounded">
			                <label></label>

			                <div class="outreach-text">
			                    <h3><?php echo $this_title ?></h3>
			                    <p class="wysiwyg"><?php echo $this_description ?></p>
			                </div>
			            </div>
			        </div>
			    </a>
			</div>
			<?php 
			endwhile;
		echo '</div></div>';
		endif;

	}

}

?>