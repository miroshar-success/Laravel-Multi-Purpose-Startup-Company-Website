class Ecommerce {
    $body = $(document.body)
    $productsFilter = this.$body.find('#products-filter-form')
    $quickViewModal = this.$body.find('#product-quick-view-modal')

    init() {
        this.$body
            .on('click', '.add-to-cart', (event) => {
                this.addToCart(event)
            })
            .on('click', 'form.cart-form button[type=submit]', (event) => {
                this.addToCarts(event)
            })
            .on('click', '.remove-cart-item', (event) => {
                this.removeItemCart(event)
            })
            .on('click', '.remove-cart-item-sidebar', (event) => {
                this.removeItemCartSidebar(event)
            })
            .on('click', '.quantity .increase, .quantity .decrease', (event) => {
                this.productQuantity(event)
            })
            .on('keyup', '.quantity .qty', (event) => {
                this.onKeyUpProductQuantity(event)
            })
            .on('click', '.add-to-compare', (event) => {
                this.addToCompare(event)
            })
            .on('click', '.remove-compare-item', (event) => {
                this.removeCompareItem(event)
            })
            .on('click', '.add-to-wishlist', (event) => {
                this.addToWishlist(event)
            })
            .on('click', '.remove-wishlist-item', (event) => {
                this.removeWishlistItem(event)
            })
            .on('click', '.product-quick-view-button', (event) => {
                this.handleProductQuickView(event)
            })
            .on('submit', '#products-filter-form', (event) => {
                this.filterProducts(event)
            })
            .on('change', '.box-sortby select[name="sort-by"]', (event) => {
                this.handleProductsSorting(event)
            })
            .on('change', '.product-area .tp-shop-selector select[name="per-page"]', (event) => {
                this.handleProductsPerPage(event)
            })
            .on('change', '#products-filter-form select, input', () => {
                this.$productsFilter.trigger('submit')
            })
            .on('click', '.product-list .box-pagination ul li a', (event) => {
                this.handleProductsPagination(event)
            })
            .on('click', '.filter-layout', (event) => {
                event.preventDefault()
                const currentTarget = event.target
                this.$productsFilter
                    .find('input[name=layout')
                    .val($(currentTarget).closest('.filter-link').data('layout'))
                this.$productsFilter.trigger('submit')

                $('.filter-link').removeClass('active')
                $(currentTarget).closest('.filter-link').addClass('active')
            })
            .on('click', '.box-quantity .button-up, .box-quantity .button-down', (event) => {
                event.preventDefault()

                const $currentTarget = $(event.currentTarget)
                const inputQuantity = $('.box-quantity').find('.input-quantity')
                if ($currentTarget.data('type') === 'increase') {
                    inputQuantity.val(parseInt(inputQuantity.val()) + 1)
                } else {
                    if (parseInt(inputQuantity.val()) > 1) {
                        inputQuantity.val(parseInt(inputQuantity.val()) - 1)
                    }
                }

                $('.cart-form').find('input[name="qty"]').val(inputQuantity.val())
            })
            .on('change', '.box-quantity .input-quantity', (event) => {
                event.preventDefault()
                $('.cart-form').find('input[name="qty"]').val($(event.currentTarget).val())
            })
            .on('click', '.btn-apply-coupon-code', (event) => {
                this.applyCouponCode(event)
            })
            .on('click', '.btn-remove-coupon-code', (event) => {
                this.removeCouponCode(event)
            })
        this.filterSlider()
    }

    addToCart(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'POST',
            data: {
                id: $currentTarget.data('id'),
            },
            dataType: 'json',
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (response) => {
                if (response.error) {
                    ioriTheme.showError(response.message)
                } else {
                    this.loadAjaxCount()
                    this.loadAjaxCartSidebar()
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })
    }

    addToCarts(event) {
        event.preventDefault()
        const $btn = $(event.currentTarget)
        const $form = $btn.closest('form.cart-form')

        let data = $form.serializeArray()
        data.push({ name: 'checkout', value: $btn.prop('name') === 'checkout' ? 1 : 0 })

        $.ajax({
            type: 'POST',
            url: $form.prop('action'),
            data: data,
            beforeSend: () => {
                $btn.addClass('button-loading')
            },
            success: ({ error, message, data }) => {
                if (error) {
                    ioriTheme.showError(message)
                } else {
                    if (data.next_url !== undefined) {
                        window.location.href = data.next_url
                        return
                    }

                    this.$quickViewModal.modal('hide')
                    this.loadAjaxCount()
                    this.loadAjaxCartSidebar()
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $btn.removeClass('button-loading')
            },
        })
    }

    removeItemCart(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)
        const $cartContent = $('.cart-page-content')
        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'GET',
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
                $cartContent.find('.loading').show()
            },
            success: (response) => {
                if (response.error) {
                    $cartContent.find('loading').hide()
                    ioriTheme.showError(response.message)
                } else {
                    ioriTheme.showSuccess(response.message)

                    if ($cartContent.length && window.siteConfig?.cartUrl) {
                        $cartContent.load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () {})
                    }
                    this.loadAjaxCount()
                }
            },
            complete: () => {
                $cartContent.find('.loading').hide()
            },
        })
    }

    removeItemCartSidebar(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)
        const $cartContent = $('.cart-page-content')
        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'GET',
            beforeSend: () => {
                $cartContent.find('.loading').show()
            },
            success: (response) => {
                if (response.error) {
                    $cartContent.find('loading').hide()
                    ioriTheme.showError(response.message)
                } else {
                    ioriTheme.showSuccess(response.message)

                    if ($cartContent.length && window.siteConfig?.cartUrl) {
                        $cartContent.load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () {})
                    }
                    this.loadAjaxCount()
                    this.loadAjaxCartSidebar()
                }
            },
            complete: () => {
                $cartContent.find('.loading').hide()
            },
        })
    }

    productQuantity(event) {
        event.preventDefault()

        let $this = $(event.currentTarget),
            $qty = $this.siblings('.qty'),
            step = parseInt($qty.attr('step'), 10),
            current = parseInt($qty.val(), 10),
            min = parseInt($qty.attr('min'), 10),
            max = parseInt($qty.attr('max'), 10)
        min = min || 1
        max = max || current + 1
        if ($this.hasClass('decrease') && current > min) {
            $qty.val(current - step)
            $qty.trigger('change')
        }
        if ($this.hasClass('increase') && current < max) {
            $qty.val(current + step)
            $qty.trigger('change')
        }

        this.processUpdateCart($this)
    }

    onKeyUpProductQuantity(event) {
        event.preventDefault()

        let $this = $(event.currentTarget),
            $wrapperBtn = $this.closest('.product-button'),
            $btn = $wrapperBtn.find('.quantity_button'),
            $price = $this.closest('.quantity').siblings('.box-price').find('.price-current'),
            $priceFirst = $price.data('current'),
            current = parseInt($this.val(), 10),
            min = parseInt($this.attr('min'), 10),
            max = parseInt($this.attr('max'), 10)
        let min_check = min ? min : 1
        let max_check = max ? max : current + 1
        if (current <= max_check && current >= min_check) {
            $btn.attr('data-quantity', current)
            let $total = ($priceFirst * current).toFixed(2)
            $price.html($total)
        }

        this.processUpdateCart($this)
    }

    addToCompare(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'POST',
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (response) => {
                const { error, message } = response

                if (error) {
                    ioriTheme.showError(message)
                } else {
                    ioriTheme.showSuccess(message)
                    this.loadAjaxCount()
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })

        this.loadAjaxCount()
    }

    removeCompareItem(event) {
        event.preventDefault()
        let $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'POST',
            data: {
                _method: 'DELETE',
            },
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (res) => {
                if (res.error) {
                    ioriTheme.showError(res.message)
                } else {
                    ioriTheme.showSuccess(res.message)
                    this.loadAjaxCount()
                    $('.compare-page-content').load(window.siteConfig.compareUrl + ' .compare-page-content > *')
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })
    }

    addToWishlist(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'POST',
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (response) => {
                const { error, message, data } = response

                if (error) {
                    ioriTheme.showError(message)
                } else {
                    ioriTheme.showSuccess(message)
                    this.loadAjaxCount()
                    if (data.added) {
                        $currentTarget.find('i').removeClass('fal').addClass('fas')
                    } else {
                        $currentTarget.find('i').removeClass('fas').addClass('fal')
                    }
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })
    }

    removeWishlistItem(event) {
        event.preventDefault()
        let $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.prop('href'),
            method: 'POST',
            data: {
                _method: 'DELETE',
            },
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (res) => {
                if (res.error) {
                    ioriTheme.showError(res.message)
                } else {
                    ioriTheme.showSuccess(res.message)
                    this.loadAjaxCount()
                    $('.wishlist-page-content').load(window.siteConfig.wishlistUrl + ' .wishlist-page-content > *')
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })
    }

    processUpdateCart($this) {
        const $cartPage = $this.closest('.cart-page-content')
        const $form = $cartPage.find('.form--shopping-cart')
        const $loading = $cartPage.find('.loading')

        if (!$form.length) {
            return false
        }

        $.ajax({
            type: 'POST',
            cache: false,
            url: $form.prop('action'),
            data: new FormData($form[0]),
            contentType: false,
            processData: false,
            beforeSend: () => {
                $loading.addClass('d-none')
            },
            success: (res) => {
                $cartPage.load(window.siteConfig.cartUrl + ' .cart-page-content > *')

                if (res.error) {
                    ioriTheme.showError(res.message)
                    return false
                }

                ioriTheme.showSuccess(res.message)
                this.loadAjaxCount()
                this.loadAjaxCartSidebar(false)
            },
            error: (error) => {
                $loading.removeClass('d-none')
                ioriTheme.handleError(error)
            },
            complete: () => {
                $loading.removeClass('d-none')
            },
        })
    }

    handleProductsSorting(event) {
        const $currentTarget = $(event.currentTarget)

        this.$productsFilter.find('input[name="sort-by"]').val($currentTarget.val()).change()
    }

    handleProductsPerPage(event) {
        const $currentTarget = $(event.currentTarget)

        this.$productsFilter.find('input[name="per-page"]').val($currentTarget.val()).change()
    }

    handleProductsPagination(event) {
        event.preventDefault()

        const url = new URL($(event.currentTarget).attr('href'))
        const page = url.searchParams.get('page')

        this.$productsFilter.find('input[name="page"]').val(page).change()
    }

    handleProductQuickView(event) {
        event.preventDefault()

        const url = new URL($(event.currentTarget).attr('href'))
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: () => {
                this.$quickViewModal.find('.modal-loading').show()
                this.$quickViewModal.modal('show')
            },
            success: (response) => {
                if (!response.error) {
                    this.$quickViewModal.find('.product-modal-content').html(response.data)
                }
            },
            complete: () => {
                this.$quickViewModal.find('.modal-loading').hide()
            },
        })
    }

    filterProducts(event) {
        event.preventDefault()

        const $form = $(event.currentTarget)

        $.ajax({
            url: $form.prop('action') + '?' + $form.serialize(),
            type: 'GET',
            beforeSend: () => {
                this.$body.find('.loading-spinner-wrapper').show()
                $('html, body').animate({
                    scrollTop: $('.product-area').offset().top - 100,
                })

                const priceStep = this.$productsFilter.find('.nonlinear')
                if (priceStep.length) {
                    priceStep[0].noUiSlider.set([
                        this.$productsFilter.find('input[name=min_price]').val(),
                        this.$productsFilter.find('input[name=max_price]').val(),
                    ])
                }
            },
            success: (response) => {
                const { error, message, data } = response

                this.$body.find('.product-list').html(data)
                this.$body
                    .find('.show-information-product')
                    .html(this.$body.find('.product-list').find('.showing-product').html())

                if (!error) {
                    window.history.pushState({}, '', `${window.location.pathname}?${$form.serialize()}`)
                } else {
                    ioriTheme.showError(message || 'Opp!')
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
            complete: () => {
                this.$body.find('.loading-spinner-wrapper').hide()
            },
        })
    }

    applyCouponCode(event) {
        event.preventDefault()

        let $currentTarget = $(event.currentTarget)

        $.ajax({
            url: $currentTarget.data('url'),
            type: 'POST',
            data: {
                coupon_code: $currentTarget.closest('.form-coupon-wrapper').find('.coupon-code').val(),
            },
            beforeSend: () => {
                $currentTarget.addClass('button-loading')
            },
            success: (res) => {
                if (!res.error) {
                    $('.cart-page-content').load(
                        window.location.href + '?applied_coupon=1 .cart-page-content > *',
                        function () {
                            $currentTarget.prop('disabled', false).removeClass('button-loading')
                            ioriTheme.showSuccess(res.message)
                        }
                    )
                } else {
                    ioriTheme.showError(res.message)
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
                $currentTarget.removeClass('button-loading')
            },
            complete: () => {
                $currentTarget.removeClass('button-loading')
            },
        })
    }

    removeCouponCode(event) {
        event.preventDefault()

        const $currentTarget = $(event.currentTarget)
        const buttonText = $currentTarget.text()
        $currentTarget.text($currentTarget.data('processing-text'))

        $.ajax({
            url: $currentTarget.data('url'),
            type: 'POST',
            success: (res) => {
                if (!res.error) {
                    ioriTheme.showSuccess(res.message)
                    $('.cart-page-content').load(window.location.href + ' .cart-page-content > *', function () {
                        $currentTarget.text(buttonText)
                    })
                } else {
                    ioriTheme.showError(res.message)
                }
            },
            error: (error) => {
                ioriTheme.handleError(error)
            },
        })
    }

    loadAjaxCount() {
        const headerTopRight = $('.header-top').find('.header-top-right')

        if (window.siteConfig?.ajaxCount) {
            $.ajax({
                url: window.siteConfig.ajaxCount,
                method: 'GET',
                success: ({ data, error }) => {
                    if (error) {
                        return
                    }

                    const { cart, wishlist, compare } = data.count

                    headerTopRight.find('.cart-counter').text(cart)
                    headerTopRight.find('.wishlist-counter').text(wishlist)
                    headerTopRight.find('.compare-counter').text(compare)
                },
            })
        }
    }

    loadAjaxCartSidebar(showCart = true) {
        if (!window.siteConfig?.ajaxCartSidebar) {
            return
        }

        $.ajax({
            url: window.siteConfig.ajaxCartSidebar,
            method: 'GET',
            beforeSend: () => {
                $('.cart-main').find('.cart-content').addClass('loading')
            },
            success: ({ data }) => {
                $('.cart-content').html(data.cart_content)
                $('.cart-footer').html(data.cart_footer)

                if (!$('.cart-sidebar').hasClass('active') && showCart) {
                    $('.cart-sidebar').addClass('active')
                    $('.cart-main').find('.backdrop').show()
                    $('body').css({ overflow: 'hidden' })
                }
            },
            complete: () => {
                $('.cart-main').find('.cart-content').removeClass('loading')
            },
        })
    }

    filterSlider() {
        $('.nonlinear').each(function (index, element) {
            let $element = $(element)
            let min = $element.data('min')
            let max = $element.data('max')
            let $wrapper = $(element).closest('.nonlinear-wrapper')
            noUiSlider.create(element, {
                connect: true,
                behaviour: 'tap',
                start: [
                    $wrapper.find('.product-filter-item-price-0').val(),
                    $wrapper.find('.product-filter-item-price-1').val(),
                ],
                range: {
                    min: min,
                    '10%': max * 0.1,
                    '20%': max * 0.2,
                    '30%': max * 0.3,
                    '40%': max * 0.4,
                    '50%': max * 0.5,
                    '60%': max * 0.6,
                    '70%': max * 0.7,
                    '80%': max * 0.8,
                    '90%': max * 0.9,
                    max: max,
                },
            })

            let nodes = [$wrapper.find('.slider__min'), $wrapper.find('.slider__max')]

            element.noUiSlider.on('update', function (values, handle) {
                nodes[handle].html(Ecommerce.numberFormat(values[handle]))
            })

            element.noUiSlider.on('change', function (values, handle) {
                $wrapper
                    .find('.product-filter-item-price-' + handle)
                    .val(Math.round(values[handle]))
                    .trigger('change')
            })
        })
    }

    static numberFormat(number, decimals, dec_point, thousands_sep) {
        let n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep,
            dec = typeof dec_point === 'undefined' ? '.' : dec_point,
            toFixedFix = function (n, prec) {
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                let k = Math.pow(10, prec)
                return Math.round(n * k) / k
            },
            s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.')

        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }

        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }
        return s.join(dec)
    }
}

