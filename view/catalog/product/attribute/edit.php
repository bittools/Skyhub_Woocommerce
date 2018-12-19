<?php $domain = \B2W\Skyhub\View\Admin\Admin::DOMAIN ?>
<?php /** @var $this \B2W\Skyhub\View\Admin\Catalog\Product\Attribute\Edit */ ?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form method="post" action="<?php echo esc_html(admin_url('admin-post.php')); ?>">

        <div id="universal-message-container">
            <h2><?php echo __('Manage Attribute', $domainN) ?></h2>

            <table>
                <colgroup>
                    <col style="width: 200px;padding-right: 10px;" />
                    <col />
                </colgroup>
                <tr>
                    <td><?php echo __('Skyhub Code', $domain) ?></td>
                    <td><?php echo $this->getAttribute('code') ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Skyhub Name', $domain) ?></td>
                    <td><?php echo $this->getAttribute('label') ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Attribute Description', $domain) ?></td>
                    <td><?php echo $this->getAttribute('description') ?></td>
                </tr>
                <tr>
                    <td><?php echo __('Related Attribute', $domain) ?></td>
                    <td>
                        <select name="related-attribute">
                            <option value=""></option>
                            <?php foreach ($this->getLocalAttributeList() as $attr): ?>
                            <option value="<?php echo $attr ?>"<?php if ($attr == $this->getMapped()): ?> selected<?php endif ?>>
                                <?php echo $attr ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
            </table>

            <?php
                wp_nonce_field('acme-settings-save', 'acme-custom-message');
                submit_button();
            ?>
    </form>
</div>
