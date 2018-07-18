<section class="order-summary">
       <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                 <div class="os-box">
                   <div class="os-top">
                     <h2>Order Summary</h2>
                     <p><a href="#">Hide details</a></p>
                   </div>
                   <div class="total-sec">
                     <h3>Spirit Stallion</h3>
                     <ul class="items-cost">
                       <?php
                       do_action( 'woocommerce_review_order_before_cart_contents' );
                       foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                         $_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                         if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                       ?>
                        <li>
                          <div class="item-name">
                            <?php
                              // @codingStandardsIgnoreLine
                              echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                '<a href="%s" class="remover" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                __( 'Remove this item', 'woocommerce' ),
                                esc_attr( $_product->get_id() ),
                                esc_attr( $_product->get_sku() )
                              ), $cart_item_key );
                            ?>
                             <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ); ?></div>
                           <div class="item-price">
                             <strong><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></strong>
                           </div>
                        </li>
                      <?php } } ?>
                      </ul>
                        <div class="promo-code clearfix">
                          <input type="text"  id="coupon_coder" placeholder="Have a promo code? Enter here ..">
                          <input type="button" name="apply_coupon" id="apply_code" value="Apply">
                        </div>
                      <ul class="total-amt">
                        <li>
                          <div class="sub_total"><?php _e( 'Subtotal', 'woocommerce' ); ?></div>
                           <div class="total-price"><strong><?php wc_cart_totals_subtotal_html(); ?></strong></div>
                        </li>
                        <li>
                          <div class="sub_total"><?php _e( 'Total', 'woocommerce' ); ?></div>
                           <div class="total-price"><strong><?php wc_cart_totals_order_total_html(); ?></strong></div>
                        </li>
                      </ul>
                     </div>
                   </div>
                 </div>
              </div>
          </div>
       </section>
<script>
jQuery( "#apply_code" ).click(function() {
  jQuery("#coupon_code").val(jQuery("#coupon_coder").val());
  jQuery("#apply_coupon").click();
});
</script>
