<?php

class HeartySocialLightParams {

	public static function generate_fields($obj, $number_of_settings_instances, $number_of_content_items) {

        $modify_settings_instance_arr = array();

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

            $modify_settings_instance_arr[$i] = 'Settings Instance '.$i;

        }

        add_settings_field(
            'modify_settings_instance',
            'Modify Settings for',
            array($obj, 'fields_callback'),
            'heartysociallight-setting-admin',
            'heartysociallight_global_settings_section',
            array(
                'id' => 'modify_settings_instance',
                'type' => 'pills',
                'options' => $modify_settings_instance_arr,
                'default' => 1,
                //'force' => 1,
                'description' => 'Choose the settings instance you would like to modify. This is the free version of our <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-social" target="_blank">Hearty Social</a> plugin, so compared to the full version, it has limited features and settings. This plugin has 1 settings instance, 10 content items, simple widgets and shortcodes, so for <b>multiple settings instances</b>, <b>unlimited content items</b> and <b>flexible widgets</b>, <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-social" target="_blank">check out the full version</a>.',
            )
        );

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

			//------------- SCRIPT INSERT

            add_settings_field(
                'module_align_'.$i,
                'Plugin Alignment <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_align_'.$i,
                    'type' => 'select',
                    'default' => 'heartysociallight-left',
                    'options' => array('heartysociallight-left' => 'left','heartysociallight-center' => 'center','heartysociallight-right' => 'right',),
                    'description' => 'Choose if the icons should be aligned to the left, in the center or to the right.',
                )
            );

            add_settings_field(
                'module_fixed_desktop_'.$i,
                'Plugin Fixed Postion <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_fixed_desktop_'.$i,
                    'type' => 'select',
                    'default' => '0',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the module will have a fixed position on the screen, for desktop devices.',
                )
            );

            add_settings_field(
                'module_align_fixed_desktop_'.$i,
                'Plugin Position Alignment <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_align_fixed_desktop_'.$i,
                    'type' => 'select',
                    'default' => 'left',
                    'options' => array('left' => 'left','right' => 'right',),
                    'description' => 'Choose if the icons should be positioned to the left or to the right of the screen, when the module is on a fixed position, for desktop devices.',
                )
            );

            add_settings_field(
                'module_align_fixed_desktop_top_'.$i,
                'Plugin Top Distance <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_align_fixed_desktop_top_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '300px',
                    'description' => 'Insert a value for the distance the fixed module should take from the top of the screen, in px or percents (for example: 100px or 40%). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'module_align_fixed_desktop_margin_'.$i,
                'Plugin Left / Right Distance <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_align_fixed_desktop_margin_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '0px',
                    'description' => 'Insert a value for the distance the fixed module should take from the left or right of the screen, in px or percents (for example: 100px or 40%). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'module_fixed_mobile_'.$i,
                'Plugin Fixed Postion on Mobile <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_fixed_mobile_'.$i,
                    'type' => 'select',
                    'default' => '0',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the module will have a fixed position on the screen, for mobile devices',
                )
            );

            add_settings_field(
                'module_align_fixed_mobile_margin_'.$i,
                'Plugin Mobile Bottom Distance <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_basic_section',
                array(
                    'id' => 'module_align_fixed_mobile_margin_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '10px',
                    'description' => 'Insert a value for the distance the fixed module should take from the bottom of the screen, in px or percents (for example: 100px or 40%). A blank field reverts the setting to the default value.',
                )
            );

			for ($j = 1; $j <= $number_of_content_items; $j++) {

            add_settings_field(
                'show_icon'.$j.'_'.$i,
                'Show Icon '.$j.' <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'show_icon'.$j.'_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if this icon should be displayed or not.',
                )
            );

            add_settings_field(
                'share_on'.$j.'_'.$i,
                'Share Icon '.$j.' <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'share_on'.$j.'_'.$i,
                    'type' => 'select',
                    'default' => '0',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the url of the icon should be a share on ... url (for example: share on facebook) or not. If this is selected, the normal url will not be taken into consideration anymore.',
                )
            );

            add_settings_field(
                'icon_name'.$j.'_'.$i,
                'Icon '.$j.' Name <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_name'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => 'fab fa-twitter',
                    'description' => 'Insert the Font Awesome icon name (for example: fab fa-twitter or fab fa-facebook). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_color'.$j.'_'.$i,
                'Icon '.$j.' Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#FFFFFF',
                    'description' => 'Choose the color for the icon. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_bg_color'.$j.'_'.$i,
                'Icon '.$j.' Background Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_bg_color'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#00ACED',
                    'description' => 'Choose the color for the background of the icon. A blank field reverts the setting to the default value. ',
                )
            );

            add_settings_field(
                'icon_font_size'.$j.'_'.$i,
                'Icon '.$j.' Font Size <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_font_size'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '21px',
                    'description' => 'Insert the font size for the icon using pixels, percent or em (for example: 14px, 120% or 1.2em, not 14). A blank field reverts the setting to the default value. ',
                )
            );

            add_settings_field(
                'icon_link'.$j.'_'.$i,
                'Icon '.$j.' Link <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_link'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => 'https://twitter.com/',
                    'description' => 'Insert the URL for the icon. Note that the link must include http:// or https://. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_link_target'.$j.'_'.$i,
                'Icon '.$j.' Target <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_link_target'.$j.'_'.$i,
                    'type' => 'select',
                    'default' => 'blank',
                    'options' => array('self' => 'self','blank' => 'blank','parent' => 'parent','top' => 'top',),
                    'description' => 'Choose the link target of the URL for the icon.',
                )
            );

            add_settings_field(
                'icon_padding'.$j.'_'.$i,
                'Icon '.$j.' Padding <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_padding'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '0.5em',
                    'description' => 'Insert the padding for the icon using pixels or percent (for example: 14px or 10%, not 14). The padding is a CSS property that sets the space around the content. The padding can have from 1 to 4 values (top, right, bottom and left). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'icon_border_radius'.$j.'_'.$i,
                'Icon '.$j.' Border Radius <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartysociallight-setting-admin',
                'heartysociallight_content_options_section_'.$j,
                array(
                    'id' => 'icon_border_radius'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '50%',
                    'description' => 'Insert the border-radius for the background of the icon using pixels or percent (for example: 140px or 80%, not 140). Note that the CSS3 features are not supported by older browsers. A blank field reverts the setting to the default value.',
                )
            );

			}

            //------------- END SCRIPT INSERT

        }

	}

}
