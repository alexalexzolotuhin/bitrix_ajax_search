
$(function() {
// Поиск
    $('.search .input').keydown(function () {
        var _self = $(this)
        setTimeout(function () {
            if (_self.val().length > 2) {
                // число 2 можно менять, число 2 значит что запрос выполнится только если введено минимум 3 символа в строку поиска.
                // Здесь ajax запрос на сервер со вставкой результата
                $('header .search .tips').fadeIn(300)

                var text = _self.val();
                var url = "/include/ajax/search.php?text=" + text;

                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: url,
                    success: function (data) {
                        $('header .search .tips .scroll').html(data);
                    }
                });

            } else {
                $('header .search .tips').fadeOut(200)
            }
        }, 10)
    })


});//ready