<?php get_header(); ?>
        <main id="main-content">
            <div class="blog-post">
                <article class="post">
                    <header class="d-flex justify-content-center align-items-center" style="background: url(<?php the_field('background_image'); ?>) center center no-repeat;">
                        <div>
                            <h1 class="entry-title"><span><?php echo _e('Ceļojumu raksts','latviantravel');?></span> <?php the_title(); ?></h1>
                            <button type="button" class="scroll-down"><span><?php echo _e('Ritini uz leju','latviantravel');?></span></button>
                        </div>
                    </header>

                    <div class="container">
                        <div class="entry-content">
                            <div class="page-name"><span><?php echo _e('Blogs','latviantravel');?></span></div>
                            <?php the_content(); ?>
                            
                        </div>

                        <foooter class="entry-footer d-flex justify-content-center">
                            <a href="javascript: history.go(-1)" class="back-link"><?php echo _e('Atpakaļ uz blogu','latviantravel');?></a>
                        </foooter>
                    </div>
                </article>
            </div>
        </main>


<?php get_footer(); ?>