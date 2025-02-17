
	</main>
<!-- Footer -->
<footer class="footer-block banner-block_indent_lg">
    <div class="footer-block__wrap">
        <div class="footer-block__logo">
            <div class="logo">
                <a href="/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="logo">
                </a>
            </div>
            <p>@2021</p>
        </div>
        <div class="footer-block__info">
            <div class="footer-block__contacts">
                <div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/include/phone.php"
                        )
                    );?>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/networks.php"
                    )
                );?>
            </div>
            <div class="footer-block__feedback-form">
                <button class="btn-form">Подать заявку</button>
            </div>
        </div>
        <p>@2021</p>
    </div>

</footer>

<script src="<?=SITE_TEMPLATE_PATH?>/js/swiper-bundle.min.js" defer></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js" defer></script>


</body>
</html>