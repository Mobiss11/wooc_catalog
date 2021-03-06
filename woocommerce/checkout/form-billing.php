<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-billing-fields">





<div class="basket-info">
	<h3 class="basket-info__title"><?php esc_html_e( 'Контактные данные ', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

		foreach ( $fields as $key => $field ) {
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		}
		?>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout );
	 if ( ! is_ajax() ) {
           	do_action( 'woocommerce_review_order_before_payment' );
           }
           ?>
           <div id="payment" class="woocommerce-checkout-payment">
           	<?php if ( WC()->cart->needs_payment() ) : ?>
           		<ul class="wc_payment_methods payment_methods methods">
           			<?php
           			if ( ! empty( $available_gateways ) ) {
           				foreach ( $available_gateways as $gateway ) {
           					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
           				}
           			} else {
           				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
           			}
           			?>
           		</ul>
           	<?php endif; ?>
           	<div class="form-row place-order">
           		<noscript>
           			<?php
           			/* translators: $1 and $2 opening and closing emphasis tags respectively */
           			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
           			?>
           			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
           		</noscript>

           		<?php wc_get_template( 'checkout/terms.php' ); ?>

           		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

           		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Оставить заявку" data-value="Оставить заявку">Оставить заявку</button>' ); // @codingStandardsIgnoreLine ?>

           		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

           		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
           	</div>
           </div>
           <?php
           if ( ! is_ajax() ) {
           	do_action( 'woocommerce_review_order_after_payment' );
           }?>
<!--
  </div>

<div class="basket-info">
-->
  <h3 class="basket-info__title"><?php esc_html_e( 'Стоимость ', 'woocommerce' ); ?></h3>
  <table class="shop_table woocommerce-checkout-review-order-table">

    <tfoot>


      <tr class="order-total">
        <td><?php wc_cart_totals_order_total_html(); ?></td>
      </tr>


    </tfoot>

  </table>
<!--
  <ul class="basket-info__list">
    <li>Lörem ipsum nyss tinade  Lörem ipsum nyss tinade </li>
    <li>Lörem ipsum nyss tinadenyss tinade </li>
    <li>Lörem ipsum nyss tinade </li>
  </ul>
-->
  <div class="basket-info__text">
    Окончательную стоимость заказа вы сможете узнать у менеджера.
  </div>
</div>
</div>
<!-- //Регистрация
<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

	</div>
<?php endif; ?>
-->