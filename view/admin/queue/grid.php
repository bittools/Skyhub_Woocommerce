<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <?php $this->table() ?>    
    <form action="<?php echo esc_html(admin_url('admin-post.php')); ?>" method="POST" style="display: inline;">
        <?php $page =  B2W\SkyHub\View\Admin\Admin::SLUG_QUEUE_INTEGRATION_SKYHUB_EXECUTE;?>
        <input type="hidden" name="page" value="<?php echo $page;?>"/>
        <?php wp_referer_field();?>
        <?php
        submit_button(
            __('Execute Queue', \B2W\SkyHub\View\Admin\Admin::DOMAIN),
            'primary large',
            'submit',
            false
        );
        ?>
    </form>
</div>
