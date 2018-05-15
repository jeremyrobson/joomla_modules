jQuery(document).ready(function() {
	jQuery("#jform_payment_method").on("change", function() {
		var self = jQuery(this);
		var payment_method = self.val();
		jQuery(".payment_method_div").slideUp();
		jQuery("#" + payment_method + "_div").slideDown();
    });
    
    jQuery("#test").click(function() {
        test();
    });
});

function test() {
    jQuery.ajax({
        type: "POST",
        url: "index.php?option=com_jeregister&task=invoice.test",
        data: {
            "test": "test"
        },
        dataType: "json",
        cache: false,
        success: function(data) {
            console.log(data);
        },
        fail: function(data) {
            console.error(data);
        }
    });
}