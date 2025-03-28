<div class="modal fade" id="education" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <div class="modal-body spinner-container" id="modalBody">
                <div class="spinner-check" id="spinnerCheck"></div>
                <div class="checkmark" id="checkmark">✔️</div>
            </div>
            <h5 class="mt-3">Success!</h5>
            <p>Your information has been updated successfully.</p>
        </div>
    </div>
</div>

<style>
.spinner-check {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #4CAF50;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 20px auto;
}

.checkmark {
    display: none;
    font-size: 48px;
    color: #4CAF50;
    text-align: center;
}

.show-check .spinner-check {
    display: none;
}

.show-check .checkmark {
    display: block;
    opacity: 1;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>