<?php
$domain = \B2W\SkyHub\View\Admin\Admin::DOMAIN;
$code = get_post_meta($this->getOrder()->getId(),'_skyhub_order_shipping_code');
$url = get_post_meta($this->getOrder()->getId(),'_skyhub_order_shipping_url');
?>

<p class='form-field form-field-wide'>
    <label for='_skyhub_order_shipping_url'><?php echo __('Tracking Url', $domain);?>: </label>
    <?php if ($this->isEditable()){?>
        <input type='text' name='_skyhub_order_shipping_url' style='width: 400px;' value='<?php echo $url[0];?>'/>
    <?php } else {
        echo $url[0];
    }
    ?>
</p>

<p class='form-field form-field-wide'>
    <label for='_skyhub_order_shipping_code'><?php echo __('Tracking Code', $domain);?>: </label>
    <?php if ($this->isEditable()){?>
        <input type='text' name='_skyhub_order_shipping_code' style='width: 400px;' value='<?php echo $code[0];?>'/>
    <?php } else {
        echo $code[0];
    }
    ?>
</p>