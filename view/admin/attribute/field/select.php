<?php /** @var \B2W\SkyHub\View\Admin\Attribute\Field\Select $this */ ?>
<select name="related-attribute">
    <option value=""></option>
    <?php foreach ($this->getLocalAttributeList() as $attr): ?>
        <option value="<?php echo $attr ?>"<?php if ($attr == $this->getValue()): ?> selected<?php endif ?>>
            <?php echo $attr ?>
        </option>
    <?php endforeach ?>
</select>
