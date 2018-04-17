<form action="<?php echo admin_url('options.php') ?>" method="post">
	<input type="hidden" name="action" value="update">
	<?php wp_nonce_field('options-options') ?>
	<input type="hidden" name="option_page" value="options" />
	<input type="hidden" name="page_options" value="haosf_fake_product_order_dice_min,haosf_fake_product_order_dice_max" />
	<table class="form-table">
		<tbody>
		<tr valign="top" class="">
			<th scope="row" class="titledesc">
				<?php echo __('Hiển thị fake số lượng order trong khoảng:','haosf') ?>
			</th>
			<td class="forminp forminp-checkbox">
				<fieldset>
					<label>
						<input type="number" class="" title="" value="<?php echo get_option('haosf_fake_product_order_dice_min', 11000); ?>" name="haosf_fake_product_order_dice_min">
						<span><?php echo __('Số tối thiểu','haosf') ?></span>
					</label>
				</fieldset>
			</td>
		</tr>
		<tr valign="top" class="">
			<th scope="row" class="titledesc">
			</th>
			<td class="forminp forminp-checkbox">
				<fieldset>
					<label>
						<input type="number" class="" title="" value="<?php echo get_option('haosf_fake_product_order_dice_max', 17000); ?>" name="haosf_fake_product_order_dice_max">
						<span><?php echo __('Số tối đa','haosf') ?></span>
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
