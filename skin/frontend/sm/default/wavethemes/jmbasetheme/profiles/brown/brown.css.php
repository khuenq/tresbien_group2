<?php
	$mageFilename = "../../../../../../../../app/Mage.php";
	require_once $mageFilename; 
	umask(0);
	Mage::app();
	$baseconfig = Mage::helper("jmbasetheme")->getactiveprofile();
	header("Content-type: text/css; charset: UTF-8");
?>

/* Base settings */
body#bd {
	<?php if (isset($baseconfig["bgolor"]) && ($baseconfig["bgolor"])): ?>
		background-color: <?php echo $baseconfig["bgolor"] ?>;
	<?php endif;?>
	<?php if (isset($baseconfig["bgimage"]) && ($baseconfig["bgimage"])): ?>
		background-image:url("images/<?php echo $baseconfig["bgimage"]; ?>");
	<?php endif;?>
}

#jm-header,
#jm-wrapper {
	<?php if (isset($baseconfig["wrappercolor"]) && ($baseconfig["wrappercolor"])): ?>
		background: <?php echo $baseconfig["wrappercolor"] ?>;
	<?php endif;?>
	<?php /* if (isset($baseconfig["wrapperbg"]) && ($baseconfig["wrapperbg"])): ?>
		background-image:url("images/<?php echo $baseconfig["wrapperbg"]; ?>");
	<?php endif; */ ?>
}

.head {
	<?php if (isset($baseconfig["headbg"]) && ($baseconfig["headbg"])): ?>
		background-image:url("images/<?php echo $baseconfig["headbg"]; ?>");
	<?php endif;?>
	<?php if (isset($baseconfig["headcolor"]) && ($baseconfig["headcolor"])): ?>
		background-color: <?php echo $baseconfig["headcolor"] ?>;
	<?php endif;?>
}

#jm-header {
	<?php if (isset($baseconfig["headerimage"]) && ($baseconfig["headerimage"])): ?>
		background-image:url("images/<?php echo $baseconfig["headerimage"]; ?>");
	<?php endif;?>
	<?php if (isset($baseconfig["headerolor"]) && ($baseconfig["headerolor"])): ?>
		background-color: <?php echo $baseconfig["headerolor"] ?>;
	<?php endif;?>
}

#jm-bots2,
#jm-bots3,
#jm-bots3 .social-list,
#jm-footer {
	<?php if (isset($baseconfig["footerimage"]) && ($baseconfig["footerimage"])): ?>
		background-image:url("images/<?php echo $baseconfig["footerimage"]; ?>");
	<?php endif;?>
	<?php if (isset($baseconfig["footerolor"]) && ($baseconfig["footerolor"])): ?>
		background-color: <?php echo $baseconfig["footerolor"] ?>;
	<?php endif;?>
}



