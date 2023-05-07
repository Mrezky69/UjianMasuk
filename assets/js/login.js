/**
 * Variables
 */
const lupaButton = document.getElementById('lupa-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

/**
 * Add event listener to the "Sign Up" button
 */
lupaButton.addEventListener('click', () => {
    userForms.classList.remove('bounceRight')
    userForms.classList.add('bounceLeft')
}, false)

/**
 * Add event listener to the "Login" button
 */
loginButton.addEventListener('click', () => {
    userForms.classList.remove('bounceLeft')
    userForms.classList.add('bounceRight')
}, false)

$(function() {

    $('.btncekno_register').click(function() {
        if ($('#fno_register').val() != '') {
            var no_register = $('#fno_register').val();
            //alert(no_register);
            $.ajax({
                url: base_url + '/Login/cekno_register',
                data: { no_register: no_register },
                method: 'POST',
                dataType: 'json',
                cache: false,
                success: function(hasil) {
                    if (hasil != 0) {
                        if (!hasil.error) {
                            $('.formno_register').hide(1000);
                            $('.formjawab').show(2000);
                            $('.pertanyaan').html(hasil.pertanyaan);
                            //Pertanyaan
                            $('.btn-jawab').click(function() {
                                    if ($('.jawab').val() != "") {
                                        var jawab = $('.jawab').val();
                                        var no_register = hasil.no_register;
                                        $.ajax({
                                            url: base_url + '/Login/cekjawab',
                                            type: 'POST',
                                            data: {
                                                no_register: no_register,
                                                jawaban: jawab
                                            },
                                            dataType: 'json',
                                            cache: false,
                                            success: function(cekjawaban) {
                                                if (cekjawaban != 0) {
                                                    $('.formjawab').hide(1000);
                                                    $('.formreset').show(2000);
                                                    $('.no_register').val(cekjawaban.no_register);
                                                    //Reset Password
                                                    $('.formreset').submit(function() {
                                                            var no_register = cekjawaban.no_register;
                                                            var passwd = $('#passwd').val();
                                                            var repasswd = $('#repasswd').val();
                                                            if (repasswd != passwd) {
                                                                $('.error-redB').show(500);
                                                                $('#repasswd').keydown(function() {
                                                                    $('.error-redB').hide(500);
                                                                });
                                                                return false;
                                                            }
                                                        })
                                                        //End reset password
                                                } else {
                                                    $('.error-redB').show(500);
                                                    $('#fjawab').keydown(function() {
                                                        $('.error-redB').hide(500);
                                                    })
                                                }
                                            }
                                        })
                                    }
                                    return false;
                                })
                                //End Pertanyaan
                        } else {
                            alert(hasil.error)
                        }
                    } else {
                        $('.error-redB').show(500);
                        $('#fno_register').keyup(function() {
                            $('.error-redB').hide(500);
                        })
                    }
                }
            });
        }
        return false;
    });

});