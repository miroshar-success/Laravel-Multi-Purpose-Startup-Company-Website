import Cookies from './js.cookie'

'use strict'

document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector('.ae-anno-announcement-wrapper')

    if (!wrapper) {
        return
    }

    const announcements = wrapper.querySelectorAll('.ae-anno-announcement')
    const nextBtn = document.querySelector('.ae-anno-announcement__next-button')
    const prevBtn = document.querySelector('.ae-anno-announcement__previous-button')
    const dismissButton = document.querySelector('.ae-anno-announcement__dismiss-button')
    const autoplay = wrapper.getAttribute('data-announcement-autoplay') !== null
    const autoplayDelay = parseInt(wrapper.getAttribute('data-announcement-autoplay-delay') || 5000)

    const dismissedAnnouncements = JSON.parse(Cookies.get('ae-anno-dismissed-announcements') || '[]')

    let currentIndex = 1
    let autoplayInterval = null

    const autoplayAnnouncement = () => {
        if (autoplay && autoplayDelay) {
            if (autoplayInterval) {
                clearInterval(autoplayInterval)
            }

            autoplayInterval = setInterval(() => {
                currentIndex++
                showAnnouncement(currentIndex)
            }, autoplayDelay)
        }
    }

    const showAnnouncement = () => {
        if (currentIndex > announcements.length) {
            currentIndex = 1
        } else if (currentIndex < 1) {
            currentIndex = announcements.length
        }

        announcements.forEach((announcement) => {
            announcement.style.display = 'none'
        })

        announcements[currentIndex - 1].style.display = 'block'

        autoplayAnnouncement()
    }

    showAnnouncement(currentIndex)

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentIndex++
            showAnnouncement(currentIndex)
        })
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            showAnnouncement(currentIndex--)
        })
    }

    if (dismissButton) {
        dismissButton.addEventListener('click', () => {
            const ids = JSON.parse(dismissButton.getAttribute('data-announcement-ids'))

            dismissedAnnouncements.push(...ids)

            Cookies.set('ae-anno-dismissed-announcements', JSON.stringify(dismissedAnnouncements), { expires: 365 })

            wrapper.parentNode.removeChild(wrapper)
        })
    }

    autoplayAnnouncement()
})
