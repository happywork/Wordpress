<section class="payment-sec">
       <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                 <div class="payment-box payment_tabs_sec">
                   <!-- tabs -->
                   <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#credit-debit" role="tab" data-toggle="tab">PAY WITH CREDIT OR DEBIT CARD</a></li>
                      <li role="presentation"><a href="#debit-credit" role="tab" data-toggle="tab">PAY WITH DEBET OR CREDIT CARD</a></li>
                   </ul>
                   <!-- Tab panes -->
                   <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="credit-debit"><!-- tab1 -->
                        <p><strong>Add a new card</strong></p>
                        <form>
                          <div class="form-group">
                            <p class="c_no"><label>Card number<sup>*</sup></label></p>
                            <input type="text" class="form-input card-no" id="cardNumber" required="" placeholder="XXXX - XXXX - XXXX">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-input" id="Nameoncard" placeholder="Name on card*" required="">
                          </div>
                          <p><label>Expiry Date<sup>*</sup></label></p>
                          <div class="row">
                              <div class="col-md-6">
                                  <p class="form-group">
                                      <select class="form-select">
                                          <option>Select month ...</option>
                                          <option value="01">January</option>
                                          <option value="02">February </option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                      </select>
                                  </p>
                              </div>
                              <div class="col-md-6">
                                 <p class="form-group">
                                      <select class="form-select">
                                          <option>Select year ...</option>
                                          <option value="18"> 2018</option>
                                          <option value="19"> 2019</option>
                                          <option value="20"> 2020</option>
                                          <option value="21"> 2021</option>
                                      </select>
                                  </p>
                              </div>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-input" id="cvv" placeholder="CVV number*" required="">
                          </div>
                          <div class="checkbox">
                              <label>
                                <input value="" checked="" type="checkbox">
                                <span>Remember for future purchases.</span>
                              </label>
                          </div>
                          <div class="safe_sec">
                            <p><img src="<?php echo get_stylesheet_directory_uri();?>/images/lock-icon.png" alt="image"></p>
                            <p>Paypal stores your details safely for quick payments on <strong>Cavalletti</strong></p>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <button type="reset" class="btn">Cancel</button>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <button type="submit" class="btn">PAY $78</button>
                            </div>
                          </div>
                        </form>
                      </div><!-- tab1 -->

                      <!-- tab2 -->
                      <div role="tabpane2" class="tab-pane fade" id="debit-credit">
                          <p><strong>Add a new card</strong></p>
                        <form>
                          <div class="form-group">
                            <p class="c_no"><label>Card number<sup>*</sup></label></p>
                            <input type="text" class="form-input card-no" id="cardNumber" required="" placeholder="XXXX - XXXX - XXXX">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-input" id="Nameoncard" placeholder="Name on card*" required="">
                          </div>
                          <p><label>Expiry Date<sup>*</sup></label></p>
                          <div class="row">
                              <div class="col-md-6">
                                  <p class="form-group">
                                      <select class="form-select">
                                          <option>Select month ...</option>
                                          <option value="01">January</option>
                                          <option value="02">February </option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                          <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                      </select>
                                  </p>
                              </div>
                              <div class="col-md-6">
                                 <p class="form-group">
                                      <select class="form-select">
                                          <option>Select year ...</option>
                                          <option value="18"> 2018</option>
                                          <option value="19"> 2019</option>
                                          <option value="20"> 2020</option>
                                          <option value="21"> 2021</option>
                                      </select>
                                  </p>
                              </div>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-input" id="cvv" placeholder="CVV number*" required="">
                          </div>
                          <div class="checkbox">
                              <label>
                                <input value="" checked="" type="checkbox">
                                <span>Remember for future purchases.</span>
                              </label>
                          </div>
                          <div class="safe_sec">
                            <p><img src="images/lock-icon.png" alt="image"></p>
                            <p>Paypal stores your details safely for quick payments on <strong>Cavalletti</strong></p>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-6">
                              <button type="reset" class="btn">Cancel</button>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <button type="submit" class="btn" name="woocommerce_checkout_place_order" id="place_order">PAY $78</button>
                            </div>
                          </div>
                        </form>
                      </div><!-- tab2 -->

                   </div>
                   <!-- tabs -->
                 </div>
              </div>
          </div>
       </div>
    </section>
