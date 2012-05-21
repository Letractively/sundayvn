</div>
</div>
</div>
<div id="Copyright">
    <div class="main clearfix">
        <div class="customize">
            <?php
                dynamic_sidebar(2);
            ?>
        </div>
    </div>
</div>
<div id="TagsCloud">
    <?php
        $tags = get_tags();


    ?>
    <div class="main clearfix">
        <ul class="clearfix">
            <?php
                foreach ($tags as $tag){
                    $tag_link = get_tag_link($tag->term_id);

                    $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                    $html .= "{$tag->name}</a>";
                ?>
                <li><?php echo $html; ?></li>
                <li>|</li>
                <?php 
                }
            ?>
        </ul>
    </div>
            </div>
        </div>
    </body>
</html>