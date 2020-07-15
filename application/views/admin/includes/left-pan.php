<div class="col-sm-3 col-md-2 sidebar">

                <p style="background-color:#f5f5f5;">
                <button type="button" class="btn btn-xs btn-link" onclick="window.location.href = './dashboard.php?sub=1';">Home</button>
                <?php if(!empty($breadgram_title)) {?>
                /<button type="button" class="btn btn-xs btn-link" onclick="window.location.href = './<?php echo $breadgram_link;?>';"><?php echo $breadgram_title;?></button>
                <?php }?>
                </p>
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = '<?php echo $this->config->base_url()."admin/";?>/dashboard.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">User Listing</p></button>
                </p> 
                 <!--<p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './customer.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Customer</p></button>
                </p>
                   <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './orderlist.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Order Listing</p></button>
                </p>
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './paymentlist.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Payments</p></button>
                </p>
                  <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './order.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Order</p></button>
                </p>
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './transport.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Transport</p></button>
                </p>
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './ruf_item.php?sub=1';"><p style="margin-bottom: 0px; width: 80px;">Ra-Material</p></button>
                </p>-->
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './profile.php';"><p style="margin-bottom: 0px; width: 80px;">Profile</p></button>
                </p>
                <p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href = './logout';"><p style="margin-bottom: 0px; width: 80px;">Logout</p></button>
                </p>
        </div>