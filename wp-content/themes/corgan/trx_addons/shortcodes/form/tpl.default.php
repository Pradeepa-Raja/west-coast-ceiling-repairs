<?php
/**
 * The style "default" of the Contact form
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

$args = get_query_var('trx_addons_args_sc_form');
$form_style = $args['style'] = empty($args['style']) || trx_addons_is_inherit($args['style']) ? trx_addons_get_option('input_hover') : $args['style'];

?><div
	<?php if (!empty($args['id'])) echo ' id="'.esc_attr($args['id']).'"'; ?>
	class="sc_form sc_form_<?php 
		echo esc_attr($args['type']);
		if (!empty($args['class'])) echo ' '.esc_attr($args['class']);
		if (!empty($args['align']) && !trx_addons_is_off($args['align'])) echo ' sc_align_'.esc_attr($args['align']);
		?>"<?php
	if (!empty($args['css'])) echo ' style="'.esc_attr($args['css']).'"'; 
?>>
	<?php trx_addons_sc_show_titles('sc_form', $args); ?>
	<form class="sc_form_form <?php if ($form_style != 'default') echo 'sc_input_hover_'.esc_attr($form_style); ?>" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
		<div class="sc_form_details"><?php
			// Contact form. Attention! Column's tags can't start with new line
			?><div><?php
				set_query_var('trx_addons_args_sc_form_field', array_merge($args, array(
					'field_name'  => 'name',
					'field_type'  => 'text',
					'field_req'   => true,
					'field_icon'  => 'trx_addons_icon-user-alt',
					'field_title' => esc_html__('Name', 'corgan'),
					'field_placeholder' => esc_html__('Your name', 'corgan')
					
				)));
				if (($fdir = trx_addons_get_file_dir('shortcodes/form/tpl.form-field.php')) != '') { include $fdir; }
				?>
			</div><div><?php
				set_query_var('trx_addons_args_sc_form_field', array_merge($args, array(
					'field_name'  => 'email',
					'field_type'  => 'text',
					'field_req'   => true,
					'field_icon'  => 'trx_addons_icon-mail',
					'field_title' => esc_html__('E-mail', 'corgan'),
					'field_placeholder' => esc_html__('Your e-mail', 'corgan')
					
				)));
				if ($fdir != '') { include $fdir; }
				?>
			</div><?php
		?></div><?php
		set_query_var('trx_addons_args_sc_form_field', array_merge($args, array(
			'field_name'  => 'message',
			'field_type'  => 'textarea',
			'field_req'   => true,
			'field_icon'  => 'trx_addons_icon-feather',
			'field_title' => esc_html__('Message', 'corgan'),
			'field_placeholder' => esc_html__('Your message', 'corgan')
			
		)));
		if ($fdir != '') { include $fdir; }
		?>
		<div class="sc_form_field sc_form_field_button"><button class="sc_button inv_button sc_button_size_large"><?php esc_html_e('Add comment', 'corgan'); ?></button></div>
		<div class="trx_addons_message_box sc_form_result"></div>
	</form>
</div><!-- /.sc_form -->
