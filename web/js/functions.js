/**
 * Created by Aliscom4 on 19.05.2016.
 */
var page; //Объект
$(document).ready(function() {
    if (page) {
        window.onload = function () {
            init_preview_file(page);
        }
    }
	
	$(".zoomimage").fancybox();

	$('.order').click(function(){
		$('.order_form_wrapper').fadeIn('slow');
	});		
	
	$('.order_form_close').click(function(){
		$('.order_form_wrapper').fadeOut('slow');
	});	
});

function delete_preview(element){
    name = element.parents('.file-thumbnail-footer').find('.file-footer-caption').text();
    input = $('input[data-name="' + name + '"]');
    if (input.length) {
        input.remove();
    }
}

function init_preview_file(page){
    if($(".file-input .file-preview-frame").length == page.files_count){
        $(".file-input .input-group").hide();
    }
}