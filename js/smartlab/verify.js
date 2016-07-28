$j('document').ready(function(){
    $j('#complete').on('click',function(){
        var otpcode = $j('#otpcode').val();
        otpcode = $j.trim(otpcode);

        if('' == otpcode){
            alert('Hay nhap OTP code');
            return false;
        }

        else if(otp != otpcode)
        {
            alert('OTP code nhap vao khong dung!');
            return false;
        }

        return true;
    });

    var otp = Math.floor((Math.random() * 8999) + 1000);
    setTimeout(function() { alert('Your OTP code: '+otp); }, 5000);
});