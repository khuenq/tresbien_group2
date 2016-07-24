$j('document').ready(function(){
    $j('#next_verify').on('click',function(){
        var numReg = /^[0-9]+$/;

        var name = $j('#name').val();
        name = $j.trim(name);
        var cardNumber = $j('#cardno').val();

        if('' == name){
            alert('Hay nhap ten cua ban');
            return false;
        }
        if ('' == cardNumber) {
            alert("Hay nhap so tai khoan cua ban");
            return false;
        }
        else if(!numReg.test(cardNumber))
        {
            alert('Card Number chi la so');
            return false;
        }
        else if((16 != cardNumber.length)&&(19 != cardNumber.length)){
            alert('Card Number bao gom 16 hoac 19 chu so');
            return false;
        }

        // Ajax check balance
        $j.ajax({
            url: urlPaid+'account/'+cardNumber,
            type: 'POST',
        })
        .done(function(data) {
            if(1 == data)
            {
                alert("Tài khoản này hiện tại đang bị khoá. Xin vui lòng liên hệ với ngân hàng.");    
            }
            else if(2 == data)
            {
                alert("Số dư trong tài khoản quý khách không đủ thanh toán đơn hàng.");
            }
            else
            {
                $j('#gate').submit();
                //return true;
            }
            
            return false;
        })
        .fail(function() {
            alert('Cannot connect to bank server.');
            return false;
        })
    });
});