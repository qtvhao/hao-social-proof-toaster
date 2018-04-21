<form action="<?php use Haosf_Social_Proof_Toaster\Plugin;

echo admin_url('options.php') ?>" method="post">
	<input type="hidden" name="action" value="update">
	<?php wp_nonce_field('options-options') ?>
	<input type="hidden" name="option_page" value="options" />
	<input type="hidden" name="page_options" value="haosf_toast_enable_virtual_product_order_toast,haosf_toast_virtual_product_message_top_format,haosf_toast_product_virtual_social_proof_middle_message,haosf_toast_product_virtual_social_proof_bottom_message,haosf_toast_names_repository,haosf_toast_addresses_repository,haosf_toast_product_virtual_total_sales,haosf_toast_product_virtual_subject_format" />
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
                        <textarea style="min-width:500px;" rows="3" type="text" class="" title=""
                                  name="haosf_toast_virtual_product_message_top_format"><?php echo esc_attr(Plugin::instance()->setting( 'virtual_product_message_top_format', __('<span class="haosf_toast_person_name">[haosf_random_name]</span> from <span class="haosf_toast_person_address">[haosf_random_address]</span>', 'haosf'))); ?></textarea>
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
                        <textarea style="min-width:500px;" rows="3" type="text" class="" title=""
                                  name="haosf_toast_product_virtual_social_proof_middle_message"><?php echo esc_attr( Plugin::instance()->setting( 'product_virtual_social_proof_middle_message',
		                        __( "Just bought <span>%s</span>", 'haosf' ) )); ?></textarea>
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
                        <textarea style="min-width:500px;" rows="3" type="text" class="" title=""
                                  name="haosf_toast_product_virtual_social_proof_bottom_message"><?php echo esc_attr( Plugin::instance()->setting( 'product_virtual_social_proof_bottom_message',
		                        __( "Total sales: %s", 'haosf' ) )); ?></textarea>
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Names repository for pick randomly','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <textarea type="text" class="" rows="10" style="width:100%;    min-width: 500px;" title="" name="haosf_toast_names_repository"><?php
	                        $names = Plugin::instance()->setting( 'names_repository',
		                        require_once HAOSF_PATH . 'includes/names-repository.php' );
	                        echo is_string($names)?$names:implode( PHP_EOL, $names);
                            ?></textarea>
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Addresses repository for pick randomly','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <textarea type="text" class="" rows="10" style="width:100%;    min-width: 500px;" title="" name="haosf_toast_addresses_repository"><?php
	                        $addresses = Plugin::instance()->setting( 'addresses_repository',
		                        require_once HAOSF_PATH . 'includes/address-repository.php' );
	                        echo is_string($addresses)?$addresses:implode( PHP_EOL, $addresses);
                            ?></textarea>
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Edit what show as total sales in bottom line','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <textarea type="text" class="" rows="3" style="width:100%;    min-width: 500px;" title="" name="haosf_toast_product_virtual_total_sales"><?php
	                        echo Plugin::instance()->setting( 'product_virtual_total_sales', '[haosf_random range="1000,2000" session_remember=1 session_remember_key="uri" session_remember_salt=0]' );
                            ?></textarea>
                    </label>
                </fieldset>
            </td>
        </tr>
        <tr valign="top" class="">
            <th scope="row" class="titledesc">
		        <?php echo __('Custom what shown in middle line. Eg. current products or upsell products','haosf') ?>
            </th>
            <td class="forminp forminp-checkbox">
                <fieldset>
                    <label>
                        <textarea type="text" class="" rows="3" style="width:100%;    min-width: 500px;" title="" name="haosf_toast_product_virtual_subject_format"><?php
	                        echo Plugin::instance()->setting('product_virtual_subject_format', "[haosf_product current=1]");
                            ?></textarea>
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
