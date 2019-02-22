<?php /** @var \B2W\SkyHub\View\Admin\Order $this */ ?>
<?php echo $this->getOrder()->getCode() ?>

<?php
add_action( 'woocommerce_order_details_after_order_table', 'novo_campo_woocommerce' ); 
function novo_campo_woocommerce( $checkout ) { 
    echo "<p class='form-field form-field-wide'>
            <label for='notaFiscal'>Nº nota Fiscal: </label>
            <input type='text' name='_invoice_key' maxlength='45' style='width: 400px;' value=''/>
        </p>";
}
?>


<!--p class='form-field form-field-wide'>
    <label for='notaFiscal'>Nº nota Fiscal: </label>
    <input type='text' name='_invoice_key' maxlength="45" style='width: 400px;' value='<?//=$this->getOrder()->getInvoices()->first()->getKey();?>'/>
</p-->