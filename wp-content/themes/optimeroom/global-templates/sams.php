<?php
/**
 * Sams setup.
 *
 * @package understrap
 */

?>
<?php
if( have_rows('slider_intro', 'options') ):

    while ( have_rows('slider_intro', 'options') ) : the_row();?>

        <p>
            <?php echo the_sub_field('imagen_home'); ?>
        </p>
        <?php
    endwhile;
else :
    // no rows found
endif;
?>
<h2><?php the_field('mi_title', 'options'); ?></h2>

<section class="bgc--white">
    <ul class="slider_intro">
        <li>
            <div class="bgi bgi_home" data-aos="fade-down">
            </div>
        </li>
    </ul>
</section>
<p><?php the_content(); ?></p>
<section class="bgc--white box_triangle" ><!--Section since OPT-->
    <div class="container ">
        <div class="row">
            <div class="col text-center">
                <div class="box_title_line box_title_line_green" data-aos="fade-up">
                    <div class="title cl_black">
                        <h2 class="display-1 txt_upper">Since 1998</h2>
                    </div>
                    <div class="subtitle cl_black">
                        <h2 class="h2 txt_upper">Providing Marketing Solutions and Services</h2>
                    </div>
                </div>
                <div class="paragraf cl_black mg_box--middle" data-aos="zoom-in-up">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus eaque facere id, ipsum quas voluptates? Ad alias architecto at impedit, natus reiciendis tenetur! Iure.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row ">
            <div class="col pd_top--x50 pd_bottom--x50" data-aos="fade-up">
                <div class="box_title_line box_title_line_black">
                    <div class="title txt_center cl--black display-4 txt_upper">
                        solutions & services
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-start no-gutters hover_solutions" data-aos="fade-right">
            <div class="col-12 col-md-5 bgc--green aling_btn--right">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="item txt_ffSecond cl--black pd_box--x20">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dicta ea eius eos est ipsa laboriosam laudantium libero molestias nesciunt officia officiis quis sed sint sunt ullam unde vitae, voluptatem?</p>
                        </div>
                    </div>
                    <div class="col align-self-end txt_right">
                        <div class="btn btn_site--gray txt_upper">
                            Marketing Solutions <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn_ghost">Go..</a>
            </div>
            <div class="col-12 col-sm-8 col-md-7" style="overflow: hidden;">
                <div class="w-100 bgi bgi_item--service" style="background-image: url('http://via.placeholder.com/668x445');">
                </div>
            </div>
        </div>
        <div class="row align-items-end no-gutters box_top--service hover_solutions" data-aos="fade-left">
            <div class="col-12 col-md-5 order-last bgc--green aling_btn--right">
                <div class="row no-gutters">
                    <div class="col-12">
                        <div class="item txt_ffSecond cl--black pd_box--x20">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dicta ea eius eos est ipsa laboriosam laudantium libero molestias nesciunt officia officiis quis sed sint sunt ullam unde vitae, voluptatem?</p>
                        </div>
                    </div>
                    <div class="col align-self-end txt_right">
                        <div class="btn btn_site--gray txt_upper">
                            Marketing Solutions <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn_ghost">Go..</a>
            </div>
            <div class="col-12 col-md-7 order-first" style="overflow: hidden;">
                <div class="bgi bgi_item--service" style="background-image: url('http://via.placeholder.com/668x445');">
                </div>
            </div>
        </div>
    </div>
</section>
<!--start-->
<!--Whout Clientes-->
<section class="bgi bgi_customer pd_bottom--x50 pd_top--x200">
    <div class="container">
        <div class="col-12 my-5">
            <div class="title cl_black text-center txt_capital txt_bold display-3" data-aos="fade-up">
                What our Clientes are Saying
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="slider_customer my-5">
            <li>
                <div class="col bgc--white py-5 px-5" data-aos="flip-left">
                    <div class="icon icon_customer icon_customer_hpe mb-2"></div>
                    <div class="paragraf txt_ffSecond my-5">
                        When I think about optime there are several things that always come to my mind: passion for customers, operational excellence and personal “touch”. You have the capability of “personalize” the treatment of every single customer and this is something that few companies knows how to do it well".
                    </div>
                    <div class="title txt_ffSecond txt_bold mt-2">
                        Latin America and Managing Director
                    </div>
                </div>
            </li>
            <li>
                <div class="col bgc--white py-5 px-5" data-aos="flip-left">
                    <div class="icon icon_customer icon_customer_adobe mb-2"></div>
                    <div class="paragraf txt_ffSecond my-5">
                        Working with Optime for more than 4 years, I have achieved a great differential in our market, and most importantly, with our business partners in Latin America. Throughout recent years, Optime has become an essential part of Adobe Latin America's Marketing team; They're constantly supporting them to excel with their incredible team, characterized by people with excellent capabilities and incredible human quality. Let's celebrate these first 20 years, of the four which we have been strategic partners for and let's hope there's many more to come. Congratulations Optime!".
                    </div>
                    <div class="title txt_ffSecond txt_bold mt-2">
                        Head of Marketing LATAM, Consumer & Business
                    </div>
                </div>
            </li>
            <li>
                <div class="col bgc--white py-5 px-5" data-aos="flip-left">
                    <div class="icon icon_customer icon_customer_zebra mb-2"></div>
                    <div class="paragraf txt_ffSecond my-5">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur commodi ducimus eius est eveniet fugiat illo inventore magni, maxime minus, quisquam quo quos reprehenderit suscipit tempora, ut vel vitae voluptates!
                    </div>
                    <div class="title txt_ffSecond txt_bold mt-2">
                        Channel Marketing Advisor
                    </div>
                </div>
            </li>
        </ul>
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
                    Meet us
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-xxs-12 col-md-7 col-lg-5 order-xs-last my-5">
                <div class="box_addres" data-aos="fade-right">
                    <div class="title txt_upper h3 txt_bold">Addres</div>
                    <div class="txt_info my-5">2400 North Commerce Parkway Suite 302, Weston FL 33326</div>
                    <div class="box_info mb-5">
                        <ul class="list--addres">
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_item icon_item--phone"></span>
                                    <span class="mg_left--x5 txt_data">+1 954 217 7085</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_item icon_item--fax"></span>
                                    <span class="mg_left--x5 txt_data">+1 954 217 7095</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_item icon_item--email"></span>
                                    <span class="mg_left--x5 txt_data">optimereach@optimeconsulting.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box_follow" data-aos="fade-left">
                    <div class="title txt_upper h3 txt_bold">Follow us</div>
                    <div class="box_info mb-5">
                        <ul class="list--inline">
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--pinterest"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--linkeding"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--instagram"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <span class="icon icon_social icon_social--youtube"></span>
                                </a>
                            </li>
                        </ul>
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