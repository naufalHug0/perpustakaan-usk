const inputs = document.querySelectorAll('.input-edit')
const action_buttons = document.querySelectorAll('.input-action-btn')
const edit_buttons = document.querySelectorAll('.input-edit-btn')
const cancel_buttons = document.querySelectorAll('.input-cancel-edit')

edit_buttons.forEach((edit, i) => {
    edit.addEventListener('click', () => {
        inputs[i].disabled = false
        edit.classList.add('hidden')
        action_buttons[i].classList.remove('hidden')
        action_buttons[i].classList.add('flex')
    })
})

cancel_buttons.forEach((cancel, i) => {
    cancel.addEventListener('click', () => {
        inputs[i].disabled = true
        edit_buttons[i].classList.remove('hidden')
        action_buttons[i].classList.add('hidden')
        action_buttons[i].classList.remove('flex')
    })
})