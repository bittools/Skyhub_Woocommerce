<?php $domain = \B2W\Skyhub\View\Admin\Admin::DOMAIN ?>
<?php /** @var $this \B2W\Skyhub\View\Admin\Attribute\EditAbstract */ ?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <a href="<?php echo admin_url() ?>admin.php?page=woocommerce-b2w-skyhub-attribute-list">
        <?php echo __('Back', $domain) ?>
    </a>

    <form method="post" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">

        <input type="hidden" name="entity_attribute" value="<?php echo $this->getEntity() ?>" />
        
        <div id="universal-message-container">
            <h2><?php echo __('Manage Attribute', $domain) ?>: <?php echo $this->getAttribute('label') ?></h2>

            <table>
                <colgroup>
                    <col style="width: 200px;" />
                    <col />
                </colgroup>
                <tr>
                    <td style="padding: 20px;"><?php echo __('Skyhub Name', $domain) ?></td>
                    <td style="padding: 20px;"><strong><?php echo $this->getAttribute('label') ?></strong></td>
                </tr>
                <tr>
                    <td style="padding: 20px;"><?php echo __('Skyhub Code', $domain) ?></td>
                    <td style="padding: 20px;">
                        <strong><?php echo $this->getAttribute('code') ?></strong>
                        <input type="hidden" name="attribute-code" value="<?php echo $this->getAttribute('code') ?>" />
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px;vertical-align: top;"><?php echo __('Related Attribute', $domain) ?></td>
                    <td style="padding: 20px;vertical-align: top;">
                        <?php $this->renderField($this->getMapped()) ?>
                    </td>
                </tr>
            </table>
            <?php
            wp_nonce_field(
                $this->nonce('action'),
                $this->nonce('field')
            );
            submit_button();
            ?>
    </form>
</div>
