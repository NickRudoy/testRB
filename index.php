<?php

require_once './config/connect.php';

$query = 'SELECT * FROM slider';
$statement = $pdo->query($query);
$slides = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestRB</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="header__top-content">
                    <div class="header__logo">
                      <div class="burg">
                 <div class="burg__field" id ="burg-nav">
                   <span class="bar"></span>
                   <span class="bar"></span>
                   <span class="bar"></span>
                 </div>
               </div>
                        <div class="header-logo">
                            <a href="#" class="logo" id="logo">
                                <img class="logo-img" src="./img/logo.svg" alt="logo">
                            </a>
                        </div>
                        <div class="local">
                            <div class="local_city">
                                <img class="local-place" src="./img/header/placeholder.svg" alt="placeholder">
                                <span class="city">Ростов-на-Дону</span>
                              </div>
                                <span class="adrs">ул. Ленина, 2Б</span>
                        </div>
                    </div>
                    <div class="header__button">
                        <div class="header__number">
                                <img class="number-img" src="./img/header/whatsapp1.png" alt="WA">
                                <p><a class="number-nav" href="tel:+7(863) 000 00 00">+7(863) 000 00 00</a></p>
                                <p class="number-city">Ростов-на-Дону</p>
                         </div>
                        <button class="header__btn" id="check-open">
                                Записаться на прием
                        </button>
                </div>
                </div>
            </div>
        </div>
        <div class="header__menu">
            <div class="container">
                <div class="nav-menu">
                    <nav class="navbar">
                      <div class="navbar_wrap">
                          <ul class="menu" id="menu">
                              <li><a href="#">О клинике</a></li>
                              <li><a href="#">Услуги</a></li>
                              <li><a href="#">Специалисты</a></li>
                              <li><a href="#">Цены</a></li>
                              <li><a href="#">Контакты</a></li>
                              <button class="menu__button">
                                Записаться на прием
                              </button>
                            </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
      <div class="popup_burg" id="popup-burg"></div>
    </header>
    <main>
        <section class="main">
            <div class="main__content">
                <div class="container">
                    <div class="main__body">
                        <h1 class="main_title title-1">Многопрофильная клиника для детей
                            и взрослых</h1>
                          <div class="main_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</div>
                    </div>
                </div>

            </div>
            <div class="main__img">
                <img src="./img/main/main.png" alt="main img">
            </div>
        </section>
        <section class="section-slider container">
            <div class="slider">
               <div class="slides">
          <?php foreach ($slides as $slide): ?>
                  <div class="slide">
                    <div class="slide__img">
                      <img src="<?php echo $slide['image']; ?>" alt="" class="slide-image">
                    </div>
                      <div class="slide-text">
                        <h2 class="slide-title"><?php echo $slide['title']; ?></h2>
                        <h3 class="slide-subtitle"><?php echo $slide['subtitle']; ?></h3>
                        <ul class="slide-links">
                            <li><span class="color-li"> <?php echo $slide['link_1']; ?></span></li>
                            <li><span class="color-li"> <?php echo $slide['link_2']; ?></li>
                            <li><span class="color-li"> <?php echo $slide['link_3']; ?></li>
                            <li><span class="color-li"> <?php echo $slide['link_4']; ?></li>
                        </ul>
                        <p class="slide-price">Всего <?=$slide['price_now'] ?>₽<span><?=$slide['price_old'] ?>₽</span>  </p>
                        <div class="slide_btn">
                          <button class="slide_check" id="open-slider">Записаться</button>
                          <button class="slide_about">Подробнее</button>
                        </div>
                      </div>
                  </div>
                  <?php endforeach; ?>
              </div>
                <div class="controls">
                  <button class="prev"><svg class="arrow">
                <path d="M32.6718 15.6719H4.54488L9.20421 11.0351C9.7241 10.5177 9.7261 9.67678 9.20866 9.15689C8.69122 8.63693 7.85025 8.635 7.33036 9.15237L0.390637 16.0586C0.390173 16.059 0.389841 16.0595 0.389442 16.0599C-0.129124 16.5773 -0.130784 17.4209 0.389309 17.9401C0.389774 17.9405 0.390106 17.941 0.390505 17.9414L7.33022 24.8476C7.85005 25.3649 8.69102 25.3631 9.20852 24.8431C9.72596 24.3232 9.72397 23.4823 9.20408 22.9648L4.54488 18.3281H32.6718C33.4053 18.3281 33.9999 17.7335 33.9999 17C33.9999 16.2665 33.4053 15.6719 32.6718 15.6719Z"/>
                </svg></button>
                  <span class="pagination"></span>
                  <button class="next"><svg class="arrow">
                <path d="M1.32822 15.6719H29.4551L24.7958 11.0351C24.2759 10.5177 24.2739 9.67678 24.7913 9.15689C25.3088 8.63693 26.1497 8.635 26.6696 9.15237L33.6094 16.0586C33.6098 16.059 33.6102 16.0595 33.6106 16.0599C34.1291 16.5773 34.1308 17.4209 33.6107 17.9401C33.6102 17.9405 33.6099 17.941 33.6095 17.9414L26.6698 24.8476C26.1499 25.3649 25.309 25.3631 24.7915 24.8431C24.274 24.3232 24.276 23.4823 24.7959 22.9648L29.4551 18.3281H1.32822C0.5947 18.3281 9.91821e-05 17.7335 9.91821e-05 17C9.91821e-05 16.2665 0.5947 15.6719 1.32822 15.6719Z"/>
                </svg></button>

