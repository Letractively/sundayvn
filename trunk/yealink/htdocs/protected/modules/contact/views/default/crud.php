<?php
    $this->breadcrumbs=array('Contact');
?>
<h1>Contacts</h1>
<?php $action = strtolower($this->getAction()->id); ?>
<?php if ($action == 'create' or $action == 'edit')
    { ?>
    <?php echo CHtml::errorSummary($model)?>
    <form method="post">
        <?php
            if ($action == 'edit')
            {
            ?>
               <span class="span-4"><?php echo CHtml::activeLabel($model, "account")?></span><span><?php echo $model->attributes['account']; ?></span><br /><br />
            <?php
            }
            else
            {
          ?>
            <span class="span-4"><?php echo CHtml::activeLabel($model, "account")?></span><?php echo CHtml::activeTextField($model, "account")?><br />
          <?php    
            }
        ?>
        <span class="span-4"><?php echo CHtml::activeLabel($model, "name")?></span><?php echo CHtml::activeTextField($model, "name")?><br />
        <span class="span-4"><?php echo CHtml::activeLabel($model, "phone")?></span><?php echo CHtml::activeTextField($model, "phone")?><br />
        <span class="span-4"><?php echo CHtml::activeLabel($model, "address")?></span><?php echo CHtml::activeTextField($model, "address")?><br />
        <span class="span-4"><?php echo CHtml::activeLabel($model, "email")?></span><?php echo CHtml::activeTextField($model, "email")?><br />
        <?php echo CHtml::submitButton('Save')?>
    </form>
    <?php }
    elseif ($action == 'delete')
    {
    ?>
    <form method="post">
        <p>Are you sure to delete this contact?</p>

        <input type="submit" name ='oktodel' value="Yes" />&nbsp;
        <input type="submit" name ='oktodel' value="No" />
    </form>
    <?php
    }
?>
