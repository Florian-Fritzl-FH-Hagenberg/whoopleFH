window.onload = function () {
    $.ajax({
        url: 'service.php',
        data: {action: 'getFriends'},
        dataType: 'text',
        type: 'post',
        success: function (output) {
            var data = $.parseJSON(output);
            var parent = $("#friends");
            for (var i = 0; i<data.length; i++) {
                var text = "";
                text+='<li class="mdl-list__item"> <span class="mdl-list__item-primary-content"> <i class="material-icons  mdl-list__item-avatar">person</i>';
                text+=data[i]['wUser_Username'];
                text+='</span></li>';
                parent.append(text);
            }
        }
    });

    $.ajax({
        url: 'service.php',
        data: {action: 'getFriendRequests'},
        dataType: 'text',
        type: 'post',
        success: function (output) {
            var data = $.parseJSON(output);
            var parent = $("#friendRequests");
            for (var i = 0; i<data.length; i++) {
                var text = "";
                text+='<li class="mdl-list__item"> <span class="mdl-list__item-primary-content"> <i class="material-icons  mdl-list__item-avatar">person</i>';
                text+=data[i]['wUser_Username'];
                text+='</span></li>';
                parent.append(text);
            }
        }
    });
};