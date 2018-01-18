window.onload = function () {
    bindButtonClick();
    $.ajax({
        url: 'service.php',
        data: {action: 'getWhooples'},
        dataType: 'text',
        type: 'post',
        success: function (output) {
            var data = $.parseJSON(output);
            var parent = $("#socialMediaAdded");
            for (var i = 0; i<data.length; i++) {
                var text = "";
                text+='<li class="mdl-list__item"> <span class="mdl-list__item-primary-content"> <i class="material-icons  mdl-list__item-avatar">person</i>';
                text+=data[i]['wWhoople_Website'];
                text+='</span><span>';
                text+=data[i]['wWhoople_AccountName'];
                text+='</span> </li>';
                parent.append(text);
            }
        }
    });

    $.ajax({
        url: 'service.php',
        data: {action: 'getAvailableWhooples'},
        dataType: 'text',
        type: 'post',
        success: function (output) {
            var data = $.parseJSON(output);
            var parent = $("#socialMediaAvailable");
            for (var i = 0; i<data.length; i++) {
                var text ='<option value="' + data[i]['wAvailable_Whooples_Name'] + '">';
                parent.append(text);
            }
        }
    });


    $("#submit").click(function () {
        var whoopleName = $("#whoopleName").val();
        var websiteLink = $("#websiteLink").val();
        var accountName = $("#accountName").val();

        $.ajax({
            url: 'service.php',
            data: {action: 'addWhoople', whoopleName: whoopleName, accountName: accountName, websiteLink: websiteLink},
            type: 'post',
            success: function (output) {
                var data = $.parseJSON(output);

                //input validation
                if (data['whoopleNameError'] === 'empty') {
                    $("#whoopleNameEmpty").remove();
                    $('#whoopleName').after('<span id ="whoopleNameEmpty" class="errorMsg">Please enter a Whoople-Name!</span>');
                } else{
                    $("#whoopleNameEmpty").remove();
                }

                if (data['websiteLinkError'] === 'empty') {
                    $("#websiteLinkEmpty").remove();
                    $('#websiteLink').after('<span id ="websiteLinkEmpty" class="errorMsg">Please enter a Whoople-Link!</span>');
                } else{
                    $("#websiteLinkEmpty").remove();
                }

                if (data['accountNameError'] === 'empty') {
                    $("#accountNameEmpty").remove();
                    $('#accountName').after('<span id ="accountNameEmpty" class="errorMsg">Please enter a Account-Name!</span>');
                } else{
                    $("#accountNameEmpty").remove();
                }

                if(data['valid'] === 'success'){
                    location.reload()
                }
            }
        });
    });

    $(document).ready(function(){
        $('input.typeahead').typeahead({
            name: 'typeahead',
            remote:'search.php?key=%QUERY',
            limit : 10
        });
    });

};