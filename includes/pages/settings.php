<div class="wrap about-wrap full-width-layout">
    <h1>
		<?php echo __( 'Welcome to Vietnam Social Proof Toaster', 'haosf' ) ?>
    </h1>
    <p class="about-text">
		<?php echo __( 'Thank you for use our plugin. Next, in this page you can get some helpful tips.', 'haosf' ) ?>
    </p>
    <h2 class="nav-tab-wrapper wp-clearfix">
        <a href="<?php echo admin_url( 'options-general.php?page=haosf-proof-toaster' ); ?>"
           class="nav-tab ">About</a>
        <a href="<?php echo admin_url( 'options-general.php?page=haosf-proof-toaster' ); ?>"
           class="nav-tab nav-tab-active">Settings</a>
    </h2>


	<div id="settings">
		<form action="<?php echo admin_url('options.php') ?>" method="post">
			<input type="hidden" name="action" value="update">
			<?php wp_nonce_field('options-options') ?>
			<input type="hidden" name="option_page" value="options" />
			<input type="hidden" name="page_options" value="haosf_toast_hidden_for_product_not_sold_yet" />


            <table class="form-table">
                <tbody>
                <tr valign="top" class="">
                    <th scope="row" class="titledesc">
	                    <?php echo __('Hide toast for product not sold yet','haosf') ?>
                    </th>
                    <td class="forminp forminp-checkbox">
                        <fieldset>
                            <label>
                                <input type="checkbox" class="" title=""
	                                <?php
	                                checked("on", get_option( 'haosf_toast_hidden_for_product_not_sold_yet', true ));
	                                ?>                                       name="haosf_toast_hidden_for_product_not_sold_yet">
                                <span><?php echo __('Hide/show','haosf') ?></span>
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
		<?php do_action( 'haosf_after_settings') ?>
	</div>

</div>
