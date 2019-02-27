<?php /** @var \B2W\SkyHub\View\Admin\Order $this */ ?>
<?php 
$invoice = $this->getOrder()->getInvoices()->first();
$key = ($invoice ? $invoice->getKey() : null);
?>
<?php echo $this->getOrder()->getCode();?>
<p class='form-field form-field-wide'>
    <label for='invoice_key'>Nº nota Fiscal: </label>
    <?php if ($this->isEditable()){?>
        <input type='text' id='key' name='key' maxlength="44" style='width: 400px;' value='<?php echo $key;?>'/>
    <?php } else {
        echo $key;
    }
    ?>
</p>