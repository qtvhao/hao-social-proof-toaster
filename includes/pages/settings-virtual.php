<form action="<?php use Haosf_Social_Proof_Toaster\Plugin;

echo admin_url('options.php') ?>" method="post">
	<input type="hidden" name="action" value="update">
	<?php wp_nonce_field('options-options') ?>
	<input type="hidden" name="option_page" value="options" />
	<input type="hidden" name="page_options" value="haosf_toast_enable_virtual_product_order_toast,haosf_toast_virtual_product_message_top_format,haosf_toast_product_virtual_social_proof_middle_message,haosf_toast_product_virtual_social_proof_bottom_message" />
	<table class="form-table">
		<tbody>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
				<?php echo __('Show virtual orders for product','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <input type="checkbox" class="" title=""
							<?php
							checked("on", get_option( 'haosf_toast_enable_virtual_product_order_toast', 'on' ));
							?>                                       name="haosf_toast_enable_virtual_product_order_toast">
                        <span><?php echo __('Hide/show','haosf') ?></span>
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Edit top message when popup virtual social proof','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <input type="text" class="" title=""
                               value="<?php
				               echo esc_attr(Plugin::instance()->setting( 'virtual_product_message_top_format', __('<span class="haosf_toast_person_name">[haosf_random_name]</span> from <span class="haosf_toast_person_address">[haosf_random_address]</span>', 'haosf')));
				               ?>" name="haosf_toast_virtual_product_message_top_format">
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Edit middle message when popup virtual social proof','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <input type="text" class="" title=""
                               value="<?php
				               echo esc_attr( Plugin::instance()->setting( 'product_virtual_social_proof_middle_message',
					               __( "Just bought <span>%s</span>", 'haosf' ) ));
				               ?>" name="haosf_toast_product_virtual_social_proof_middle_message">
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Edit bottom message when popup virtual social proof','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <input type="text" class="" title=""
                               value="<?php
				               echo esc_attr( Plugin::instance()->setting( 'product_virtual_social_proof_bottom_message',
					               __( "Total sales: %s", 'haosf' ) ));
				               ?>" name="haosf_toast_product_virtual_social_proof_bottom_message">
                    </label>
                </fieldset>
            </td>
        </tr>
		</tbody>
	</table>

	<div>
		<button type="submit" class="button button-primary">
			<?php echo __('Save','haosf') ?>
		</button>
	</div>
</form>
