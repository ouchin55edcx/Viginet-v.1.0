document.addEventListener('DOMContentLoaded', function () {
    const answerButtons = document.querySelectorAll('.answer-button');

    answerButtons.forEach(button => {
        button.addEventListener('click', function () {
            const isCorrect = this.getAttribute('data-is-correct');
            const taskId = this.getAttribute('data-task-id');
            const answer = this.getAttribute('data-answer');

            // Send AJAX request to submit the answer
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/submit/answer');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response && response.correct === true) {
                        // Show success message using SweetAlert
                        Swal.fire({
                            title: 'Correct',
                            icon: 'success',
                        });
                    } else {
                        // Show error message for incorrect answer
                        Swal.fire({
                            title: 'Incorrect',
                            text: 'Try again!',
                            icon: 'error',
                        });
                    }

                    // Optionally, disable all answer buttons for this task after server validation
                    const taskAnswerButtons = document.querySelectorAll('.answer-button[data-task-id="' + taskId + '"]');
                    taskAnswerButtons.forEach(btn => {
                        btn.disabled = true;
                    });

                    // Reload the page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    // Show error message
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to submit answer. Please try again.',
                        icon: 'error',
                    });
                    console.error('Failed to submit answer. Please try again.');
                }
            };

            xhr.onerror = function () {
                // Show error message
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to submit answer. Please try again.',
                    icon: 'error',
                });
                console.error('Failed to submit answer. Please try again.');
            };

            // Send JSON data with task_id and answer
            xhr.send(JSON.stringify({ task_id: taskId, answer: answer }));
        });
    });
});
