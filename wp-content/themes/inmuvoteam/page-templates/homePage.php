<?php
/**
 * Template Name: Home page web
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<!-- ADD -- carrusel intro de home OPT news room-->
<section class="bgc--white">
<?php if(get_field('slider_intro', 'options')): ?>
    <ul class="slider_intro">
        <?php while(has_sub_field('slider_intro', 'options')): ?>
            <li>
                <div class="bgi bgi_home" data-aos="fade-down" style="background-image: url(<?php echo the_sub_field('imagen_home'); ?>)">
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
</section>
<!-- FIN -- carrusel intro de home OPT news room-->
<!---- ADD -- Since OPT NEWS ROMM-->
<section class="bgc--white box_triangle" ><!--Section since OPT-->
    <div class="container ">
        <div class="row">
            <div class="col text-center">
                <div class="box_title_line box_title_line_green" data-aos="fade-up">
                    <div class="title cl_black"><!--SINCE TITLE-->
                        <h2 class="display-1 txt_upper">
                            <?php the_field('intro_title', 'options'); ?>
                        </h2>
                    </div>
                    <div class="subtitle cl_black"><!--SINCE SUBTITLE-->
                        <h2 class="h2 txt_upper">
                            <?php the_field('intro_subtitulo', 'options'); ?>
                        </h2>
                    </div>
                </div>
                <div class="paragraf cl_black mg_box--middle" data-aos="zoom-in-up">
                    <p>
                        <?php the_field('intro_parrafo','options')?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!---- ADD -- Since OPT NEWS ROMM-->
<section>
    <div class="container">
        <div class="row ">
            <div class="col pd_top--x50 pd_bottom--x50" data-aos="fade-up">
                <div class="box_title_line box_title_line_black">
                    <div class="title txt_center cl--black display-4 txt_upper">
                        <?php the_field('solutions_title','options')?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(get_field('solutions_item', 'options')): ?>

                <?php $rowNum = 1; ?>
                <?php while(has_sub_field('solutions_item', 'options')): ?>
                <?php $rowNum++;
                $item1 = $rowNum % 2 === 0;
                ?>
                <?php if($item1):?>
                    <div class="row align-items-start no-gutters hover_solutions" data-aos="fade-right">
                        <div class="col-12 col-md-5 bgc--green aling_btn--right">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="item txt_ffSecond cl--black pd_box--x70 h2 txt_center">
                                            <?php echo the_sub_field('description'); ?>
                                    </div>
                                </div>
                                <div class="col align-self-end txt_right">
                                    <div class="btn btn_site--gray txt_upper">
                                        <?php echo the_sub_field('title_button'); ?> <i class="fa fa-angle-right ml-4"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn_ghost">Go..</a>
                        </div>
                        <div class="col-12 col-sm-8 col-md-7" style="overflow: hidden;">
                            <div class="w-100 bgi bgi_item--service" style="background-image: url(<?php echo the_sub_field('imagen'); ?>);">
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="row align-items-end no-gutters box_top--service hover_solutions" data-aos="fade-left">
                        <div class="col-12 col-md-5 order-last bgc--green aling_btn--right">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="item txt_ffSecond cl--black pd_box--x70 h2 txt_center">
                                            <?php echo the_sub_field('description'); ?>
                                    </div>
                                </div>
                                <div class="col align-self-end txt_left">
                                    <div class="btn btn_site--gray txt_upper">
                                        <i class="fa fa-angle-left mr-4"></i><?php echo the_sub_field('title_button'); ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn_ghost">Go..</a>
                        </div>
                        <div class="col-12 col-md-7 order-first" style="overflow: hidden;">
                            <div class="bgi bgi_item--service" style="background-image: url(<?php echo the_sub_field('imagen'); ?>);">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php endwhile; ?>

        <?php endif; ?>


    </div>
</section>
<!--start-->
<!--Whout Clientes-->
<section class="bgi bgi_customer pd_bottom--x50 pd_top--x200 mt-5">
    <div class="container">
        <div class="col-12 my-5">
            <div class="title cl_black text-center txt_capital txt_bold display-3" data-aos="fade-up">
                <?php the_field('title_customers','options')?>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if(get_field('slider_item_clients', 'options')): ?>
            <ul class="slider_customer my-5">
                <?php while(has_sub_field('slider_item_clients', 'options')): ?>
                    <li>
                        <div class="col bgc--white py-5 px-5" data-aos="flip-left">
                            <div class="icon icon_customer icon_customer_hpe mb-2" style="background-image: url(<?php echo the_sub_field('logo_customer'); ?>)"></div>
                            <div class="paragraf txt_ffSecond my-5">
                                <?php echo the_sub_field('customer_comment'); ?>
                            </div>
                            <div class="title txt_ffSecond txt_bold mt-2">
                                <?php echo the_sub_field('name_customer'); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
<!--Whout Clientes-->
<!--End-->
<!--start-->
<!-- Module Meet us-->
<section class="bgc--white pb-5">
    <div class="container">
        <div class="col-12 pd_top--x50 pd_bottom--x50">
            <div class="box_title_line box_title_line_green">
                <div class="title txt_center cl--black display-4 txt_upper" data-aos="fade-up">
                    <?php the_field('title_meet_us', 'options'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-xxs-12 col-md-7 col-lg-5 order-xs-last my-5">
                <div class="box_addres" data-aos="fade-right">
                    <div class="title txt_upper h3 txt_bold"><?php the_field('title_addres', 'options'); ?></div>
                    <div class="txt_info my-5"><?php the_field('info_addres', 'options'); ?></div>
                    <div class="box_info mb-5">
                        <?php if(get_field('data_addres', 'options')): ?>
                            <ul class="list--addres">
                                <?php while(has_sub_field('data_addres', 'options')): ?>
                                    <li>
                                        <a href="<?php echo the_sub_field('link_url'); ?>" target="_blank">
                                            <span class="icon icon_item" style="background-image: url(<?php echo the_sub_field('icono'); ?>)"></span>
                                            <span class="mg_left--x5 txt_data"><?php echo the_sub_field('date'); ?></span>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box_follow " data-aos="fade-left">
                    <div class="title txt_upper h3 txt_bold">
                        <?php the_field('title_follow_us', 'options'); ?>
                    </div>
                    <div class="box_info mb-5">
                        <?php if(get_field('data_addres', 'options')): ?>
                            <ul class="list--inline">
                                <?php while(has_sub_field('data_social', 'options')): ?>
                                    <li>
                                        <a href="<?php echo the_sub_field('social_link'); ?>" target="_blank">
                                            <span class="icon icon_social icon_social--<?php echo the_sub_field('name_social'); ?>"></span>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xxs-12 col-md-5 col-lg-7 my-5">
                <form action="">
                    <div class="form-row" >
                        <div class="form-group col-12 col-sm-6" data-aos="fade-right">
                            <input type="text" class="form-control form-control-lg name" placeholder="Name">
                        </div>
                        <div class="form-group col-12 col-sm-6" data-aos="fade-left">
                            <input type="text" class="form-control form-control-lg email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="form-group col-12 col-sm-6" data-aos="fade-right">
                            <input type="text" class="form-control form-control-lg" placeholder="Company">
                        </div>
                        <div class="form-group col-12 col-sm-6" data-aos="fade-left">
                            <select class="form-control form-control-lg">
                                <option>Select Country</option>
                                <option>USA</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" >
                        <div class="form-group col-12 col-sm-6" data-aos="fade-right">
                            <input type="text" class="form-control form-control-lg" placeholder="Job Title">
                        </div>
                        <div class="form-group col-12 col-sm-6" data-aos="fade-left">
                            <div class="container">
                            <div class="row">
                            <input type="text" class="form-control  form-control-lg col" placeholder="Area">
                            <input type="text" class="form-control  form-control-lg col-6" placeholder="Phone">
                            <input type="text" class="form-control  form-control-lg col" placeholder="Ext">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" data-aos="fade-left">
                        <div class="form-group col">
                            <textarea class="form-control form-control-lg" name="mesagge" placeholder="Message" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="d-block" data-aos="flip-up">
                        <button class="btn btn--full btn_site--green submit txt_upper txt_bold"type="submit">submit Form</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- Module Meet us-->

<!--End-->
<?php get_footer(); ?>