a,
.btn-toggle.active,
.form-language a:active,
.form-language a:focus,
.form-language a:hover,
.form-language a.active,
.form-currency .currency-item:hover,
.form-currency .currency-item:active,
.form-currency .currency-item:focus,
.form-currency .currency-item.active,
.shop-access li a:active,
.shop-access li a:focus,
.shop-access li a:hover,
.product-name a:active,
.product-name a:focus,
.product-name a:hover,
.subtitle,
.sub-title,
.block-tags .actions a,
.pages ol li.current,
.pages ol li a:active,
.pages ol li a:focus,
.pages ol li a:hover,
.breadcrumbs a:active,
.breadcrumbs a:focus,
.breadcrumbs a:hover,
.block-account .block-content li a:active,
.block-account .block-content li a:focus,
.block-account .block-content li a:hover,
.block-account .block-content li.current,
.block-layered-nav dd li:focus,
.block-layered-nav dd li:hover,
.block-layered-nav dd li a:active .price,
.block-layered-nav dd li a:focus .price,
.block-layered-nav dd li a:hover .price,
.block-layered-nav dd li a:active,
.block-layered-nav dd li a:focus,
.block-layered-nav dd li a:hover,
.block-cart.product-details .edit:active,
.block-cart .product-details .edit:focus,
.block-cart .product-details .edit:hover,
.block-cart .product-details .remove:active,
.block-cart .product-details .remove:focus,
.block-cart .product-details .remove:hover,
.block-cart .summary a,
.block-cart .subtotal .price,
.view-cart:active,
.view-cart:focus,
.view-cart:hover,
.block-compare .actions a:active,
.block-compare .actions a:focus,
.block-compare .actions a:hover,
.block-compare .block-content li.item a.ico-remove:active,
.block-compare .block-content li.item a.ico-remove:focus,
.block-compare .block-content li.item a.ico-remove:hover,
.block-compare .block-content .product-name a:active,
.block-compare .block-content .product-name a:focus,
.block-compare .block-content .product-name a:hover,
.block-tags  a:active,
.block-tags  a:focus,
.block-tags  a:hover,
.products-grid .product-name:active,
.products-grid .product-name:focus,
.products-grid .product-name:hover,
.products-list .add-to-links li a:active,
.products-list .add-to-links li a:focus,
.products-list .add-to-links li a:hover,
.products-list .product-name:active,
.products-list .product-name:focus, 
.products-list .product-name:hover,
.product-view .product-shop .availability span,
.product-shop .add-to-links li a:active,
.product-shop .add-to-links li a:focus,
.product-shop .add-to-links li a:hover,
.block-related  .block-content .product-name:active,
.block-related  .block-content .product-name:focus,
.block-related  .block-content .product-name:hover,
.tags-list li a:active,
.tags-list li a:hover,
.tags-list li a:focus,
.data-table a:active,
.data-table a:focus,
.data-table a:hover,
.advanced-search-summary strong,
.page-sitemap .sitemap a:active,
.page-sitemap .sitemap a:focus,
.page-sitemap .sitemap a:hover,
.cart .totals .checkout-types li a:active,
.cart .totals .checkout-types li a:focus,
.cart .totals .checkout-types li a:hover,
.multiple-checkout .data-table .icoremove:active,
.multiple-checkout .data-table .icoremove:focus,
.multiple-checkout .data-table .icoremove:hover,
.multiple-checkout .data-table .product-name a:active,
.multiple-checkout .data-table .product-name a:focus,
.multiple-checkout .data-table .product-name a:hover,
.home-our-special .jm-product-list .products-grid .product-name:active,
.home-our-special .jm-product-list .products-grid .product-name:focus,
.home-our-special .jm-product-list .products-grid .product-name:hover,
#jm-bots2 .block .block-content ul li a:active, 
#jm-bots2 .block .block-content ul li a:focus,
#jm-bots2 .block .block-content ul li a:hover,
.footer-links li a:active,
.footer-links li a:focus,
.footer-links li a:hover,
.jm-legal a:active,
.jm-legal a:focus,
.jm-legal a:hover,
.no-route h3,
.no-route a:active,
.no-route a:focus,
.no-route a:hover {
	color: <?php echo $baseconfig["color"] ?>;
}

#jm-mycart .btn-toggle a,
button.button:hover,
button.button:focus,
.block-layered-nav .block-title span,
.block-cart .actions button.button,
.ja-tab-navigator li:hover a, 
.ja-tab-navigator li:focus a,
.ja-tab-navigator li.active a,
.data-table thead th,
.new-users h2,
.registered-users h2,
.cart .block-totals .block-title,
.cart .discount .block-title,
.cart .shipping .block-title,
.cart .totals button.button:focus,
.cart .totals button.button:hover,
.block-progress  .block-title,
.section.allow.active .step-title ,
.home-our-special .products-grid .overimage,
#jm-bots1 .btn-book:active,
#jm-bots1 .btn-book:focus,
#jm-bots1 .btn-book:hover,
.cartmessage .button button.button:focus,
.cartmessage .button button.button:hover,
.jm-categories-list li .categories-items:before,
.default .jm-tabs-title-top ul li.active h3, 
.default .jm-tabs-title-top ul li.firstactive h3, 
.default .jm-tabs-title-top ul li.lastactive h3,
#button-btt,
.jm-product-list div.item-more h3,
#cboxClose { 
	background-color: <?php echo $baseconfig["color"] ?>;
}


