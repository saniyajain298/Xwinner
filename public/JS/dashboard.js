//alert('ojht')
function charOnly(event){
    if((/[a-zA-Z]/i).test(event.key)){
        return true
    }
    else{
        swalAlert('error', 'Oops...', 'Only Character is allowed')
        return false
    }
}

function swalAlert(icon,title, text){
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
      })
}
// onkeydown="return /[a-zA-Z]/i.test(event.key)"
