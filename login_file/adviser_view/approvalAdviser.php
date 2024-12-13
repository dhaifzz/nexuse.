<style>
    p#modal-message{    
        font-weight: bold;
        font-size: 1.25rem;
        color: #b11b1b;
        text-align: center;
    } 
    .modal-name-black {
    color: black;
}
</style>

<div class="modal fade" id="approvalButtons" tabindex="-1" aria-labelledby="approvalButtonsLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p id="modal-message"></p>
                <div id="modal-details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="modal-confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = new bootstrap.Modal(document.getElementById('approvalButtons'));

    document.querySelectorAll('.approvalButtons button').forEach(button => {
        button.addEventListener('click', function () {
            const action = button.getAttribute('data-action'); // 'approve' or 'decline'
            const name = button.getAttribute('data-name');
            const course = button.getAttribute('data-section');
            const dateAbsent = button.getAttribute('data-date-absent');

            const isApprove = action === 'approve' ? 1 : 0; // 1 for approve, 0 for decline

            const modalMessage = document.getElementById('modal-message');
            modalMessage.innerHTML = `
                ${isApprove 
                ? `Approve the letter of <span class="modal-name-black">${name}</span>?` 
                : `Decline the letter of <span class="modal-name-black">${name}</span>?`}
            `;

            const modalDetails = document.getElementById('modal-details');
            modalDetails.innerHTML = `
                <p><strong>Section:</strong> ${course}</p>
                <p><strong>Date of Absence:</strong> ${dateAbsent}</p>
            `;

            const confirmButton = document.getElementById('modal-confirm');
            confirmButton.onclick = function () {
                console.log(`${isApprove ? 'Approved' : 'Declined'} the letter of ${name}`);

                modal.hide();
            };
        });
    });
});


</script>

