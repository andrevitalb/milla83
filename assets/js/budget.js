$(document).ready(function(){
	$('#wrapFinish .radioBtnSelector').click(function(){
		var car = $('input:radio[name=budgetCar]:checked').val();
		var wrap = $(this).attr('for');

		var text = "El costo de tu wrap es de:<br><strong>";

		switch(car){
			case 'budgetCar01':
				switch(wrap){
					case 'budgetFinish01':
					case 'budgetFinish02': text += "$28'499.00"; break;
					case 'budgetFinish03': text += "$51'499.00"; break;
					case 'budgetFinish04':
					case 'budgetFinish10': text += "$22'599.00"; break;
					case 'budgetFinish05':
					case 'budgetFinish08':
					case 'budgetFinish11':
					case 'budgetFinish13':
					case 'budgetFinish14': text += "$19'699.00"; break;
					case 'budgetFinish06':
					case 'budgetFinish12': text += "$18'699.00"; break;
					case 'budgetFinish07': text += "$21'399.00"; break;
					case 'budgetFinish09': text += "$28'599.00"; break;
					case 'budgetFinish15':
					case 'budgetFinish16': text += "$25'499.00"; break;
					case 'budgetFinish17': text += "$22'699.00"; break;
					case 'budgetFinish18': text += "$47'299.00"; break;
					case 'budgetFinish19': text += "$20'599.00"; break;
					case 'budgetFinish20':
					case 'budgetFinish21':
					case 'budgetFinish22':
					case 'budgetFinish23':
					case 'budgetFinish24': text += "$18'399.00"; break;
					case 'budgetFinish25':
					case 'budgetFinish26':
					case 'budgetFinish27': text += "$16'799.00"; break;
					case 'budgetFinish28': text += "$24'299.00"; break;
					case 'budgetFinish29': text += "$29'399.00"; break;
					case 'budgetFinish30':
					case 'budgetFinish31': text += "$16'099.00"; break;
					case 'budgetFinish32': text += "$14'999.00"; break;
					case 'budgetFinish33': text += "$19'499.00"; break;
					case 'budgetFinish35':
					case 'budgetFinish36': text += "$18'799.00"; break;
					case 'budgetFinish37':
					case 'budgetFinish38':
					case 'budgetFinish39': text += "$21'899.00"; break;
					case 'budgetFinish40': text += "$16'899.00"; break;
					case 'budgetFinish41': text += "$20'899.00"; break;
					case 'budgetFinish42': text += "$24'099.00"; break;
					case 'budgetFinish43': text += "$19'399.00"; break;
					case 'budgetFinish44': text += "$17'699.00"; break;
				}
			break;
			case 'budgetCar02':
				switch(wrap){
					case 'budgetFinish32': text += "$16'499.00"; break;
					case 'budgetFinish30':
					case 'budgetFinish31': text += "$17'799.00"; break;
					case 'budgetFinish25':
					case 'budgetFinish26':
					case 'budgetFinish27': text += "$18'299.00"; break;
					case 'budgetFinish40': text += "$18'399.00"; break;
					case 'budgetFinish44': text += "$19'199.00"; break;
					case 'budgetFinish35':
					case 'budgetFinish36': text += "$20'299.00"; break;
					case 'budgetFinish43': text += "$20'899.00"; break;
					case 'budgetFinish33': text += "$20'999.00"; break;
					case 'budgetFinish20':
					case 'budgetFinish21':
					case 'budgetFinish22':
					case 'budgetFinish23':
					case 'budgetFinish24': text += "$21'999.00"; break;
					case 'budgetFinish06':
					case 'budgetFinish12': text += "$22'299.00"; break;
					case 'budgetFinish41': text += "$22'399.00"; break;
					case 'budgetFinish37':
					case 'budgetFinish38':
					case 'budgetFinish39': text += "$23'399.00"; break;
					case 'budgetFinish05':
					case 'budgetFinish08':
					case 'budgetFinish11':
					case 'budgetFinish13':
					case 'budgetFinish14': text += "$23'599.00"; break;
					case 'budgetFinish19': text += "$24'099.00"; break;
					case 'budgetFinish07': text += "$25'499.00"; break;
					case 'budgetFinish42': text += "$25'599.00"; break;
					case 'budgetFinish04':
					case 'budgetFinish10': text += "$27'099.00"; break;
					case 'budgetFinish17': text += "$27'399.00"; break;
					case 'budgetFinish15':
					case 'budgetFinish16': text += "$30'799.00"; break;
					case 'budgetFinish28':
					case 'budgetFinish29': text += "$31'099.00"; break;
					case 'budgetFinish01':
					case 'budgetFinish02':
					case 'budgetFinish09': text += "$32'999.00"; break;
					case 'budgetFinish18': text += "$57'699.00"; break;
					case 'budgetFinish03': text += "$62'999.00"; break;
				}
			break;
			case 'budgetCar03':
				switch(wrap){
					case 'budgetFinish32': text += "$18'399.00"; break;
					case 'budgetFinish30':
					case 'budgetFinish31': text += "$19'799.00"; break;
					case 'budgetFinish25':
					case 'budgetFinish26':
					case 'budgetFinish27':
					case 'budgetFinish40': text += "$20'599.00"; break;
					case 'budgetFinish44': text += "$22'899.00"; break;
					case 'budgetFinish35':
					case 'budgetFinish36': text += "$22'999.00"; break;
					case 'budgetFinish41': text += "$23'399.00"; break;
					case 'budgetFinish33':
					case 'budgetFinish43': text += "$23'799.00"; break;
					case 'budgetFinish20':
					case 'budgetFinish21':
					case 'budgetFinish22':
					case 'budgetFinish23':
					case 'budgetFinish24': text += "$24'999.00"; break;
					case 'budgetFinish06':
					case 'budgetFinish12': text += "$25'499.00"; break;
					case 'budgetFinish08': text += "$26'399.00"; break;
					case 'budgetFinish05':
					case 'budgetFinish11':
					case 'budgetFinish13':
					case 'budgetFinish14': text += "$26'499.00"; break;
					case 'budgetFinish42': text += "$26'599.00"; break;
					case 'budgetFinish37':
					case 'budgetFinish38':
					case 'budgetFinish39': text += "$26'699.00"; break;
					case 'budgetFinish19': text += "$27'099.00"; break;
					case 'budgetFinish07': text += "$28'999.00"; break;
					case 'budgetFinish04':
					case 'budgetFinish10': text += "$29'999.00"; break;
					case 'budgetFinish17': text += "$31'499.00"; break;
					case 'budgetFinish28':
					case 'budgetFinish29': text += "$33'560.00"; break;
					case 'budgetFinish15':
					case 'budgetFinish16': text += "$35'199.00"; break;
					case 'budgetFinish01':
					case 'budgetFinish02':
					case 'budgetFinish09': text += "$37'999.00"; break;
					case 'budgetFinish18': text += "$67'099.00"; break;
					case 'budgetFinish03': text += "$73'499.00"; break;
				}
			break;
		}

		text += "</strong>";

		$('#wrapFinal').html(text);

		$([document.documentElement, document.body]).animate({
	        scrollTop: $("#wrapFinal").offset().top
	    }, 1000);
	});
});