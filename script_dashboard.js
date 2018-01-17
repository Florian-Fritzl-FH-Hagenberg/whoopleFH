window.onload = function () {
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
            parent.append('<li class="mdl-menu__item" data-selected="true">Custom</li>');

            for (var i = 0; i<data.length; i++) {
                var text = "";
                text+='<li class="mdl-menu__item">';
                text+=data[i]['wAvailable_Whooples_Name'];
                text+='</li>';

                parent.append(text);
            }
            //reapply event handlers to popup mask
            bindButtonClick();
        }
    });

    $("#submit").click(function () {
        var whoopleName = $("#whoopleName").val();
        var accountName = $("#accountName").val();
        var whoopleLink = $("#whoopleLink").val();

        $.ajax({
            url: 'service.php',
            data: {action: 'addWhoople', whoopleName: whoopleName, accountName: accountName, whoopleLink: whoopleLink},
            type: 'post',
            success: function (output) {
                var data = $.parseJSON(output);

                //input validieren?
                if (data['whoopleNameError'] === 'empty') {
                    $("#whoopleNameEmpty").remove();
                    $('#whoopleName').after('<span id ="whoopleNameEmpty" class="errorMsg">Please enter a Whoople-Name!</p>');
                } else{
                    $("#whoopleNameEmpty").remove();
                }

                if (data['accountNameError'] === 'empty') {
                    $("#accountNameEmpty").remove();
                    $('#accountName').after('<span id ="accountNameEmpty" class="errorMsg">Please enter a Account-Name!</p>');
                } else{
                    $("#accountNameEmpty").remove();
                }

                if (data['whoopleLinkEmpty'] === 'empty') {
                    $("#whoopleNameEmpty").remove();
                    $('#whoopleLink').after('<span id ="whoopleLinkEmpty" class="errorMsg">Please enter a Whoople-Link!</p>');
                } else{
                    $("#whoopleLinkEmpty").remove();
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