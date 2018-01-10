window.onload = function () {
    alert('Dokument geladen');
    $.ajax({
        url: 'service.php',
        data: {action: 'getWhooples'},
        dataType: 'text',
        type: 'post',
        success: function (output) {
            var data = $.parseJSON(output);
            var parent = $("#socialMediaAdded");
            for (var i = 0; i<data.length; i++) {
                alert(data[i]['wWhoople_AccountName'] + "  " + data[i]['wWhoople_Website']);
            }
        }
    });

    $("#submit").click(function () {
        var whoopleName = $("#whoopleName").val();
        var accountName = $("#accountName").val();
        var whoopleLink = $("#whoopleLink").val();

        $.ajax({
            url: 'service.php',
            data: {action: 'addWhooples', whoopleName: whoopleName, accountName: accountName, whoopleLink: whoopleLink},
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