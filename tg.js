$(documnet).ready(function() {
    $(".formFeedBack").on("submit", function() {
	let dataSubmit = $(this).serialize()
	$.ajax({
	    url: 'путь_до_файла обработчика',
	    method: 'post',
	    dataType: 'html',
	    data: dataSubmit,
	    success: function(data){
	    console.log(data);
	    $("form.formFeedBack .messageBlockForm").addClass("active")
	    setTimeout(() => {
	        $("form.formFeedBack .messageBlockForm").removeClass("active")
	    }, 3000);
	}
        });
    })
})