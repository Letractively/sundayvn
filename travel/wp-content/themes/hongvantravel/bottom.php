<div class="footer">

    <div class="width">



        <div class="corner-left"><div class="corner-right">



                <div class="indent">

                    <p align="center">
                        <?php
                            $payment = 188 ;
                            $payment = get_post($payment);
                            $deposit = 190 ;
                            $deposit = get_post($deposit);
                                                        $travelterm = 192 ;
                            $travelterm = get_post($travelterm);
                            $privacy = 194  ;
                            $privacy= get_post($privacy);

                        ?>
                        <a href="<?php bloginfo('url'); ?>">Home</a> | <a href="<?php echo get_permalink( $payment->ID); ?>"><?php echo $payment->post_title; ?></a> | <a href="<?php echo get_permalink( $deposit->ID); ?>"><?php echo $deposit->post_title; ?></a> | <a href="<?php echo get_permalink( $travelterm->ID); ?>"><?php echo $travelterm->post_title; ?></a> | <a href="<?php echo get_permalink( $privacy->ID); ?>"><?php echo $privacy->post_title; ?></a>
                    </p>

                </div>



            </div></div>



    </div>

</div>

<div id="bottom-contact" class="clearfix">
    <div class="headquarter">
        <h3>HANOI - VIETNAM</h3>
        Suite 707, Thang Long Bld<br />
        115 Le Duan St, Hoan Kiem Dist, Hanoi<br />
        T.(844) 39429444 - F.(844)39429442

    </div>  
    <div class="headquarter">
        <h3>HCM CITY - VIETNAM</h3>
        4th floor, Sovilaco Bld, 1 Pho Quang St,<br />
        Tan Binh Dist, HCMC<br />
        T.(848)39972255 - F.(848)39972256
    </div>
    <div class="headquarter">
        <h3>SIEM REAP - CAMBODIA</h3>
        D24 Oum Khun Street,<br />
        Khum Svay Dankum, Siem Reap<br />
        T.(855) 6396 7008 - F.(855) 6396 7009 
    </div>
    <div class="headquarter last">
        <h3>YANGON - MYANMAR</h3>
        Suite 1216, Sakura Tower<br />
        339 Bogyoke Aung San Road, Yangon<br />
        T: (95) 973 121 788 - (95)1 255 097
    </div>  
    <div class="clear">&nbsp;</div>
    <div id="copyright">
        <p><b>U.S.A Office: 11445 E. Via Linda Ste 2 #207, Scottsdale AZ 85259, USA. </b></p>
        <?php
    $licen = 196 ;
    $licen = get_post($licen);
?>
        <p><b>International Tour Operator <a href="<?php echo get_permalink( $licen->ID ); ?>"><?php echo $licen->post_title ?></a></b></p>
        <p class="all-right-re">All contents and photography © 2006 - 2011 Vietnam Today Travel.</p>
    </div>     
            </div>