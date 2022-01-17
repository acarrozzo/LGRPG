
/*
* Author: AC
* Date Created: 2021
* Light Gray LG MAP! JS
 */



$(document).ready(function(){
// ---------------------------------------- map open tiles
  $("[data-map-1]").click(function(e){
		e.preventDefault();
  //  $(this).closest("[data-map-2]").toggleClass("zoom");
  //  $(this).toggleClass("zoom");
    $(this).next(".map-tiles2").toggleClass("zoom");
    console.log('mapclick');
  });

// ---------------------------------------- map close tiles
  $("[data-close-map]").click(function(e){
    e.preventDefault();
  //  $(this).closest("[data-map-2]").toggleClass("zoom");
  //  $(this).toggleClass("zoom");
    $(this).parent(".map-tiles2").toggleClass("zoom");
  //  console.log('mapclick');
  });



  // ---------------------------------------- modal popup
  $("[open-modal]").click(function(e){
    e.preventDefault();
  //  $(this).closest("[data-map-2]").toggleClass("zoom");
  //  $(this).toggleClass("zoom");
    $(this).next(".modal").toggleClass("active");
  });


  // ---------------------------------------- close modal popup
  $(".closer").click(function(e){
    e.preventDefault();
    $(this).parent(".modal").toggleClass("active");
  });





// --- END MAIN FUNCTION
});
