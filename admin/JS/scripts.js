/*
    todo
    Write an Ajax function that enables deleting of multiple users
 */
$(document).ready(function () {
    var checkbox = [];
    $('#delete_mulitple').click(function (event) {
        event.preventDefault();
        $('.message_checkbox').each(function () {
            if ($(this).prop('checked')) {
                checkbox.push(parseInt($(this).attr('value'), 10));
            }
        });
        if (checkbox.length > 0) {
            var jsoncheckbox = JSON.stringify(checkbox);
            $.ajax({
                type: 'POST',
                url: 'controller/messagecontroller.php',
                data: {
                    multiDelete: "multi",
                    array: jsoncheckbox
                },
                cache: false,
                success: function () {
                    location.reload();
                },
                error: function () {
                    alert('Motherfucker check your motherfucking code, it\'s bullshit and causing me errors');
                }
            });
        }
        else {
            alert('You can\'t delete nothing bro, go on, select something');
        }
    });
    $('#mark_multiple_as_read').click(function (event) {
        event.preventDefault();
        $('.message_checkbox').each(function () {
            if ($(this).prop('checked')) {
                checkbox.push(parseInt($(this).attr('value'), 10));
            }
        });
        if (checkbox.length > 0) {
            var jsoncheckbox = JSON.stringify(checkbox);
            $.ajax({
                type: 'POST',
                url: 'controller/messagecontroller.php',
                data: {
                    multiRead: 'multi',
                    array: jsoncheckbox
                },
                success: function (msg) {
                    alert(msg);
                    location.reload();
                },
                error: function () {
                    alert('Motherfucker check your motherfucking code, it\'s bullshit and causing me errors');
                }
            });
        }
        else {
            alert('You can\'t mark nothing as read, go on bro, mark something.');
        }
    });
    $('#delete_mulitple_users').click(function(event){
        event.preventDefault();
        $('.message_checkbox').each(function () {
            if ($(this).prop('checked')) {
                checkbox.push(parseInt($(this).attr('value'), 10));
            }
        });
        if (checkbox.length > 0) {
            var jsoncheckbox = JSON.stringify(checkbox);
            $.ajax({
                type: 'POST',
                url: 'controller/userController.php',
                data: {
                    deleteMultiple: "multipleUsers",
                    userArray: jsoncheckbox
                },
                success: function (msg) {
                    alert(msg);
                    location.reload();
                },
                error: function () {
                    alert('Motherfucker check your motherfucking code, it\'s bullshit and causing me errors');
                }
            });
        }
        else {
            alert('You can\'t mark nothing as read, go on bro, mark something.');
        }
    });
    if (!$('.navigation-bar li').hasClass('no_align')) {
        $('.navigation-bar li').prepend('<span class="helper"></span>');
    }
    $('.dropdown').find('*').addClass('dropdown_children');
    $('a.verticallyalignanchor').prepend('<span class="helper"></span>');
    $('.alertify').click(function () {
        $(this).fadeOut('slow');
    });
    $('.link_element').click(function () {
        var href = $(this).attr('data-link');
        $(window).get(0).location.href = href;
    });
    $('.dropdown_trigger').click(function (event) {
        var dropdownregex = new RegExp("dropdown_children");
        if (!dropdownregex.test(event.target.className)) {
            $('body').prepend('<div class="invisiblediv"></div>');
            $(this).find('.dropdown').toggleClass('visible');
            if ($(this).find('.dropdown').hasClass('visible')) {
                $(this).find('.dropdown').fadeIn('slow');
            } else {
                $('.invisiblediv').remove();
                $(this).find('.dropdown').fadeOut('slow');
            }
        }
    });
    $('body').on('click', '.invisiblediv', function () {
        $(this).remove();
        $('.dropdown').each(function () {
            if ($(this).hasClass('visible')) {
                $(this).removeClass('visible');
                $(this).fadeOut('slow');
            }
        });
    });
    setTimeout(function () {
        $('.alertify').fadeOut('slow');
    }, 6000);

    if ($('.error-alert').css('display') == "block") {
        if ($('.capsule').length) {
            $('.capsule').css('padding-top', $('.error-alert').outerHeight() + 30 + 'px');
        }
        else if ($('body.register').length) {
            $('body.register').css('padding-top', $('.error-alert').outerHeight() + 30 + 'px');
        }

    }
});
var url;

function read(url) {
    window.location.href = url;
}