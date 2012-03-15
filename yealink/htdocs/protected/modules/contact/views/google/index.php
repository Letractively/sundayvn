<?php
    $this->breadcrumbs=array('Contact');
?>
<h1>Google Contact Importer</h1>
<p><a href="<?php echo $url; ?>">Request contacts from your Google Contacts</a></p>
<div>	
    <?php if( !empty($errors)):?>
        <p><?php echo implode("<br/>", $errors);?></p>
        <?php endif;?>
    <?php if( $feed ): ?>
        <h3>Contacts from <?php echo $feed->title; ?></h3>
        <table id="table-contacts-list">
            <thead>
                <tr>
                    <th><input id="select-all" type="checkbox" name="contact" /></th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $idx = 1;
                    foreach($feed->contacts as $c): ?>
                    <tr>
                        <td><input class="check-contact" type="checkbox" name="contact[<?php echo $idx-1; ?>]" value="<?php echo $idx-1; ?>" /></td>
                        <td><?php echo $idx; ?></td>
                        <td><?php echo $c->title; ?></td>
                        <td><?php echo implode('<br/>', $c->phones); ?></td>
                        <td><?php echo implode('<br/>', $c->emails); ?></td>
                        <td><?php echo implode('<br/>', $c->addresses); ?></td>
                        <?php $idx++; ?>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
        <?php if( empty($feed->contacts)):?>
            <p>No any contacts found.</p>
            <?php else:?>
            <div>
                <input type="button" class="btn-import" value="Import Selected Contacts" id="btn-import-select">&nbsp;<input type="button" class="btn-import" value="Import All Contacts" id="btn-import"><span id="loading"></span>
                <br/>
                <br/>
                <br/>
                <p id="import-result"></p>
            </div>
            <?php endif;?>
        <?php endif;?>
</div>

