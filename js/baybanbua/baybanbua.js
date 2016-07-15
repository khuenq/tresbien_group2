document.observe('dom:loaded', function() {
	$('shipping-method-buttons-container').down('button').removeAttribute('onclick');

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
			
			// Baybanbua shipping method is checked and does not exists
			var termForm = '<div style="margin: 10px;">';
			termForm = '<p class="baybanbua_term" style="margin: 5px; font-style: italic;">'
			termForm += 'I confirm that I give BayBanBua company permission to deliver ';
			termForm += 'my items bought at Très Bien. If any of my items are lost, ';
			termForm += 'broken or malfunctioned during shipping period, ';
			termForm += 'I will take full responsibility and will not sue either BayBanBua or Très Bien or ';
			termForm += 'Mr. Khue Nguyen Quang.</p>';
			termForm += '<p class="baybanbua_term" style="margin: 10px;">';
			termForm += '<input type="checkbox" id="cb_baybanbua_term">I agree</p></div>';
			termForm += '<script>$("cb_baybanbua_term").on("click",function(){';
			termForm += 'if(!$("cb_baybanbua_term:checked")){$("cb_baybanbua_term").writeAttribute("checked",true);';
			termForm += 'return;}$("cb_baybanbua_term").rmoveAttribute("checked");});</script>';

			$(event.target.id).up('li').down('label').insert({ after: termForm });
			return;
		}
		
		// Another shipping method checked
		if($$('.baybanbua_term').length)
		{
			$$('.baybanbua_term').each(Element.hide);
		}
		
	});

	$('shipping-method-buttons-container').on('click',function(event){
		// Check baybanbua_term exist
		if (!$$('.baybanbua_term').length) {
			shippingMethod.save();
			return;
		}

		// Check baybanbua_term hide
		if('none' == $$('.baybanbua_term')[0].getStyle('display'))
		{
			shippingMethod.save();
			return;
		}
		
		// Check baybanbua_term which customer agreed
		if(!$('cb_baybanbua_term').getAttribute('checked'))
		{
			alert('Must be agree term to continue');
			return;
		}

		shippingMethod.save();
	});
});
