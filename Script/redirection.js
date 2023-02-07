const fake = document.querySelector('.modal-btn')
const hide = document.querySelector('.wrapper')
const modal = document.querySelector('.modal')
const prank = document.querySelector('.prank')
const body = document.querySelector('body')
document.addEventListener("DOMContentLoaded", () => {
fake.addEventListener("click", () => {
    prank.style.visibility="visible"
    hide.style.display="none"
    modal.style.display="none"
    body.style.cursor="none"
    toggleFullScreen()

})
    // charlie1.addEventListener("click", () => {
    //
    // })
})

function toggleFullScreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else if (document.exitFullscreen) {
        document.exitFullscreen();
    }
}