new Ecommerce().init()

$(function () {
    window.onBeforeChangeSwatches = function (data, $attrs) {
        const $product = $attrs.closest('.product-details')
        const $form = $product.find('.cart-form')

        $product.find('.error-message').hide()
        $product.find('.success-message').hide()
        $product.find('.number-items-available').html('').hide()
        const $submit = $form.find('button[type=submit]')

        if (data && data.attributes) {
            $submit.prop('disabled', true)
        }
    }

    window.onChangeSwatchesSuccess = function (res, $attrs) {
        const $product = $attrs.closest('.product-details')
        const $form = $product.find('.cart-form')
        const $footerCartForm = $('.footer-cart-form')
        $product.find('.error-message').hide()
        $product.find('.success-message').hide()

        if (res) {
            let $submit = $form.find('button[type=submit]')

            if (res.error) {
                $submit.prop('disabled', true)
                $product
                    .find('.number-items-available')
                    .html('<span class="text-danger">(' + res.message + ')</span>')
                    .show()
                $form.find('.hidden-product-id').val('')
                $footerCartForm.find('.hidden-product-id').val('')
            } else {
                const data = res.data
                const $price = $product.find('.box-price')
                const $salePrice = $price.find('.price')
                const $originalPrice = $price.find('.price-old')

                if (data.sale_price !== data.price) {
                    $originalPrice.removeClass('d-none')
                } else {
                    $originalPrice.addClass('d-none')
                }

                $salePrice.text(data.display_sale_price)
                $originalPrice.text(data.display_price)

                if (data.sku) {
                    $product.find('.meta-sku .meta-value').text(data.sku)
                    $product.find('.meta-sku').removeClass('d-none')
                } else {
                    $product.find('.meta-sku').addClass('d-none')
                }

                $form.find('.hidden-product-id').val(data.id)
                $footerCartForm.find('.hidden-product-id').val(data.id)
                $submit.prop('disabled', false)

                if (data.error_message) {
                    $submit.prop('disabled', true)
                    $product
                        .find('.number-items-available')
                        .html('<span class="text-danger">(' + data.error_message + ')</span>')
                        .show()
                } else if (data.success_message) {
                    $product.find('.number-items-available').html(res.data.stock_status_html).show()
                } else {
                    $product.find('.number-items-available').html('').hide()
                }

                const unavailableAttributeIds = data.unavailable_attribute_ids || []
                $product.find('.attribute-swatch-item').removeClass('pe-none')
                $product.find('.product-filter-item option').prop('disabled', false)
                if (unavailableAttributeIds && unavailableAttributeIds.length) {
                    unavailableAttributeIds.map(function (id) {
                        let $item = $product.find('.attribute-swatch-item[data-id="' + id + '"]')
                        if ($item.length) {
                            $item.addClass('pe-none')
                            $item.find('input').prop('checked', false)
                        } else {
                            $item = $product.find('.product-filter-item option[data-id="' + id + '"]')
                            if ($item.length) {
                                $item.prop('disabled', 'disabled').prop('selected', false)
                            }
                        }
                    })
                }

                const $gallery = $product.find('.detail-gallery')
                if ($gallery.length) {
                    if (!data.image_with_sizes.origin.length) {
                        data.image_with_sizes.origin.push(siteConfig.default_image)
                    }
                    if (!data.image_with_sizes.thumb.length) {
                        data.image_with_sizes.thumb.push(siteConfig.img_placeholder)
                    }

                    let imageHtml = ''
                    data.image_with_sizes.origin.forEach(function (item) {
                        imageHtml += `<figure class="border-radius-10">
                                    <img src="${item}" alt="${data.name}">
                                </figure>`
                    })

                    $gallery.find('.product-image-slider').slick('unslick').html(imageHtml)

                    let thumbHtml = ''
                    data.image_with_sizes.thumb.forEach(function (item) {
                        thumbHtml += `<div>
                            <div class="item-thumb"><img src="${item}" alt="${data.name}"></div>
                        </div>`
                    })

                    $gallery.find('.slider-nav-thumbnails').slick('unslick').html(thumbHtml)

                    productGallery(true, $gallery.find('.product-image-slider'))
                }
            }
        }
    }

    function productGallery(destroy, $gallery) {
        if (!$gallery || !$gallery.length) {
            $gallery = $('.product-image-slider')
        }

        const nav = $gallery.data('nav')

        if ($gallery.length && destroy) {
            if ($gallery.hasClass('slick-initialized')) {
                $gallery.slick('unslick')
            }
            if ($(nav).length && $(nav).hasClass('slick-initialized')) {
                $(nav).slick('unslick')
            }
        }

        $gallery.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: nav,
            rtl: window.isRtl,
        })

        let options = {
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: $gallery.data('main'),
            dots: false,
            focusOnSelect: true,
            vertical: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false,
                        adaptiveHeight: true,
                    },
                },
            ],
            rtl: window.isRtl,
        }

        $(nav).slick(options)
    }
})
