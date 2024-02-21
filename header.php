<!DOCTYPE html>
<html lang="en">
  <head>
	  <script>
		  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': 
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); 
			})(window,document,'script','dataLayer','GTM-TNHP9SM');
	  </script> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <script src="https://www.google.com/recaptcha/api.js"></script>

    <title><?php wp_title(); ?></title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <?php wp_head(); ?>
	  <style>
	  	.grecaptcha-badge {
			display: flex !important;
			position: relative !important;
			bottom: 0 !important;
			right: 20px !important;
		}
		.footer-form p.btn {
			color: white;
			background: #0E8AF0 !important;
			padding: 5px 50px;
			border-radius: 27px;
		}
		.footer-form p.btn:hover {
		  	background: transparent linear-gradient(180deg, #0E8AF0 0%, #8125AA 100%) 0% 0% no-repeat padding-box !important;
    		color: white;
		}
	  </style>
  </head>
  <body class="<?php echo $post->post_name;?>">
    <img
      src="<?php echo get_template_directory_uri()?>/assets/images/float-bg.svg"
      class="img-fluid floating-bg"
      alt=""
    />
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="/"
              ><img src="<?php echo get_template_directory_uri()?>/assets/images/logo.jpg" class="img-fluid"
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navbarNav"
            >
              <ul class="navbar-nav">
				<?php foreach(wp_get_menu_array('Main') as $menu) { ?>
				<?php if($menu['children']) { ?>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="<?php echo $menu['url']; ?>"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <?php echo $menu['title']; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <div class="menu-wrapper">
					  <?php foreach($menu['children'] as $child) { ?>
                      <li>
                        <a class="dropdown-item" href="<?php echo $child['url']; ?>"
                          ><?php echo $child['title']; ?></a
                        >
                      </li>
					  <?php } ?>
                    </div>
                  </ul>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?php echo $menu['url']; ?>"
                    ><?php echo $menu['title']; ?></a
                  >
                </li>
				<?php } } ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>