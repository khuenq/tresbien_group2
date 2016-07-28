/*
* @Author: Thanh
* @Date:   2016-07-23 15:31:38
* @Last Modified by:   Thanh
* @Last Modified time: 2016-07-28 02:07:20
*/

$j("document").ready(function(){
    var nav = $j('#header-nav');

    $j(window).scroll(function () {
        if ($j(this).scrollTop() > 250) {
            nav.addClass("nav-primary-fixed-top");
        } else {
            nav.removeClass("nav-primary-fixed-top");
        }
    });

    // 
 //    var mouseOverActiveCart = false;
 //    $('.active').live('mouseenter', function(){
	//     mouseOverActiveCart = true; 
	// }).live('mouseleave', function(){ 
	//     mouseOverActiveCart = false; 

 //    $j('.skip-cart').on('click',function(){
 //    	if(!mouseOverActiveCart){
 //    		$j('.minicart-wrapper').hide();
 //    	}
 //    });
});