jQuery(document).ready(function() {
	jQuery("#jform_payment_method").on("change", function() {
		var self = jQuery(this);
		var payment_method = self.val();
		jQuery(".payment_method_div").slideUp();
		jQuery("#" + payment_method + "_div").slideDown();
	});
});
