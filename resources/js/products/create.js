$(function(){
    $('#fundamentalPrice').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    $('#materialCoefficient1').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    $('#materialCoefficient2').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    $('#materialCoefficient3').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    $('#materialCoefficient4').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    $('#materialCoefficient5').change(function(){
        if(checkFormat($(this))){
            caluatedRetailPrice();
        }
    });

    function checkFormat($input){
        let value = $input.val();
        let rules = /^\d+$|^\d+[.]?\d+$/;
        if (rules.test(value)){
            return true;
        }
        alert("請輸入數字。");
        $input.val(0);
        caluatedRetailPrice();
        return false;
    }

    function caluatedRetailPrice(){
        let fp = parseFloat($('#fundamentalPrice').val()) ;

        let mc1 = parseFloat($('#materialCoefficient1').val());
        let mc2 = parseFloat($('#materialCoefficient2').val());
        let mc3 = parseFloat($('#materialCoefficient3').val());
        let mc4 = parseFloat($('#materialCoefficient4').val());
        let mc5 = parseFloat($('#materialCoefficient5').val());

        let mp1 = parseFloat($('#material_1').html());
        let mp2 = parseFloat($('#material_2').html());
        let mp3 = parseFloat($('#material_3').html());
        let mp4 = parseFloat($('#material_4').html());
        let mp5 = parseFloat($('#material_5').html());

        let rp = fp + mc1 * mp1 + mc2 * mp2 + mc3 * mp3 + mc4 * mp4 + mc5 * mp5;
        $('#retailPrice').val(rp);
    }
});