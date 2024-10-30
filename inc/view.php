<?php

class HeartySocialLightView {

	public static function generate_view($settings_instance) {

		$options = get_option('heartysociallight_options');

		$options_i = array();

		$i = 1;

		if (empty($options)) { return '<p>Please save your settings and try again.</p>'; }

		foreach ($options as $k => $v) {

			if ($i > 1) {

				$k_arr = explode('_', $k);

				if (end($k_arr) == $settings_instance) {
					$options_i[str_replace('_'.$settings_instance, '', $k)] = $v;
				}

			}

			$i++;

		}

		$number_of_content_items = 10;

		// params

		$module_align = $options_i['module_align'];

		$module_fixed_desktop = $options_i['module_fixed_desktop'];
		$module_align_fixed_desktop = $options_i['module_align_fixed_desktop'];

		$module_align_fixed_desktop_top = $options_i['module_align_fixed_desktop_top'];
		$module_align_fixed_desktop_margin = $options_i['module_align_fixed_desktop_margin'];

		$module_fixed_mobile = $options_i['module_fixed_mobile'];

		$module_align_fixed_mobile_margin = $options_i['module_align_fixed_mobile_margin'];

		for ($i=1;$i<=$number_of_content_items;$i++) {

		${'show_icon'.$i}                       = $options_i['show_icon'.$i];
		${'share_on'.$i}                        = $options_i['share_on'.$i];
		${'icon_name'.$i}                       = $options_i['icon_name'.$i];
		${'icon_color'.$i}                      = $options_i['icon_color'.$i];
		${'icon_bg_color'.$i}                   = $options_i['icon_bg_color'.$i];
		${'icon_font_size'.$i}                  = $options_i['icon_font_size'.$i];
		${'icon_padding'.$i}                    = $options_i['icon_padding'.$i];
		${'icon_border_radius'.$i}              = $options_i['icon_border_radius'.$i];

		if (${'share_on'.$i} == 0) {

			${'icon_link'.$i}                       = $options_i['icon_link'.$i];
			${'icon_link_target'.$i}                = $options_i['icon_link_target'.$i];

		} else {

			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$curl = esc_url($url);

			if (strpos(${'icon_name'.$i} ,'twitter') !== false) {

				${'icon_link'.$i} = 'https://twitter.com/intent/tweet?text='.$curl;

			}

			elseif (strpos(${'icon_name'.$i} ,'facebook') !== false) {

				${'icon_link'.$i} = 'https://www.facebook.com/sharer/sharer.php?u='.$curl;

			}

			elseif (strpos(${'icon_name'.$i} ,'linkedin') !== false) {

				${'icon_link'.$i} = 'https://www.linkedin.com/shareArticle?mini=true&url=ds'.$curl;

			}

			elseif (strpos(${'icon_name'.$i} ,'google-plus') !== false) {

				${'icon_link'.$i} = 'https://plus.google.com/share?url='.$curl;

			}

			elseif (strpos(${'icon_name'.$i} ,'whatsapp') !== false) {

				${'icon_link'.$i} = 'whatsapp://send?text='.$curl;

			} else {

				${'icon_link'.$i} = $options_i['icon_link'.$i];

			}

			${'icon_link_target'.$i} = 'blank';

		}

		}

		$custom_id = rand(10000,90000);

		// end params

		ob_start();

		// html

		?>

		<?php

		$classes = '';
		$styles = 'width: 100%;';

		if ($module_fixed_desktop == 1) {

			$classes = ' heartysociallight-fixed-desktop-'.$module_align_fixed_desktop;

			if ($module_align_fixed_desktop == 'left') {

				$styles = "top: $module_align_fixed_desktop_top; left: $module_align_fixed_desktop_margin;";

			} else if ($module_align_fixed_desktop == 'right') {

				$styles = "top: $module_align_fixed_desktop_top; right: $module_align_fixed_desktop_margin;";

			}

		}

		if ($module_fixed_mobile == 1) {

			$classes .= ' heartysociallight-fixed-mobile';
			$styles .= " bottom: $module_align_fixed_mobile_margin";

		}

		?>

		<div id="heartysociallight-<?php echo $custom_id; ?>"
			class="hrty-clearfix<?php echo $classes; ?>"
			style="<?php echo $styles; ?>">

		  <ul id="heartysociallight-list"
			  class="<?php echo $module_align; ?>">

			<?php

			  for ($i=1;$i<11;$i++) {
			  if ((${'show_icon'.$i}) !=0) { ?>

			  <li id="heartysociallight-icon<?php echo $i; ?>">

				<a rel="nofollow" href="<?php echo ${'icon_link'.$i}; ?>" target="_<?php echo ${'icon_link_target'.$i}; ?>"
				  style="background-color: <?php echo ${'icon_bg_color'.$i}; ?>;
						padding: <?php echo ${'icon_padding'.$i}; ?>;
						-webkit-border-radius: <?php echo ${'icon_border_radius'.$i}; ?>;
						-moz-border-radius: <?php echo ${'icon_border_radius'.$i}; ?>;
						border-radius: <?php echo ${'icon_border_radius'.$i}; ?>">

				  <span class="heartysociallight">
					<i class="<?php echo ${'icon_name'.$i}; ?>"
					  style="color: <?php echo ${'icon_color'.$i}; ?>;
							font-size: <?php echo ${'icon_font_size'.$i}; ?>;">
					</i>
				  </span>

				</a>
			  </li>

			<?php } } ?>

		  </ul>

		</div>

		<?php

		// end html

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

}

