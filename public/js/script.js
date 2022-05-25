/*
  Show Profile information
  when click button menu__ava
*/
function openInfo(btn) {
  let ava_info = document.querySelector('.ava__info'); 

  if (ava_info.classList.contains('active')) {
    ava_info.classList.remove('active')
  } else {
    ava_info.classList.add('active')
  }
}

document.addEventListener('mouseup', function (e) {
  let node = e.target

  if (node.classList.contains('ava__link') || !ava.contains(node)) {
    ava.classList.remove('active')
  }
})


/* 
  Activating Sidebar
  when click burger
*/
function openSidebar() {
  let sidebar = document.querySelector('.sidebar'); 
  
  if (sidebar.classList.contains('sidebar-active')) {
    sidebar.classList.remove('sidebar-active'); 
  } else {
    sidebar.classList.add('sidebar-active')
  }
}

/*
  Show modal window of Reply
  when click button 
*/

function showModalReply() {
  let modal_overlay = document.querySelector('.modal-overlay'); 
  let modal_window = document.querySelector('.modal-window'); 

  if (modal_overlay.classList.contains('active')) {
    modal_overlay.classList.remove('active') 
    modal_window.classList.remove('active')
  } else {
    modal_overlay.classList.add('active')
    modal_window.classList.add('active')
  }
}


/*
  Reply with message to feedback 
  when click OK button
*/ 

function replyToFeedback() {
  let modal_overlay = document.querySelector('.modal-overlay'); 
  let modal_window = document.querySelector('.modal-window'); 
 
  modal_overlay.classList.remove('active')
  modal_window.classList.remove('active')
}