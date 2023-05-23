<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 */

?>

<footer class="Site-footer">

  <div class="bootscore-footer pt-5 pb-3" style="background-color: #BCDDFE!important;">
    <div class="container">

      <!-- Top Footer Widget -->
      <?php if (is_active_sidebar('top-footer')) : ?>
        <div>
          <?php dynamic_sidebar('top footer'); ?>
        </div>
      <?php endif; ?>

      <div class="row mb-3 mb-md-0">

        <!-- Footer 1 Widget -->
        <div class="col-md-6 col-lg-6 ">
          <?php if (is_active_sidebar('footer-1')) : ?>
            <div>
              <?php dynamic_sidebar('footer-1'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 2 Widget -->

        <div class="col-6 col-lg-3">
          <?php if (is_active_sidebar('footer-2')) : ?>
            <div>
              <?php dynamic_sidebar('footer-2'); ?>
              <!--Social icons Logo mobile display content  -->
              <div class="d-flex justify-content-start footer-icon">
                <?php if (get_option('_social_link_facebook', false)) : ?>

                  <div class="social_icons pe-3">
                    <a href="<?= get_option('_social_link_facebook'); ?>">
                      <i class="fab fa-facebook-f fs-3" style="color: #4267B2;"></i>
                    </a>
                  </div>
                <?php endif; ?>

                <?php if (get_option('_social_link_twitter', false)) : ?>
                  <div class="social_icons pe-3">
                    <a href="<?= get_option('_social_link_twitter'); ?>">
                      <i class="fab fa-twitter fs-3"></i>
                    </a>
                  </div>
                <?php endif; ?>


                <?php if (get_option('_social_link_youtube', false)) : ?>
                  <div class="social_icons pe-3">
                    <a href="<?= get_option('_social_link_youtube'); ?>">
                      <i class="fab fa-youtube fs-3 text-danger"></i>
                    </a>
                  </div>
                <?php endif; ?>

                <?php if (get_option('_social_link_instagram', false)) : ?>

                  <div class="social_icons pe-3">
                    <a href="<?= get_option('_social_link_instagram'); ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="35" width="35" viewBox="-19.5036 -32.49725 169.0312 194.9835">
                        <defs>
                          <radialGradient fy="578.088" fx="158.429" gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.399 454.004)" gradientUnits="userSpaceOnUse" xlink:href="#a" r="65" cy="578.088" cx="158.429" id="c" />
                          <radialGradient fy="473.455" fx="147.694" gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.351 -458.493)" gradientUnits="userSpaceOnUse" xlink:href="#b" r="65" cy="473.455" cx="147.694" id="d" />
                          <linearGradient id="b">
                            <stop stop-color="#3771c8" offset="0" />
                            <stop offset=".128" stop-color="#3771c8" />
                            <stop stop-opacity="0" stop-color="#60f" offset="1" />
                          </linearGradient>
                          <linearGradient id="a">
                            <stop stop-color="#fd5" offset="0" />
                            <stop stop-color="#fd5" offset=".1" />
                            <stop stop-color="#ff543e" offset=".5" />
                            <stop stop-color="#c837ab" offset="1" />
                          </linearGradient>
                        </defs>
                        <path d="M65.033 0C37.891 0 29.953.028 28.41.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468-4.125 4.282-6.625 9.55-7.53 15.812-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28a27.22 27.22 0 0017.75-14.53c1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624-4.3-4.108-9.56-6.608-15.829-7.512C102.338.157 101.733.027 86.193 0z" fill="url(#c)" />
                        <path d="M65.033 0C37.891 0 29.953.028 28.41.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468-4.125 4.282-6.625 9.55-7.53 15.812-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28a27.22 27.22 0 0017.75-14.53c1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624-4.3-4.108-9.56-6.608-15.829-7.512C102.338.157 101.733.027 86.193 0z" fill="url(#d)" />
                        <path d="M65.003 17c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C17.06 50.327 17 51.964 17 65s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97a5.76 5.76 0 105.76 5.758c0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C78.616 89.645 89.65 78.613 89.65 65S78.615 40.35 65.002 40.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z" fill="#fff" />
                      </svg>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 3 Widget -->
        <div class="col-6 col-lg-3">
          <?php if (is_active_sidebar('footer-3')) : ?>
            <div>
              <?php dynamic_sidebar('footer-3'); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- mobile menus start accordian -->
      <div class="accordion d-md-none d-block  accordion-flush" id="accordionFlushExample">
        <div class="accordion-item set-border ">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accor-mobile accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Infomation </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-3 ">

              <!--Grid column-->
              <div id="footer-menu-color" class="col-lg-3 col-md-6 mb-md-0">
                <!-- dynamic navbar-->
                <div id="footer-menu" class="col-md-6">
                  <?php if (is_active_sidebar('footer-widget-1')) : ?>
                    <?php dynamic_sidebar('footer-widget-1'); ?>
                  <?php endif; ?>
                </div>
              </div>
              <!--Grid column-->

            </div>
          </div>
        </div>
        <div class="accordion-item set-border">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accor-mobile accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              Service
            </button>

          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-3 ">

              <!--Grid column-->
              <div id="footer-menu-color-1" class="col-lg-3 col-md-6 mb-md-0">
                <!-- dynamic navbar-->
                <div id="footer-menu-1" class="col-md-6">
                  <?php if (is_active_sidebar('footer-widget-2')) : ?>
                    <?php dynamic_sidebar('footer-widget-2'); ?>
                  <?php endif; ?>
                </div>
              </div>
              <!--Grid column-->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accor-mobile accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              My Account
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-2 ">

              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <!-- dynamic navbar-->

                <!-- Footer 2 Widget -->
                <div class="col-md-6 footer-widget-2 col-lg-3">
                  <div class="col-md-6 footer-widget-2">
                    <?php if (is_active_sidebar('footer-widget-3')) : ?>
                      <?php dynamic_sidebar('footer-widget-3'); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!--Grid column-->

            </div>
          </div>
        </div>
        <div class="accordion-item ">
          <h2 class="accordion-header" id="flush-headingfour">
            <button class="accor-mobile accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
              Our Offers
            </button>
          </h2>
          <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-2 ">

              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <!-- dynamic navbar-->

                <!-- Footer 2 Widget -->
                <div class="col-md-6 footer-widget-2 col-lg-3">
                  <div class="col-md-6 footer-widget-2">
                    <?php if (is_active_sidebar('footer-widget-4')) : ?>
                      <?php dynamic_sidebar('footer-widget-4'); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <!--Grid column-->

            </div>
          </div>
        </div>
      </div>
      <!-- end accordian -->

      <!-- Bootstrap 5 Nav Walker Footer Menu -->
      <!-- <?php
            wp_nav_menu(array(
              'theme_location' => 'footer-menu',
              'container' => false,
              'menu_class' => '',
              'fallback_cb' => '__return_false',
              'items_wrap' => '<ul id="footer-menu" class="nav %2$s">%3$s</ul>',
              'depth' => 1,
              // 'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?> -->
      <!-- Bootstrap 5 Nav Walker Footer Menu End -->
      <div class="d-md-block d-none">
        <div class="row mb-4 mb-md-0">
          <!-- Footer 4 Widget -->
          <div class="col-md-6 col-lg-3">
            <?php if (is_active_sidebar('footer-widget-1')) : ?>
              <div>
                <?php dynamic_sidebar('footer-widget-1'); ?>
              </div>
            <?php endif; ?>
          </div>
          <!-- Footer Widgets End -->

          <!-- Footer 4 Widget -->
          <div class="col-md-6 col-lg-3">
            <?php if (is_active_sidebar('footer-widget-2')) : ?>
              <div>
                <?php dynamic_sidebar('footer-widget-2'); ?>
              </div>
            <?php endif; ?>
          </div>
          <!-- Footer Widgets End -->
          <!-- Footer 4 Widget -->
          <div class="col-md-6 col-lg-3">
            <?php if (is_active_sidebar('footer-widget-3')) : ?>
              <div>
                <?php dynamic_sidebar('footer-widget-3'); ?>
              </div>
            <?php endif; ?>
          </div>
          <!-- Footer Widgets End -->
          <!-- Footer 4 Widget -->
          <div class="col-md-6 col-lg-3">
            <?php if (is_active_sidebar('footer-widget-4')) : ?>
              <div>
                <?php dynamic_sidebar('footer-widget-4'); ?>
              </div>
            <?php endif; ?>
          </div>
          <!-- Footer Widgets End -->
        </div>
      </div>
    </div>
  </div>

  <div class="bootscore-info text-muted border-top py-2 text-center" style="background-color: #BCDDFE!important;">
    <div class="container copyright-text">
      <div class="row">
        <div class="col-md-6">
          <p class="text-center text-md-start">© Copyright <?= date("Y"); ?>. All Rights Reserved. <?php bloginfo('name'); ?></p>
        </div>
        <div class="col-md-6">
          <p class="text-center text-md-end">Created with ❤️ by <a href="#" class="text-black" target="_blank">Coderannu 😎 </a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->

  <!--end Copyright -->
</footer>

<div class="top-button position-fixed ">
  <a href="#to-top" class="btn btn-primary shadow"><i class="fas fa-chevron-up"></i></a>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Scripts. if you want to write another scripts  -->
<script src="<?= get_template_directory_uri() . '/js/custom.js'; ?>"></script>


</body>

</html>