</section>
    </main>
    <footer class="footer">
        <div class="foot">
            <div class="footer-main">
              <div class="footer-logo">
                <a href="#" class="logo" id="logo">
                  <img class="footer_logo-img " src="./img/footer/footerlogo.svg" alt="LogoFooter">
                </a>
              </div>
              <div class="footer-nav">
                <li><a href="#">О клинике</a></li>
                          <li><a href="#">Услуги</a></li>
                          <li><a href="#">Специалисты</a></li>
                          <li><a href="#">Цены</a></li>
                          <li><a href="#">Контакты</a></li>
              </div>
            </div>
            <div class="footer-social">
              <a class="soc-inst"><img src="./img/footer/footinst.png" alt="INST"></a>
              <a class="soc-wa"><img src="./img/footer/footwa.png" alt="WA"></a>
              <a class="soc-tlg"><img src="./img/footer/foottel.png" alt="TG"></a>
            </div>
        </div>
    </footer>
    <div class="popup_overlay" id="popup-overlay">
      <div class="popup_start" id="popup">
        <div class="popup_text">
          <h2>Запишись на обследование</h2>
          <p>Проверь своё здоровье</p>
        </div>
        <form action="./config/sendmail.php" enctype="multipart/form-data" method="post" class="popup_form form" id="popup-form">
        <input type="hidden" name="admin_email[]" value="rudonicola@gmail.com">
		    <input type="hidden" name="form_subject" value="Тема письма">
        <label class="form-label">
			    <span>Введите имя</span>
			    <input type="text" name="name" id="name">
		    </label>
		    <label class="form-label">
			    <span>Введите телефон</span>
			    <input type="tel" data-validate-field="tel" name="tel" id="phone">
	    	</label>
		    <label class="form-label">
		    	<span>Введите email</span>
			    <input type="email" data-validate-field="email" name="email" id="email" >
		    </label>
	
          <button class="form-btn" type="submit">Отправить</button>
        </form>
        <button class="popup_close" id="popup-close">
          <svg xmlns="http://www.w3.org/2000/svg"  class="cross_svg">
            <path d="M22.6066 21.3934C22.2161 21.0029 21.5829 21.0029 21.1924 21.3934C20.8019 21.7839 20.8019 22.4171 21.1924 22.8076L22.6066 21.3934ZM40.9914 42.6066C41.3819 42.9971 42.0151 42.9971 42.4056 42.6066C42.7961 42.2161 42.7961 41.5829 42.4056 41.1924L40.9914 42.6066ZM21.1924 41.1924C20.8019 41.5829 20.8019 42.2161 21.1924 42.6066C21.5829 42.9971 22.2161 42.9971 22.6066 42.6066L21.1924 41.1924ZM42.4056 22.8076C42.7961 22.4171 42.7961 21.7839 42.4056 21.3934C42.0151 21.0029 41.3819 21.0029 40.9914 21.3934L42.4056 22.8076ZM21.1924 22.8076L40.9914 42.6066L42.4056 41.1924L22.6066 21.3934L21.1924 22.8076ZM22.6066 42.6066L42.4056 22.8076L40.9914 21.3934L21.1924 41.1924L22.6066 42.6066Z"/>
            </svg>
        </button>
      </div>
    </div>
    <script src="./js/inputmask.min.js"></script>
	  <script src="./js/just-validate.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>