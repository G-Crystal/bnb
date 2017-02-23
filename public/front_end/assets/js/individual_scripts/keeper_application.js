$(document).ready(function () {
    console.log('ready');
    var base_url = $('#hidden_base_url').text();
    $('#keeper_submit_button').click(function () {
        console.log('button_clicked');
        var name = $('#keeper_name').val();
        var email_address = $('#keeper_email_address').val();
        var phone_number = $('#keeper_phone_number').val();
        //var address = $('#keeper_address').val();
        var address_1 = $('#keeper_address_1').val();
        var address_2 = $('#keeper_address_2').val();
        var address_3 = $('#keeper_address_3').val();
        var address_4 = $('#keeper_address_4').val();
        var address = address_1+".,."+address_2+".,."+address_3+".,."+address_4;
        var certify_that = $('input[name=keeper_certify_that]:checked').val();
        var city = $('input[name=keeper_city]:checked').val();
        //var language = $('#keeper_language:checkbox:checked').val();
        var language = [];
        $('input[name=keeper_language]:checked').each(function () {
            language.push($(this).val());
        });
        var availability = $('input[name=keeper_availability]:checked').val();
        var transport = [];
        $('input[name=keeper_transport]:checked').each(function () {
            transport.push($(this).val());
        });
        var vacation_rental_membership = $('input[name=keeper_vacation_rental_membership]:checked').val();
        var about = [];
        $('input[name=keeper_about]:checked').each(function () {
            about.push($(this).val());
        });
        var visa = $('input[name=keeper_visa]:checked').val();
        var introduction = $('#keeper_introduction').val();
        var heard_from = $('input[name=keeper_heard_from]:checked').val();
        var bnbkeeper_is = $('input[name=keeper_bnbkeeper_is]:checked').val();
        var services = [];
        $('input[name=keeper_bnbkeeper_services]:checked').each(function () {
            services.push($(this).val());
        });
        var clients_are = $('input[name=keeper_clients_are]:checked').val();
        var concierge_chooser = $('input[name=keeper_concierge_chooser]:checked').val();
        var schedule_choosing = $('input[name=keeper_schedule_choosing]:checked').val();
        var reviewer = $('input[name=keeper_reviewer]:checked').val();
        console.log(name);
        console.log(email_address);
        console.log(phone_number);
        console.log(address);
        console.log(certify_that);
        console.log(city);
        console.log(language);
        console.log(availability);
        console.log(transport);
        console.log(vacation_rental_membership);
        console.log(about);
        console.log(visa);
        console.log(introduction);
        console.log(heard_from);
        console.log(bnbkeeper_is);
        console.log(services);
        console.log(clients_are);
        console.log(concierge_chooser);
        console.log(reviewer);
        console.log(schedule_choosing);
        // ajax
        var _url = base_url + 'aj/fka';
        var _data = {}
        _data.name = name;
        _data.email_address = email_address;
        _data.phone_number = phone_number;
        _data.address = address;
        _data.certify_that = certify_that;
        _data.city = city;
        _data.language = language;
        _data.availability = availability;
        _data.transport = transport;
        _data.vacation_rental_membership = vacation_rental_membership;
        _data.about = about;
        _data.visa = visa;
        _data.introduction = introduction;
        _data.heard_from = heard_from;
        _data.bnbkeeper_is = bnbkeeper_is;
        _data.services = services;
        _data.clients_are = clients_are;
        _data.concierge_chooser = concierge_chooser;
        _data.reviewer = reviewer;
        _data.schedule_choosing = schedule_choosing;
        console.log(">> start ajax. url: " + _url + "; data :" + _data);

        var data_response;
        $.ajax({
            url: _url,
            data: _data,
            type: 'POST',
            dataType: "text",
            async: false,
            success: function (response) {
                var msg = "";
                console.log('unique testing response: ' + response);
                $('#ka_val_msg').empty();
                if(response == 1){
                    $('#ka_val_msg').html("<div class='row' style='color:green'>Application Successful</div>");
                }else{
                    $('#ka_val_msg').html("<div class='row' style='color:green'>Application Failed. Please make sure you didn't use the email address earlier</div>");
                }
            }
        });
        // ajax
    });
});