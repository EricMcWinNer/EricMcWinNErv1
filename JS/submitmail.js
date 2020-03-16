$(document).ready(function () {
    var bool = false;
    if (docCookies.getItem("numbertimes") === null)
        docCookies.setItem("numbertimes", 1, 86400, "/");
    if (docCookies.getItem("seconds") === null)
        docCookies.setItem("seconds", 600, 86400, "/");
    var compoundtime;

    function interval() {
        if (docCookies.getItem('timesent') === null)
            docCookies.setItem("timesent", Math.round(((new Date()).getTime() / 1000) + (60 * 60) + parseInt(docCookies.getItem("seconds"), 10)), 86400, "/");
        if (docCookies.getItem('numbersent') === null)
            docCookies.setItem('numbersent', 0, 86400, "/");
        //Change the time displayed every second
        setInterval(function () {
            //Store the time the first valid message was sent that was previously stored in a cookie
            var time = parseInt(docCookies.getItem("timesent"), 10);
            //Calculate the time remaining by subtracting the stored time from the current time
            var remainingtime = time - Math.round(((new Date()).getTime() / 1000) + (60 * 60));
            //Calculate the minutes remaining from remainingtime
            var minutes = Math.floor(remainingtime / 60);
            //Calculate the seconds remaining from remainingtime
            var second = remainingtime - (minutes * 60);
            //Output the value of the remaining time in minutes and seconds
            compoundtime = minutes + ":" + second;
            $('#time').html(compoundtime);
            $('#minute').html((parseInt(docCookies.getItem("seconds"), 10) / 60));
            //Conditional statement to reset the time stored & the "number of messages sent" stored when the time to wait elapses
            if ((minutes === 0 && second === 0) || (minutes < 0)) {
                if (bool === true) {
                    $('.errormessage').fadeOut('slow');
                    var numbertimes = parseInt(docCookies.getItem("numbertimes"), 10);
                    numbertimes++;
                    var seconds = parseInt(docCookies.getItem("seconds"), 10);
                    seconds *= numbertimes;
                    docCookies.setItem("timesent", Math.round(((new Date()).getTime() / 1000) + (60 * 60) + seconds), 86400, "/");
                    docCookies.setItem("numbertimes", numbertimes, 86400, "/");
                    docCookies.setItem("seconds", seconds, 86400, "/");
                    docCookies.setItem("numbersent", 0, 86400, "/");
                    bool = false;
                }
                else {
                    $('.errormessage').fadeOut('slow');
                    docCookies.setItem("numbersent", 0, 86400, "/");
                    docCookies.setItem("timesent", Math.round(((new Date()).getTime() / 1000) + (60 * 60) + (parseInt(docCookies.getItem("seconds"), 10))), 86400, "/");
                }
            }
        }, 1000);
    }


    $('#sendmessage').click(function () {
        var number = $('input[name="number"]').val();
        var periodregex = new RegExp(/\./g);
        $('this').css({'background-color': '#8080ff', 'color': 'white'});
        if ($('input[name="firstname"]').val() === "") {
            $('input[name="firstname"]').get(0).setCustomValidity('Please input your first name');
        }
        else if ($('input[name="firstname"]').val().length < 2) {
            $('input[name="firstname"]').get(0).setCustomValidity('Please input a name with 2 characters or more')
        }
        else if ($('input[name="firstname"]').val().length > 150) {
            $('input[name="firstname"]').get(0).setCustomValidity('Please input a name with less than 150 characters');
        }
        else {
            $('input[name="firstname"]').get(0).setCustomValidity("");
        }
        if ($('input[name="lastname"]').val() === "") {
            $('input[name="lastname"]').get(0).setCustomValidity('Please input your last name');
        }
        else if ($('input[name="lastname"]').val().length < 2) {
            $('input[name="lastname"]').get(0).setCustomValidity('Please input a name with 2 characters or more');
        }
        else if ($('input[name="lastname"]').val().length > 150) {
            $('input[name="lastname"]').get(0).setCustomValidity('Please input a name with less than 150 characters');
        }
        else {
            $('input[name="lastname"]').get(0).setCustomValidity('');
        }
        if ($('input[name="email"]').val() === "") {
            $('input[name="email"]').get(0).setCustomValidity('Please put in your email');
        }
        else if ($('input[name="email"]').val().length < 5) {
            $('input[name="email"]').get(0).setCustomValidity('Please put in a valid email');
        }
        else if ($('input[name="email"]').val().length > 150) {
            $('input[name="email"]').get(0).setCustomValidity('Please input a valid email');
        }
        else {
            $('input[name="email"]').get(0).setCustomValidity('');
        }
        if (isNaN($('input[name="number"]').val())) {
            $('input[name="number"]').get(0).setCustomValidity('Please input a valid phone number');
        }
        else if ($('input[name="number"]').val().length !== 11) {
            $('input[name="number"]').get(0).setCustomValidity('Please put in an 11 digit phone number');
        }
        else if (periodregex.test(number)) {
            $('input[name="number"]').get(0).setCustomValidity('Please input a valid phone number');
        }
        else {
            $('input[name="number"]').get(0).setCustomValidity('');
        }
        if ($('textarea[name="message"]').val().length < 15) {
            $('textarea[name="message"]').get(0).setCustomValidity('Please put in a message more than 15 characters');
        }
        else if ($('textarea[name="message"]').val().length > 1500) {
            $('textarea[name="message"]').get(0).setCustomValidity('Please put in a message with less than 1500 characters');
        }
        else {
            $('textarea[name="message"]').get(0).setCustomValidity('');
        }
    });
    $('#contactform').submit(function (event) {
        event.preventDefault();
        interval();
        var salt = (10 * Math.floor(10 * Math.random())) + (10 * Math.floor(Math.random())) + (Math.ceil(12 * Math.random())) + 8 + 12 + (10 * Math.floor(Math.random())) + 10 + 19;
        var firstname = $('input[name="firstname"]').val().trim();
        var lastname = $('input[name="lastname"]').val().trim();
        var email = $('input[name="email"]').val().trim();
        var number = $('input[name="number"]').val().trim();
        var message = $('textarea[name="message"]').val().trim();
        var token = parseInt($('div#hidden').attr('data-valueey'), 10);
        var imperialregex = new RegExp("imperial");
        var location = window.location;
        var url;
        if (imperialregex.test(location))
            url = '../Controller/submitmail.php';
        else
            url = 'Controller/submitmail.php';
        token += salt;
        if (docCookies.getItem('numbersent') >= 10) {
            $('.errormessage').fadeIn('slow').html('You can\'t send more than 10 messages within <span id="minute"></span> minutes. Time left <span id="time"></span><span class="float-right pointer">&#10006;</span>');
            bool = true;
        } else {
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    number: number,
                    message: message,
                    token: token,
                    salt: salt
                },
                beforeSend: function () {
                    $('#sendmessage').hide();
                    $('#messageloader').show();
                },
                success: function (msg) {
                    var errorregex = new RegExp("Error:");
                    var successregex = new RegExp("Success:");
                    if (errorregex.test(msg)) {
                        $('#messageloader').hide();
                        $('#sendmessage').show();
                        $('.errormessage').fadeIn('slow').html(msg.replace("Error:", "") + '<span class="float-right pointer">&#10006;</span>');
                    }
                    if (successregex.test(msg)) {
                        var numberclicked = docCookies.getItem("numbersent");
                        numberclicked++;
                        docCookies.setItem("numbersent", numberclicked, 86400, "/");
                        $('#messageloader').hide();
                        $('#sendmessage').show();
                        $('.successmessage').fadeIn('slow').html(msg.replace("Success:", "") + '<span class="float-right pointer">&#10006;</span>');
                    }
                },
                error: function () {
                    $('#messageloader').hide();
                    $('#sendmessage').show();
                    alert('An unexpected error occured. Please try again');
                }
            });
        }
    });
});
