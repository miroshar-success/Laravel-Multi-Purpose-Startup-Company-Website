$(() => {
    'use strict'

    toastr.options = {
        positionClass: 'toast-bottom-right',
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    })

    window.onpopstate = function (event) {
        event.preventDefault()
        window.location.reload()
    }

    $('.newsletter-form button[type=submit]').on('click', function (event) {
        event.preventDefault()
        event.stopPropagation()

        let _self = $(this)
        $.ajax({
            type: 'POST',
            cache: false,
            url: _self.closest('form').prop('action'),
            data: new FormData(_self.closest('form')[0]),
            contentType: false,
            processData: false,
            beforeSend: () => {
                _self.addClass('button-loading')
                _self.attr('disable')
            },
            success: (res) => {
                if (!res.error) {
                    _self.closest('form').find('input[type=email]').val('')
                    ioriTheme.showSuccess(res.message)
                } else {
                    ioriTheme.handleError(res.message)
                }
            },
            error: (res) => {
                ioriTheme.handleError(res)
            },
            complete: () => {
                if (typeof refreshRecaptcha !== 'undefined') {
                    refreshRecaptcha()
                }
                _self.removeClass('button-loading')
                _self.removeAttr('disable')
            },
        })
    })

    $(document).on('click', '.btn-cart-sidebar', function (event) {
        event.preventDefault()

        $('.cart-sidebar').toggleClass('active')
        if ($('.cart-sidebar').hasClass('active')) {
            $('.cart-main').find('.backdrop').show()
        } else {
            $('.cart-main').find('.backdrop').hide()
        }
    })

    $(document).on('click', '.btn-close-cart', function (event) {
        event.preventDefault()

        $('.cart-sidebar').removeClass('active')
        $('.cart-main').find('.backdrop').hide()
    })

    $(document).click(function (event) {
        const $target = $(event.target)
        const $container = $('.cart-sidebar')
        const $elClose = $('.btn-close-cart')
        const $elViewCart = $('.btn-cart-sidebar')

        if (!$container.is(event.target) && !$container.has(event.target).length) {
            if ($target.closest($elViewCart).length) {
                $container.addClass('active')
                $('.cart-main').find('.backdrop').show()
                $('body').css('overflow', 'hidden')
            } else {
                $('.cart-sidebar').removeClass('active')
                $('.cart-main').find('.backdrop').hide()
                $('body').css('overflow', 'auto')
            }
        } else if ($target.closest($elClose).length) {
            $container.removeClass('active')
            $('.cart-main').find('.backdrop').hide()
            $('body').css('overflow', 'auto')
        } else {
            $container.addClass('active')
            $('.cart-main').find('.backdrop').show()
            $('body').css('overflow', 'hidden')
        }
    })

    $(document).on('click', '.product-description .btn-view', function (event) {
        event.preventDefault()

        const currentTarget = $(event.target)
        const productDescription = $('.product-description')

        if (currentTarget.data('view') === 'full') {
            productDescription.find('.product-description-full').show()
            productDescription.find('.product-description-text').hide()

            currentTarget.text('Show less')
            currentTarget.data('view', 'less')
        } else {
            productDescription.find('.product-description-text').show()
            productDescription.find('.product-description-full').hide()

            currentTarget.text('Show more')
            currentTarget.data('view', 'full')
        }
    })

    let timeout = null

    $(document)
        .on('keyup', 'form.form-autocomplete-search input.autocomplete-search', (event) => {
            const currentTarget = $(event.currentTarget)
            const form = currentTarget.closest('form')
            const button = form.find('button[type=submit]')
            const searchResults = form.parent().find('.search-results')
            const searchMessage = form.find('.search-message')

            clearTimeout(timeout)

            timeout = setTimeout(() => {
                $.ajax({
                    method: 'GET',
                    url: currentTarget.data('ajax-url'),
                    data: {
                        q: currentTarget.val(),
                    },
                    beforeSend: () => {
                        button.addClass('button-loading')
                        button.prop('disabled', true)
                    },
                    success: ({ data, error, message }) => {
                        searchResults.html(data)

                        if (error) {
                            searchMessage.html(message)
                        } else {
                            searchMessage.html('')
                        }
                    },
                    complete: () => {
                        button.removeClass('button-loading')
                        button.prop('disabled', false)
                    },
                })
            }, 500)
        })
        .on('click', (event) => {
            const $container = $('.search-results')

            if (!$container.is(event.target) && !$container.has(event.target).length) {
                $container.html('')
            }
        })
})
