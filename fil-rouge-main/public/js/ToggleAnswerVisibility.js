document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggleButton');
    const answerButtons = document.querySelectorAll('.answer-button');

    toggleButtons.forEach(toggleButton => {
        toggleButton.addEventListener('click', function () {
            const answer = this.parentElement.nextElementSibling;
            answer.classList.toggle('hidden');
            const svgIcon = this.querySelector('svg');
            if (!answer.classList.contains('hidden')) {
                svgIcon.setAttribute('viewBox', '0 -192 469 469');
                svgIcon.innerHTML = '<path d="m437.332031.167969h-405.332031c-17.664062 0-32 14.335937-32 32v21.332031c0 17.664062 14.335938 32 32 32h405.332031c17.664063 0 32-14.335938 32-32v-21.332031c0-17.664063-14.335937-32-32-32zm0 0"/>';
            } else {
                svgIcon.setAttribute('viewBox', '0 0 469.33333 469.33333');
                svgIcon.innerHTML = '<path d="m437.332031 192h-160v-160c0-17.664062-14.335937-32-32-32h-21.332031c-17.664062 0-32 14.335938-32 32v160h-160c-17.664062 0-32 14.335938-32 32v21.332031c0 17.664063 14.335938 32 32 32h160v160c0 17.664063 14.335938 32 32 32h21.332031c17.664063 0 32-14.335937 32-32v-160h160c17.664063 0 32-14.335937 32-32v-21.332031c0-17.664062-14.335937-32-32-32zm0 0"/>';
            }
        });
    });

    answerButtons.forEach(answerButton => {
        answerButton.addEventListener('click', function () {
            const currentButton = this;
            const dataIsCorrect = currentButton.getAttribute('data-is-correct');

            //console.log('data-is-correct:', dataIsCorrect);

            const isCorrect = dataIsCorrect === '1';

            //console.log('isCorrect:', isCorrect);

            answerButtons.forEach(button => {
                button.classList.remove('border-green-500', 'border-red-500');
            });

            // Apply appropriate color class based on correctness
            if (isCorrect) {
                currentButton.classList.add('border-green-500');
            } else {
                currentButton.classList.add('border-red-500');
            }
        });
    });
});
