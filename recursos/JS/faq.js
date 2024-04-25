document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const answer = button.nextElementSibling;
        button.classList.toggle('active');
        answer.classList.toggle('active');
    });
});

function filter(x){
    const form = getElementById(x);
    if(form != null) {
        form.submit();
    }
}