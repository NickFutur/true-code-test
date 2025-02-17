<!-- Footer -->
<footer id="footer-section" class="footer-section">
    <div class="container">
        <div class="row no-gutters">
                <div class="col-12 col-md-12 col-lg-12 text-left text-lg-left">
                    <div class="footer-menu-type">
                      <!--  <ul class="list-unstyled footer-list">
                            <li><a href="index.html">Главная</a></li>
                            <li><a href="direction-one.html">Направление 1</a></li>
                            <li><a href="direction-two.html">Направление 2</a></li>
                            <li class="active"><a href="news.html">Новости</a></li>
                            <li><a href="#!">Контакты</a></li>
                            <li><a href="#!">Политика конфиденциальности</a></li>
                        </ul>-->
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"footer-menu-template", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "bottom",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "footer-menu-template"
	),
	false
);?>
                    </div>
                </div>
            <!--<div class="col-6 col-md-4 col-lg-3 text-left text-lg-left">
                <div class="footer-menu-type">
                   <ul class="list-unstyled">
                        <li><a href="#!">Главная</a></li>
                        <li><a href="#!">Направление 1</a></li>
                        <li><a href="#!">Направление 2</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3 offset-0 offset-md-0 offset-lg-1 text-left text-lg-left">
                <div class="footer-menu-type">
                    <ul class="list-unstyled">
                        <li class="active"><a href="news.html">Новости</a></li>
                        <li><a href="#!">Контакты</a></li>
                        <li><a href="#!">Политика конфиденциальности</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3 offset-0 offset-md-0 offset-lg-1 mr-auto">
                <div class="footer-contacts pt-3 pt-md-0">
                    <p class="">OOO “Electroma”</p>
                    <p><a href="mailto:electroma@.ua" class="">electroma@.ua</a></p>
                    <p>06151 29 44 875</p>
                    <p>Russia, Lipetsk, 14 Dovatora Street</p>
                </div>
            </div> -->
        </div>
    </div>
</footer><!-- #footer -->


<!-- Copyright -->
<footer id="copyright" class="copyright py-2 py-md-3">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center no-gutters">
            <div class="col-12 col-md-12 col-lg-12 text-center text-lg-center">
                <p class="text-muted">© 2024 «Липской завод»</p>
            </div>
            <!-- <div class="col-6 col-md-6 col-lg-6 text-md-right text-lg-left">
              <div class="w-100 d-flex align-items-center justify-content-end">
                <img src="img/footer_copyright_logo_finat.jpg" class="img-fluid" alt="" title="" />
                <img src="img/footer_copyright_logo_afera.jpg" class="img-fluid ml-md-5 ml-sm-3" alt="" title="" />
              </div>
            </div> -->
        </div>
    </div>
    </footer><!-- #Copyright -->

    <a href="#!" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Index Body Background -->
    <div class="ind-body-bg">
        <div class="ind-body-bg-right"></div>
        <div class="ind-body-bg-left"></div>
    </div>
    <!-- JavaScript Libraries -->

<script src="<?=SITE_TEMPLATE_PATH?>/lib/jquery/jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/lib/aos/aos.js"></script>
    <script>
		 AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });


        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 290) {
                    $('.nav-fixed-top').addClass('stickytop');
                }
                else {
                    $('.nav-fixed-top').removeClass('stickytop');
                }
            });
});
    </script>
  <!-- Color footer contact link -->
  <script>
    const footerList = document.querySelector(".footer-list");
    const footerLinks = footerList.querySelectorAll('a');
    for (let i = 0; i < footerLinks.length; i++) {
      if (footerLinks[i].textContent === "Контакты" || footerLinks[i].textContent === "контакты") {
        footerLinks[i].style.color = "#E1F07D";
      }
    }
  </script>

    <script src="<?=SITE_TEMPLATE_PATH?>/lib/easing/easing.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>


    <!-- Carousel -->
    <script src="<?=SITE_TEMPLATE_PATH?>/js/carousel.js"></script>

</body>
</html>