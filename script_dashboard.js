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

};