document.observe('dom:loaded', function() {
	// Set shipping baybanbua method is default
	$('s_method_baybanbua_baybanbua').attr('checked','checked');

	// Set shipping baybanbua term
	var termForm = '<div style="margin: 10px;">';
	termForm = '<p class="baybanbua_term" style="margin: 5px; font-style: italic;">'
	termForm += 'I confirm that I give BayBanBua company permission to deliver ';
	termForm += 'my items bought at Très Bien. If any of my items are lost, ';
	termForm += 'broken or malfunctioned during shipping period, ';
	termForm += 'I will take full responsibility and will not sue either BayBanBua or Très Bien or ';
	termForm += 'Mr. Khue Nguyen Quang.</p>';
	termForm += '<p class="baybanbua_term" style="margin: 10px;">';
	termForm += '<input type="checkbox" id="cb_baybanbua_term">I agree</p></div>';
	$('s_method_baybanbua_baybanbua').up('li').down('label').insert({ after: termForm });

	// Disable button submit
	$('shipping-method-buttons-container').down('button')[0].attr('id', 'shipping-method-buttons-submit');
	$('shipping-method-buttons-submit').disabled = true;

	$('checkout-shipping-method-load').on('change','input:radio',function(event){
		// Check baybanbua shipping method is checked
		if('baybanbua_baybanbua' == event.target.value)
		{
			// Baybanbua shipping method is checked and already exists
			if($$('.baybanbua_term').length)
			{
				$$('.baybanbua_term').each(Element.show);
				return;
			}

			// Disable
		}
		
		// Another shipping method checked
		if($$('.baybanbua_term').length)
		{
			$$('.baybanbua_term').each(Element.hide);
		}

		$('shipping-method-buttons-submit').disabled = false;
		
	});

	$('shipping-method-buttons-container').on('click',function(event){
		// Check baybanbua_term exist
		if (!$$('.baybanbua_term').length) {
			return true;
		}

		// Check baybanbua_term hide
		if('none' == $$('.baybanbua_term')[0].getStyle('display'))
		{
			return true;
		}
		
		// Check baybanbua_term which customer agreed
		if(!$('cb_baybanbua_term:checked'))
		{
			alert('Must be agree term to continue');
			Event.stop(event);
        	event.stopPropagation();
		}

		return true;

	});
});
