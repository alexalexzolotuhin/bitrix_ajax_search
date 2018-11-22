
$(function() {
// Поиск
    $('.ftask_search .input').keydown(function () {
        var _self = $(this)

            if (_self.val().length >= 2) {
                // число 2 можно менять, число 2 значит что запрос выполнится только если введено минимум 3 символа в строку поиска.
                // Здесь ajax запрос на сервер со вставкой результата
                $('.ftask_search .tips').fadeIn(300)

                var text = _self.val();
                var url = "?FTASK_SEARCH_AJAX=1&text=" + text;

                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: url,
                    success: function (data) {
                        $('.ftask_search .tips .scroll').html(data);

                        if( $('.tips .scroll .tip').size() > 3 ){
                            $('.tips .scroll').slimScroll({
                                height: '300px',
                                position: 'right',
                                railVisible: true,
                                alwaysVisible: true,
                                color: '#21934d',
                                size: '4px',
                                distance: '12px',
                                railColor: '#f2f2f2',
                                railOpacity: 1
                            }).on('slimscrolling', function(e, pos){
                                if( pos > 424 ){
                                    $('.slimScrollDiv').addClass('active')
                                } else {
                                    $('.slimScrollDiv').removeClass('active')
                                }
                            })
                        }

                    }
                });

            } else {
                $('.ftask_search .tips').fadeOut(200)
            }

    })


});//ready