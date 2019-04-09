<?php /** @var \B2W\SkyHub\View\Admin\Order $this */ ?>
<?php 
$invoice = $this->getOrder()->getInvoices()->first();
$key = ($invoice ? $invoice->getKey() : null);
?>
<?php echo $this->getOrder()->getCode();?>
<p class='form-field form-field-wide'>
    <label for='key'>Nº nota Fiscal: </label>
    <?php if ($this->isEditable()){?>
        <input type='text' onblur="validateInvoiceKey(this);" id='key' name='key' maxlength="44" style='width: 400px;' value='<?php echo $key;?>'/>
    <?php } else {
        echo $key;
    }
    ?>
</p>

<script>
function validateInvoiceKey(obj) {
    var key = obj.value;
    if (key.length == 0) {
        return;
    }

    if (key.length < 44) {
        obj.value = '';
        alert('Nº nota Fiscal precisa ter 44 caracteres.');
    }
}
</script>