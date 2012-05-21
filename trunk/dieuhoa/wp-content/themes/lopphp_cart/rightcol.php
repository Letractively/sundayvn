</div>
<div class="BorderBox BoxWhiteBot">
    <div class="BorderBoxInner">
        <div class="BorderBoxInner1">&nbsp;</div>
    </div>
</div>

</div>
<div id="ContentSBar" class="left">
    
    <div class="BorderBox">
        <div class="BorderBoxInner">
            <div class="BorderBoxInner1">&nbsp;</div>
        </div>
    </div>
    <div class="ContentSBarBody">
        <div class="customize">
            <div class="modTitleBar">
                <div class="modTitleBarInner">
                    <div class="modTitleBarInner1"><a href="#">Loại máy chấm công</a></div>
                </div>
            </div>
            <ul class="ListModule TextList">
                <?php
                    $categories = get_terms( 'pro_category' );
                    $count = count($categories);
                    $i=1;
                    foreach ($categories as $cat)
                    {
                    ?>
                    <li <?php if ($i==$count)echo 'class="Last"'; ?>><a href="<?php echo get_term_link($cat->slug, 'pro_category') ?>"><?php echo $cat->name ?></a></li>
                    <?php
                    }
                ?>
               

            </ul>
        </div>
    </div>
    <div class="BorderBox BoxWhiteBot">
        <div class="BorderBoxInner">
            <div class="BorderBoxInner1">&nbsp;</div>
        </div>
    </div>

<?php

        dynamic_sidebar('right-sidebar');
    ?>
    </div>