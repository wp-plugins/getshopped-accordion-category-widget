
var gssc = jQuery.noConflict();


gssc(document).ready(function () {


      gssc("ul.wpsc_top_level_categories ul").slideUp();

   gssc("div.wpsc_categorisation_group  ul.wpsc_top_level_categories  li  a").each(function(index) {
     if(gssc(this).next("ul").children("li").length > 0){
	gssc(this).addClass("sliding_menu_header");
     }
});
      gssc("div.wpsc_categorisation_group  ul.wpsc_top_level_categories  li  a").click(function(){
      

      if(gssc(this).next("ul").children("li").length > 0){
      		gssc(this).next().slideToggle();
      		return false;
      }else{
		return true;
      }
    })
  });

