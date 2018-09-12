<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="woocommerce-shipping-fields">
	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>

		<h3 id="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></span>
			</label>
		</h3>

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
					$fields = $checkout->get_checkout_fields( 'shipping' );

					foreach ( $fields as $key => $field ) {
						$field['return'] = true;
						if ( isset( $field['country_field'], $fields[ $field['country_field'] ] ) ) {
							$field['country'] = $checkout->get_value( $field['country_field'] );
						}
						$theField = woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
						$bits = explode("</label>", $theField);
			$theField = $bits[1];
			$theField = str_replace('</p>', '', $theField);
			$theField = str_replace('placeholder="', 'placeholder="'. $field['label'] .' ', $theField);
			$theField = str_replace('input-text', 'account-input-text', $theField);
			if (strpos($field['label'], "name")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-user" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			if (strpos($key, "address")||strpos($key, "state")||strpos($key, "city")||strpos($key, "postcode")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-map-marker" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			
			if (strpos($key, "email")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-envelope" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			if (strpos($key, "phone")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-phone" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
		$script_for_actions ='	<script>
		jQuery("#'. $key .'").focus(function(){
    jQuery("#id_' . $key.'").css("color", "#eb286e");});
	jQuery("#'. $key .'").focusout(function(){
    jQuery("#id_'.$key.'").css("color", "#46a9c6");});
	</script>';

			

					echo $theField;
						echo $script_for_actions;
					}
				?>
			</div>

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

	<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

			<h3><?php _e( 'Additional information', 'woocommerce' ); ?></h3>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : 
            	$field['return']=true;
			 $theField = woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); 
                $bits = explode("</label>", $theField);
			$theField = $bits[1];
			$theField = str_replace('</p>', '', $theField);
			$theField = str_replace('placeholder="', 'placeholder="'. $field['label'] .' ', $theField);
			$theField = str_replace('input-text', 'account-input-text', $theField);
			if (strpos($field['label'], "name")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-user" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			if (strpos($key, "address")||strpos($key, "state")||strpos($key, "city")||strpos($key, "postcode")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-map-marker" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			
			if (strpos($key, "email")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-envelope" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
			if (strpos($key, "phone")){
				$theField = '<div class="review-input-group"><div class="input-group-label" id="name-span"><i class="fa fa-phone" id="id_'. $key .'"></i></div>' . $theField . "</div>";
			}
		$script_for_actions ='	<script>
		jQuery("#'. $key .'").focus(function(){
    jQuery("#id_' . $key.'").css("color", "#eb286e");});
	jQuery("#'. $key .'").focusout(function(){
    jQuery("#id_'.$key.'").css("color", "#46a9c6");});
	</script>';

			

					echo $theField;
						echo $script_for_actions;?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
</div>
