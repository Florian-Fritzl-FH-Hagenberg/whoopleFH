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
            for (var i = 0; i<data.length; i++) {
                var text = "";
                text+='<li class="mdl-list__item"><span class="mdl-list__item-primary-content"><i class="material-icons  mdl-list__item-avatar">person</i>';
                text+=data[i]['wAvailable_Whooples_Name'];
                text+='</span><div class="popup"><span class="mdl-list__item-secondary-action"><div class="fab"><i class="material-icons fab-icon">add</i><form class="cntt-wrapper">';
                text+='<div id="fab-hdr"><h3>Add Whoople</h3></div><div class="cntt"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">';
                text+='<input class="mdl-textfield__input" type="text" id="' + 'whoopleName' + i;
                text+='/><label class="mdl-textfield__label" for="whoopleName' + i + '">Whoople-Name</label>';
                text+='</div><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"><input class="mdl-textfield__input" type="text" id="accountName' + i + '"/>';
                text+='<label class="mdl-textfield__label" for="accountName' + i + '">Account-Name</label></div>';
                text+='<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"><input class="mdl-textfield__input" type="text" id="whoopleLink' + i + '"';
                text+='/><label class="mdl-textfield__label" for="whoopleLink' + i + '">Whoople-Link</label></div></div>';
                text+='<div class="btn-wrapper"><button class="mdl-button mdl-js-button" id="cancel' + i + '">Cancel</button><button class="mdl-button mdl-js-button mdl-button--primary" id="';
                text+='submit' + i + '"';
                text+='>Submit</button></div></form></div></span></div></li>';
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

};