.inner-toggle,
button.button:hover,
button.button:focus,
.view-cart:active,
.view-cart:focus,
.view-cart:hover,
.data-table th,
.data-table tr.first.last th,
.data-table tbody th,
#jm-bots1 .btn-book:active,
#jm-bots1 .btn-book:focus,
#jm-bots1 .btn-book:hover,
.ja-tab-navigator li:hover a, 
.ja-tab-navigator li:focus a,
.ja-tab-navigator li.active a,
.checkout-progress li.active,
.form-currency .currency-item:hover,
.form-currency .currency-item:active,
.form-currency .currency-item:focus,
.form-currency .currency-item.active,
.default .jm-tabs-title-top ul li.active h3, 
.default .jm-tabs-title-top ul li.firstactive h3, 
.default .jm-tabs-title-top ul li.lastactive h3,
.jm-megamenu .childcontent-inner,
.block-cart .actions button.button {
	border-color: <?php echo $baseconfig["color"] ?>;
}

.jm-megamenu .childcontent-inner {
	border-color: #000;	
}

<?php if (isset($baseconfig["flogo"]) && ($baseconfig["flogo"])): ?>
#jm-footer .footerlogo {
	background-image:url("images/<?php echo $baseconfig["flogo"]; ?>");
}
<?php endif;?>


.product-shop .add-to-links li a.link-wishlist:active,
.product-shop .add-to-links li a.link-wishlist:focus,
.product-shop .add-to-links li a.link-wishlist:hover,
.product-shop .add-to-links li a.link-compare:active,
.product-shop .add-to-links li a.link-compare:focus,
.product-shop .add-to-links li a.link-compare:hover,
#jm-mainnav .btn-toggle.active strong,
#jm-search .btn-toggle.active strong,
#jm-mainnav .btn-toggle.active strong,
#jm-setting .btn-toggle.active  strong,
#jm-quickaccess .btn-toggle.active  strong,
.block-subscribe .input-box:hover button,
.block-subscribe .input-box:focus button,
.block-subscribe .input-box button:hover,
.block-subscribe .input-box button:focus,
#jm-mycart .btn-toggle.active,
.form-search button.button:hover, 
.form-search button.button:focus,
.view-mode .list,
.view-mode .grid,
#cboxPrevious,
#cboxNext {
	background-image:url("images/<?php echo $baseconfig["icons"]; ?>");
}


.desc-slide .text-title:before,
.desc-slide .text-desc:before,
.jm-masshead .jm-masshead-title:before,
.cooking-with-love .cooking-title:before,
.cooking-with-love .cooking-desc:before {
	<?php if (isset($baseconfig["overlay"]) && ($baseconfig["overlay"])): ?>
		background-image:url("images/<?php echo $baseconfig["overlay"]; ?>");
	<?php endif;?>
	<?php if (isset($baseconfig["overlaycolor"]) && ($baseconfig["overlaycolor"])): ?>
		background-color: <?php echo $baseconfig["overlaycolor"] ?>;
	<?php endif;?>
}

#jm-bots3 .social-list li {
	background-image:url("images/<?php echo $baseconfig["socials"]; ?>");	
}

/*other*/

.jm-megamenu ul.level0 li.mega a.mega {
	color: #fff;
}

.jm-megamenu ul.level0 li.mega a.mega:hover,
.jm-megamenu ul.level0 li.mega:hover > a.mega {
	color: #333;
}

.jm-megamenu ul.level0 li.mega a.active {
  background: url("images/default/bg-active.png") repeat-x left bottom;
}

.jm-megamenu ul.level1 li.mega a.mega {
	color: #333;
}
.jm-megamenu ul.level1 li.mega a.mega:hover,
.jm-megamenu ul.level1 li.mega:hover > a.mega {
	color: <?php echo $baseconfig["color"] ?>;
}

.home-our-special .jm-product-list .products-grid .triangle-top-left {
	border-color: #fff transparent transparent transparent;
}

.home-our-special .jm-product-list .products-grid .triangle-top-right {
	border-color: transparent #fff transparent transparent;
}

.home-our-special .jm-product-list .products-grid .triangle-bot-left {
	border-color: transparent transparent transparent #fff;
}

.home-our-special .jm-product-list .products-grid .triangle-bot-right {
	border-color: transparent transparent #fff transparent;
}

.category-products .product-image a.image-link:before,
.products-grid .product-image a.image-link:before  { 
	background-color: #000;
}

.no-breadcrumbs {
	border-color: <?php echo $baseconfig["color"] ?>;
}

.home-our-special .products-grid .overimage {
	background: #000;
}
