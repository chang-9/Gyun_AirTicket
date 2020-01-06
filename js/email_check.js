//이메일 유효성 검사
    memberEmailAddress.blur(function(){
        var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        if(regex.test(memberEmailAddress.val()) === false){
            memberEmailAddressComment.text('이메일이 유효성에 맞지 않습니다.');
            eMailCheck.val('1');
        }else{
            memberEmailAddressComment.text('올바른 이메일 입니다.');
        }
    });
 
});