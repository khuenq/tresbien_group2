document.observe('dom:loaded', function() {
	// Remove continue button onclick action and add their id
	$('shipping-method-buttons-container').down('button').removeAttribute('onclick');

	// Choose payment method processing
	$('checkout-shipping-method-load').on('change','input:radio',function(element){
		// Check baybanbua shipping method is checked
		if('baybanbua_baybanbua' == element.target.value)
		{
			// Baybanbua shipping method is checked and already exists
			if(element.target.checked)
			{
				$('baybanbua_terms_conditions').show();
			}

			return;
		}
		
		// Another shipping method checked
		$('baybanbua_terms_conditions').hide();
		
	});

	// Continue button processing
	$('shipping-method-buttons-container').on('click',function(element){
		if('button' == element.target.localName)
		{
			// Check another method, not baybanbua
			if (!$('baybanbua_terms_conditions').visible()) {
				shippingMethod.save();
				return;
			}
			
			// Check baybanbua_term which customer agreed
			if(!$('checkout-shipping-method-load').down('input:checkbox').checked)
			{
				alert('Must be agree term to continue');
				return;
			}

			shippingMethod.save();
		}
	});
});
