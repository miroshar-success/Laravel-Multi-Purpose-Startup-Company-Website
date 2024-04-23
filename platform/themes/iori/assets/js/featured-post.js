$(function () {
    'use strict'

    const Loading = $('.loading-featured-blog')

    $('.featured-post').on('click', '.btn-category', function () {
        $.ajax({
            url: $(this).data('action'),
            method: 'GET',
            beforeSend: function () {
                Loading.show()
            },
            success: function (res) {
                $('.box-list-blogs').html(res.data)
                Loading.hide()
            },
            complete: function () {
                Loading.hide()
            },
        })
    })
})
