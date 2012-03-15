<?php
    $this->breadcrumbs=array('Contact');
?>
<h1>Contacts</h1>

<p>
    <a href="<?php echo $this->createUrl('google/index'); ?>">Import from Google Contact</a>&nbsp;|&nbsp;<a href="<?php echo $this->createUrl('default/create'); ?>">Create a contact</a>
</p>
<?php if ( !empty($contacts)): ?>
    <div>
        <table>
            <thead>
                <tr>				
 
                    <th>Contact Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $idx = 1;
                    foreach($contacts as $c):?>
                    <tr>				
                    
                        <td><?php echo $c["name"];?></td>
                        <td><?php echo str_replace(",", "<br/>", $c["phones"]);?></td>
                        <td><?php echo str_replace(",", "<br/>", $c["emails"]);?></td>
                        <td><?php echo str_replace(",", "<br/>", $c["addresses"]);?></td>
                        <td><a href="<?php echo $this->createUrl('default/edit',array('id'=>$c['id'])); ?>">Edit</a>&nbsp;<?php echo CHtml::link('Delete',$this->createUrl('default/delete',array('id'=>$c['id'])),array("confirm"=>"Are you sure?")); ?></td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
        <?php 
            $this->widget('CLinkPager', array(
            'currentPage'=>$page-1,
            'itemCount'=>$total,
            'pageSize'=>$pageSize,
            'maxButtonCount'=>5,
            'header'=>'',
            ));
        ?>
    </div>
    <?php endif; ?>
