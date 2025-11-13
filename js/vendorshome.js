const accordian = (input) => {
    // Get the icon inside the clicked question
    let icon = input.querySelector('.icon');
    let answer = input.nextElementSibling;

    answer.classList.toggle("active");

    if(icon.classList.contains("ri-add-line")){
        icon.classList.remove("ri-add-line");
        icon.classList.add("ri-subtract-line");
    }
    else{
        icon.classList.remove("ri-subtract-line");
        icon.classList.add("ri-add-line");
    }
}

const moveSroll = () =>{
    let detail = document.getElementById("detail");
     if (detail) {
        detail.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

    }
}