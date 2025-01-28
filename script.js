// Tambahkan interaksi JavaScript di sini jika diperlukan
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', (event) => {
        if (!confirm('Yakin ingin menghapus?')) {
            event.preventDefault();
        }
    });
});