document.querySelector('.notification-button.dismissable').addEventListener('click', () => {
    document.querySelector('.notification').classList.add('animate-notification-swipe-down')
    document.querySelector('.overlay').classList.add('animate-overlay-hide')

    setTimeout(() => {
        document.querySelector('.notification').remove()
        document.querySelector('.overlay').remove()
    }, 700)
})