<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <?php $this->table() ?>
    <form action="<?php echo esc_html(admin_url('admin-post.php')); ?>" method="POST">
        <input type="hidden" name="page" value="<?php echo $_GET['page'];?>"/>
        <?php wp_referer_field();?>
        <?php submit_button(__('Recreate Queue', \B2W\SkyHub\View\Admin\Admin::DOMAIN));
        ?>
    </form>
</div>
