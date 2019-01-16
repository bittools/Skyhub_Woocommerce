<?php /** @var \B2W\SkyHub\View\Admin\Attribute\Field\Text $this */ ?>
<input type="text" name="related-attribute" value="<?php echo $this->getValue() ?>" />
<?php if ($this->getNote()): ?>
    <br /><?php echo $this->getNote() ?>
<?php endif ?>
