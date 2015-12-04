//http://www.telegraphicsinc.com/2013/07/how-to-use-animate-css/
function animationClick(element, animation){
    element = $(element);
    element.click(
        function() {
            element.addClass('animated ' + animation);        
            //wait for animation to finish before removing classes
            window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);         
  
        });
}

function animationHover(element, animation){
    element = $(element);
    element.hover(
        function() {
            element.addClass('animated ' + animation);        
        },
        function(){
            //wait for animation to finish before removing classes
            window.setTimeout( function(){
                element.removeClass('animated ' + animation);
            }, 2000);         
        });
}

$(document).ready(function(){
	$('#btnRand').each(function() {
        animationClick(this, 'bounceIn');
    });
    $('#btnCsv').each(function() {
        animationClick(this, 'bounceInLeft');
    });
    $('#btnTab').each(function() {
        animationClick(this, 'bounceIn');
    });
    $('#btnChart').each(function() {
        animationClick(this, 'bounceIn');
    });
    $('#btnCurrent').each(function() {
        animationClick(this, 'bounceIn');
    }); 
});