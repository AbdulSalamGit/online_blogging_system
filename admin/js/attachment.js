<script>
document.getElementById('exampleSelect1').addEventListener('change', function() {
    var container = document.getElementById('attachments-container');
    container.innerHTML = ''; // Clear the container

    var totalAttachments = this.value;
    for (var i = 0; i < totalAttachments; i++) {
        var div = document.createElement('div');
        div.className = 'mb-3';

        var label = document.createElement('label');
        label.className = 'form-label';
        label.textContent = 'Attachment ' + (i + 1);

        var input = document.createElement('input');
        input.type = 'file';
        input.className = 'form-control';
        input.name = 'attachments[]';

        div.appendChild(label);
        div.appendChild(input);
        container.appendChild(div);
    }
});
</script>
